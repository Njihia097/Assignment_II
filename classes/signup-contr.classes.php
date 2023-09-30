<?php
//modifications to the database
//error handling

class SignupContr extends Signup{

    private $username;
    private $email;
    private $pass;
    private $cpass;

    public function __construct($username, $email, $pass, $cpass){
         $this->username =$username;
         $this->email =$email;
         $this->pass=$pass;
         $this->cpass =$cpass;

    }

    public function signupUser(){
        if($this->emptyInput() == false){
            //echo Empty input!;
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUsername() == false){
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->passMatch() == false){
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->validateDetails() == false){
           
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->username,$this->email, $this->pass);
    }

    private function emptyInput(){
        $result = false;
        if (empty($this->username) || empty($this->email) || empty($this->pass) || empty($this->cpass)){
            
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

    private function invalidEmail(){
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result =false;
        
        }else{
            $result = true;
        }
        return $result;
    }

    private function passMatch(){
        $result = false;
        if($this->cpass !== $this->pass){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function validateDetails(){
        $result = false;
        if(!$this->checkUser($this->username, $this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}