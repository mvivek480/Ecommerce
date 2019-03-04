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
					include 'dbconn.php';
					$sql2 = "SELECT order_id from cart_orders where status=2";
					$result2 = mysqli_query($conn,$sql2);
					while($rs2 = mysqli_fetch_array($result2)) {
					$orderid = $rs2["order_id"];
											
					echo "<ol>".$orderid."</ol>";
					echo"<br>";
					} ?>
					
    			</div>
    		</div>
    	</div>
        <!-- End of sidebar-->
    	<!-- Start of Content-->
    	<div class="content">
                  <?php 
				  include 'dbconn.php';
							
							$sql2 = "SELECT order_id, status,id from cart_orders where  status=2";
					$result2 = mysqli_query($conn,$sql2);
					while($rs2 = mysqli_fetch_array($result2)) {
					$status = $rs2["status"];	
					 $orderid = $rs2["order_id"];
					$id2=$rs2["id"];
					
					
                            $sql ="SELECT cart.id , cart.prod_id, cart.qty, products.name, products.price, products.description, products.image from cart INNER JOIN products on products.id=cart.prod_id where cart.status='1' and cart.order_id='$orderid'"; 
                                $result = mysqli_query($conn,$sql);  

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
									
					
					}		  
							  
						
                            ?>
    	</div>
		<!-- Start of add product-->
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