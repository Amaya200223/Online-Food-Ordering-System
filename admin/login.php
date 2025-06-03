<?php

//start the session
session_start();


define('SITEURL','http://localhost/Project%20AD-Food%20ordering%20system/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food_ordering_system');


$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());  //database connection
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //selecting database



?>


<html>
    <head>
        <title>Login-food order system</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body class = b-img>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset ($_SESSION['no-login-message']);
            }
        
        
        ?>
        <br><br>

            <form action="" method="POST" class="text-center">

            Username: <br>
            <input type="text" name="user_name" placeholder="Enter Username"> <br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-priimary">

            </form>
                <br><br>
            <p class="text-center">created by A.D Wijesundara</p>
        </div>
        
    </body>
</html>

<?php

    //check submit button click or not
    if(isset($_POST['submit']))
    {
        //process for login
        //1. get data for login
        $user_name=$_POST['user_name'];
        $password=md5($_POST['password']);

        //2. check sql to whether the user with username and pswd exist or not
        $sql ="SELECT * FROM admin WHERE user_name='$user_name' AND password = '$password'";

        //3. execute the query
        $res = mysqli_query($conn,$sql);

        //4. count raw to check the user exist or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user available and login success
            $_SESSION['login'] = "<div class = 'success' > Login successfull </div>";
            $_SESSION['user'] = $user_name; // to check user logged in or and logut will unset it

            //redirect to homepage
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //user not available and cant login
            //user available and login success
            $_SESSION['login'] = "<div class = 'error text-center'  > Username or password did not match  </div>";

            //redirect to homepage
            header('location:'.SITEURL.'admin/login.php');

        }
    }

?>