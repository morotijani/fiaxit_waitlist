<?php
    function dnd($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	    die;
	}
    
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