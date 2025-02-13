<?php
if (!function_exists('ruangWa')) {
    //kirim sms berbayar (Cek saldo di ruang wa)
    function send_sms($phone, $message)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.ruangwa.id/api/send_sms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'accesskey='.$_ENV['ruangWa.accesskey'].'&number='.$phone.'&message='.$message,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return true;
    }
    //kirim pesan whatsapp
    function send_message($phone, $message){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'token='.$_ENV['ruangWa.token'].'&number='.$phone.'&message='.$message,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        //echo $response;
    }
}
