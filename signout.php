<?php
	
    session_start();
	session_destroy();
		echo "<script type='text/javascript'>alert('Sign Out Successfully.');
								window.location='index.php';
							</script>";
?>