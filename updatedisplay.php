<?php
	session_start();
	error_reporting(1);
	include('connect.php');
	if(isset($_POST['submit']))
	{
		$eno=$_POST['eno'];
	if( $_POST['submit'] =="Submit")
		{
			$queryc = "SELECT eno FROM information WHERE eno='".$eno."' ";
			$result= mysqli_query($conn , $queryc);
			$count= mysqli_num_rows($result);
			if($result)
			{
		 		if($count>0)
		 		{	
					$query  = "SELECT * FROM information WHERE eno='".$eno."' ";
				}
				else
				{
					echo "<script>alert('Enrollement number is not avaliable');
							window.location='information.php';
							</script>";
				}
			}
		}
	
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<div class="box" style="width:728px;top:30%;">
	<form action="display.php" method="post">
		<h3> Update Details </h3>
		<table>
		<?php
		include ('connect.php');
		$result= mysqli_query($conn , $query);
		$count= mysqli_num_rows($result);
		if($result) 
			{
	         if($count > 0){
                while($row = mysqli_fetch_array($result))
                {
		echo"<disable><tr><td colspan='2'>
		<span class='icon'><i class='fa fa-pencil' aria-hidden='true' style='color:white;'></i></span><input type='text' name='eno' placeholder='Enrollement number' value='". $row['eno'] ."'></td></tr></disable>";
		echo"<tr><td><br><span class='icon'><i class='fa fa-user' aria-hidden='true' style='color:white;'></i></span><input type='text' name='name' placeholder='Name' value='". $row['name'] ."'></td>";
		echo"<td><span class='icon'><i class='fa fa-calendar' aria-hidden='true' style='color:white;'></i></span><input type='date' name='dob' style='margin-bottom: -5px;height:15px;' value='". $row['dob'] ."'></td></tr>";
		echo "<tr><td><span class='icon'><i class='fa fa-phone' aria-hidden='true' style='color:white;'></i></span><input type='number' name='contactnumber' placeholder='Contact-number' value='". $row['contactnumber'] ."'></td>";
		echo"<td rowspan='3'><div class='address'><span class='addressicon' style='right: 296px;'><i class='fa fa-address-card-o' aria-hidden='true' style='color:white;top:auto;margin-top:20px;'></i></span><textarea name='address' placeholder='Address'>". $row['address'] ."</textarea></div></td></tr>";
		echo"<tr><td><span class='icon'><i class='fa fa-envelope' aria-hidden='true' style='color:white;'></i></span><input type='text' name='email' placeholder='Email' value='". $row['email'] ."'></td></tr>";
			if($row['gender']=="Male")
			{
		echo"<tr><td><input type='radio' name='gender' style='width:15px;height:15px;margin-left:10px;' checked value='Male'><lable class='l'>MALE</lable>
			<input type='radio' name='gender' style='width:15px;height:15px;margin-left:20px;' value='Female'><lable class='l' >FEMALE</lable></td></tr>";
			}
			else
			{
		echo"<tr><td><input type='radio' name='gender' style='width:15px;height:15px;margin-left:10px;' value='Male' ><lable class='l'>MALE</lable>
			<input type='radio' name='gender' value='Female' style='width:15px;height:15px;margin-left:20px;' checked><lable class='l' >FEMALE</lable></td></tr>";
			}
		echo"<tr><td><span class='icon'><i class='fa fa-university' aria-hidden='true' style='color:white;'></i></span><input type='text' list='branch' name='branch' style='border: 2px solid lightgrey;' placeholder='Branch' value='". $row['branch'] ."'>
		<datalist id='branch'>
			<option value='CE'></option>
			<option value='CSE'></option>
			<option value='IT'></option>
		</datalist></td>";
		echo"<td><span class='icon'><i class='fa fa-graduation-cap' aria-hidden='true' style='color:white;'></i></span><input type='number' list='sem'name='sem' style='border: 2px solid lightgrey;' placeholder='Semester' value='". $row['sem'] ."'>
			<datalist id='sem'>
			<option value='1'></option>
			<option value='2'></option>
			<option value='3'></option>
			<option value='4'></option>
			<option value='5'></option>
			<option value='6'></option>
			<option value='7'></option>
			<option value='8'></option>
		</datalist></td></tr>";
		echo"<tr><td colspan='2'><div class='btn'>
		<input type='submit' name='submit' value='Update' style='width: 180px;'>
	    </div></td></tr>";
		}
	}
}
mysqli_close($conn);
	?>
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
</html>