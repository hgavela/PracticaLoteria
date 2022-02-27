<?php

include 'back/conexion.php';

$pdo = new Conexion();


function CalcularPremio($boleto, $premio) {

    switch($boleto){

        case $boleto == $premio:
            return 600000;
            break;
        case ($boleto == $premio + 1 || $boleto == $premio - 1) :
            return 10000;
            break;
        case (substr($boleto, 0, -2) == substr($premio, 0, -2)) :
            return 300;
            break;
        case (substr($boleto, -3) == substr($premio, -3)) :
            return 300;
            break;
        case (substr($boleto, -2) == substr($premio, -2)) :
            return 120;
            break;
        case (substr($boleto, -1) == substr($premio, -1)) :
            return 60;
            break;
        default:
            return 0;
            break;
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include './nav.php'; ?>

<body>
    <main>
        <h2>Números premiados: </h2>
        <section class="premios">
            <?php
            // llamar a la función que muestra los números premiados
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                //Obetenemos todos los boletos
                $sql = "SELECT * FROM boletos";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $boletos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                

                foreach ($boletos as $boleto) {
                    //Revisamos por cada boleto si la fecha de ese boleto esta en las fechas de los boletos premiados
                    $sql = "SELECT * FROM boletos_premiados WHERE fecha_sorteo = '$boleto[fecha_sorteo]'";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $fecha = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //Si la fecha existe comprobamos si tiene premio
                    if(!empty($fecha)){  
                        $premio = CalcularPremio($boleto['numero'], $fecha[0]['numero']);
                            echo "$boleto[numero] : premiado con $premio € - $boleto[fecha_sorteo] <br>";
                            
                    } else {
                        echo "$boleto[numero] : no premiado - $boleto[fecha_sorteo] <br>";
                    }
                }
            }
            ?>
        </section>
    </main>
</body>

</html>