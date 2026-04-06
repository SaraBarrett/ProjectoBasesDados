  <?php 
      include('../server/config.php');

      try {
        $data = $pdo->query(
        "SELECT id, username, email FROM users"
        );
        $users = $data->fetchAll();
        //var_dump($users);
  
    } catch(Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>utilizadores</title>
</head>
<body>

<h6>Olá, aqui tens uma lista de users</h6>

  <table>
  <tr>
    <th>ID</th><th>Username</th><th>Email</th>
   <th>Ações</th>
  </tr>
  <?php foreach($users as $user): ?>
  <tr>
    <td><?= $user['id'] ?></td>
    <td><?= htmlspecialchars($user['username']) ?></td>
    <td><?= htmlspecialchars($user['email']) ?></td>
    <td>
      <a href="view_user.php?id=<?= $user['id'] ?>">Ver / Editar</a>
    
      <a href="delete_user.php?id=<?= $user['id'] ?>"
            onclick="return confirm(
                'Tem certeza que quer apagar ?')"
            style="color: #ff4444;">
            Apagar
        </a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
    
</body>
</html>