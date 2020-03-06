 
<?php
	session_start();
	include('connect.php');
	error_reporting(1);

	if(isset($_POST['submit']))
	{
		$uname = $_POST['uname'];
		$password = md5($_POST['password']);

		$query = "SELECT * FROM login WHERE email='$uname' AND password='$password'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if ($result)
		{
		 	
		if( $count == 1 )
		{
				$row = mysqli_fetch_array($result);
				$_SESSION['username'] = $row['name'];
				$_SESSION['usernumber'] = $row['contactnumber'];
				$_SESSION['useremail'] = $row['email'];
				$_SESSION['userbranch'] = $row['branch'];
				$_SESSION['usersem'] = $row['sem'];
			echo "<script> alert('Welcome User'); 
				 window.location = ' information.php';
				</script>";
		}
		else
		{
			echo "<script> alert('Username/password Combination does not match.'); </script>";
		}
		}
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	 	.error
	{
		color: red;
		font-size: 13px;
		font-family: sans-serif;
		position: relative;
	}

	 </style>
</head>
<body style="background-image:url('bg.png');">
	<div class="outernav" >
	<a href="index.php" style="margin-left: 500px;">Home</a>
	<a href="signup.php">Sign-Up</a>
	<a href="contacthome.php">Contact-Us</a>
	<a href="feedbackhome.php">Feedback</a>
	</div>
	<br>
	<div class="box"  style="transform: translate(-140%,-100%);">
		<h3> Login Details </h3>
	<form action="index.php" method="post" id="myform">
		<span><i class="fa fa-user" aria-hidden="true" style="color:white;"></i></span><input type="text" name="uname" autocomplete="off" placeholder="Email" style="margin-left: 10px;"><br>
		<span><i class="fa fa-lock" aria-hidden="true" style="color:white;"></i></span><input type="password" name="password" autocomplete="off" placeholder="Password" style="margin-left: 10px;" >

		<div class="btn" >
			<input type="submit" name="submit" value="Login">
		</div>
		
	</form>
    </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js">
	
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
<script>
	jQuery.validator.addMethod("checkemail", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test( value );
}, 'Please enter a valid email address.');

$(document).ready(function () {

    $('#myform').validate({ 
        rules: { 
        	uname:{
            	required:true,
            	email:true,
            	checkemail:true,
            },
            
            password:{
            	required:true,
            	minlength:8,
            	maxlength:15,

            },
            },
        messages:{
        uname:{
        		required:"*Email is required",
        		email:"*Enter valid email",
        		checkemail:"*Enter proper email",

        	},

			password:{
				required:"*Password is required",
				minlength:"*Enter password between 8-15",
				maxlength:"*Enter password between 8-15",
			},
			},
    });

});
</script>
</html>