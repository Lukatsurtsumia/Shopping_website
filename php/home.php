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
    <script
            src="https://kit.fontawesome.com/9c935a48dc.js" crossorigin="anonymous">
    </script>
    <script src="../js/home.js">
    </script>
    <title>Shopping</title>
</head>

<body>
<?php require "../html/header.html" ?>

<div class="firm_box">
    <p>Fashion Name</p>
</div>

<div class="icon_box">
    <i class="fas fa-home "></i>
</div>

<div class="main_box">
    <h1>Your Style Our Price</h1>

<!--Video Container-->
<div class="video_container">
    <main class="new_cards">
        <article class="new_card">
            <video controls>
                <source src="../videos/video1.mp4" type="video/mp4">
            </video>
        </article>
        <article class="new_card">
            <video controls>
                <source src="../videos/video2.mp4" type="video/mp4">
            </video>
        </article>
        <article class="new_card">
            <video controls>
                <source src="../videos/video3.mp4" type="video/mp4">
            </video>
        </article>
        <article class="new_card">
            <video controls>
                <source src="../videos/video4.mp4" type="video/mp4">
            </video>
        </article>
    </main>
</div>
</div>

</body>
 <?php require_once "../html/footer.html" ?>
</html>
