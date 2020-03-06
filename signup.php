<?php

	error_reporting(1);
	include('connect.php');

	if(isset($_POST['submit']))
	{
		if(!empty($_POST['choice']) && !empty($_POST['eno']) && !empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['contactnumber'])&& !empty($_POST['address'])&& !empty($_POST['email'])&& !empty($_POST['gender'])&& !empty($_POST['password'])&& !empty($_POST['cpassword'])&& !empty($_POST['branch'])&& !empty($_POST['sem']))
		{	
			$add_date=date("Y-m-d h:i:sa");
		$choice = $_POST['choice'];
		$eno = $_POST['eno'];
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		$contactnumber = $_POST['contactnumber'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$password = md5($_POST['password']);
		$cpassword = $_POST['cpassword'];
		$branch = $_POST['branch'];
		$sem = $_POST['sem'];

		$query = "INSERT INTO login (`choice`,`add_user`,`add_date`,`eno`,`name`,`dob`,`contactnumber`,`address`,`email`,`gender`,`password`,`cpassword`,`branch`,`sem`) VALUES('".$choice."','".$email."','".$add_date."','".$eno."','".$name."','".$dob."','".$contactnumber."','".$address."','".$email."','".$gender."','".$password."','".$cpassword."','".$branch."','".$sem."')";
			
			$result = mysqli_query($conn, $query);
			
			if($result)
			{
				echo $query;
			}
			else
			{
				echo '<script> alert("Error."); </script>';
			}
		}
		else
			{
				echo '<script> alert("All Fields are required."); </script>';
			}
	}
	mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
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
<body>
	<div class="outernav">
	<div class="nav" style="margin-left: 500px;">
	<a href="index.php">Home</a>
	<a href="index.php">Sign-In</a>
	<a href="contacthome.php">Contact-Us</a>
	<a href="feedbackhome.php">Feedback</a>
	</div>
</div>
	<br>
	<div class="box" style="width:650px;top:30%;">
		<h3> Registration Details </h3>
	<form action=" " method="post" id="myform">
		<table>
		<td colspan="2">
		<input  type="radio" name="choice" style="width:15px;margin-left:30px;height:15px;" value="Student" onclick="show();"><b style="color:white;font-size:20px;" >Student</b> 
		<input  type="radio" name="choice" style="width:15px;margin-right:10px;height:15px;" value="Faculty" onclick="hide();"><b style="color:white;font-size:20px;" >Faculty</b>
	   </td>
	   <tr>
		<td colspan="2" >
			<span id="myDIV">
		<span class="icon" ><i class="fa fa-pencil" aria-hidden="true" style="color:white;"></i></span><input autocomplete="off" type="text" name="eno" placeholder="Enrollement number" ></td></tr></span>
		<td><span class="icon"><i class="fa fa-user" aria-hidden="true" style="color:white;"></i></span><input autocomplete="off" type="text" name="name" placeholder="Name" ></td>
		<td ><span class="icon"><i class="fa fa-calendar" aria-hidden="true" style="color:white;"></i></span><input autocomplete="off" type="date" name="dob" ></td><tr>
		<td><span class="icon"><i class="fa fa-phone" aria-hidden="true" style="color:white;"></i></span><input autocomplete="off" type="text" name="contactnumber" placeholder="Contact-number" ></td>
		<td rowspan="3"><div class="address"><span class="addressicon"><i class="fa fa-address-card-o" aria-hidden="true" style="color:white;top:auto;
	margin-top:20px;"></i></span><textarea name="address" placeholder="Address"></textarea></div></td><tr>
		<td><span class="icon"><i class="fa fa-envelope" aria-hidden="true" style="color:white;"></i></span><input  type="text" name="email" placeholder="Email"  ><br></td>
		<tr>
		<td><input  type="radio" name="gender" style="width:15px;height:15px;margin-left:10px;"  value="Male"><lable class="l">MALE</lable>
		<input autocomplete="off" type="radio" name="gender" style="width:15px;height:15px;margin-left:20px;"  value="Female"><lable class="l" >FEMALE</lable></td>
		<tr>
		<td><span class="icon"><i class="fa fa-unlock-alt" aria-hidden="true" style="color:white;"></i></span><input autocomplete="off" type="password" name="password" placeholder="Password" id="password"></td>
		<td><span class="icon"><i class="fa fa-unlock-alt" aria-hidden="true" style="color:white;"></i></span><input autocomplete="off" type="password" name="cpassword" placeholder="Confirm-Password" ></td><tr>
		<td><span class="icon"><i class="fa fa-university" aria-hidden="true" style="color:white;"></i></span><input autocomplete="off" type="text" list="branch" name="branch" style="border: 2px solid lightgrey;" placeholder="Branch" >
		<datalist id="branch">
			<option value="CE"></option>
			<option value="CSE"></option>
			<option value="IT"></option>
		</datalist></td>
		<td><span class="icon"><i class="fa fa-graduation-cap" aria-hidden="true" style="color:white;"></i></span><input autocomplete="off" type="number" list="sem"name="sem" style="border: 2px solid lightgrey;" placeholder="Semester">
			<datalist id="sem">
			<option value="1"></option>
			<option value="2"></option>
			<option value="3"></option>
			<option value="4"></option>
			<option value="5"></option>
			<option value="6"></option>
			<option value="7"></option>
			<option value="8"></option>
		</datalist></td><tr>
	</table>
		<div class="btn">
		<input  type="submit" name="submit" value="Signup" style="width: 180px;">
	    </div>
	</form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
	
	function hide()
	{
		document.getElementById("myDIV").style.display = "none";
	}
	function show()
	{
		document.getElementById("myDIV").style.display = "block";
	}
