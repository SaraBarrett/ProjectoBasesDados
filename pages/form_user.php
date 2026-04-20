<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário User</title>
</head>
<body>
    <?php 
      include('navbar.php');
  ?>
    <h4>Adicionar User</h4>

<form method="POST" action="../server/create_user.php">
  <label>Username:</label>
  <input type="text" name="username" 
         required minlength="3">
         <br>
  
  <label>Email:</label>
  <input type="email" name="email" required>
   <br>
  
  <label>Password:</label>
  <input type="password" name="password" 
         required minlength="6">
   <br>
  
<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin'): ?>
    <label>Tipo User:</label>
    <select name="user_type">
        <option value="user">User Normal</option>
        <option value="admin">Admin</option>
    </select>
<?php endif; ?>
   <br>
  
  <button type="submit">Criar User</button>
</form>
    
</body>
</html>