  <?php 
      include('../server/config.php');

      try {
        $id = $_GET['id'];
        $stmt = $pdo->prepare(
        "SELECT tasks.id, title, description, status, user_id, username FROM tasks
        INNER JOIN users on tasks.user_id = users.id where tasks.id=?"
        );
        $stmt->execute([$id]);
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch(Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes de tarefa</title>
</head>
<body>
    <h4>Aqui tens uma tarefa</h4>
    <p><bold>Nome:</bold><?= $task['title'] ?></p>
    <p><bold>Descrição:</bold><?= $task['description'] ?></p>
    <p><bold>Estado:</bold><?= $task['status'] ?></p>
</body>
</html>