</script>
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
        	eno:{
            	required:true,
            	minlength:10,
            	maxlength:10,
            	digits:true,
            },
            name: {
                required: true,
                whitespace:true,
           		lettersonly:true,               
            	},
            	dob:{
            		required:true,
            	},
             contactnumber:{
            	required:true,
            	minlength:10,
            	maxlength:10,
            	digits:true,
            },
            address:{
            	required:true,
            },
            email:{
            	required:true,
            	email:true,
            	checkemail:true,
            },
            
            password:{
            	required:true,
            	minlength:8,
            	maxlength:15,

            },
            cpassword:{
            	required:true,
            	minlength:8,
            	maxlength:15,
            	equalTo: "#password",
            },
            branch:{
            	required:true,
            },
            sem:{
            	required:true,
            },
        },
        messages:{
        	eno:{
            	required:"*Enrollement Number is required",
            	minlength:"*Enter Enrollement-Number 10digits",
				maxlength:"*Enter Enrollement-Number 10digits",
				digits:"*Enter 10 digits",
            },
        	name:{
        		required:"*Fullname is required",
        		lettersonly:"*Enter letters only",
        	},
        	dob:{
            		required:"*Date Of Birth is required",
            	},
        	contactnumber:{
				required:"*Phone Number is required",
				minlength:"*Contect-Number 10 digits",
				maxlength:"*Contect-Number 10digits",
				digits:"*Enter 10 digits",
			},	
			address:{
				required:"*Address is required",
			},
        	email:{
        		required:"*Email is required",
        		email:"*Enter valid email",
        		checkemail:"*Enter proper email",

        	},

			password:{
				required:"*Password is required",
				minlength:"*Enter password between 8-15",
				maxlength:"*Enter password between 8-15",
			},
			cpassword:{
				required:"*Password is required",
				minlength:"*Enter password between 8-15",
				maxlength:"*Enter password between 8-15",
				},
			 branch:{
            	required:"*Branch is required",
            },
            sem:{
            	required:"*Semester is required",
            },
        },
    });

});
</script>
</html>