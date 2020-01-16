<?php

    $dsn = "mysql:dbname=projeto-pisco;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try{
        $pdo = new PDO($dsn,$dbuser,$dbpass);
    }catch(PDOException $e){
        echo "Erro: ".$e->getMessage();
    }



?>