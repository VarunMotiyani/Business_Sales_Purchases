<?php
    session_start();
    require 'dbcon.php';
?>
<?php
  
    require 'navbar.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Customers</title>
</head>
<body>

  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Details
                            <a href="Add_cust.php" class="btn btn-primary float-end">Add Customer</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer's First_name</th>
                                    <th>Customer's Last_name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>

                                    <th>Zip_code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM customer_data";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $customer_data)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $customer_data['Customer_id']; ?></td>
                                                <td><?= $customer_data['First_name']; ?></td>
                                                <td><?= $customer_data['Last_name']; ?></td>
                                                <td><?= $customer_data['Email']; ?></td>
                                                <td><?= $customer_data['Phone_no']; ?></td>
                                                <td><?= $customer_data['Address']; ?></td>
                                                <td><?= $customer_data['Country']; ?></td>
                                                <td><?= $customer_data['State']; ?></td>
                                                <td><?= $customer_data['City']; ?></td>
                                                <td><?= $customer_data['Zip_code']; ?></td>
                                                <td>
                                                   
                                                    <a href="Cust_edit.php?Customer_id=<?= $customer_data['Customer_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_customer" value="<?=$customer_data['Customer_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>