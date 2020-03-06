<?php
	session_start();
	
?>
 <!DOCTYPE html>
<html>
<head>
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
<body>
	<div class="outernav">
  <i class="fa fa-bars fa-2x " aria-hidden="true" onclick="show();"></i>
  <a href="information.php">Home</a>
  <a href="add.php">Add Details</a>
  <a href="deletehome.php">Delete Details</a>
  <a href="updatehome.php">Update Details</a>
  <a href="contactus.php">Contact-Us</a>
  <a href="feedback.php">Feedback</a>
  </div>
		<div class="barbox" id="myDIV" style="display: none;">
			<i class="fa fa-times-circle fa-lg" aria-hidden="true" style="left:50%;" onclick="hide();"></i><br>
		<div class="bar"><i class="fa fa-user" aria-hidden="true" style="color:white;"><label style="margin-left:20px;"></label><?php echo $_SESSION['username']; ?></label></i></div><br>
		<div class="bar"><i class="fa fa-phone" aria-hidden="true" style="color:white;"><label style="margin-left:20px;"></label><?php echo $_SESSION['usernumber']; ?></label></i></div><br>
		<div class="bar"><i class="fa fa-envelope" aria-hidden="true" style="color:white;"><label style="margin-left:20px;"></label><?php echo $_SESSION['useremail']; ?></label></i></div></br>
		<div class="bar"><i class="fa fa-university" aria-hidden="true" style="color:white;"><label style="margin-left:20px;"></label><?php echo $_SESSION['userbranch']; ?></label></i></div><br>
		<div class="bar"><i class="fa fa-graduation-cap" aria-hidden="true" style="color:white;"><label style="margin-left:20px;"></label><?php echo $_SESSION['usersem']; ?></label></i></div>
		<form action="signout.php">
		<div class="btn" style="text-align:left;">
			<input type="submit" name="signout" value="Sign Out">
		</div>
	</form>
		</div>
	<div class="box" style="width:650px;top:30%;">
	<form action="display.php" method="post" id="myform">
		<h3> ADD Details </h3>
		<table>
			<tr>
		<td colspan="2">
		<span class="icon"><i class="fa fa-pencil" aria-hidden="true" style="color:white;"></i></span><input type="text" name="eno" placeholder="Enrollement number" autocomplete="off"></td></tr>
		<tr><td><span class="icon"><i class="fa fa-user" aria-hidden="true"  style="color:white;"></i></span><input type="text" name="name" placeholder="Name" autocomplete="off" ></td>
		<td><span class="icon"><i class="fa fa-calendar" aria-hidden="true" style="color:white;"></i></span><input type="date" name="dob" style="height:14px;" autocomplete="off"></td></tr>
		<tr><td><span class="icon"><i class="fa fa-phone" aria-hidden="true" style="color:white;"></i></span><input type="number" name="contactnumber" placeholder="Contact-number" autocomplete="off"></td>
		<td rowspan="3"><div class="address"><span class="addressicon" style="right: 277px;"><i class="fa fa-address-card-o" aria-hidden="true" style="color:white;top:auto;
	margin-top: 20px;"></i></span><textarea name="address" placeholder="Address"></textarea></div></td></tr>
		<tr><td><span class="icon"><i class="fa fa-envelope" aria-hidden="true" style="color:white;"></i></span><input type="text" name="email" placeholder="Email" autocomplete="off"></td>
		</tr>
		<tr><td><input type="radio" name="gender" value="Male" style="width:15px;height:15px;margin-left:10px;"value="Male"><lable class="l">MALE</lable>
		<input type="radio" name="gender" value="Female" style="width:15px;height:15px;margin-left:20px;"value="Female"><lable class="l" >FEMALE</lable></td>
		</tr>
		<tr><td><span class="icon"><i class="fa fa-university" aria-hidden="true" style="color:white;"></i></span><input type="text" list="branch" name="branch" style="border: 2px solid lightgrey;" placeholder="Branch" autocomplete="off">
		<datalist id="branch">
			<option value="CE"></option>
			<option value="CSE"></option>
			<option value="IT"></option>
		</datalist></td>
		<td><span class="icon"><i class="fa fa-graduation-cap" aria-hidden="true" style="color:white;"></i></span><input type="number" list="sem"name="sem" style="border: 2px solid lightgrey;" placeholder="Semester" autocomplete="off">
			<datalist id="sem">
			<option value="1"></option>
			<option value="2"></option>
			<option value="3"></option>
			<option value="4"></option>
			<option value="5"></option>
			<option value="6"></option>
			<option value="7"></option>
			<option value="8"></option>
		</datalist></td></tr>
		<tr><td colspan="2"><div class="btn">
		<input type="submit" name="submit" value="Add" style="width: 180px;">
	    </div></td></tr>
	</table>
	</form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
	function show()
	{
		document.getElementById("myDIV").style.display = "block";
	}
	function hide()
	{
		document.getElementById("myDIV").style.display = "none";
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
            	minlength:"*Enter Enrollement-Number 10 digits",
				maxlength:"*Enter Enrollement-Number 10 digits",
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