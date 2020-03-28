<?php
if(isset($_REQUEST['action']) && function_exists($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    call_user_func($action);
}
function submit_form(){
    echo 'demo response'; exit;
}



?>