<?php

namespace controllers;

class LocationController
{
    private string $apiKey = "pk.5357374a4ce902cbf96c6f384dc91988";


    public function getByAddress(string $address): bool|string
    {
        $data = [
            "q" => $address,
            "key" => $this->apiKey,
            "format" => "json"
        ];

        $url = "https://us1.locationiq.com/v1/search";

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($curl);
        $errors = curl_error($curl);

        if($errors){
            return $errors;
        } else {
            return  $result;
        }
    }

    public function getByCoordinates(string $latitude, string $longitude): bool|string
    {
        $data = [
            "lat" => $latitude,
            "lon" => $longitude,
            "key" => $this->apiKey,
            "format" => "json"
        ];

        $url = "https://us1.locationiq.com/v1/reverse";

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($curl);
        $errors = curl_error($curl);

        if($errors){
            return $errors;
        } else {
            return  $result;
        }
    }

}