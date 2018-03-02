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
		  header("location:login.php");
		}
		$id = "";
		$user = $_SESSION['user'];
		$nombre = "";
		$apellido = "";
		$segundo_nombre = "";
		$correo = "";
		$fecha_nacimiento = "";
		$fecha_registro = "";
		$ciudad_nacimiento = "";
		$pais_nacimiento = "";
		$religion = "";
		$imagen = "";

		$link = mysqli_connect("localhost", "root", "", "parcial") or die($link);
		$query = mysqli_query($link, "Select * from users where username='$user'"); // SQL Query
		if($row = mysqli_fetch_array($query))
		{
		  $id = $row['id_user'];
		  $nombre = $row['nombre'];
		  $apellido = $row['apellido'];
		  $segundo_nombre = $row['segundo_nombre'];
		  $correo = $row['correo'];
		  $fecha_nacimiento = $row['fecha_nacimiento'];
		  $fecha_registro = $row['fecha_registro'];
		  $ciudad_nacimiento = $row['ciudad_nacimiento'];
		  $pais_nacimiento = $row['pais_nacimiento'];
		  $religion = $row['religion'];
		  $imagen = $row['imagen_user'];
		}else{
		  Print '<script>alert("NO entró!");</script>'; 
		}
		$fecha_nacimiento = date('d-m-Y', strtotime($fecha_nacimiento));
		$fecha_registro = date('d-m-Y', strtotime($fecha_registro));
	?>
	<body class="body-home">
		<div class="container">
			<h1>
				Consulta de saldo
			</h1>
			
			<form action="checklogin.php" method="POST">
				Ingresar número de cuenta: <input type="text" name="account" required="required"/> <br/>
				Ingresar contraseña: <input type="password" name="password" required="required"/> <br/>
				<input type="submit" value="Consultar"/>
			</form>

			<?php
				$link = mysqli_connect("localhost", "root", "", "parcial") or die($link);
				$query = mysqli_query($link, "Select * from users"); // SQL Query
				while($row = mysqli_fetch_array($query))
				{
					Print '<td align="center">'. $row['username'] . "</td>";
				}
			?>

			<img class="img-back" src="images/logo.png">
		</div>		
	</body>
</html>