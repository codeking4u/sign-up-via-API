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
    $lastname = $data['last-name'];
    $phone = $data['phone-no'];
    
    /* server side validation */
    $rexSafety = "/^[^<,\"@/{}()*$%?=>:|;#]*$/i";
    if(trim($email)=="" || trim($firstname)==""){
        $msg="Email ID and firstname is mandatory";
        echo json_encode(array('response'=>0,'success'=>false,'message'=>$msg)); exit;
    }
    
    if (!preg_match("/^([a-zA-Z' ]+)$/",$firstname) || !preg_match("/^([a-zA-Z' ]+)$/",$lastname)) {
        $msg="Human names does not have special characters.";
        echo json_encode(array('response'=>0,'success'=>false,'message'=>$msg)); exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format";
        echo json_encode(array('response'=>0,'success'=>false,'message'=>$msg)); exit;
    }

    if(trim($email)=="" || trim($firstname)==""){
        $msg="Email ID and firstname is mandatory";
        echo json_encode(array('response'=>0,'success'=>false,'message'=>$msg)); exit;
    }

    $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $phone_to_check = str_replace("-", "", $filtered_phone_number);
    /* have considered phone length to be less or equal to 10 */
    if (strlen($phone_to_check) > 10) {
        $msg="Phone not valid or greater than 10 digits";
        echo json_encode(array('response'=>0,'success'=>false,'message'=>$msg)); exit;
    }

    /* server side validation */
    $data["phone-no"] = $phone_to_check;
    $hexaval_email = bin2hex($email); 
    $data['ID'] = $hexaval_email;


    $myCurl = new Curl();
    $myCurl->seturl('https://webhook.site/26973c39-c282-42ea-86c0-457ae8e53572');
    $reponse = $myCurl->call($data);
    echo json_encode(array('response'=>$reponse,'success'=>true)); exit;
}



?>