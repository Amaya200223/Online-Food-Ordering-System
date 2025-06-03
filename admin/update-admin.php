<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php
            
            if(isset($_GET['a_id']))
            {
               
                $a_id = $_GET['a_id'];

               
                $sql = "SELECT * FROM admin WHERE a_id=$a_id";
                $res = mysqli_query($conn, $sql);

                
                if($res == true)
                {
                    
                    $count = mysqli_num_rows($res);
                    if($count == 1)
                    {
                        
                        $row = mysqli_fetch_assoc($res);
                        $full_name = $row['full_name'];
                        $user_name = $row['user_name'];
                    }
                    else
                    {
                        
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
            }
            else
            {
                
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="user_name" value="<?php echo $user_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="a_id" value="<?php echo $a_id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondry">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    
    if(isset($_POST['submit']))
    {
        
        $a_id = $_POST['a_id'];
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];

        
        $sql = "UPDATE admin SET
            full_name = '$full_name',
            user_name = '$user_name'
            WHERE a_id = '$a_id'";

        
        $res = mysqli_query($conn, $sql);

        
        if($res == true)
        {
            
            $_SESSION['update'] = "<div class='success'>Admin updated successfully.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
           
            $_SESSION['update'] = "<div class='error'>Failed to update admin.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('partials/footer.php'); ?>
