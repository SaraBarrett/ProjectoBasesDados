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

<form method="POST" action="../server/update_user.php">
  <input type="hidden" value="<?= $id ?>" name="id">
        

  <label>Username:</label>
  <input type="text" value="<?= $user['username'] ?>" name="username" 
         required minlength="3">
         <br>
  
  <label>Email:</label>
  <input type="email" value="<?= $user['email'] ?>" name="email" required>
   <br>
  
 
  <label>Tipo User:</label>
  <select name="user_type">
    <option value="">Selecione o Tipo</option>
    <option value="user" <?= $user['user_type'] == 'user'? 'selected': ''?> >User Normal</option>
    <option value="admin" <?= $user['user_type'] == 'admin' ? 'selected': ''?>>Admin</option>
  </select>
   <br>
    <label>Criado em:</label>
  <input type="datetime" disabled value="<?= $user['created_at'] ?>">
   <br>

  <button type="submit">Actualizar User</button>
</form>
    
</body>
</html>