<?php 
  include("dbcon.php");
 
   $sql = "SELECT * FROM product_data WHERE Product_id='".$_POST['id']."'";
   $query = mysqli_query($con,$sql);
   while($row = mysqli_fetch_assoc($query))
   {
         $data = $row;
   }
    echo json_encode($data);
 ?>