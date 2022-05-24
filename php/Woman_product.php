<?php
require_once "component.php";
session_start();
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=fashion_product','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$statement=$pdo->prepare('SELECT * FROM product');
$statement->execute();
$product=$statement->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST['add'])){
//    print_r($_POST['ID']);
    if (isset($_SESSION['cart'])){
        $item_array_ID = array_column($_SESSION['cart'], "ID");

        if (in_array($_POST['ID'], $item_array_ID)) {
            echo "<script>alert('Product is already added')</script>";
            echo "<script>window.location = 'Woman_product.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'ID'=>$_POST['ID']
            );
            $_SESSION['cart'][$count]=$item_array;

        }
    }else{
        $item_array = array(
            'ID'=>$_POST['ID']
        );
        $_SESSION['cart'][0]=$item_array;
        print_r($_SESSION['cart']);
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
    <link rel="stylesheet" href="../product.css">
    <link rel="stylesheet" href="../man_product.css">
    <script src="https://kit.fontawesome.com/9c935a48dc.js" crossorigin="anonymous">
    </script>
    <script src="../js/home.js">
    </script>
    <title>Women</title>
</head>
<body>


    <?php require_once "../html/user_header.html" ?>
    <div class="cart">
        <a href="cart.php">
            <i class="fas fa-shopping-cart">Cart</i>

            <?php
            if (isset($_SESSION['user_id'])) {
            if (isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);
                echo "<spam id=\"cart_count\">$count</spam>";
            }
            else{
                echo "<span id=\"cart_count\">0</span>";
            }
            }else{
                header ('Location: login.php');
            }
            ?>
        </a>
    </div>
    <div class="title"><h1>WoMen Style</h1></div>
    <div class="line"></div>
    <div class="product_list">
        <?php
        foreach ($product as $item )   {
            if($item['gender'] === 'F'){
                getProduct($item['name'], $item['image'], $item['price'],$item['ID']);
            }
        }
        ?>
    </div>
    <?php require_once "../html/footer.html" ?>
</body>
</html>
