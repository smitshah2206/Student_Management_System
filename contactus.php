<?php
  session_start();
  
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
<div class="contactbox">
    <i class="fa fa-home fa-4x" aria-hidden="true" style="color: white;"></i>
</div>
<div class="contactbox" style="left:28%;">
    <i class="fa  fa-envelope fa-4x" aria-hidden="true" style="color: white;left:18%;top:15%;"> </i>
</div>
<div class="contactbox" style="left:50%;">
    <i class="fa fa-phone fa-4x" aria-hidden="true" style="color: white;left:25%"></i>
</div>
<a href="https://www.google.com/maps/dir//23.064321,72.439758/@23.0643481,72.440643,15z?hl=en-US">
<div class="contactbox" style="left: 70%"> 
    <i class="fa fa-map-marker fa-4x" aria-hidden="true" style="color: white;left:30%"></i>
</div></a>
<br>
<div  class="contactheading">
    <h4>Visit Us </h4>
</div>
<div style="left:28%;" class="contactheading">
    <h4>Mail to Us</h4>
</div>
<div style="left:50%;" class="contactheading">
    <h4>Call Us</h4>
</div>
<div style="left:70%;" class="contactheading"> 
    <h4>Google Map Link</h4>
</div>
<div  class="contactdetails">
    <h4>Rancharda, Via: <br>Thaltej Ahmedabad -<br> 382115 Gujarat - <br>India</h4>
</div>
<div style="left:28%;" class="contactdetails">
    <h4>info@indusuni.ac.in</h4>
</div>
<div style="left:50%;" class="contactdetails">
    <h4>+91 2764 260277<br>
+91 90999 44242</h4>
</div>
<div style="left:70%;" class="contactdetails"> 
    <h4></h4>
</div>
<div class="socialmedia"> 
        <i class="fa fa-facebook fa-lg" aria-hidden="true" style="color: white;left:30%"></i>
</div>
<div class="socialmedia" style="left:45%;">
    <i class="fa fa-twitter fa-lg" aria-hidden="true" style="color: white;left:25%;"></i>
</div>

<div class="socialmedia" style="left:50%;">    
    <i class="fa fa-linkedin-square fa-lg" aria-hidden="true" style="color: white;left:25%"></i>
</div>
<div class="socialmedia" style="left:55%;"> 
        <i class="fa fa-instagram fa-lg" aria-hidden="true" style="color: white;left:25%"></i>
</div>
<div class="footer">
  <h3>Copyrights 2019. Indus University<br>Powered By Smit Shah</h3>
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
