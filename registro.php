<?php
require_once "login.php";
require_once "funciones.php";

session_start();

if (isset($_POST["email"]) && isset($_POST["password"])) {
	$conexion = new mysqli($hn, $un, $pw, $db, $port);
	if ($conexion->connect_error) {
		die("Fatal Error");
	}
	
	$correo=get_post($conexion,"email");
	$password=get_post($conexion, "password");
	$password=md5($password);
	
	

	$query = "INSERT INTO `usuario`(`correo`, `password`) VALUES ('$correo', '$password')";
	$result = $conexion->query($query);
	if (!$result) echo "INSERT falló <br><br>";
	
}

?>
<!doctype html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0'>
	<title>Document</title>
	<link rel='stylesheet' href='css/login.css'>
</head>
<body>
<form action="registro.php" method='post'>
	<div class="imgcontainer">
		<img src="img/img.png" alt="Avatar" class="registro">
	</div>
	<div class="container">
		<h1>Registrarme</h1>
		<p>Ingrese sus datos</p>
		<hr>

		<label for="email"><b>Correo</b></label>
		<input type="email" placeholder="Ingrese su Correo" name="email" id="email" required>

		<label for="psw"><b>Contraseña</b></label>
		<input type="password" placeholder="ingrese su contraseña" name="password" id="psw" required>

		<button type="submit" class="registerbtn">Registrarme</button>
	</div>

	<div class="container signin">
		<p>¿Ya tienes una cuenta? <a href="index.php">Iniciar Sesión</a>.</p>
	</div>
</form>
</body>
</html>
