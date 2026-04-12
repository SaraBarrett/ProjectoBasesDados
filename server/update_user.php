<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $pdo->prepare(
    "UPDATE users 
     SET username = ?, 
         email = ?, 
         user_type = ? 
     WHERE id = ?"
  );
  
  $stmt->execute([
    $_POST['username'],
    $_POST['email'],
    $_POST['user_type'],
     $_POST['id'],
  ]);
  
  header('Location: ../pages/users.php');
}
?>