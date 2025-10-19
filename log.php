<?php
header('Content-Type: application/json; charset=utf-8');
require ('config.php');

// Decode JSON
$data = json_decode(file_get_contents('php://input'), true);
if (!is_array($data)) $data = [];

// Helper to get IP
function get_client_ip() {
    foreach ([
        'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'
    ] as $key) {
        if (!empty($_SERVER[$key])) {
            $ipList = explode(',', $_SERVER[$key]);
            foreach ($ipList as $ip) {
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP)) return $ip;
            }
        }
    }
    return '0.0.0.0';
}

$ip = get_client_ip();

// ✅ GeoIP lookup (free API) - robust: skip private IPs, try curl then file_get_contents, short timeout, fallback
function is_public_ip($ip) {
    return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
}

// ✅ Deduplicate within 60 minutes
$check = $dbConnection->prepare("SELECT id FROM visitors WHERE ip_address = ? AND visit_time > (NOW() - INTERVAL 60 MINUTE)");
$check->execute([$ip]);
if ($check->rowCount() > 0) {
    echo json_encode(['success'=>true, 'message' => 'Duplicate visit skipped']);
    exit;
}

// ✅ GeoIP lookup (free API)
// $geo = @file_get_contents("https://ipapi.co/{$ip}/json/");
// $geo_data = $geo ? json_decode($geo, true) : [];
// $country = $geo_data['country_name'] ?? null;
// $city = $geo_data['city'] ?? null;

$country = null;
$city = null;

if (is_public_ip($ip)) {
    $service = "https://ipapi.co/{$ip}/json/";

    $geo_json = null;
    // Use cURL if available (more reliable)
    if (function_exists('curl_version')) {
        $ch = curl_init($service);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_FAILONERROR => true,
            CURLOPT_SSL_VERIFYPEER => true,
        ]);
        $geo_json = curl_exec($ch);
        $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http !== 200) $geo_json = null;
    } else {
        // fallback to file_get_contents with a short timeout
        $ctx = stream_context_create(['http' => ['timeout' => 3]]);
        $geo_json = @file_get_contents($service, false, $ctx);
    }

    $geo_data = $geo_json ? json_decode($geo_json, true) : [];
    if (is_array($geo_data)) {
        $country = $geo_data['country_name'] ?? null;
        $city = $geo_data['city'] ?? null;
    }
    // optional fallback to another service if still empty
    if (empty($country) && empty($city)) {
        $fallback = "http://ip-api.com/json/{$ip}?fields=status,country,city,message";
        $fallback_json = @file_get_contents($fallback);
        $fb = $fallback_json ? json_decode($fallback_json, true) : [];
        if (!empty($fb['status']) && $fb['status'] === 'success') {
            $country = $fb['country'] ?? $country;
            $city = $fb['city'] ?? $city;
        }
    }
} else {
    // local/private IPs - skip external lookup
    $country = null;
    $city = null;
}

// ✅ Other server info
$user_agent = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 1000);
$accept_lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null;
$referer = $_SERVER['HTTP_REFERER'] ?? ($data['referer'] ?? null);
$url = $data['url'] ?? ($_SERVER['REQUEST_URI'] ?? null);

// ✅ Client info
$screen = $data['screen'] ?? null;
$color_depth = isset($data['colorDepth']) ? (int)$data['colorDepth'] : null;
$timezone = $data['timezone'] ?? null;
$platform = $data['platform'] ?? null;
$browser = $data['ua'] ?? null;
$language = $data['language'] ?? null;
$cookies_enabled = isset($data['cookiesEnabled']) ? (int)$data['cookiesEnabled'] : null;

// ✅ Compress extra data
$extra_json = gzcompress(json_encode($data, JSON_UNESCAPED_UNICODE));

// ✅ Insert
$stmt = $dbConnection->prepare("
    INSERT INTO visitors (ip_address, country, city, user_agent, accept_language, referer, url, screen, color_depth, timezone, platform, browser, language, cookies_enabled, extra_json) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");
$d = [
    $ip, $country, $city, $user_agent, $accept_lang, $referer, $url,
    $screen, $color_depth, $timezone, $platform, $browser,
    $language, $cookies_enabled, $extra_json
];

if ($stmt->execute($d)) {
    echo json_encode(['success'=>true]);
} else {
    echo json_encode(['success'=>false, 'error'=> 'error']);
}