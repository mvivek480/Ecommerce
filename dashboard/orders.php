<?php
session_start();
$admin = $_SESSION['user'];
if(isset($admin)){} else { header('location:login.php'); }
?>
<!Doctype html>
<html>
	<head>
		<title>Conchos Sisig</title>
		<link rel="icon" href="img/logo.png">

		<!-- CUSTOM JS/CSS -->
		<link rel="stylesheet" type="text/css" href="../css/admin.css">
		<meta name="viewport" content="device-width=initial-scale 1.0;">

		<!-- FLAT UI JS/CSS -->
		<link rel="stylesheet" type="text/css" href="../Ui/dist/css/flat-ui.css">
		<link rel="stylesheet" type="text/css" href="../Ui/dist/css/flat-ui.min.css">
		<link rel="stylesheet" type="text/css" href="../Ui/dist/css/flat-ui.css.map">
		<link rel="stylesheet" type="text/css" href="../Ui/dist/css/vendor/bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../Ui/dist/js/flat-ui.js"></script>

		<!-- Font awesome -->
		<link rel="stylesheet" type="text/css" href="../fonts/css/font-awesome.css">


		<!-- Animate -->
		<link rel="stylesheet" type="text/css" href="../css/animate.css">

		<!-- JQUERY -->
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/dashboard.js"></script>
		<script type="text/javascript" src="../js/drop.js"></script>

		<!-- Menu Ajax --> 
		<script type="text/javascript" src="../js/admin-ajax/form-ajax.js"></script>
		<script type="text/javascript" src="../js/form_jquery.js"></script>

		</script>
	</head>

	<body>

		<!-- Start of Container -->
		<div class="container">
		<!-- Start of header-->
       
        </div>
    	<!-- End of header-->
    	<!-- Start of sidebar-->
    	<div class="sidebar"> 
    		<div class="menu" id="a_accountsss">
    			<div class="icon">
    				<i class="fa fa-money"></i>
    			</div>
    			<div class="name">
    				<?php 
					echo"New Orders";
					include 'dbconn.php';
					$sql2 = "SELECT order_id from cart_orders where status=1";
					$result2 = mysqli_query($conn,$sql2);
					while($rs2 = mysqli_fetch_array($result2)) {
					$orderid = $rs2["order_id"];
											
					echo "<ol>".$orderid."</ol>";
					echo"<br>";
					}
					echo"Processed Orders";
					$sql7 = "SELECT order_id from cart_orders where status=2";
					$result7 = mysqli_query($conn,$sql7);
					while($rs7 = mysqli_fetch_array($result7)) {
					$orderid7 = $rs7["order_id"];
											
					echo "<ol>".$orderid7."</ol>";
					echo"<br>";
					}
					?>
					
    			</div>
    		</div>
    	</div>
        <!-- End of sidebar-->
    	<!-- Start of Content-->
    	
		<div class="content">
                   
				  <?php
							include 'dbconn.php';
							
							$sql2 = "SELECT order_id, status,id ,cust_email from cart_orders where status=1 or status=2";
					$result2 = mysqli_query($conn,$sql2);
					while($rs2 = mysqli_fetch_array($result2)) {
					$status = $rs2["status"];	
					 $orderid = $rs2["order_id"];
					$id2=$rs2["id"];
					$mail=$rs2["cust_email"];
					$sql4 ="SELECT name,contact from users where email = '$mail'";
					$result4 = mysqli_query($conn,$sql4);  
					        
                            $sql ="SELECT cart.id , cart.prod_id, cart.qty, products.name, products.price, products.description, products.image from cart INNER JOIN products on products.id=cart.prod_id where cart.status='1' and cart.order_id='$orderid'"; 
                                $result = mysqli_query($conn,$sql);  
                                while($rs4= mysqli_fetch_array($result4)) {
									$name = $rs4["name"];	
					 $contact = $rs4["contact"];
								 echo $name;
								 echo "<br>";
								 echo $contact;
								}
                                    echo "<table>";

                                        while($rs = mysqli_fetch_array($result)) { 
                                            $id = $rs["id"]; 
                                            $prod_id = $rs["prod_id"];   
                                            $name = $rs["name"]; 
                                            $qty = $rs["qty"];
                                            $description = $rs["description"]; 
                                            $price = $rs["price"];  
                                            $image = $rs["image"]; 

                                                echo "<tr>
                                                           
                                                            <td>$name</td>
                                                            <td class='desc'>$description</td>
                                                            <td></td>
                                                            <td>P $price</td>
                                                            <td>$qty</td> 
															
                                                      </tr>";
					}
					 
                       echo"<br>";
					echo $orderid;
					
                                    echo "</table>";
									
					echo" <form  action='../dashboard/s.php' method='post' >
                                    
                                    <input type='hidden' name='id' value='$id2'>
                                    <button class='not'>cancel</button>
                                </form><br>";
								echo" <form  action='../dashboard/d.php' method='post' >
                                    
                                    <input type='hidden' name='id' value='$id2'>
                                    <button class='not'>Delivered</button>
                                </form>";
        
						echo" <form  action='../dashboard/a.php' method='post' >
                                    
                                    <input type='hidden' name='id' value='$id2'>
                                    <button class='not'>accepted</button>
                                </form>";
        
					}		  
							  
					
                            ?>

		</div>    <a href="acceptedorder.php">ss</a>
		<!-- Start of add product-->
<div class="add_products animated bounce">
		<div class="header-title">
			 <h4> <i class="fa fa-plus"></i> Add Product</h4>
			 <span><i class="fa fa-remove"></i></span>
		</div><br><br>
		<div class="animated shake" id="erorr">
		</div>
		<form id="addproduct" action="../php/admin/crud/add.php" method="post" enctype="multipart/form-data">
						<div class="img-cont">
								<img src="../img/images.jpg" alt="Upload Image" />

						</div>
						<div class="form-cont">
							  <input type="file" name="image" value="" id="add_image" required accept="image/png,image/jpg,image/jpeg,image/gif,image/	bitman" >
								<input type="text" name="name"  id="name" placeholder="Name" required="">
								<input type="number" name="price" id="price" placeholder="Price" required="">
								<select name="category" required="" id="category">
										<option value="Sisig">Sisig</option>
										<option value="Main-Meals">Main Meals</option>
										<option value="For Kids">For Kids</option>
										<option value="Desserts">Desserts</option>
										<option value="Drinks">Drinks</option>
										<option value="Extras">Extras</option>
								</select>
							 	<textarea name="description" id="description" rows="8" placeholder="Description" resizable></textarea>
								<button id="addprod-submit">Submit</button>
						</div>
			</form>
</div>
<!-- End of add product-->

<!-- Start of update product-->
<div class="add_products2 animated bounce" id="update-cont">
		<div class="header-title">
			 <h4> <i class="fa fa-plus"></i> Update Product</h4>
			 <span><i class="fa fa-remove"></i></span>
		</div><br><br>
		<div class="animated shake" id="erorr">
		</div>
		<div id="jafhioasbfaskldhasd"></div>
</div>
<!-- End of update product-->

					<!-- Start of PopUp-->
					<div class="popup animated bounceIn">
							<span>Delete ? </span>
							<hr>
							<button class="ok">Ok</button>
							<button class="cancel">Cancel</button>
					</div>
					<!-- End of PopUp-->


        <!-- End of Content-->

        <!-- Start of footer-->
        <div class="footer">
            Copyright &copy 2016 - Concho's Sisis Admin Dashboard
        </div>
        <!-- End of footer-->



    		<!-- Start of header-->
        <!-- End of header-->
		</div>
		<!-- End of Container -->
	



</body>
</html>