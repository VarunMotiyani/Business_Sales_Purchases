<?php
$dbhost = "localhost";
$dbname	= "business_app"; //change to your own database name
$dbuser	= "root"; // change to your own user
$dbpass	= "root"; // change to your own user password

try{
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

}catch(PDOException $err){
  echo "Database connection problem. ". $err->getMessage();
  exit();
}
?>