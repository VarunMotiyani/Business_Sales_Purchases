<?php
session_start();
require 'navbar.php';
require 'dbcon.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add New Product form - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form action="code.php" method="POST">
<div class="container-fluid">

<div class="container">
  <?php include('message.php')?>
  <!-- Title -->
  <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
    <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a>Add New Product</h2>
    <div class="hstack gap-3">
      <button class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></button>
      
      <button class="btn btn-primary btn-sm btn-icon-text" type ="submit" name="save_product"><i class="bi bi-save"></i> <span class="text">Save</span></button>
    </div>
  </div>

  <!-- Main content -->
  <div class="row">
    <!-- Left side -->
    <div class="col-lg-8">
      <!-- Basic information -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6 mb-4">Product Details</h3>
          <div class="row">
            
              <div class="mb-3">
                <label class="form-label" >Product Name</label>
                <input type="text" class="form-control" name="product_name">
              </div>
            
            
              <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control"  name="price">
              </div>
            
          
          
            
              <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control"  name="quantity">
              </div>
            </div>
          
          
        </div>
      </div>
      
       <div class="card mb-4">
        <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Product_id</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  

                  
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php 
                  $query = "SELECT * FROM product_data";
                  $query_run = mysqli_query($con, $query);

                  if(mysqli_num_rows($query_run) > 0)
                  {
                      foreach($query_run as $product_data)
                      {
                          ?>
                          <tr>
                              <td><?= $product_data['Product_id']; ?></td>
                              <td><?= $product_data['Product_name']; ?></td>
                              <td><?= $product_data['Price']; ?></td>
                              <td><?= $product_data['Quantity']; ?></td>
                              
                              <td>
                                 
                                  <a href="Product_edit.php?Product_id=<?= $product_data['Product_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                  <form action="code.php" method="POST" class="d-inline">
                                      <button type="submit" name="delete_prod" value="<?=$product_data['Product_id'];?>" class="btn btn-danger btn-sm">Delete</button>
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

<style type="text/css">
body{
    background:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}

.card {
    position: relative;
    display: flex;
    flex-direction: row;
    width: 152%;
    white-space: nowrap;
    word-wrap: break-word;
    background-color: rgb(255, 255, 255);
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
    display: inline-block;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
.form-control{
  width:269px
}
.mb-3{
  width:32%
}
</style>
<script type="text/javascript">
</script>
</form>
</body>
</html>