<?php
	session_start();
	$link = mysqli_connect("localhost", "root", "", "parcial") or die($link);
	$username = mysqli_real_escape_string($link, $_SESSION['user']);
	
	$query = mysqli_query($link, "SELECT * from cuenta WHERE ID_cliente='$username'");
	$ID_cuenta = "";

	while($row = mysqli_fetch_assoc($query)) 
	{
		$table_users = $row['ID_cliente'];
		$table_password = $row['contrasena'];
		$ID_cuenta = $row['ID_cuenta'];
	}
	$query2 = mysqli_query($link, "INSERT INTO log_cajero (ID_acceso, Fecha_hora, ID_transaccion, ID_cuenta, ID_cajero, monto) VALUES (NULL, localtime(), '5', '$ID_cuenta', '1', NULL)");
	session_destroy();
	header("location:login.php");
?>