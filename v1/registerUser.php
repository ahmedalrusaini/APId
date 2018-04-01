<?php

$response = array();

require_once '../includes/DbOperations.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if (
        isset($_POST['custPhone']) AND
            isset($_POST['custPassword'])
                ){
        
                    $db=new DbOperations();
                    
                    if($db->createUser(
                        $_POST['custPhone'],
                        $_POST['custPassword']
                        )){
                            $response['error']=false;
                            $response['message']="User regitered successfully";
                    }else {
                        $response['error']=true;
                        $response['message']="Some error occurred please try again";
                    }
                    
    }else {
        $response['error']=true;
        $response['message']="Requires fields are missing";
    }
    
}else {
    $response['error']=true;
    $response['message']="Invalid Request";
}

?>