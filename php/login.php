<?php

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from users where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if(  mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);

					if($user_data['password'] === $password)
					{
                        if($password == 'admin' && $username=='admin'){
                            header( 'Location: Product_crud.php');
                        }else {

                            $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: Product.php");
                            die;
                        }
					}
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
    <link rel="stylesheet" href="../reg.css">
    <script src="https://kit.fontawesome.com/9c935a48dc.js" crossorigin="anonymous">
    </script>
    <script src="../js/home.js">
    </script>
    <title>Log In</title>
</head>
<body>
<body>
<?php require_once "../html/header.html" ?>
<div class="left_box"></div>
<div class="right_box"></div>
<div class="log_title">
    <h1>Log In</h1>
</div>
<form enctype="multipart/form-data" method="POST" class="log">

    <label>
        <h1> Username</h1>
        <input type="text" name="username">
    </label>
    <label>
        <h2>Password</h2>
        <input type="password" name="password">
    </label>


    <button value="submit"> Submit</button>

</form>