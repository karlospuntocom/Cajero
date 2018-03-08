<?php
	session_start();
	$link = mysqli_connect("localhost", "root", "", "parcial") or die($link);
	$account = mysqli_real_escape_string($link, $_POST['account']);
	$account2 = mysqli_real_escape_string($link, $_POST['account2']);
	$money = mysqli_real_escape_string($link, $_POST['money']);
	
	$query = mysqli_query($link, "UPDATE cuenta SET Saldo = (Saldo+'$money') WHERE ID_cuenta = '$account' AND ID_cuenta = '$account2'");
	if($query) 
	{
		Print '<script>alert("Consignación exitosa!");</script>';
		Print '<script>window.location.assign("index.php");</script>';
	}
	else
	{
		Print '<script>alert("Consignación incorrecta!");</script>';
	}
?>