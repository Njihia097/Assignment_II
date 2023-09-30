<?php
//Database related staff i.e. querying

class Signup extends Dbh{

    protected function setUser($username, $email, $pass){
        $stmt = $this->connect()->prepare('INSERT INTO tbl_users(user_email, username, user_password) VALUES (?, ?, ?)');

        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        if($stmt->execute(array($email, $username, $hashedPass))){
              $stmt = null;
              header("location: ../index.php?error=stmtfailed");
              exit();
        }
        $stmt = null;
    }

    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare('SELECT username FROM tbl_users WHERE username = ? OR user_email = ?');

        if(!$stmt->execute(array($username, $email))){
              $stmt = null;
              header("location: ../index.php?error=stmtfailed");
              exit();
        }
        $resultCheck = false;
        if($stmt->rowCount() > 0){
          $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;
    }

}