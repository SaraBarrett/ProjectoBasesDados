<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash(
    $_POST['password'], PASSWORD_DEFAULT
  );
  $user_type = $_POST['user_type'];

  $stmt = $pdo->prepare(
      "INSERT INTO users 
       (username, email, password, user_type) 
       VALUES (?, ?, ?, ?)"
    );
    
    $stmt->execute([
      $username, $email, $password, $user_type
    ]);
    
    header('Location: ../pages/users.php');
}