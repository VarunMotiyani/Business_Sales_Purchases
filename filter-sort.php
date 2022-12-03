<?php
require 'navbar.php';
require_once('db.inc.php');
ini_set('display_errors', '1'); //for my server for development only
@session_start();

// $_POST['filter'] - for applying a filter and will be saved in a session
// $_GET['sort'] - through querystring for sorting on a column

//clear old filters
if(isset($_POST['btnClear'])){
  unset($_SESSION['filter']);
}


//retrieve the full product list
$strSQL = "SELECT * FROM credit ";
$params = array();
//check for and apply filter

if(isset($_POST['filter'])  ){
  //add the filter to the query and save in params
  $filter = trim($_POST['filter']);
  $strSQL .= " WHERE First LIKE ? ";
  $params[] = '%' . $filter . '%';
  $_SESSION['filter'] = $filter;
}else{
  if(isset($_SESSION['filter']) && strlen($_SESSION['filter'])>0 ){
    //reapply old filter if user is just sorting
    $filter = $_SESSION['filter'];
    $strSQL .= " WHERE First LIKE ? ";
    $params[] = '%' . $filter . '%';
  }
}

//add the sort
if(isset($_GET['sort']) && strlen(trim($_GET['sort'])) > 0){
  //need to protect this because it is not a string being prepared...
  $sort = addslashes(trim($_GET['sort']));
  
  $strSQL .= " ORDER BY $sort";
}else{
  //default sort

}

$prepared = $conn->prepare($strSQL);
$prepared->execute($params);

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filtering &amp; Sorting</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./main.css">

</head>
<body class="<?= $sort ?? '' ?>">
<div class="card mb-4">
        <div class="card-body">
  <header>
    <h1>Credit Book<h1>
    <h2>Business App</h2>
  </header>
    
          <h3 class="h6 mb-4">Credit Details</h3>
          <form action="code.inc.php" method="POST">
          <div class="row">
            
              <div class="mb-3">
                <label class="form-label" >First Name</label>
                <input type="text" class="form-control" name="first_name">
              </div>
            
            
              <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control"  name="last_name">
              </div>
            
          
          
            
              <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="text" class="form-control"  name="amount">
              </div>
            </div>
          
            <button class="btn btn-primary btn-sm btn-icon-text" type ="submit" name="save_credit"><i class="bi bi-save"></i> <span class="text">Save</span></button>
        </div>
        </form>
      </div>
<div class="card">



  
        
      
  <?php 
  //body class is for CSS to match columns
  
    require_once('header.inc.php'); 
  ?>
  
  <main>
    
    <div class="heading">
      <h2>List of Customers with Credits
        <form class="filterForm" method="POST" action="filter-sort.php">
          <input type="text" id="filter" name="filter" autofocus="true" placeholder="filter keyword" tabindex="0" value="<?= $filter ?? '' ?>"/>
          <input type="submit" name="btnFilter" id="btnFilter" value="Go"/>
          <input type="submit" name="btnClear" id="btnClear" value="Clear Filters"/>
        </form>
      </h2>
    </div>
    <?php
      //list of product names with links
     // echo $prepared->debugDumpParams();
      if($prepared->rowCount() > 0){
        //table headers with links for sorting
        echo '<table>';
        echo '<tr>';
        echo '<th class="First"><a href="filter-sort.php?sort=First">First</a></th>';
        echo '<th class="Last"><a href="filter-sort.php?sort=Last">Last</a></th>';
        echo '<th class="DateTime"><a href="filter-sort.php?sort=DateTime">DateTime</a></th>';
        echo '<th class="Amount"><a href="filter-sort.php?sort=Amount">Amount</a></th>';
        echo '</tr>';
        $prepared->setFetchMode(PDO::FETCH_ASSOC);
        while($row= $prepared->fetch()){
          //echo '<tr data-ref="' . $row['product_id'] . '">';
            echo '<td>' . $row['First'] . '</td>';
            echo '<td>' . $row['Last'] . '</td>';
            echo '<td>' . $row['DateTime'] . '</td>';
            echo '<td>' . $row['Amount'] . '</td>';
          echo '</tr>';
        }
        echo '</table>';
      }else{
        //no products
        echo '<p>No products currently available.</p>';
      }
    ?>
    
  </main>
 
  <script>
    document.getElementById('btnClear').addEventListener('click', (ev)=>{
      document.getElementById('filter').value = '';
    })
    </script>
</body>
</div>
</html>