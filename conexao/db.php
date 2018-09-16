<?php

$dsn = "mysql:dbname=anotacoes;host=localhost";
$dbuser = "root";
$dbpass = "";

try{
    $pdo = new PDO($dsn, $dbuser, $dbpass);

} catch(PDOException $e) {
    echo "Falhou: ".$e->getMessage();
    }
?>