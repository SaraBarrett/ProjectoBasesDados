<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $pdo->prepare(
    "UPDATE tasks 
     SET title = ?, 
         description = ?, 
         status = ?,
        user_id = ?
     WHERE id = ?"
  );
  
  $stmt->execute([
    $_POST['title'],
    $_POST['description'],
    $_POST['status'],
     $_POST['user_id'],
     $_POST['id']
  ]);
 
  header('Location: ../pages/tasks.php');
}
?>