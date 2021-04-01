<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User Signup</title>
		<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="css/style.css" type="text/css" rel="stylesheet">
	</head>
	<body class="overflow">
		<div class="container background">
			<div class="form-bg-opacity" style="padding: 10% 0% !important;">
				<div class="form-card">
					<form action="usersignup.php" method="post" >
						<h1>Sign Up</h1>
						<tr>
							<td><input type="text" name="username" placeholder="Name" required/></td>
						</tr>
						<tr>
							<td><input type="email" name="email" placeholder="Email" required/></td>
							
						</tr>
						<tr>
							<td><input type="password" name="password" placeholder="Password" required/></td>
						</tr>
						<tr>
							<td><input type="password" name="password2" placeholder="Confirm Password" required/></td>
						</tr>
						<tr>
							<td><input type="submit" name="submit" value="submit"/></td>
						</tr>
					</form>
				</div>
			</div>
		</div>
		<script src="js/bootstrap-3.1.1.min.js" type="text/javascript"></script>
		<?php
		$con = mysqli_connect("localhost","root","","usersignup");
		
		if(isset($_POST['submit'])){
			
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			if ($password == $password2){
			$qry = "INSERT INTO `users`(`id`,`username`, `email`, `password`) VALUES (NULL,'$username','$email','$password')";
			
			$run = mysqli_query($con,$qry);
			if($run == true){
				header('location:accountconfirm.php');
		
		}
		}
		else {
		?>
		<script>
		alert('your password is not matched......!!!!');
		</script>
		
		<?php
			
		}
		}
		?>
	</body>
</html>