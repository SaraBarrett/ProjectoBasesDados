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



<form method="POST" action="../server/create_task.php">
  <label>Título Tarefa:</label>
  <input type="text" name="title"
         required minlength="3">
         <br>
 
  <label>Descrição:</label>
  <input type="description" name="description">
   <br>
 
  <label>Estado:</label>
  <select name="status">
    <option value="0">Não concluído</option>
    <option value="1">Concluído</option>
  </select>
   <br>
 
   <label>Quem vai realizar:</label>
  <select name="user_id">
    <option value="user">Seleciona um user</option>
      <?php foreach($users as $user): ?>
    <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
      <?php endforeach; ?>
  </select>
    

   <br>
 
  <button type="submit">Criar tarefa</button>
</form>
   
</body>
</html>