<?php include('partials-front/menu.php');?>

   
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php



$sql2 = "SELECT * FROM food ";

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

    </section>
    

    <?php include('partials-front/footer.php');?>