<?php
//Database related staff i.e. querying

include '../errors.php';
session_start();

class Login extends Dbh{

    protected function getUser($username, $pass){
        $stmt = $this->connect()->prepare('SELECT user_password FROM tbl_users WHERE username = ? OR user_email = ?;');

       
        if(!$stmt->execute(array($username, $pass))){
              $stmt = null;
              header("location: ../index.php?error=stmtfailed");
              exit();
        }
        if($stmt->rowCount() == 0){
            $error_code = 'noneuseroremail';
            $_SESSION['login_error'] = $error_code;
            $stmt = null;
            header('location: ../index.php?error=usernotfound');
            exit();
        }

        $hashedPass  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPass = password_verify($pass, $hashedPass[0]["user_password"]);

        if($checkPass == false){
            $error_code = 'wrongpassword';
            $_SESSION['login_error'] = $error_code;
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }else if($checkPass == true){
            $stmt = $this->connect()->prepare('SELECT * FROM tbl_users WHERE username = ? OR user_email = ? AND user_password = ?');

             if(!$stmt->execute(array($username, $username, $hashedPass))){
              $stmt = null;
              header("location: ../index.php?error=stmtfailed");
              exit();
             }

              if($stmt->rowCount() == 0){
                $error_code = 'noneuseroremail';
                $_SESSION['login_error'] = $error_code;
                $stmt = null;
                header('location: ../index.php?error=usernotfound');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["user_id"] = $user[0]["user_id"];
            $_SESSION["username"] = $user[0]["username"];


            $stmt = null;
       }
      
       
    }

   

}