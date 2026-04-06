  <?php 
      include('../server/config.php');

      try {
        $data = $pdo->query(
        "SELECT tasks.id, title, description, status, user_id, username FROM tasks
INNER JOIN users on tasks.user_id = users.id"
        );
        $tasks = $data->fetchAll();
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
    <title>Tarefas</title>
</head>
<body>
    <h5>Aqui vais ter todas as tarefas</h5>
    <table>
  <tr>
    <th>ID</th>
    <th>Título</th>
    <th>Descrição</th>
   <th>Estado</th>
   <th>User</th>
      <th>Acções</th>
  </tr>
  <?php foreach($tasks as $task): ?>
  <tr>
    <td><?= $task['id'] ?></td>
    <td><?= htmlspecialchars($task['title']) ?></td>
    <td><?= htmlspecialchars($task['description']) ?></td>
     <td><?= htmlspecialchars($task['status']) ?></td>
      <td><?= htmlspecialchars($task['username']) ?></td>
    <td>
      <a href="view_task.php?id=<?= $task['id'] ?>">Ver / Editar</a>
    
      <a href="../server/delete_task.php?id=<?= $task['id'] ?>"
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