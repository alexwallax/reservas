<?php
    try {
        $pdo = new PDO("mysql:dbname=reservas;host=localhost", "root", "");//conexão com o bando de dados
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
    }