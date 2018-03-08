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
		$id = "";
		$user = $_SESSION['user'];
		$nombre = "";

		$link = mysqli_connect("localhost", "root", "", "parcial") or die($link);
		$query = mysqli_query($link, "Select * from cliente where ID_cliente='$user'"); // SQL Query
		if($row = mysqli_fetch_array($query))
		{
		  $id = $row['ID_cliente'];
		  $nombre = $row['Nombre'];
		}else{
		  Print '<script>alert("Sesión errónea!");</script>';
		  Print '<script>window.location.assign("login.php");</script>';
		}
	?>
	<body class="body-home">
		<div class="container-home">
			<a href="logout.php" class="input-cerrar">
				Cerrar sesión
			</a>
			<h1>
				Hola <?php Print "$nombre"?>!
			</h1>
			<h2>
				En este cajero puedes realizar las siguientes transacciones:
			</h2>
			<div class="opciones-home">
				<a class="opcion-home" href="consulta.php">
					<img class="img-link" src="https://www.jmasjuarez.gob.mx/wp-content/uploads/2016/08/consulta-saldo.png">
					Consultar saldo
				</a>
				<a class="opcion-home" href="consigna.php">
					<img class="img-link" src="http://aulacm.com/wp-content/uploads/2015/06/icono-grande-741.png">
					Realizar consignación
				</a>
				<a class="opcion-home" href="retiro.php">
					<img class="img-link" src="http://pluspng.com/img-png/finance-png-finance-loan-money-business-dollar-hand-png-512.png">
					Retirar dinero
				</a>
			</div>
	        <img class="img-back" src="images/logo.png">
	    </div>
	</body>
</html>