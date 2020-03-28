<?php

require_once('Curl.php');
if(isset($_REQUEST['action']) && function_exists($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    call_user_func($action);
}
function submit_form(){
    $data = $_REQUEST;
    $hexaval_email = bin2hex($data['emailid']); 
    $data['ID'] = $hexaval_email;
    
    $myCurl = new Curl();
    $myCurl->seturl('https://webhook.site/26973c39-c282-42ea-86c0-457ae8e53572');
    echo $reponse = $myCurl->call($data);
}



?>