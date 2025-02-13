<?php
if (!function_exists('va_bankkaltimtara')) {
    function virtualaccaounauth($username, $password)
    {
        //initiate post data
        $postData = array(
            'username' => 'generateva',
            'password' => '123456',
        );
        // Setup cURL
        $url = 'https://api-dev.bankaltimtara.co.id:8300/api/user/auth';
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
        $vatoken = $response->token;
        session()->set('vatoken', $response->token);
        curl_close($ch);
        return $vatoken;
    }
    function generateVirtualAccount($vatoken, $number, $name, $amount, $description)
    {
        //initiate post data
        $postData = array(
            'number' => $number,
            'name' => $name,
            'amount' => floatval($amount),
            'description' => $description,
        );
        // Setup cURL
        $ch = curl_init('https://api-dev.bankaltimtara.co.id:8300/api/va/create');
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
        print_r($response);
    }
}
