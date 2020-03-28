<?php
Class Curl{
    public $url;
    public function __construct($url = null)
    {
        $this->url = $url;
    }

    public function call($data){
        $curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: signup.page',
        'X-RapidAPI-Key: 234234234',
        'Content-Type: application/json'
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response . PHP_EOL; 

    }
    public function seturl($url){
        $this->url = $url;
    }

}

?>