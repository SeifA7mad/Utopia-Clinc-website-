 		<!DOCTYPE html>

<html>

	<head>
		<title> Utopia Clinic </title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./includes/styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

<header>

		<div class="sign-up-form">

				<form method="POST" action="./Server/addAccount.php" enctype="multipart/form-data">
           		
					<h2> CREATE ACCOUNT </h2>

					<input type='text' name="NationalID" placeholder="Enter Your National ID" >
					<input type="text" name="fname"  placeholder="Enter Your First Name" class="text">
					<input type="text" name="lname"  placeholder="Enter Your Last Name" class="text">
					<input type="date" name="DOB" placeholder="Enter your DOB">
					<input type="text" name="phoneNum" placeholder="Enter phone number" class="num">
					<input type="text" name="gender" placeholder="Enter gender" class="text">
					<input type="text" name="sign-up-email" placeholder="Enter Your Email" class="email">
					<input type="password" name="sign-up-password" placeholder="Enter Password" class="pass">
					<input type="password" name="repeat-password" placeholder="Repeat your password" class="repeat-password">
					<input type="file" name="profielPic" accept="image/*">	
					
					<label>I agree all statements	in <a href="#" style="color:dodgerblue">Terms of service</a> </label>
					<input type="checkbox" name="agree" class="checked">

					<input type="button" class="validate" value="Sign up"> 
				</form>
			</div>

			<script src="./includes/script.js"></script>
</header>
    
</html>