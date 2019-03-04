
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
		<script type="text/javascript" src="../js/admin-ajax/menu.js"></script>
		<script type="text/javascript" src="../js/admin-ajax/form-ajax.js"></script>
		<script type="text/javascript" src="../js/form_jquery.js"></script>

		</script>
	</head>

	<body>

		<!-- Start of Container -->
		<div class="container">
		<!-- Start of header-->
        
		<div class="add_products animated bounce">
				<div class="header-title">
					 <h4> <i class="fa fa-users"></i> Admin Dashboard Login</h4>
					 <span><i class="fa fa-remove"></i></span>
				</div><br><br><br> 
				<center><kbd class="animated shake" id="erorr"></kbd></center>
					<div class="form-cont"> 
					<form action="login2.php" method="post" >
						<input type="text" name="user"  id="user" placeholder="Name" required="">
						<input type="password" name="pass" id="pass" placeholder="Password" required=""> 
						<button id="loginbtn" >Login</button>
						</form>
					</div> 
		</div> 
		<script type="text/javascript">
		setInterval(function(){
			$('.add_products').show();
			$('.add_products').css({'top':'20%','width':'30%', 'left':'35%'});
			$('.add_products .form-cont').css({'width':'100%'});
		}); 
		$('#erorr').css({'background-color':'red','color':'white','padding':'2%','margin-top':'0%','margin-left':'3%','width':'50%','display':'none'});
		
		</script>
	</body>
</html>

 