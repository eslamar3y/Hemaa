<?php  
$number=0;
require_once("../connection.php");
if(isset($_GET['failed'])) {
	$number = $_GET['failed'];
}
// define variables to empty values  
$nameErr = $emailErr = $mobilenoErr = $passErr =  "";  
$name = $email = $mobileno = $passErr = "";  
  
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
//String Validation  
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
        $name = input_data($_POST["name"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z]+$/",$name)) {  
                $nameErr = "حروف فقط";  
            }  
    }  
      
    //Email Validation   
    if (!empty($_POST["email"])) 
    {  
        require_once("../connection.php");
        $email = mysqli_escape_string($conn, $_POST['email']);
        $Query = "SELECT * FROM users where email='".$email."'";
        if ($result=mysqli_query($conn,$Query))
        {
            $rowcount=mysqli_num_rows($result);
            if($rowcount >= 1){
                $emailErr = "هذا الايميل موجود بالفعل";  
            }
        }
    } 
    else 
    {  
        $email = input_data($_POST["email"]);  
        // check that the e-mail address is well-formed  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
            $emailErr = "Invalid email format";  
        }  
     }  
    
    //Number Validation  
    if (empty($_POST["phone"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["phone"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^01[0125][0-9]{8}$/", $mobileno) ) {  
            $mobilenoErr = "ارقام فقط";  
            }  
        //check mobile no length should not be less and greator than 10  
        if (strlen ($mobileno) != 11) {  
            $mobilenoErr = "لابد ان يكون 11 رقم";  
			}
            }  
    

    if (empty($_POST["pass"])) {  
            $passErr = "pass no is required";  
    } 
	else 
	{  
		$pass = input_data($_POST["pass"]);    
		if (strlen ($pass) < 8) {  
		$passErr = "8 احرف علي الاقل";  
		}
	}

	if($nameErr=="" && $emailErr=="" && $mobilenoErr=="" && $passErr=="")
	{ 
		//Connect to DB
	require_once('../connection.php');
	//Escape any sepcial characters to avoid SQL Injection
	$email = mysqli_escape_string($conn, $_POST['email']);
	$name = mysqli_escape_string($conn, $_POST['name']);
	$address = mysqli_escape_string($conn, $_POST['address']);
	$phone = mysqli_escape_string($conn, $_POST['phone']);
	$password = $_POST['pass'];

	//Select
	// $query = "SELECT * FROM `users` WHERE `email` ='" . $email . "' and `password` = '" . $password . "' LIMIT 1";
	$query = "INSERT INTO `users` (name,address, phone ,email, password, admin) VALUES ('$name', '$address', '$phone', '$email', '$password', '0')";

	if($conn->query($query)) {
		header("Location: login.php");
	}
		
	//Close the connection
	mysqli_free_result($result);
	mysqli_close($conn);
	}
}

function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
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
	<style>
		.error{
			display: block;
			width: 100%;
			text-align: center;
			margin-bottom: 20px;
			margin-top: -22px;
			color: #787878;
		}
	</style>
</head>
<body>
<div class="log-form">
  <h2 style="text-align: center">تسجيل</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="text" style="text-align: center;" name="name" title="الاسم" placeholder="الاسم"  required/>
	<span class="error"> <?php echo $nameErr; ?> </span> 
    <input type="text" style="text-align: center;" name="address" title="العنوان" placeholder="العنوان" required/>
    <input type="text" style="text-align: center;" name="phone" title="الجوال" placeholder="الجوال" required/>
	<span class="error"> <?php echo $mobilenoErr; ?> </span>  
    <input type="email" style="text-align: center;" name="email" title="البريد الالكتروني" placeholder="البريد" required/>
	<span class="error"> <?php echo $emailErr; ?> </span> 
    <input type="password" style="text-align: center;" name="pass" title="username" placeholder="الرقم السري" required/>
	<span class="error"> <?php echo $passErr; ?> </span> 
    <div id="error" style="display: none;text-align:center;">خطأ في البريد او الرقم السري</div>
    <button type="submit"  class="btn">تسجيل</button>
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
