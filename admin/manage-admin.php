<?php include('partials/menu.php');?>

        <div class ="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <br>

            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; 
                unset($_SESSION['add']); 
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete']; 
                unset($_SESSION['delete']); 
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset ($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['password-not-match']))
            {
                echo $_SESSION['password-not-match'];
                unset ($_SESSION['password-not-match']);
            }
           



            
            ?>

            <br><br>

            <a href="add-admin.php" class="btn-priimary">Add Admin</a>

            <br><br><br>
            
            <table class ="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                    
                </tr>

                <?php
                
                $sql = "SELECT * FROM admin";

               
                $res = mysqli_query($conn,$sql);
                
               
                if($res==TRUE)
                {
                    
                    $count = mysqli_num_rows($res); 

                    $sn=1; 
                    
                   
                    if($count>0)
                    {
                       
                        while($rows=mysqli_fetch_assoc($res))
                        {
                           
                            
                            
                           
                            $a_id=$rows['a_id'];
                            $full_name=$rows['full_name'];
                            $user_name=$rows['user_name'];
                            
                            
                            ?>
                                <tr>
                                    <td><?php echo $sn++ ; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $user_name; ?></td>
                                    <td>
                                    
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?a_id=<?php echo $a_id;?>" class="btn-secondry">Update Admin</a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?a_id=<?php echo $a_id;?>" class="btn-danger">Delete Admin</a> 
                                        
                                    </td>
                                 </tr>


                            <?php
                            
                        }

                    }
                    else
                    {
                        

                    }


                }

                ?>


            
                
            </table>
            

            <div class="clearfix"></div>


            </div>
            
        </div>

<?php include('partials/footer.php')?>    