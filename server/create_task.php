<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $status = $_POST['status'];
   $user_id = $_POST['user_id'];

  $stmt = $pdo->prepare(
      "INSERT INTO tasks 
       (title, description, status, user_id) 
       VALUES (?, ?, ?, ?)"
    );
    
    $stmt->execute([
      $title, $description, $status, $user_id
    ]);
    
    header('Location: ../pages/tasks.php');
}