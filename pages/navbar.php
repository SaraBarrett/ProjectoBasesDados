 <?php
//Fazer Login - Validar Credenciais
session_start();
?>

<?= isset($_SESSION['username']) ? '<a href="../server/logout.php">Logout</a> ': '<a href="login.php">Login</a> | <a href="form_user.php">Registo</a>' ?>
 