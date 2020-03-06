<?php
	session_start();
	error_reporting(1);
	include('connect.php');
	if(isset($_POST['submit']))
	{
			$branch = $_POST['branch'];
			$sem = $_POST['sem'];
		if( $_POST['submit'] == "Display")
		{
			
			$query  = "SELECT * FROM information WHERE branch='".$branch."' AND sem='".$sem."' ";

				
		}
		else if($_POST['submit']=="Add")
		{
			if( !empty($_POST['eno']) && !empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['contactnumber'])&& !empty($_POST['address'])&& !empty($_POST['email'])&& !empty($_POST['gender']) && !empty($_POST['branch'])&& !empty($_POST['sem']))
		{	
		$add_date=date("Y-m-d h:i:sa");
		$eno = $_POST['eno'];
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		$contactnumber = $_POST['contactnumber'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$branch = $_POST['branch'];
		$sem = $_POST['sem'];


			$query = "INSERT INTO information (`add_user`,`add_date`,`eno`,`name`,`dob`,`contactnumber`,`address`,`email`,`gender`,`branch`,`sem`) VALUES('".$_SESSION['useremail']."','".$add_date."','".$eno."','".$name."','".$dob."','".$contactnumber."','".$address."','".$email."','".$gender."','".$branch."','".$sem."')";
			
			$result = mysqli_query($conn, $query);
			
			if($result)
			{
				echo '<script> alert("New Details Added Successfully."); </script>';
			}
			else
			{
				echo '<script> alert("Error."); </script>';
			}
		}
		else{
			echo '<script> alert("All fields are required."); </script>';
		}
		}
		else if ($_POST['submit'] == "Delete All") 
		{
			$query = "SELECT * FROM information WHERE branch='$branch' AND sem='$sem'";
			$result= mysqli_query($conn , $query);
		 	$count= mysqli_num_rows($result);
			//include ('addsub.php');
			if($result)
			{
				if($count > 0)
				{
					if(mysqli_query($conn , $query))
					{
											
						$querys = "UPDATE information SET status=1 WHERE branch='$branch' AND sem='$sem'";
			
						$result1=mysqli_query($conn, $querys);
			
						if($result1)
						{
								echo "<script type='text/javascript'>alert('All Branch & Semester  Data Deleted Successfully.');
									window.location='information.php';
								</script>";
						}
					}
				}
				else
				{
					echo '<script> alert("Error."); </script>';
				}
			}
			
		}
				
		
		else if ($_POST['submit'] == "Submit") 
		{
			$eno=$_POST['eno'];
			$query = "UPDATE  information SET status=1 WHERE eno='$eno' ";
			$result=mysqli_query($conn, $query);
			$count= mysqli_num_rows($result);
			if($result)
			{
			
				echo "<script type='text/javascript'>alert('Data Deleted Successfully.');
					</script>";
				
			}
				else
				{	
					echo "<script type='text/javascript'>alert('Error.');
							window.location='information.php';
						</script>";
				}
			
				
		}

		else
		{
			$update_user=$_SESSION['useremail'];
			$update_date=date("Y-m-d h:i:sa");
			$eno=$_POST['eno'];
			$name=$_POST['name'];
			$dob=$_POST['dob'];
			$contactnumber=$_POST['contactnumber'];
			$address=$_POST['address'];
			$email=$_POST['email'];
			$gender=$_POST['gender'];
			$branch=$_POST['branch'];
			$sem=$_POST['sem'];
			$queryc = "SELECT * FROM information WHERE eno='".$eno."' ";
			$result= mysqli_query($conn , $queryc);
		 	$count= mysqli_num_rows($result);
			if($result)
			{
				if($count == 1)
				{
					if(mysqli_query($conn , $queryc))
					{
					$query1 = "UPDATE information SET update_user='$update_user',update_date='$update_date',name='$name',dob='$dob',contactnumber='$contactnumber',address='$address',email='$email',gender='$gender',branch='$branch',sem='$sem' WHERE eno='$eno' ";
						if(mysqli_query($conn, $query1))
						{ 
							echo "<script type='text/javascript'>alert('Data Updated Successfully.');
								  </script>";
		
						}
					}
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
	<div class="box" style="width: 70%;top:15%;height:auto;" >
			<h3> -:Student Details:-<br><br> Branch :- <?php echo $branch; ?> & Semester :- <?php echo $sem; ?> </h3>
			<table border="1"s>
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
						include('connect.php');
				$queryd  = "SELECT * FROM information WHERE branch='".$branch."' AND sem='".$sem."' ";
							$result= mysqli_query($conn , $queryd);
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
									echo "<script> alert('No data Avaliable.');window.location='information.php'; </script>";
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
</html>