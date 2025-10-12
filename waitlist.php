<?php
	include ('config.php');

    // post waitlist details
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $country_code = trim($_POST['countryCode'] ?? '');

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
            INSERT INTO `list`(`list_id`, `list_email`, `country_code`, `list_phone`, `list_device`, `list_os`, `list_refferer`, `list_browser`, `list_ip`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ';
        $statment = $dbConnection->prepare($sql);
        $result = $statment->execute([
            guidv4() . '-' . strtotime(date("Y-m-d H:m:s")), 
            $email, 
			$country_code, 
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

			// send email to user
			$title = 'Waitlist . Fiaxit';
			$subject = 'You\'re on the list 🚀';
			$topic = 'Thanks for joining the waitlist — you\'re officially on board for the next big thing in crypto';
			$Body = '
				<p>
					We’re building something special: a secure, lightning-fast exchange designed for traders, investors, and crypto-curious minds alike. As a waitlist member, you’ll be among the first to: 
					<br>
					<br>
					• 	🔓 Get early access before public launch
					<br>
					• 	💬 Join exclusive community discussions
					<br>
					• 	🎁 Receive special perks and reward
					<br>
				</p>
				<p>
					We’ll keep you updated as we get closer to launch. In the meantime, feel free to follow us on <a href="x.com/namibra">X(Twitter)</a>, to stay in the loop and connect with fellow early adopters.
					<br>
					Welcome to the future of crypto.
				</p>
			';
			include ('mail_body.php');
			send_email($email, $subject, $body);
			$cleanedPhone = $country_code . $phone;
			send_sms('Namibra welcome you to Levina 🤞.', $cleanedPhone);

            echo "Success"; 
        } else {
            echo "Failed";
        }
    }
?>