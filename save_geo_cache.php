<?php
require ('config.php');

$data = json_decode(file_get_contents('php://input'), true);
if (!$data || empty($data['country']) || !isset($data['lat'])) {
    http_response_code(400);
    exit('Invalid data');
}

$country = trim($data['country']);
$city = trim($data['city']);
$lat = (float)$data['lat'];
$lon = (float)$data['lon'];

$stmt = $dbConnection->prepare("
    INSERT INTO geo_cache (country, city, lat, lon) VALUES (?, ?, ?, ?) 
    ON DUPLICATE KEY UPDATE lat=VALUES(lat), lon=VALUES(lon)"
);
$stmt->execute([$country, $city, $lat, $lon]);
echo json_encode(['success' => true]);