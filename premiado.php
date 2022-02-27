<?php
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
        <form action="./back/boleto_premiado.php" method="post">
            <h2>Introduce el número premiado</h2>
            <input type="number" name="numero" id="" placeholder="Introduce el número" maxlength="5">
            <input type="date" name="fecha" id="" placeholder="Introduce la fecha">
            <input type="submit" value="Guardar">
        </form>
    </main>
</body>
</html>