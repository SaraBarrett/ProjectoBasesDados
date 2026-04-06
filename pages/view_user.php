<?php
include('../server/config.php');
$id = $_GET['id'];

$stmt = $pdo->prepare(
  "SELECT username, email, user_type, created_at FROM users WHERE id = ?"
);
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$user) {
  die('User não encontrado');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do User</title>
</head>
<body>

<h4>Ficha de Utilizador 👤</h4>
<p><b>Nome:</b> <?= $user['username'] ?> </p>
<p><b>Email:</b> <?= $user['email'] ?> </p>
<p><b>Criado em:</b> <?= $user['created_at'] ?> </p>
<p><b>Tipo de utilizador:</b> <?= $user['user_type'] ?> </p>

    
</body>
</html>