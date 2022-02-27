<?php

include './conexion.php';

$pdo = new Conexion();


//GUARDAR BOLETO PREMIADO
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO boletos_premiados (numero, fecha_sorteo) VALUES (:numero, :fecha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->execute();
    $id = $pdo->lastInsertId();
    if($id){
        header("HTTP/1.1 200 Ok");
        echo json_encode($id);
        exit;
    }
}

//OBTENER LOS BOLETOS PREMIADOS

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM boletos_premiados";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $boletos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 Ok");
    echo json_encode($boletos);
    exit;
}

//OBETENER LOS BOLETOS POR FECHA

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $fecha = $_GET['fecha'];
    $sql = "SELECT * FROM boletos_premiado WHERE fecha_sorteo = :fecha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->execute();
    $boletos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 Ok");
    echo json_encode($boletos);
    exit;
}

