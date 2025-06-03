<?php include('partials/menu.php')?>

<div class="main-content">
    <div class ="wrapper">

    <h1>Manage Food</h1>
    <br><br>

<a href="add-food.php" class="btn-priimary">Add Food</a>

<br><br><br>

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
                        if(isset($_SESSION['upload'])) 
                        {
                            echo $_SESSION['upload']; 
                            unset($_SESSION['upload']); 
                        }
                        if(isset($_SESSION['unauthorize'])) 
                        {
                            echo $_SESSION['unauthorize']; 
                            unset($_SESSION['unauthorize']); 
                        }
                        if(isset($_SESSION['update']))
                        {
                            echo $_SESSION['update']; 
                            unset($_SESSION['update']); 
                        }

                        ?>

<table class ="tbl-full">
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
        
    </tr>

    <?php
        $sql = "SELECT * FROM food";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        $sn =1;

        if($count>0)
                {
                    
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $f_id=$rows['f_id'];
                        $title=$rows['title'];
                        $price=$rows['price'];
                        $image_name=$rows['image_name'];
                        $featured=$rows['featured'];
                        $active=$rows['active'];

                        ?>
                        <tr>
                            <td><?php echo $sn++;?></td>
                            <td> <?php echo $title;?></td>
                            <td><?php echo $price;?></td>
                            <td>
                                <?php 
                                 if($image_name!=="")
                                 {
                                     ?>
                                     <img src="<?php echo SITEURL;?> images/food/<?php echo $image_name;?>" width="100px">
                                     
                                     <?php

                                 }
                                 else
                                 {
                                     echo "<div class='error'>Image no added.</div>";

                                 }
                                
                                ?>
                            </td>
                            <td><?php echo $featured;?></td>
                            <td><?php echo $active;?></td>
                            <td>
                            <a href="<?php echo SITEURL; ?>admin/update-food.php?f_id=<?php echo $f_id;?>" class="btn-secondry">Update Food</a> 
                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?f_id=<?php echo $f_id;?>&image_name=<?php echo $image_name;?> " class="btn-danger">Delete Food</a> 
                                
                            </td>
                        </tr>


                        <?php

                    }
                }
                else
                {
                    echo "<tr> <td colspan ='7' class='error'>Food not added here </td></tr>";
                }
        ?>
                        

    
    

    
    
</table>

    </div>
   
</div>

<?php include('partials/footer.php')?>