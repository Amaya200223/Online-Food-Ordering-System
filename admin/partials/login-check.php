<?php

    //Authorization -access control
    //check user logged in or not
    if(!isset($_SESSION['user']))
    {
        //user not logged in
        //redirect login page with msg 
        $_SESSION['no-login-message'] = "<div class='error' > Please to login access admin panel.</div>";

        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');

    }


?>