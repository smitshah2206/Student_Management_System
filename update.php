<?php
	session_start();
	error_reporting(1);
	include('connect.php');
	if(isset($_POST['submit']))
	{
			$branch = $_POST['branch'];
			$sem = $_POST['sem'];
	if( $_POST['submit'] =="Update")
		{
			
			$query  = "SELECT * FROM information WHERE branch='".$branch."' AND sem='".$sem."' ";
		}			 
	}
	mysqli_close($conn);
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
			<input  type="submit" name="signout" value="Sign Out">
		</div>
	</form>
		</div>
	<div class="box" style="width: 70%;top:15%;height:auto;" >
			<h3> Update Details </h3>
			<form  action="updatedisplay.php" method="post" id="myform">
				<div style="text-align: center;margin-left: 80px;">
				<span class="icon">
					<i class="fa fa-pencil" aria-hidden="true" style="color:white;">
					</i>
				</span><input autocomplete="off" type="number" name="eno" placeholder="Enter a Enrollement Number">
				<span class="btn">
				 <input   style="width:80px;display: inline;" type="submit" name="submit" value="Submit">
				</span>
			</div>
		</form>
			<table border="1">
						<th>Serial No.</th>
						<th>Enrollement number</th>
						<th>Name</th>
						<th>D.O.B</th>
						<th>Contact number</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Sem</th>
						<th>Branch</th>
						<th>Address</th>
						<?php
							include ('connect.php');
							$result= mysqli_query($conn , $query);
		 					$count= mysqli_num_rows($result);
							$a=1;
							if($result)
							{
								if($count > 0)
								{
									while($row = mysqli_fetch_array($result))
									{	
										if($row['status']==0)
										{
										echo "<tr>";
										echo "<td>" .$a++."</td>" ;
										echo "<td>" . $row['eno'] . "</td>";
										echo "<td>" . $row['name'] . "</td>";
										echo "<td>" . $row['dob'] . "</td>";
										echo "<td>" . $row['contactnumber'] . "</td>";
										echo "<td>" . $row['email'] . "</td>";
										echo "<td>" . $row['gender'] . "</td>";
										echo "<td>" . $row['sem'] . "</td>";
										echo "<td>" . $row['branch'] . "</td>";
										echo "<td>" . $row['address'] . "</td>";
										echo "</tr>";
										}							
									}
								}
								else
								{
									echo "<script> alert('No data Avaliable.');window.location='updatehome.php'; </script>";
								}	
							}
							mysqli_close($conn);
						?>
				</table>
				
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
 },
        messages:{
        	eno:{
            	required:"*Enrollement Number is required",
            	minlength:"*Enter Enrollement-Number 10 digits",
				maxlength:"*Enter Enrollement-Number 10 digits",
				digits:"*Enter 10 digits",
            },   },
    });

});
</script>
</html>