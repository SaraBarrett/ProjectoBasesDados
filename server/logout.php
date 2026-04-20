<?php
session_start();

// Limpar variáveis da sessão
unset($_SESSION['username']);
unset($_SESSION['user_type']);

// Redirecionar para login
header('Location: ../index.php');
exit;

?>