<?php
//modifications to the database
//error handling

include '../errors.php';
session_start();

class LoginContr extends Login{

    private $username;
    private $pass;
   

    public function __construct($username, $pass,){
         $this->username =$username;
        
         $this->pass=$pass;

    }

    public function loginUser(){
        if($this->emptyInput() == false){
            $error_code = 'emptyinput';
            $_SESSION['login_error'] = $error_code;
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUsername() == false){
            $error_code = 'username';
            $_SESSION['login_error'] = $error_code;
            header("location: ../index.php?error=username");
            exit();
        }
        

        $this->getUser($this->username, $this->pass);
    }

    private function emptyInput(){
        $result = false;
        if (empty($this->username) || empty($this->pass)){
            
            $result = false;
           
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidUsername(){
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}