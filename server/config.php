<?php 
//configurações para ligar o projecto à base de dados
$host = 'localhost';
$dbname = 'management';
$username = 'root';
$password = 'root';

try {
  $pdo = new PDO(
    "mysql:host=$host;dbname=$dbname",
    $username, $password
  );
  $pdo->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
  );
  //echo 'conectado!';
} catch(PDOException $e) {
  die("Erro: " . $e->getMessage());
}

?>