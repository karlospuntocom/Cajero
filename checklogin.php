<?php
	session_start();
	$link = mysqli_connect("localhost", "root", "", "parcial") or die($link);
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	
	$query = mysqli_query($link, "SELECT * from cuenta WHERE ID_cliente='$username'");
	$exists = mysqli_num_rows($query); 
	$table_users = "";
	$table_password = "";
	$ID_cuenta = "";

	if($exists > 0) 
	{
		while($row = mysqli_fetch_assoc($query)) 
		{
			$table_users = $row['ID_cliente'];
			$table_password = $row['contrasena'];
			$ID_cuenta = $row['ID_cuenta'];
		}
		if(($username == $table_users) && ($password == $table_password)) 
		{
				if($password == $table_password)
				{
					$query2 = mysqli_query($link, "INSERT INTO log_cajero (ID_acceso, Fecha_hora, ID_transaccion, ID_cuenta, ID_cajero, monto) VALUES (NULL, localtime(), '1', '$ID_cuenta', '1', NULL)");
					$_SESSION['user'] = $username;
					header("location: index.php"); 
				}				
		}
		else
		{
			Print '<script>alert("Contraseña incorrecta!");</script>'; 
			Print '<script>window.location.assign("login.php");</script>'; 
		}
	}
	else
	{
		Print '<script>alert("Usuario incorrecto!");</script>'; 
		Print '<script>window.location.assign("login.php");</script>'; 
	}
?>