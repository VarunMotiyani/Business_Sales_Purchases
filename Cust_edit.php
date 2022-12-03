<?php
session_start();
require 'dbcon.php'
?>
<?php
  
  require 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create new customer form - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
                        if(isset($_GET['Customer_id']))
                        {
                            $Customer_id = mysqli_real_escape_string($con, $_GET['Customer_id']);
                            $query = "SELECT * FROM customer_data WHERE Customer_id='$Customer_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $customer = mysqli_fetch_array($query_run);
                                ?>
    <form action="Code.php" method="POST">
    <input type="hidden" name="Customer_id" value="<?= $customer['Customer_id']; ?>">
<div class="container-fluid">

<div class="container">
  <?php include('message.php')?>
  <!-- Title -->
  <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
    <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a> Create new customer</h2>
    <div class="hstack gap-3">
      <button class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></button>
      
      <button class="btn btn-primary btn-sm btn-icon-text" type ="submit" name="update_cust"><i class="bi bi-save"></i> <span class="text">Update</span></button>
    </div>
  </div>

  <!-- Main content -->
  <div class="row">
    <!-- Left side -->
    <div class="col-lg-8">
      <!-- Basic information -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6 mb-4">Basic information</h3>
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label" >First name</label>
                <input type="text" class="form-control" name="first_name" value="<?=$customer['First_name'];?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">Last name</label>
                <input type="text" class="form-control"  name="last_name" value="<?=$customer['Last_name'];?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control"  name="email" value="<?=$customer['Email'];?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">Phone number</label>
                <input type="text" class="form-control"  name="phone_no" value="<?=$customer['Phone_no'];?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Address -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6 mb-4">Address</h3>
          <div class="mb-3">
            <label class="form-label">Address </label>
            <input type="text" class="form-control"  name="address" value="<?=$customer['Address'];?>">
          </div>
         
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">Country</label>
                <select class="select2 form-control select2-hidden-accessible" data-select2-placeholder="Select country" data-select2-id="select2-data-1-gy14" tabindex="-1" aria-hidden="true" name="country" value="<?=$customer['Country'];?>">
                  <option data-select2-id="select2-data-3-ibs9"></option>
                  <option value="AF">Afghanistan</option>
                  <option value="BS">Bahamas</option>
                  <option value="KH">Cambodia</option>
                  <option value="DK">Denmark</option>
                  <option value="TL">East Timor</option>
                  <option value="GM">Gambia</option>
                </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-2-46y9" style="width: 391px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-vp8l-container" aria-controls="select2-vp8l-container"><span class="select2-selection__rendered" id="select2-vp8l-container" role="textbox" aria-readonly="true" title="Select country"><span class="select2-selection__placeholder">Select country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">State</label>
                <select class="select2 form-control select2-hidden-accessible" data-select2-placeholder="Select state" data-select2-id="select2-data-4-680y" tabindex="-1" aria-hidden="true" name="state" value="<?=$customer['State'];?>">
                  <option data-select2-id="select2-data-6-cshs"></option>
                  <option value="AL">Alabama</option>
                  <option value="CA">California</option>
                  <option value="DE">Delaware</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="KS">Kansas</option>
                </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-5-np4c" style="width: 391px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-2fn7-container" aria-controls="select2-2fn7-container"><span class="select2-selection__rendered" id="select2-2fn7-container" role="textbox" aria-readonly="true" title="Select state"><span class="select2-selection__placeholder">Select state</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">City</label>
                <select class="select2 form-control select2-hidden-accessible" data-select2-placeholder="Select city" data-select2-id="select2-data-7-809c" tabindex="-1" aria-hidden="true" name="city" value="<?=$customer['City'];?>">
                  <option data-select2-id="select2-data-9-k35n"></option>
                  <option value="b">Bangkok</option>
                  <option value="d">Dubai</option>
                  <option value="h">Hong Kong</option>
                  <option value="k">Kuala Lumpur</option>
                  <option value="l">London</option>
                  <option value="n">New York City</option>
                  <option value="m">Macau</option>
                  <option value="p">Paris</option>
                </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-8-3peu" style="width: 391px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-jdfi-container" aria-controls="select2-jdfi-container"><span class="select2-selection__rendered" id="select2-jdfi-container" role="textbox" aria-readonly="true" title="Select city"><span class="select2-selection__placeholder">Select city</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">ZIP code</label>
                <input type="text" class="form-control" name="zip_code" value="<?=$customer['Zip_code'];?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Right side -->
    <div class="col-lg-4">
      <!-- Status -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6">Status</h3>
          <select class="form-select">
            <option value="draft" selected="">Draft</option>
            <option value="active">Active</option>
            <option value="active">Inactive</option>
          </select>
        </div>
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
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
</style>
<script type="text/javascript">
</script>
</form>
<?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
</body>
</html>