<?php
	session_start();
	$link = mysqli_connect("localhost", "root", "", "parcial") or die($link);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	$user = mysqli_real_escape_string($link, $_SESSION['user']);
	$saldo = "";
	
	$query = mysqli_query($link, "SELECT * from cuenta WHERE ID_cliente='$user'"); 
	$exists = mysqli_num_rows($query); 
	$table_users = "";
	$table_password = "";
	$ID_cuenta = "";

	if($exists > 0) 
	{
		while($row = mysqli_fetch_array($query)) 
		{
			$table_users = $row['ID_cliente']; 
			$table_password = $row['contrasena'];
			$saldo = $row['Saldo'];
			$ID_cuenta = $row['ID_cuenta'];
		}
		if(($user == $table_users) && ($password == $table_password)) 
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $user;
					$_SESSION['saldo'] = $saldo;
					$query2 = mysqli_query($link, "INSERT INTO log_cajero (ID_acceso, Fecha_hora, ID_transaccion, ID_cuenta, ID_cajero, monto) VALUES (NULL, localtime(), '2', '$ID_cuenta', '1', '$saldo')");
					Print '<script>window.location.assign("resultadoConsulta.php");</script>';
				}
		}
		else
		{
			Print '<script>alert("Contraseña incorrecta!");</script>';
			Print '<script>window.location.assign("consulta.php");</script>';
		}
	}
	else
	{
		Print '<script>alert("Cuenta incorrecta!");</script>';
		Print '<script>window.location.assign("consulta.php");</script>';
	}
?>