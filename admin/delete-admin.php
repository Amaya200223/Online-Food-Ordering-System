<?php



//start the session
session_start();



//create contant to store non repeating values
define('SITEURL','http://localhost/Project%20AD-Food%20ordering%20system/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food_ordering_system');


$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());  //database connection
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //selecting database




    //1.Get the Id of admin to delete
    $a_id = $_GET['a_id'];

    //2.Create sql query to delete admin
    $sql = "DELETE FROM admin WHERE a_id=$a_id";

    //Execute the query
    $res = mysqli_query($conn,$sql);

    //check the query executed successfully or not
    if($res==true)
    {
        //query executed successfully and admin deleted
        //echo "Admin Deleted";
        //create sssion variable to display message
        $_SESSION['delete'] = "<div class = 'success'> Admin deleted successfully.</div>";
        //Redirect to manage Admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete admin 
        // echo "Failed to Admin Deleted";

        $_SESSION['delete'] = "<div class = 'error'>Failed to delete Admin. Try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');


    }


    //3. Redirect to manage admin page wih message (sucess/error)


?>