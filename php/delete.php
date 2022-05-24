<?php
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=fashion_product', "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$ID = $_POST['ID'] ?? NULL;

if (!$ID){
    header('Location: Product_crud.php');
    exit();
}
$statement = $pdo->prepare('DELETE  FROM product WHERE ID=:ID');
$statement->bindValue(':ID', $ID);
$statement->execute();


header('Location: Product_crud.php');