<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- I added a favicon to your page -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- I changed the style sheet to a different one -->
    <link rel="stylesheet" href="css/newstyle.css" />
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <?php
            if(isset($_SESSION['user_id'])){

            
            ?>
            <!-- I added icons to the navigation links -->
            <li><a href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?></a></li>
            <li><a href="includes/logout.inc.php"><i class="fas fa-sign-out-alt"></i> LOGOUT</a></li>
            <?php
            }
            else{

            ?>
            <li><a href="#"><i class="fas fa-user-plus"></i> SIGN UP</a></li>
            <li><a href="#"><i class="fas fa-sign-in-alt"></i> LOGIN</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
    <section>
        <div class="container">
            <!-- I added a background image to the container -->
            <div class="contained">
                <h2>SIGN UP</h2>

               <form action="includes/signup.inc.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" required>
                        <span></span>
                        <label>Username</label>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email"required>
                        <span></span>
                        <label>Email</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"required>
                        <span></span>
                        <label>Password</label>
                    </div>
                    <div class="form-group">                                    
                        <input type="password" name="cpassword"required>
                        <span></span>
                        <label>Confirm Password</label>
                    </div>
                    <!-- <div class="form-group">
                        <select name="role">
                            <option value="user">user</option>
                            <option value="author">author</option>
                        </select>
                    </div> -->
                    <input type="submit" name="submit" value="Sign Up">
                    <div class="login-link">
                        <p>Already have an account? <a href="#">Log-in here</a></p>
                    </div>
                </form>
                
            </div>
            <div class="contained">
                <h2>Login Here</h2>
                <form  action="includes/login.inc.php" method="post">
                    
                    <div class="form-group">
                        <input type="text" name="username" required>
                        <span></span>
                        <label>Username</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"required>
                        <span></span>
                        <label>Password</label>
                    </div>

                    <input type="submit" name="submit" value="Login">
                    <div class="login-link">
                        <p>don't have an account? <a href="#">Sign-up here</a></p>
                    </div>
                </form>
                
            </div>
        </div>
    </section>
    <!-- I added a footer to your page -->
    <footer>
        <p>© 2023 All rights reserved.</p>
    </footer>
    <!-- I added a script to load the font awesome icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
