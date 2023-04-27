<?php

$number=0;
require_once("../connection.php");
if(isset($_GET['failed'])) {
	$number = $_GET['failed'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//Connect to DB
	require_once('../connection.php');
	//Escape any sepcial characters to avoid SQL Injection
	$email = mysqli_escape_string($conn, $_POST['email']);
	$password = $_POST['pass'];

	//Select
	$query = "SELECT * FROM `users` WHERE `email` ='" . $email . "' and `password` = '" . $password . "' LIMIT 1";

	$result = mysqli_query($conn, $query);
	if ($row = mysqli_fetch_assoc($result)) {
		if($row['admin'] == 1)
		{
			session_start();
			$_SESSION['id'] = $row['user_id'];
			$_SESSION['email'] = $row['email'];
			header("Location: index.php");
		}
		else
		{
			session_start();
			$_SESSION['id'] = $row['user_id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['address'] = $row['address'];
			header("Location: ../index.php");
		}
	}
	else
	{
		header("Location: login.php?failed=1");
	}
	//Close the connection
	mysqli_free_result($result);
	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../assets/img/favicon.png" rel="icon" />
    <title>Hemaa</title>
    <link rel="stylesheet" href="./assets/css/login_style.css">
</head>
<body>
<div class="log-form">
  <h2 style="text-align: center">تسجيل الدخول</h2>
  <form method="post" >
    <input type="text" style="text-align: center;" name="email" title="البريد الالكتروني" placeholder="البريد" />
    <input type="password" style="text-align: center;" name="pass" title="username" placeholder="الرقم السري" />
    <div id="error" style="display: none;text-align:center;">خطأ في البريد او الرقم السري</div>
	<div style="    margin-bottom: 30px;text-align: center;">ليس لديك حساب...؟ &nbsp;&nbsp;&nbsp;&nbsp; <a style="text-decoration: none;"href="register.php">تسجيل</a></div>
    <button type="submit"  class="btn">دخول</button>
  </form>
</div><!--end log form -->
<script>
		<?php
			if($number==1)
			{
				?>
				document.getElementById('error').style.display="block";
				<?php
			}
		?>
		
	</script>
</body>
</html>