<?php

class DbOperations{
    private $con;
    
    function __construct() {
        require_once dirname(__FILE__).'/DbConnect.php';
        
        $db = new DbConnect();
        $this->con=$db->connect();
        
    }
    
    
    /* CRUD */
    
    function createUser($phone,$pass){
        $password = md5($pass);
        $stmt = $this->con->prepare("insert into tblcustomer(custPhone,custPassword)values(?,?);");
        $stmt->bind_param("ss", $phone, $pass);
        if($stmt->execute()){
            return true;
        }else {
            return false;
        }
    }
    
    
    
}

?>