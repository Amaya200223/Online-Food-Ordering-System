<?php include('partials-front/menu.php');?>

  
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Foods.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
 

    <?php
       if(isset($_SESSION['order'])) 
       {
           echo $_SESSION['order']; 
           unset($_SESSION['order']); 
       }
    ?>

    
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
                $sql = "SELECT * FROM category WHERE  active='yes' LIMIT 3;";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);
            
                if($count>0)

                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $c_id = $row['c_id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $c_id;?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        echo "<?div class='error'>image not available</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">

                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                            </a>

                        <?php

                    }

                }
                else
                {
                    echo "<div class ='error' >Category not added</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>
        </div>
    </section>
  
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

$sql2 = "SELECT * FROM food WHERE active='yes' LIMIT 6";

$res2 = mysqli_query($conn, $sql2);

$count2 = mysqli_num_rows($res2);

if ($count2>0)
{
    while($row= mysqli_fetch_assoc($res2))
    {
        $f_id=$row['f_id'];
        $title=$row['title'];
        $price=$row['price'];
        $description=$row['description'];
        $image_name=$row['image_name'];

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
                <p class="food-price">Rs.<?php echo $price;?></p>
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
    echo "<div class ='error'> Food not availble.</div>";

}


?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
   

    <?php include('partials-front/footer.php');?>