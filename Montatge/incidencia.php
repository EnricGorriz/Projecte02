<?php
session_start();
	if(isset($_SESSION['nombre'])){
?>
<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>Formulario INCIDENCIA</title>
		<link rel="stylesheet" href="css/styleincidencias.css">
	    <link rel="stylesheet" href="css/stylesBar.css">
	    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	    <script src="js/scriptBar.js"></script>	
	</head>
	<body>
		<div class="header">
			<div id='cssmenu'>
				<ul>
					<li><a href='reservas.php'>RESERVAS</a></li>
					<li class='active'><a href='incidencia.php'>INCIENCIAS</a></li>
					<li><?php echo "<br/>&nbsp;&nbsp; Bienvenido $_SESSION[nombre] ";?></li>
				</ul>
			</div>
		</div>
		<form action="" method="GET">
			<div class="container">
				<div class="profile">
					<div class="profile__form">
						<div class="">
							<div class="field">
							Selecciona el problema: </br>
									<select name="Problema"> 
										<option value="Problema"></option>
											<?php
											$con = mysqli_connect('localhost', 'root', 'DAW22015', 'bd_reservas');
											$sql = "SELECT * FROM `tbl_recursos`";
											$datos = mysqli_query($con, $sql);
											echo "$sql";
												while ($lista = mysqli_fetch_array($datos)){
												   echo utf8_encode("<option value=\"$lista[rec_id]\">$lista[rec_contingut]</option>"); 
												}
											mysqli_close($con);
											?>
									</select> </br>
							</div>
							<div class="field">
								Seleccionar Fecha: <br/>
								<input type="date" name="fecha"><br/>
							</div>
							Comentarios sobre la incidencia: <br/>	
							<textarea name="comentarios" rows="5" cols="37"></textarea></br><br/>
							<div class="profile__footer">
								<input type="submit" class="btn" value="Entrar"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
<?php
}else{
	$_SESSION['validarse'] = 'error';
	header("Location: index.php");
	die();
}
?>