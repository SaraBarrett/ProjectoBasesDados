<?php
require_once 'config.php';

$id = $_GET['id'];


// Apagar user e suas tarefas (FK CASCADE)
$stmt = $pdo->prepare(
  "DELETE FROM tasks WHERE id = ?"
);
$stmt->execute([$id]);

echo "Tarefa apagado com sucesso!";
header('Location: ../pages/tasks.php');
?>