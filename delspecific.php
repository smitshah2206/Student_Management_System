<?php
	error_reporting(1);
	include('connect.php');
	if(isset($_POST['submit']))
	{
			$branch = $_POST['branch'];
			$sem = $_POST['sem'];
	if( $_POST['submit'] == "Delete Specific")
		{
			
			$query  = "SELECT * FROM information WHERE branch='".$branch."' AND sem='".$sem."' ";
				
		}
	
	else {
				$eno=$_POST['eno'];
				$query = "DELETE FROM information WHERE branch='".$branch."' AND sem='".$sem."' AND eno='".$eno."' ";
			$result=mysqli_query($conn, $query);
			
			if($result)
			{
				echo "<script type='text/javascript'>alert(' Data Deleted Successfully.');
						window.location='information.php';
					</script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Error.');
						window.location='information.php';
					</script>";
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
		<div class="bar"><i class="fa fa-pencil" aria-hidden="true" style="color:white;"></i></div><br>
		<div class="bar"><i class="fa fa-user" aria-hidden="true" style="color:white;"></i></div><br>
		<div class="bar"><i class="fa fa-phone" aria-hidden="true" style="color:white;"></i></div><br>
		<div class="bar"><i class="fa fa-envelope" aria-hidden="true" style="color:white;"></i></div></br>
		<div class="bar"><i class="fa fa-university" aria-hidden="true" style="color:white;"></i></div><br>
		<div class="bar"><i class="fa fa-graduation-cap" aria-hidden="true" style="color:white;"></i></div>
		<form>
		<div class="btn" style="text-align:left;">
			<input type="submit" name="signout" value="Sign Out">
		</div>
	</form>
		</div>
	<div class="box" style="width: auto;top:30%" >
			<form style="text-align: center;margin-left: 10px;" action="delspecific.php">
				<h3 > Delete Details </h3>
					<span class="icon">
					<i class="fa fa-pencil" aria-hidden="true" style="color:white;">
					</i>
				</span>
				<input type="number" name="eno"  autocomplete="off" placeholder="Enter a Enrollement Number">
				<span class="btn">
				 <input  style="width:80px;display: inline;" type="submit" name="submit" value="Submit">
				</span>
			</form>
			<table border="1">
						<tr>
						<th>Enrollement number</th>
						<th>Name</th>
						<th>D.O.B</th>
						<th>Contact number</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Sem</th>
						<th>Branch</th>
						<th>Address</th>
						</tr>
						<?php
							$result= mysqli_query($conn , $query);
		 					$count= mysqli_num_rows($result);
							if($result)
							{
								if($count > 0)
								{
									while($row = mysqli_fetch_array($result))
									{	
										echo "<tr>";
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
<div id="pform" style="display: block;">
				<div class="btn">
				<input type="submit" name="submit" value="Delete All">
				<input type="hidden"  name="branch" placeholder="Branch" value="<?php echo $branch ?>">
				<input type="hidden" name="sem"  placeholder="Semester" value="<?php echo $sem?>">
				<input type="button" name="submit" value="Delete Specific" style="width: 180px;" onclick="f();">
				</div>
			</div>
			<div style="text-align: center;margin-left: 10px;position: relative;display: none;"  id="jform" method="post">
				<span class="icon">
					<i class="fa fa-pencil" aria-hidden="true" style="color:white;">
					</i>
				</span>
				<input type="number" name="eno"  placeholder="Enter a Enrollement Number">
				<span class="btn">
				 <input  style="width:80px;display: inline;" type="submit" name="submit" value="Submit">
				</span>
			</div>
			document.getElementById('pform').style.display="none";
		document.getElementById('jform').style.display="block";