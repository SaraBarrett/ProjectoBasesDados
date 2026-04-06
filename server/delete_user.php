<?php
require_once 'config.php';

$id = $_GET['id'];


// Apagar user e suas tarefas (FK CASCADE)
$stmt = $pdo->prepare(
  "DELETE FROM tasks WHERE user_id = ?"
);
$stmt->execute([$id]);

$stmt = $pdo->prepare(
  "DELETE FROM users WHERE id = ?"
);
$stmt->execute([$id]);
echo "User apagado com sucesso!";
header('Location: ../pages/users.php');
?>