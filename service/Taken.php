<?php


class Taken
{
    public function getTaken()
    {
        $url = "localhost/phpCityOOPRefactor/api/taak";

        $curl = curl_init();
        $headers = array();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        $json = curl_exec($curl);
        //Close cURL connection
        curl_close($curl);

        return json_decode($json, true);
    }
}