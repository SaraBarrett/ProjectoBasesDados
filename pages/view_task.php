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

        $data = $pdo->query(
        "SELECT id, username FROM users"
        );
        $users = $data->fetchAll();
        
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
    <?php 
      include('navbar.php');
  ?>
    <form method="POST" action="../server/update_task.php">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
  <label>Título Tarefa:</label>
  <input type="text" name="title"
         required minlength="3" value="<?= $task['title'] ?>">
         <br>
 
  <label>Descrição:</label>
  <input type="description" name="description" value="<?= $task['description'] ?>">
   <br>
 
  <label>Estado:</label>
  <select name="status">
      <option value="">Seleccione uma opção:</option>
    <option value="0" <?= $task['status'] ==0? 'selected': '' ?> >Não concluído</option>
    <option value="1" <?= $task['status'] ==1? 'selected': '' ?> >Concluído</option>
  </select>
   <br>
 
   <label>Quem vai realizar:</label>
  <select name="user_id">
    <option value="user">Seleciona um user</option>
      <?php foreach($users as $user): ?>
    <option <?= $task['user_id'] ==$user['id']? 'selected': '' ?> value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
      <?php endforeach; ?>
  </select>
    

   <br>
 
  <button type="submit">Actualizar tarefa</button>
</form>
</body>
</html>