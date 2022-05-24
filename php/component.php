<?php
function getProduct($name,$image,$price,$ID){
    $element="<div class=\"list\"> 
<div class=\"man_container\">
    <form method=\"POST\" enctype=\"multipart/form-data\">
    <div class=\"man_img\">
        <img src=\"$image\" >
    </div>
    
    <h2 >$name</h2>
    <div class=\"price\">
        <h3>$$price</h3>
    </div>
    <div class=\"stars\">
        <i class=\"fas fa-star\"></i>
        <i class=\"fas fa-star\"></i>
        <i class=\"fas fa-star\"></i>
        <i class=\"fas fa-star\"></i>
        <i class=\"far fa-star\"></i>
  
    </div>
    <button type=\"submit\" name=\"add\">Add Cart <i class=\"fas fa-shopping-cart\"></i></button>
        <input type='hidden' name='ID' value='$ID'>

    </form>
</div>
</div>
";
    echo $element;
}

function myCart($name,$image,$price,$ID){
    $Trade = " <form method=\"POST\" action=\" cart.php?action=remove&ID=$ID\" enctype=\"multipart/form-data\">
<div class=\"product_cart\">
    <div class= \"image\">
        <img src=\"$image \">
    </div>
    <div class=\"contain\">
    <div class=\"cart_title\"> $name</div>
    <div class=\"price_cart\">$$price </div>
     <div class=\"stars\">
        <i class=\"fas fa-star\"></i>
        <i class=\"fas fa-star\"></i>
        <i class=\"fas fa-star\"></i>
        <i class=\"fas fa-star\"></i>
        <i class=\"far fa-star\"></i>
  
    </div>
    <button type=\"submit\" name=\"remove\">Delete</button>
   </div>
</div>
</form>
";
    echo $Trade;
}
?>