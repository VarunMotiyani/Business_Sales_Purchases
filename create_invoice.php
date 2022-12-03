<?php 
   include("dbcon.php");
    
   ?>
   <?php
  
  require 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Document</title>
      <style>
        .result{
         color:red;
        }
        td
        {
          text-align:center;
        }

        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
         width :90%;
        }

        .btn-group-sm>.btn, .btn-sm { 
         margin-left: 996px;
    margin-top: 30px;


        }
      </style>
   </head>
   <body id ="body">
      <section class="mt-3">
         <div class="container-fluid" >
         <h4 class="text-center" style="color:green"> INVOICE </h4>
         <h6 class="text-center"> </h6>


        
  <div class="form-row">
    <div class="col-4">
      <input type="text" class="form-control" placeholder="Order_id" id=C_id value=<?php 
$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
echo $unique = $today . $rand;
    ?>>
    </div>
    <div class="col-4">
       <select name="C_name" id="C_name"  class="form-control">
                              <?php 
                                 $sql = "SELECT * FROM customer_data";
                                 $query = mysqli_query($con,$sql);
                                 while($row = mysqli_fetch_assoc($query)){
                                 ?>
                              <option id="<?php echo $row['Customer_id']; ?>" value="<?php echo $row['First_name']; ?>" class="customer custom-select">
                                 <?php echo $row['First_name']; ?>
                              </option>
                              <?php  }?>   
                           </select>
    </div>
    
    <div class="col-4">
          <select class="form-control" placeholder="Payment type" id="payment">
            <option value="draft" selected="">Cash</option>
            <option value="active">Card/UPI</option>
            <option value="active">Credit</option>
          </select>
          </div>
  </div>

  


         <div class="row">

        

            <div class="col-md-5  mt-4 ">
               <table class="table" style="background-color:#f5f5f5;">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Items</th>
                        <th style="width: 31%">Qty</th>
                        <th>Price</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td scope="row">1</td>
                        <td style="width:60%">
                           <select name="p_name" id="p_name"  class="form-control">
                              <?php 
                                 $sql = "SELECT * FROM product_data";
                                 $query = mysqli_query($con,$sql);
                                 while($row = mysqli_fetch_assoc($query)){
                                 ?>
                              <option id="<?php echo $row['Product_id']; ?>" value="<?php echo $row['Product_name']; ?>" class="vegitable custom-select">
                                 <?php echo $row['Product_name']; ?>
                              </option>
                              <?php  }?>   
                           </select>
                        </td>
                        <td style="width:1%">
                          <input type="number" id="qty" min="0" value="0" class="form-control">
                        </td>
                        <td>
                           <p id="price"></p>
                        </td>
                        <td><button id="add" class="btn btn-primary">Add</button></td>
                     </tr>
                  </tbody>
               </table>
               <div role="alert" id="errorMsg" class="mt-5" >
                 <!-- Error msg  -->
              </div>
            </div>
            <div class="col-md-7  mt-4" style="background-color:#f5f5f5;" id="bill">
               <div class="p-4">
                  <div class="text-center">
               
                  <div>
                     <h4>Receipt</h4>
                  
                  <span class="mt-4"> Time : </span><span  class="mt-4" id="time"></span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> : <span id="year"></span>
                     </div>
                     
                  </div>
                  <div class="row">
                     </span>
                    
                     <table id="receipt_bill" class="table" style="width: 750px";>
                        <thead>
                           <tr>
                              <th> No.</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Total</th>
                           </tr>
                        </thead>
                        <tbody id="new" >
                          
                        </tbody>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark" >
                                <h5><strong>Sub Total:  ₹ </strong></h5>
                                <p><strong>Tax (5%) : ₹ </strong></p>
                           </td>
                           <td class="text-center text-dark" >
                              <h5> <strong><span id="subTotal"></strong></h5>
                              <h5> <strong><span id="taxAmount"></strong></h5>
                           </td>
                        </tr>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark">
                              <h5><strong>Gross Total: ₹ </strong></h5>
                           </td>
                           <td class="text-center text-danger">
                              <h5 id="totalPayment"><strong> </strong></h5>
                               
                           </td>
                        </tr>
                     </table>
                  </div>
                     
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
<button onclick="printPage()" class ="btn btn-primary btn-sm btn-icon-text">Print content</button>

      
   </body>

</html>
<script>
  
   $(document).ready(function(){

   
     $('#p_name').change(function() {
      var id = $(this).find(':selected')[0].id;
       $.ajax({
          method:'POST',
          url:'fetch_product.php',
          data:{id:id},
          dataType:'json',
          success:function(data)
          
            {
               $('#price').text(data.Price);
 
               //$('#qty').text(data.product_qty);
            }
       });
     });
    
     //add to cart 
     var count = 1;
     $('#add').on('click',function(){
    
        var name = $('#p_name').val();
        var qty = $('#qty').val();
        var price = $('#price').text();
 
        if(qty == 0)
        {
           var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
           $('#errorMsg').html(erroMsg).fadeOut(9000);
        }
        else
        {
           billFunction(); // Below Function passing here 
        }
         
        function billFunction()
          {
          var total = 0;
       
          $("#receipt_bill").each(function () {
          var total =  price*qty;
          var subTotal = 0;
          subTotal += parseInt(total);
          
          var table =   '<tr><td>'+ count +'</td><td>'+ name + '</td><td>' + qty + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="'+total+'">' +total+ '</strong></td></tr>';
          $('#new').append(table)
 
           // Code for Sub Total of Vegitables 
            var total = 0;
            $('tbody tr td:last-child').each(function() {
                var value = parseInt($('#total', this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
             $('#subTotal').text(total);
               
            // Code for calculate tax of Subtoal 5% Tax Applied
              var Tax = (total * 5) / 100;
              $('#taxAmount').text(Tax.toFixed(2));
 
             // Code for Total Payment Amount
 
             var Subtotal = $('#subTotal').text();
             var taxAmount = $('#taxAmount').text();
 
             var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
             $('#totalPayment').text(totalPayment.toFixed(2)); // Showing using ID 
        
         });
         count++;
        } 
       });
           // Code for year 
             
           var currentdate = new Date(); 
             var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/"
                + currentdate.getFullYear();
                $('#year').text(datetime);
 
           // Code for extract Weekday     
                function myFunction()
                 {
                    var d = new Date();
                    var weekday = new Array(7);
                    weekday[0] = "Sunday";
                    weekday[1] = "Monday";
                    weekday[2] = "Tuesday";
                    weekday[3] = "Wednesday";
                    weekday[4] = "Thursday";
                    weekday[5] = "Friday";
                    weekday[6] = "Saturday";
 
                    var day = weekday[d.getDay()];
                    return day;
                    }
                var day = myFunction();
                $('#day').text(day);
     });
</script>
 
<!-- // Code for TIME -->
<script>
    window.onload = displayClock();
 
     function displayClock(){
       var time = new Date().toLocaleTimeString();
       document.getElementById("time").innerHTML = time;
        setTimeout(displayClock, 1000); 
     }   
     
function printPage() {
var body = document.getElementById('body').innerHTML;
var data = document.getElementById('bill').innerHTML;
document .getElementById('body').innerHTML = data;
window. print();
document.getElementById('body').innerHTML = body;

}
</script>

<!-- <script type="text/javascript">

function printPage() {
var body = document.getElementById('body').innerHTML;
var data = document.getElementById('bill').innerHTML;
document .getElementById('body').innerHTML = data;
window. print();
document.getElementById('body').innerHTML = body;

}

</script> -->




    

