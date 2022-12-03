<?php
session_start();
require 'dbcon.php';
require 'db.inc.php';

if(isset($_POST['delete_customer']))
{
    $Customer_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query = "DELETE FROM customer_data WHERE Customer_id='$Customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: Cust_display.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: Cust_display.php");
        exit(0);
    }
}

if(isset($_POST['update_cust']))
{
    $Customer_id = mysqli_real_escape_string($con, $_POST['Customer_id']);

    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone_no = mysqli_real_escape_string($con, $_POST['phone_no']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $zip_code = mysqli_real_escape_string($con, $_POST['zip_code']);

    $query = "UPDATE customer_data SET First_name='$first_name', Last_name='$last_name', Email='$email', Phone_no='$phone_no', Address='$address', Country='$country', State='$state', City='$city', Zip_code='$zip_code' WHERE Customer_id='$Customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Updated Successfully";
        header("Location: Cust_display.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Updated";
        header("Location: Add_cust.php");
        exit(0);
    }

}

if(isset($_POST['save_cust']))
{
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone_no = mysqli_real_escape_string($con, $_POST['phone_no']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $zip_code = mysqli_real_escape_string($con, $_POST['zip_code']);
   
    $query = "INSERT INTO customer_data (First_name,Last_name,Email,Phone_no,Address,Country,State,City,Zip_code) VALUES ('$first_name','$last_name','$email','$phone_no','$address','$country','$state','$city','$zip_code')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Customer Added Successfully";
        header("Location: Add_cust.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Added";
        header("Location: Add_cust.php");
        exit(0);
    }
}
if(isset($_POST['save_product']))
{
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    
   
    $query = "INSERT INTO product_data (Product_name,Price,Quantity) VALUES ('$product_name','$price','$quantity')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Product Added Successfully";
        header("Location: Add_stock.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Not Added";
        header("Location: Add_stock.php");
        exit(0);
    }
}
if(isset($_POST['update_product']))
{
    $Product_id = mysqli_real_escape_string($con, $_POST['Product_id']);

    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    
    
    
    

    $query = "UPDATE product_data SET Product_name='$product_name', Price='$price', Quantity='$quantity' WHERE Product_id='$Product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product Updated Successfully";
        header("Location: Add_stock.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Not Updated";
        header("Location: Add_stock.php");
        exit(0);
    }

}

if(isset($_POST['delete_prod']))
{
    $Product_id = mysqli_real_escape_string($con, $_POST['delete_prod']);

    $query = "DELETE FROM product_data WHERE Product_id='$Product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product Deleted Successfully";
        header("Location: Add_stock.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Not Deleted";
        header("Location: Add_stock.php");
        exit(0);
    }
}





if(isset($_POST['save_credit']))
{
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    
   
    $query = "INSERT INTO credit (First,Last,Amount,Date Time) VALUES ('$first_name','$last_name','$amount','')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Credit Added Successfully";
        header("Location: filter-sort.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Credit Not Added";
        header("Location: filter-sort.php");
        exit(0);
    }
}






if(isset($_POST['login_btn']))
{
    $Login_id = mysqli_real_escape_string($con, $_POST['login']);
    $Password = mysqli_real_escape_string($con, $_POST['password']);

    $query = (" SELECT Password FROM login_data WHERE login_id='$Login_id'");
    $query_run = mysqli_query($con, $query);

    if($query_run = $Password)
    {
        $_SESSION['message'] = "Verified";
        header("Location: dashboard.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not verified";
        header("Location: index.php");
        exit(0);
    }
}








        ?>





