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


    //echo "delete";
    if(isset($_GET['c_id'])AND isset($_GET['image_name']))
    {
       // echo "Get value and delete";
       $c_id = $_GET['c_id'];
       $image_name = $_GET['image_name'];

       if($image_name  ="")
       {
            $path = "../images/category/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] ="<div class='error' > Failed to remove category image</div>";

                header('location:'.SITEURL.'admin/manage-category.php');

                die();

            }
       }
       $sql = "DELETE FROM category WHERE c_id=$c_id";

       $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            
            $_SESSION['delete'] = "<div class = 'success'> Category deleted successfully.</div>";
            //Redirect to manage Admin page
            header('location:'.SITEURL.'admin/manage-category.php');

        }
        else
        {
            $_SESSION['delete'] = "<div class = 'error'>Failed to delete category.</div>";
            //Redirect to manage Admin page
            header('location:'.SITEURL.'admin/manage-category.php');


        }

    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');
    }

?>