<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/reservas.css" />

    </head>

    <body>

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

                            echo "<div class='objeto'><div class='objeto2'>$cerca[rec_contingut]<br/></div>";
                            echo "<input type='submit' value='RESERVAR'/></div>";
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

                            echo "<div class='objeto'><div class='objeto2'>$cerca[rec_contingut]<br/></div>";
                            echo "<input type='submit' value='RESERVAR'/></div>";
                        }
                    }
            mysqli_close($con);
            ?>

        </div>
    </div>
    </body>
</html>
