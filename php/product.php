<?php
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
    <script src="https://kit.fontawesome.com/9c935a48dc.js" crossorigin="anonymous">
    </script>
    <script src="../js/home.js">
    </script>
    <title>Product</title>
</head>
<body>
<?php require_once "../html/header.html" ?>
<div class="box-name">
    <h1>Men</h1>
    <h1>WoMen</h1>
</div>
<div class="fashion">
<div class="men_photo">
    <img src="img/man1.jpg" alt="">
    <div class="overlay">
        <div><a href="Man_product.php"><img src="img/man.jpg" alt=""></a></div>
    </div>
</div>

<div class="women_photo">
  <img src="img/woman.jpg" alt="">
    <div class="overlay1">
        <div class="cover"><a href="Woman_product.php"> <img src="img/woman1.jpg" alt=""></a></div>
    </div>
</div>
</div>
<?php require_once "../html/footer.html" ?>
</body>
</html>
