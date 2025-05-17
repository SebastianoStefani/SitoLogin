<?php
$config = [
    'db_engine' => 'mysql',
    'db_host' => '127.0.0.1',
    'db_name' => 'sitoPHP',
    'db_user' => 'root',
    'db_password' => '',
];

$db_config = $config['db_engine'] . ":host=".$config['db_host'] . ";dbname=" . $config['db_name'];

try {
    $pdo = new PDO($db_config, $config['db_user'], $config['db_password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);
        
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    exit("Impossibile connettersi al database: " . $e->getMessage());
}
//NB IL SITO DI DEFAULT USEREBBE SOLO PDO, MA PER VEDERE UN Pò DI SQL UTILIZZEREMO ANCHE LA CONNESSIONE MYSQLI
$con= mysqli_connect("localhost","root","") or die ("could not connect to mysql"); 
mysqli_select_db($con, "sitoPHP") or die ("no database");   

?>