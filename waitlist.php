<?php
	include ('config.php');

    // post waitlist details
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $country_code = trim($_POST['phone'] ?? '');

        if (empty($email) || empty($phone)) {
            http_response_code(400);
            echo "Missing fields";
            exit;
        }

        if (findByEamil($email)) {
            echo "Email already in use !";
            exit;
        }
        
        if (findByPhone($phone)) {
            echo "Phone number already in use !";
            exit;
        }


        // get other details
		$a = getBrowserAndOs();
		$a = json_decode($a);

		$browser = $a->browser;
		$operatingSystem = $a->operatingSystem;
		$refferer = $a->refferer;

        $sql = '
            INSERT INTO `list`(`list_id`, `list_email`, `list_phone`, `list_device`, `list_os`, `list_refferer`, `list_browser`, `list_ip`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ';
        $statment = $dbConnection->prepare($sql);
        $result = $statment->execute([
            guidv4() . '-' . strtotime(date("Y-m-d H:m:s")), 
            $email, 
            $phone, 
            getDeviceType(), 
			$operatingSystem, 
			$refferer, 
			$browser, 
			getIPAddress()
        ]);

        if ($result) {
           // You can now save to DB or send an email notification here.
            // Example: file_put_contents('waitlist.txt', \"$email | $phone\\n\", FILE_APPEND);

            echo "Success"; 
        } else {
            echo "Failed";
        }
    }