
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>
<ul class="menu">

<li title="home"><a href="#" class="menu-button home">menu</a></li>

<li title="Dashboard"><a href="dashboard.php" class="search">Dashboard</a></li>
<li title="Customer"><a href="Cust_display.php" class="pencil">Customer</a></li>
<li title="Invoice"><a href="create_invoice.php" class="active about">Invoice</a></li>
<li title="Stock"><a href="Add_stock.php" class="archive">Stock</a></li>
<li title="Stock"><a href="analytics.php" class="archive">Analytics</a></li>

</ul>

<ul class="menu-bar">
  <li><a href="#" class="menu-button">Menu</a></li>
  <li><a href="dashboard.php">Home</a></li>
  <li><a href="Cust_display.php">Customer</a></li>
  <li><a href="create_invoice.php">Invoice</a></li>
  <li><a href="Add_stock.php">Stock</a></li>
  <li><a href="analytics.php">Stock</a></li>
  
</ul>

<script>
    $(document).ready(function(){
$(".menu-button").click(function(){
$(".menu-bar").toggleClass( "open" );
})
})
</script>
    
</body>
</html>

