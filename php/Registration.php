<?php 
session_start();

	include("connection.php");
	include("functions.php");

$error = [];
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rptpassword = $_POST['rptpassword'];
        $email = $_POST['email'];

        if(!($username ||$password ||$rptpassword || $email )) {
            $error[] = " Reg Field Must be Required!";
        }
        if($rptpassword != $password){
            $error[] = " Password is not Match";
        }
		if(!empty($username) && !empty($password) && !empty($rptpassword) && !is_numeric($username))
		{

			//save to database
			$user_id = random_num(9);
			$query = "insert into users (user_id,username,password,rptpassword) values ('$user_id','$username','$password','$rptpassword')";
			mysqli_query($con, $query);
			header("Location: login.php");
			die;
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

    <title>Registration</title>
</head>
<body>
<?php require_once "../html/header.html" ?>
<div class="left_box"></div>
<div class="right_box"></div>
<div class="reg_title">
    <h1>Registration Form</h1>
</div>
<form enctype="multipart/form-data" method="POST">

    <label>
        <h1>UserName</h1>
        <input type="text" name="username">
    </label>

    <label>
        <h2>Email</h2>
        <input type="email" name="email">
    </label>
    <label>
        <h2>Password</h2>
        <input type="password" name="password" >
    </label>
    <label>
        <h2>Repeat Password</h2>
        <input type="password" name="rptpassword">
    </label>

    <button value="submit"> Submit</button>

</form>

<?php foreach ($error as $err) :?>
    <div class="err"> <?php echo $err?></div>
<?php endforeach; ?>

<?php require_once "../html/footer.html" ?>

</body>
</html>