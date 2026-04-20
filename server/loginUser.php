
<?php
//Fazer Login - Validar Credenciais
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  
  // Buscar user na BD
  $stmt = $pdo->prepare(
    "SELECT id, email,username, password, user_type 
     FROM users WHERE email = ?"
  );
  $stmt->execute([$email]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  
  // Verificar password
  if($user && 
     password_verify($password, $user['password'])) {
    // Login com sucesso - criar sessão

// Sucesso: guardar dados na sessão
  $_SESSION['username']  = $user['username'];
  $_SESSION['user_type'] = $user['user_type'];
  
  // Redirecionar para dashboard
  // var_dump('logado!');
  // die();
  header('Location: ../pages/dashboard.php');
  exit;
  
} else {
  $erro = "Credenciais inválidas!";
}
}
?>