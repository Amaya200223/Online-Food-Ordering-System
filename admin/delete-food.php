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


    if(isset($_GET['f_id'])AND isset($_GET['image_name']))
    {
       // echo "Get value and delete";
       $f_id = $_GET['f_id'];
       $image_name = $_GET['image_name'];

       if($image_name  ="")
       {
            $path = "../images/food/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] ="<div class='error' > Failed to remove food image</div>";

                header('location:'.SITEURL.'admin/manage-food.php');

                die();

            }
       }
                $sql = "DELETE FROM food WHERE f_id=$f_id";

                $res = mysqli_query($conn,$sql);

                if($res==true)
                {
                    
                    $_SESSION['delete'] = "<div class = 'success'> Food deleted successfully.</div>";
                    //Redirect to manage Admin page
                    header('location:'.SITEURL.'admin/manage-food.php');

                }
                else
                {
                    $_SESSION['delete'] = "<div class = 'error'>Failed to delete food.</div>";
                    //Redirect to manage Admin page
                    header('location:'.SITEURL.'admin/manage-food.php');


                }

    }
    else
    {
        //echo "RRedirect";
        $_SESSION['unauthorize'] = "<div class = 'error'>Failed to delete food.</div>";
        //Redirect to manage Admin page
        header('location:'.SITEURL.'admin/manage-food.php');

    }

?>