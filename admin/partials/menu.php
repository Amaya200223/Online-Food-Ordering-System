<?php


session_start();


//create contant to store non repeating values
define('SITEURL','http://localhost/Project%20AD-Food%20ordering%20system/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food_ordering_system');


$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());  //database connection
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //selecting database



?>
<?php


//check user logged in or not
if(!isset($_SESSION['user']))
{
    //user not logged in
    //redirect login page with msg 
    $_SESSION['no-login-message'] = "<div class='error text-center' > Please to login access admin panel.</div>";

    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');

}


?>


<html>
    <head>
        <title>Food order Website-Home page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class ="menu text-center">
            <div class="wrapper">
        
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>
            </div>
        </div>