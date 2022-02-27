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
        <form action="./back/boleto.php" method="post">
            <h2>Introduce el boleto</h2>
            <input type="number" name="numero" id="" placeholder="Introduce el número" min="00000" max="99999" required>
            <input type="date" name="fecha" id="" placeholder="Introduce la fecha" required>
            <input type="submit" value="Guardar">
        </form>
    </main>
</body>
</html>