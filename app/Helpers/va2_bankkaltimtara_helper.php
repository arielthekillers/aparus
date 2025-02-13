<?php
if (!function_exists('va2_bankkaltimtara')) {
    function generateToken()
    {
        //initiate post data
        $postData = array(
            'username' => 'rusunawabtg',
            'password' => 'RsNBt9ktM24_',
        );
        // Setup cURL
        $url = 'https://e-api.bankaltimtara.co.id:8083/api-pemda/user/auth';
        $ch = curl_init($url);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));
        // Send the request
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        return $response->token;
    }
    function generateVirtualAccount($vatoken, $number, $name, $amount, $description)
    {
        //initiate post data
        $postData = array(
            'number' => $number,
            'name' => $name,
            'amount' => strval(floatval($amount)),
            'description' => $description,
        );
        // Setup cURL
        $ch = curl_init('https://e-api.bankaltimtara.co.id:8083/api-pemda/va/create');
        $authorization = "Authorization: Bearer " . $vatoken;
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                $authorization,
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));
        // Send the request
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        return $response->code;
    }
}
