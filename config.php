<?php
    // conection variables
    $driver = 'mysql';
    $hostname = 'localhost';
    $port = 80;
    $database = 'waitlist_fiaxit';
    $username = 'root';
    $password = '';

    // AUTO LOAD VENDOR FILES
    require 'vendor/autoload.php';

    // connection to database
    try {
        $string = $driver . ":host=" . $hostname . ";charset=utf8mb4;dbname=" . $database;
        $dbConnection = new \PDO(
            $string, $username, $password
        );
    } catch (\PDOException $e) {
        exit($e->getMessage());
    }

    // functions
    function dnd($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	    die;
	}
    
    // defined keys
    define ('COINCAP_APIKEY', "c06fd6c7-8b47-438d-802a-c7745d29a291");
    define ('PROOT', "");

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest',
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'GET',
    //     CURLOPT_HTTPHEADER => array(
    //         'X-CMC_PRO_API_KEY: ' . COINCAP_APIKEY,
    //         'Accept: application/json'
    //     ),
    // ));

    // $response = curl_exec($curl);

    // curl_close($curl);

    // $coin_data = json_decode($response, true);

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    
	// Generate UUID VERSION 4
	function guidv4($data = null) {
	    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
	    $data = $data ?? random_bytes(16);
	    assert(strlen($data) == 16);

	    // Set version to 0100
	    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
	    // Set bits 6-7 to 10
	    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

	    // Output the 36 character UUID.
	    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
	}

	// find user agent
	function getBrowserAndOs() {

	    $user_agent = $_SERVER['HTTP_USER_AGENT'];
	    $browser = "N/A";

	    $browsers = array(
	        '/msie/i' => 'Internet explorer',
	        '/firefox/i' => 'Firefox',
	        '/safari/i' => 'Safari',
	        '/chrome/i' => 'Chrome',
	        '/edge/i' => 'Edge',
	        '/opera/i' => 'Opera',
	        '/mobile/i' => 'Mobile browser'
	    );

	    foreach ($browsers as $regex => $value) {
	        if (preg_match($regex, $user_agent)) { $browser = $value; }
	    }

	    $visitor_agent_division = explode("(", $user_agent)[1];
	    list($os, $division_two) = explode(")", $visitor_agent_division);

	    $refferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

	    $visitor_broswer_os = array(
	        'browser' => $browser,
	        'operatingSystem' => $os,
	        'refferer' => $refferer
	    );

	   	$output = json_encode($visitor_broswer_os);

	    return $output;
	}

	// get user/visitor device
	function getDeviceType() {
		$userAgent = $_SERVER['HTTP_USER_AGENT'];

		// Check if it's a mobile device
		if (preg_match('/mobile/i', $userAgent)) {
			if (preg_match('/android/i', $userAgent)) {
				return "Mobile (Android)";
			} elseif (preg_match('/iphone|ipad|ipod/i', $userAgent)) {
				return "Mobile (iOS)";
			} else {
				return "Mobile (Other)";
			}
		}

		// Check if it's a tablet
		if (preg_match('/tablet|ipad/i', $userAgent)) {
			return "Tablet";
		}

		// Default to desktop
		return "Desktop";
	}

    // GET USER IP ADDRESS
	function getIPAddress() {  
	    //whether ip is from the share internet  
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
	        $ip = $_SERVER['HTTP_CLIENT_IP'];  
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  // whether ip is from the proxy
	       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
	     } else {  // whether ip is from the remote address 
	        $ip = $_SERVER['REMOTE_ADDR'];  
	    }  
	    return $ip;  
	}

    // get admin by email
    function findByEamil($email) {
        global $dbConnection;

        $query = "
            SELECT * FROM list 
            WHERE list_email = ? 
            LIMIT 1
        ";
        $statement = $dbConnection->prepare($query);
        $statement->execute([$email]);
        $user = $statement->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    // get admin by id
    function findByPhone($phone) {
        global $dbConnection;

        $query = "
            SELECT * FROM list 
            WHERE list_phone = ? 
            LIMIT 1
        ";
        $statement = $dbConnection->prepare($query);
        $statement->execute([$phone]);
        $user = $statement->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    // Send EMAIL
	function send_email($to, $subject, $body) {
		$mail = new PHPMailer(true);
		try {
	        $to = $to;
	        $from = 'info@carethatfeelslikehome.com';
	        $from_name = 'Fiaxit.app';
	        $subject = $subject;
	        $body = $body;

	        //Create an instance; passing `true` enables exceptions
	        $mail = new PHPMailer(true);

	        $mail->IsSMTP();
	        $mail->SMTPAuth = true;

	        $mail->SMTPSecure = 'ssl'; 
	        $mail->Host = 'smtp.carethatfeelslikehome.com';
	        $mail->Port = '465';  
	        $mail->Username = $from;
	        $mail->Password = 'Ab31ab431'; 

	        $mail->IsHTML(true);
	        $mail->WordWrap = 50;
	        $mail->From = $from;
	        $mail->FromName = $from_name;
	        $mail->Sender = $from;
	        $mail->AddReplyTo($from, $from_name);
	        $mail->Subject = $subject;
	        $mail->Body = $body;
	        $mail->AddAddress($to);
	        $mail->send();
	        return true;
	    } catch (Exception $e) {
	    	//return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	    	return false;
	        //$message = "Please check your internet connection well...";
	    }
	}

	// send mail to server
	function send_mail_to_server($subject, $body) {
		$to_server = 'info@carethatfeelslikehome.com';

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From:" . $to_server;
					
		mail($to_server, $subject, $body, $headers);
	}
