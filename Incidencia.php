<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulario Incidencia</title>
			<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
			<script type="text/javascript">
				jQuery(function($){
					$.datepicker.regional['es'] = {
						closeText: 'Cerrar',
						prevText: '&#x3c;Ant   ',
						nextText: '   Sig&#x3e;',
						currentText: 'Hoy',
						monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
						'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
						monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
						'Jul','Ago','Sep','Oct','Nov','Dic'],
						dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
						dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
						dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
						weekHeader: 'Sm',
						dateFormat: 'dd/mm/yy',
						firstDay: 1,
						isRTL: false,
						showMonthAfterYear: false,
						yearSuffix: ''};
					$.datepicker.setDefaults($.datepicker.regional['es']);
				});    
				 
				$(document).ready(function() {
				   $("#datepicker").datepicker();
				 });
			</script>
	</head>
	<body>
		<form action="" method="GET">
			Problema: 
				<select name="Problema">
					<option value="Problema">Selecciona el problema</option>
						
						<?php
						//realizamos la conexión con mysql
			
						$con = mysqli_connect('localhost', 'root', '', 'bd_reservas');
						$sql = "SELECT * FROM `tbl_recursos`";
						$datos = mysqli_query($con, $sql);
						echo "$sql";
		
							while ($lista = mysqli_fetch_array($datos))
							   echo utf8_encode("<option value=\"$lista[rec_id]\">$lista[rec_contingut]</option>"); 
							
						mysqli_close($con);
						?>
				</select> </br></br>
				
			Seleccionar Fecha
				<input type="date" name="datepicker" id="datepicker" readonly="readonly" size="12" /></br><br/>
			Comentarios sobre a incidencia: </br>	
				<textarea name="comentarios" rows="10" cols="40"></textarea></br><br/>
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>