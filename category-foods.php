<?php include('partials-front/menu.php');?>

<?php
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];

        $sql="SELECT title FROM category WHERE c_id=$category_id";

        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);

        $category_title = $row['title'];

         $count = mysqli_num_rows($res);

    }
    else
    {
        header('location:'.SITEURL);
    }
?>

    
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

        </div>
    </section>


    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                $sql2 = "SELECT * FROM food WHERE category_id = $category_id";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res);
            
                if($count2>0)

                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $f_id = $row2['f_id'];
                        $title = $row2['title'];
                        $price=$row2['price'];
                        $description=$row2['description'];
                        $image_name=$row2['image_name'];

                        ?>
                            <div class="food-menu-box">
                            <div class="food-menu-img">
                            <?php 
                                if($image_name=="")
                                {
                                    echo "<div class=;error' > Image not found<?div>";

                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">

                                    <?php
                                }
                            ?>
                                
                            </div>

                            <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price"><?php echo $price;?></p>
                            <p class="food-detail">
                            <?php echo $description;?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $f_id;?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>



                        <?php

                    }

                }
                else
                {
                    echo "<?div class='error'>Food not available</div>";
                }
            ?>

            
            


            <div class="clearfix"></div>

            

        </div>

    </section>
   

    <?php include('partials-front/footer.php');?>