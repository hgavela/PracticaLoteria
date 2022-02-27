<?php
include './conexion.php';

$pdo = new Conexion();


//GUARDAR BOLETO

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO boletos (numero, fecha_sorteo) VALUES (:numero, :fecha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->execute();
    $id = $pdo->lastInsertId();
    if($id){
        header("HTTP/1.1 200 Ok");
        echo "<h1>Boleto guardado</h1>";
        sleep(5);
        header("Location: index.php");
        echo json_encode($id);
        exit;
    }
}

//OBTENER TODOS LOS BOLETOS

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM boletos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $boletos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 Ok");
    echo json_encode($boletos);
    exit;
}

//OBTENER LOS BOLETOS POR FECHA

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $fecha = $_GET['fecha'];
    $sql = "SELECT * FROM boletos WHERE fecha_sorteo = :fecha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->execute();
    $boletos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 Ok");
    echo json_encode($boletos);
    exit;
}

