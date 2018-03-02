<html>
<head>
	<title>
		Banco Helping Hand
	</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
	<style>
	@import url('https://fonts.googleapis.com/css?family=Montserrat');
</style>
</head>
<body>
	<div class="container">
		<h1>
			Ingreso de usuarios
		</h1>
		
		<form action="checklogin.php" method="POST">
			Ingresar usuario: <input type="text" name="username" required="required"/> <br/>
			Ingresar contraseña: <input type="password" name="password" required="required"/> <br/>
			<input type="submit" value="Iniciar sesión"/>
		</form>
		<img class="img-back" src="images/logo.png">
	</div>		
</body>
</html>