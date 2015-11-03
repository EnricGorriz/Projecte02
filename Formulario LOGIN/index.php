<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>Formulario LOGIN</title>
			<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

    <!--Google Font - Work Sans-->
		<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>
			<form action="reservas.php" method="GET">
			<div class="container">
				<div class="profile">
				<button class="profile__avatar" id="toggleProfile">
				<img src="NUESTROLOGO" alt="Avatar" /> 
				</button>
					<div class="profile__form">
						<div class="profile__fields">
							<div class="field">
								<input type="text" id="fieldUser" class="input" name="mail" size="10" maxlength="60" required pattern=.*\S.* />
								<label for="fieldUser" class="label">Correo</label>
							</div>
								<div class="field">
								<input type="password" id="fieldPassword" class="input" name="contraseña" size="10" maxlength="10" required pattern=.*\S.* />
								<label for="fieldPassword" class="label">Contraseña</label>
								</div>
									<div class="profile__footer">
									<button class="btn">Entrar</button>
									</div>
						</div>
					</div>
				</div>
			</div>
			<script src="js/index.js"></script>
			</form>
	</body>
</html>
