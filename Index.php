<?php
session_start();
if(isset($_SESSION['error']))$error = $_SESSION['error'];
if(isset($_SESSION['validarse']))$validarse = $_SESSION['validarse'];
session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulario LOGIN</title>
	</head>
	<?php
	if(isset($error)){
		echo"Usuario o Contrasenya Incorrecto<br/><br/><br/>";
	}
	if(isset($validarse)){
		echo "Antes de entrar Validate<br/><br/><br/>";
	}
	?>
	<body>
		<form action="reservas.php" method="POST">
			
			Email: <input type="text" name="mail" size="10" maxlength="60" placeholder="Email" required>
			<br/><br/>
			Contraseña: <input type="password" name="contraseña" size="10" maxlength="10" placeholder="Contraseña" required>
			<br/><br/>
			<input type="hidden" name="login">
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>