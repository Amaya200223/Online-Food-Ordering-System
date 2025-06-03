<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>

        <br><br>

        <?php
        
        if (isset($_GET['o_id'])) {
            $o_id = $_GET['o_id'];

            
            $sql = "SELECT * FROM `order` WHERE o_id = $o_id";

           
            $res = mysqli_query($conn, $sql);

          
            if ($res == true) {
                $count = mysqli_num_rows($res);

                
                if ($count == 1) {
                    
                    $row = mysqli_fetch_assoc($res);

                    $food = $row['food'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                } else {
                   
                    header('location:' . SITEURL . 'admin/manage-order.php');
                    exit();
                }
            } else {
                
                echo "<div class='error'>Failed to retrieve order details. SQL Error: " . mysqli_error($conn) . "</div>";
            }
        } else {
          
            header('location:' . SITEURL . 'admin/manage-order.php');
            exit();
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">

                <tr>
                    <td>Food Name:</td>
                    <td><?php echo $food; ?></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Quantity</td>
                    <td>
                        <input type="number" name="quantity" value="<?php echo $quantity; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option value="Ordered" <?php if ($status == "Ordered") echo "selected"; ?>>Ordered</option>
                            <option value="On delivery" <?php if ($status == "On delivery") echo "selected"; ?>>On delivery</option>
                            <option value="Delivered" <?php if ($status == "Delivered") echo "selected"; ?>>Delivered</option>
                            <option value="Cancelled" <?php if ($status == "Cancelled") echo "selected"; ?>>Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name</td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact</td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email</td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address</td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">

                    <input type="hidden" name="o_id" value="<?php echo $o_id; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondry">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        
        if(isset($_POST['submit']))
            {
                $o_id=$_POST['o_id'];
                $price= $_POST['price'];
                $quantity = $_POST['quantity'];

                $total = $price * $quantity;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                $sql2 = "UPDATE `order` SET 
                    
                    quantity = $quantity,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE o_id = $o_id
                    
                    ";

                $res2 = mysqli_query($conn, $sql2);


                if ($res2 == true) {
                    
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:' . SITEURL . 'admin/manage-order.php');
                } else {
                    
                    echo "<div class='error'>Failed to update order.</div>";
                }

            }
        
        
        
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>
