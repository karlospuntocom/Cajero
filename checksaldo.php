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
	if($exists > 0) 
	{
		while($row = mysqli_fetch_array($query)) 
		{
			$table_users = $row['ID_cliente']; 
			$table_password = $row['contrasena'];
			$saldo = $row['Saldo'];
		}
		if(($user == $table_users) && ($password == $table_password)) 
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $user;
					$_SESSION['saldo'] = $saldo;
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