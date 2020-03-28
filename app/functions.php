<?php

require_once('Curl.php');
if(isset($_REQUEST['action']) && function_exists($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    call_user_func($action);
}
function submit_form(){
    $msg="";
    $data = $_REQUEST;
    $email = $data['emailid'];
    $firstname = $data['first-name'];
    
    /* server side validation */
    if(trim($email)=="" || trim($firstname)==""){
        $msg="Email ID and firstname is mandatory";
        echo json_encode(array('response'=>0,'success'=>false,'message'=>$msg)); exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format";
        echo json_encode(array('response'=>0,'success'=>false,'message'=>$msg)); exit;
    }

    if(trim($email)=="" || trim($firstname)==""){
        $msg="Email ID and firstname is mandatory";
        echo json_encode(array('response'=>$reponse,'success'=>false,'message'=>$msg)); exit;
    }
    /* server side validation */

    $hexaval_email = bin2hex($email); 
    $data['ID'] = $hexaval_email;


    $myCurl = new Curl();
    $myCurl->seturl('https://webhook.site/26973c39-c282-42ea-86c0-457ae8e53572');
    $reponse = $myCurl->call($data);
    echo json_encode(array('response'=>$reponse,'success'=>true)); exit;
}



?>