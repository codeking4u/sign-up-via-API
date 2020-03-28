<?php
if(isset($_REQUEST['action']) && function_exists($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    call_user_func($action);
}
function submit_form(){
    $data = $_REQUEST;
    $hexaval_email = bin2hex($data['emailid']); 
    $data['ID'] = $hexaval_email;

    $url = 'https://webhook.site/26973c39-c282-42ea-86c0-457ae8e53572';
    $curl = curl_init($url);
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

    echo $response . PHP_EOL;
}



?>