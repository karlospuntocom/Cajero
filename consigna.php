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
		if($_SESSION['user']){
		}
		else{
		  header("location:index.php");
		}
	?>
	<body class="body-home">
		<div class="container">
			<a href="logout.php" class="input-cerrar">
				Cerrar sesión
			</a>
			<h1>
				Consignación de dinero
			</h1>
			
			<form action="checkconsignar.php" method="POST">
				Ingresar número de cuenta: <input type="text" name="account" required="required"/> <br/>
				Confirmar número de cuenta: <input type="text" name="account2" required="required"/> <br/>
				Ingresar cantidad de dinero a consignar: <input type="text" name="money" required="required"/> <br/>
				<input type="submit" value="Consignar"/>
				<a href="volver.php">
					Volver
				</a>
			</form>
			<img class="img-back" src="images/logo.png">
		</div>		
	</body>
</html>