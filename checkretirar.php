<?php
	session_start();
	$link = mysqli_connect("localhost", "root", "", "parcial") or die($link);
	$money = mysqli_real_escape_string($link, $_POST['money']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	$password2 = mysqli_real_escape_string($link, $_POST['password2']);
	$username = mysqli_real_escape_string($link, $_SESSION['user']);
	$saldo = "";
	
	$query = mysqli_query($link, "SELECT * from cuenta WHERE ID_cliente='$username'"); 
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
		if(($username == $table_users) && ($password == $table_password)) 
		{
				if($saldo > $money)
				{
					$query2 = mysqli_query($link, "UPDATE cuenta SET Saldo = (Saldo-'$money') WHERE contrasena='$password2' AND contrasena='$password' AND ID_cliente='$username'");
					if($query2) 
					{
						$query3 = mysqli_query($link, "INSERT INTO log_cajero (ID_acceso, Fecha_hora, ID_transaccion, ID_cuenta, ID_cajero, monto) VALUES (NULL, localtime(), '3', '$ID_cuenta', '1', '$money')");
						Print '<script>alert("Retiro exitoso!");</script>';
						Print '<script>window.location.assign("index.php");</script>';
					}
				} else {
						Print '<script>alert("Fondos insuficientes!");</script>';
						Print '<script>window.location.assign("index.php");</script>';
					}
		}
		else
		{
			Print '<script>alert("Contraseña incorrecta!");</script>';
			Print '<script>window.location.assign("retiro.php");</script>';
		}
	}
	else
	{
		Print '<script>alert("Cuenta incorrecta!");</script>';
		Print '<script>window.location.assign("retiro.php");</script>';
	}	
?>