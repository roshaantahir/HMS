<?php
session_start();
if(isset($_SESSION['uid'])){
	
	header('location:admin/reservation.php');
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ADMIN LOGIN</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" type="text/css" rel="stylesheet">
	</head>
	<body class="overflow">
		<div class="container background">
			<div class="form-bg-opacity" style="padding: 10% 0%;">
				<div class="form-card">
					<form method="post" action="login.php" >
						<h1>Admin Login</h1>
						<input type="text" placeholder="Username" name="uname" required/><br><br>
						<input type="Password" placeholder="password" name="pass" required/><br><br>
						<input type="submit" name="login" value="Login"/>
						<div style="display: block;" ><a href="usersignup.php" style="margin-left: 25% !important;
							width: 50%;
							display: inherit;
							font-weight: 600;
							margin-bottom: 40px !important;
							background-color: #EA4C88 !important;
							border-radius: 5px;
							border: 0px;
							padding: 10px;
							color: #EEEEEE;
							margin: 5px auto;
						box-shadow: 1px 1px 3px 1px #000000; text-align: center;">SignUp</a></div>
						
						
					</form>
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	</body>
</html>
<?php
$con = mysqli_connect("localhost","root","","usersignup");
if(isset($_POST['login'])){
	$username=$_POST['uname'];
	$password=$_POST['pass'];
	$qry ="SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password';";
	$run = mysqli_query($con,$qry);
	$row = mysqli_num_rows($run);
	
	if($row <1){
		
?>
<script>
	alert("username or password is invalid !");
	window.open('login.php','_self');
</script>
<?php
	}
	else{
		
		$data = mysqli_fetch_assoc($run);
		$id = $data['id'];
		
		$_SESSION['uid']= $id;
		
		header('location:admin/reservation.php');
		
	}
	
}
?>