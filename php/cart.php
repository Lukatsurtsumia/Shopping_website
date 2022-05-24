<?php
session_start();
require_once "component.php";
include ('functions.php');
include ('connection.php');
$user_data = check_login($con);

$pdo= new PDO('mysql:host=localhost;port=3306;dbname=fashion_product','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$ID = $_POST['ID'] ?? NULL;

$statement=$pdo->prepare('SELECT * FROM product');
$statement->execute();
$product=$statement->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['remove'])){
    if($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key=>$value){
            if($value['ID'] == $_GET['ID']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../cart.css">
    <script src="https://kit.fontawesome.com/9c935a48dc.js" crossorigin="anonymous">
    </script>
    <script src="../js/home.js">
    </script>
    <title>Cart</title>
</head>
<body>
 <?php require_once ('../html/user_header.html')?>
<div class="back_product"> <a href="Man_product.php"><h1>Product</h1></a> </div>
      <div class="person">
          <h1>Hello . <?php echo $user_data['username'];?></h1>
          <h2>ID:  <?php echo $user_data['user_id'];?></h2>
      </div>

<div class="shopping_cart"><h1>My Shopping Cart</h1></div>

 <?php

 $product_id = array_column($_SESSION['cart'], 'ID' );
 foreach ($product_id as $ID){
     foreach ($product as $item) {
         if ($item['ID'] == $ID ){
             myCart($item['name'], $item['image'], $item['price'], $item['ID']);
         }
     }
 }
 ?>



<div class="cart_foot"></div>
</body>
</html>
