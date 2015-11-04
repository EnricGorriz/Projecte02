<?php
session_start();
	if(isset($_POST['login']))$login=1;
	if(isset($_POST['reservar']))$login=1;
	if(isset($login)){
		if(isset($_POST['login'])){
		$_SESSION['nombre'] = $_POST['mail'];
	
		if(isset($_POST['mail']))$mail = $_POST['mail'];
		if(isset($_POST['contraseña']))$contraseña = $_POST['contraseña'];
		$con = mysqli_connect('localhost', 'root', '', 'bd_reservas');
		$sql=("SELECT * FROM `tbl_usuario` WHERE usu_email = '$mail' && usu_contra = '$contraseña' ");
		//echo $sql;
		$datos = mysqli_query($con, $sql);
		if(mysqli_num_rows($datos) > 0){
			while($send = mysqli_fetch_array($datos)){
				$send['usu_nom'] = utf8_encode($send['usu_nom']);
				//echo "<br/><br/>$send[usu_nom]";
				$_SESSION['nombre']=$send['usu_nom'];
			}
		}else{
		$_SESSION['error'] = 'error';
			header("Location: index.php");
			die();
		}
		mysqli_close($con);
		}
		
		if(isset($_POST['reservar'])){
			
			if(isset($_POST['reservar']))$reservar = $_POST['reservar'];
			$con = mysqli_connect('localhost', 'root', '', 'bd_reservas');
			//echo $reservar;
			//$sql1=("SELECT * FROM `tbl_recursos` WHERE rec_id = $reservar");
			//echo $sql1;
			$sql=("UPDATE tbl_recursos SET rec_reservado = 0 WHERE rec_id = $reservar ");
			//echo $sql;
			$datos = mysqli_query($con, $sql);			
			mysqli_close($con);
			echo "Recurs reserva't";
		}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/reservas.css" />

    </head>

    <body>
<?php
echo "<br/>Bienvenido $_SESSION[nombre]";
?>
    <div class="header"><h1>HEAD</h1></div>
    
    <div class="fondo">

        <div class="principal">

            <h1>AULAS</h1>
 
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'bd_reservas');
            $sql = ("SELECT * FROM `tbl_recursos` WHERE tbl_recursos.rec_tipo_rec= 1");

                $datos = mysqli_query($con, $sql);
                    if(mysqli_num_rows($datos) > 0){
                        while($cerca = mysqli_fetch_array($datos)){
                            $cerca['rec_contingut']= utf8_encode($cerca['rec_contingut']);
                            $img = "images/$cerca[rec_contingut].jpg";

                            if($cerca['rec_reservado']=="1"){
                            	$img = "images/$cerca[rec_contingut].jpg";
                            }else{
                            	$img = "images/$cerca[rec_contingut]ocupada.jpg";
                            }


                            echo "<div class='objeto'>$cerca[rec_contingut]<div class='objeto2'><img src='$img'><br/></div>";
							echo "<form action='#' method='POST'>";
							echo "<input type='hidden' name='reservar' value='$cerca[rec_id]'/>";
							if($cerca['rec_reservado']=="1"){
								echo "<input type='submit' value='RESERVAR'/>";
							}else{
								echo "<input type='submit' value='RETORNAR'/>";
							}
							if($_SESSION['nombre']=='IT'){
								echo "  <input type='hidden' name='manteniment' value='$cerca[rec_id]'/>";
								echo "  <input type='submit' value='MANTENIMENT'/><br/>";
							}
							
							echo "</form>";
							echo "</div>";
                        }
                    }
            mysqli_close($con);
            ?>
        </div>

        <div class="aside"><h1>MATERIALES</h1>
            
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'bd_reservas');
            $sql = ("SELECT * FROM `tbl_recursos` WHERE tbl_recursos.rec_tipo_rec= 0");

                $datos = mysqli_query($con, $sql);
                    if(mysqli_num_rows($datos) > 0){
                        while($cerca = mysqli_fetch_array($datos)){
                            $cerca['rec_contingut']= utf8_encode($cerca['rec_contingut']);
                            $img = "images/$cerca[rec_contingut].jpg";

                              if($cerca['rec_reservado']=="1"){
                            	$img = "images/$cerca[rec_contingut].jpg";
                            }else{
                            	$img = "images/$cerca[rec_contingut]ocupada.jpg";
                            }

                            echo "<div class='objeto'>$cerca[rec_contingut]<div class='objeto2'><img src='$img'><br/></div>";
							echo "<form action='#' method='POST'>";
							echo "<input type='hidden' name='reservar' value='$cerca[rec_id]'/>";
							if($cerca['rec_reservado']=="1"){
								echo "<input type='submit' value='RESERVAR'/>";
							}else{
								echo "<input type='submit' value='RETORNAR'/>";
							}
							if($_SESSION['nombre']=='IT'){
								echo "  <input type='hidden' name='manteniment' value='$cerca[rec_id]'/>";
								echo "  <input type='submit' value='MANTENIMENT'/><br/>";
							}
							
							echo "</form>";
							echo "</div>";
                        }
                    }
            mysqli_close($con);
            ?>

        </div>
    </div>
    </body>
</html>
<?php
}else{
	$_SESSION['validarse'] = 'error';
	header("Location: index.php");
	die();
}

?>