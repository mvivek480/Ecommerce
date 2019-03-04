<?php

include 'dbconn.php';
echo $id2= $_POST['id']; 

	$sql = "UPDATE cart_orders SET status='4' where id='$id2'";
	$result = mysqli_query($conn,$sql); 
	header('location:index.php');
?>