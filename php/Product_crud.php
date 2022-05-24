<?php
require_once "function.php";
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=fashion_product', "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement=$pdo->prepare('SELECT * FROM product');
$statement->execute();
$product= $statement->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $gender = $_POST['gender'];

    $image = $_FILES['image'] ?? NULL;
    $imagePath ='';

    if($image){
        $imagePath = 'img/'.randomString(6) . '/' . $image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    $statement = $pdo->prepare("INSERT INTO product (name, price, gender,image)
                                       VALUES(:name,:price,:gender,:image)");
    $statement->bindValue(':name', $name);
    $statement->bindValue(':image', $imagePath);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':gender', $gender);
    $statement->execute();
    header('Location: Product_crud.php');

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
    <link rel="stylesheet" href="../table.css">
    <title>Document</title>
</head>
<body>
<?php require_once "../html/user_header.html"?>
<div class="add_product">
    <h3>Add Product</h3>
    <form method="post" enctype="multipart/form-data" class="add_form">
        <label>
            <h4>Add Image</h4>
            <input type="file" name="image">
        </label>
        <label>
            <h4> Name</h4>
            <input type="text" name="name">
        </label>
        <label>
            <h4>Price</h4>
            <input type="text" name="price">
        </label>
        <label class="gender">
            <h4>Gender</h4>
            <input type="radio" name="gender" value="Male">. Male
            <input type="radio" name="gender" value="FeMale">. FeMale
        </label>
        <button value="submit"> Submit</button>
    </form>
</div>
<h3>Product Crud!</h3>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Gender</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($product as $i => $item) { ?>
        <tr>
            <td><?php echo $i + 1?></td>
            <td><?php if ($item['image']) : ?>
                    <img src="<?php echo $item['image'] ?>" >
                <?php endif; ?>
            </td>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo  $item['price'] ?></td>
            <td><?php echo  $item['gender'] ?></td>
            <td>
                 <form action="delete.php" method="POST" >
                    <input type="hidden" name="ID" value="<?php echo $item['ID'] ?>"/>
                    <button type="submit">Delete</button>
                </form>

            </td>


        </tr>
    <?php } ?>

    </tbody>
</table>
<div class="crud_foot"></div>
</body>
</html>
