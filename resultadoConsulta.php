<html>
	<head>
		<title>
			Home Helping Hand
		</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <style>
	      @import url('https://fonts.googleapis.com/css?family=Montserrat');
	    </style>
	</head>
	<?php
		session_start();
		if($_SESSION['user'] and $_SESSION['saldo']){
		}
		else{
		  header("location:login.php");
		}
		$saldo = $_SESSION['saldo'];
		$user = $_SESSION['user'];
	?>
	<body class="body-home">
		<div class="container">
			<a href="logout.php" class="input-cerrar">
				Cerrar sesión
			</a>
			<h1>
				Consulta de saldo
			</h1>
			<h2 style="margin-left: 0px; font-size: 50px;">
				Su saldo es: $
				<?php
					Print number_format("$saldo");
				?>
			</h2>
			<img class="img-back" src="images/logo.png">
		</div>		
	</body>
</html>