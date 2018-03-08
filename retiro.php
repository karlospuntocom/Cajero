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
				Retiro de dinero
			</h1>
			
			<form action="checkretirar.php" method="POST">
				Ingresar cantidad de dinero a retirar: <input type="text" name="money" required="required"/> <br/>				
				Ingresar contraseña: <input type="password" name="password" required="required"/> <br/>				
				Verificar contraseña: <input type="password" name="password2" required="required"/> <br/>				
				<input type="submit" value="Retirar"/>
				<a href="volver.php">
					Volver
				</a>
			</form>
			<img class="img-back" src="images/logo.png">
		</div>		
	</body>
</html>