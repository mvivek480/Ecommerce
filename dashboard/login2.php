<?php
include 'dbconn.php';

$email = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM admin where user='$email' and pass='$pass'";
$result = mysqli_query($conn,$sql);
$row = mysqli_num_rows($result);
	if ($row>0) {   
		session_start();
		$_SESSION['user'] = $email; 
		if(isset($email)){ header('location:index.php'); } else { }

			$sql9 = "SELECT * FROM admin where user='$email'";
			$result9 = mysqli_query($conn,$sql9);
			$row9 = mysqli_fetch_array($result9);
				$name9 = $row9['user'];
			
					$sql8 = "INSERT INTO notifications values('','$name9',CURRENT_TIMESTAMP,'Logged In','0')";
					$result8 = mysqli_query($conn,$sql8); 
   			
   						echo "1";

	} else {
		
		echo "0"; 
		
	}


?>