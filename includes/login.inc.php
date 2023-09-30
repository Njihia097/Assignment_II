<?php
if(isset($_POST["submit"])){
    //grabbing data

    $username = $_POST["username"];
    $pass = $_POST["password"];
  

    //initiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new LoginContr($username, $pass);


    //Running error handlers and user signup
    $login->loginUser();

    //Going back to front page
    header("location: ../index.php?error=none");
}
