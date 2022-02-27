<?php

class Conexion extends PDO
{
    private $host = '127.0.0.1';
    private $dbname = 'loteria';
    private $user = 'edib';
    private $pass = 'edib';
    private $port = '8889';

    public function __construct()
    {
        try {
            parent::__construct('mysql:host='.$this->host.';dbname='.$this->dbname.';port='.$this->port.';charset=utf8', $this->user, $this->pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }
}
