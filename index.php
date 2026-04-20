  <?php 
      $password = '1245';
      $name='Sara';
      include('server/config.php');
      session_start();
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bases de dados para Web</title>
    <script src="js/apis.js" defer></script>
  </head>
  <body>

  <?= isset($_SESSION['username']) ? '<a href="server/logout.php">Logout</a> ': '<a href="pages/login.php">Login</a> | <a href="pages/form_user.php">Registo</a>' ?>

    <h4>Apis</h4>
    <button id="cat-fact">🙀</button>
    <button id="dog-image">🐶</button>
    <button id="rick-people">Personagens Rick e Morty</button>

    <p id="cat-info"></p>
    <img id="dog-image-info" src="" alt="" />
    <ul>
      <li><a href="pages/users.php">Página de Utilizadores</a></li>
      <li><a href="pages/tasks.php">Página de Tarefas</a></li>
    
  <li><a href="pages/form_user.php">Adicionar Utilizador</a></li>
    <li><a href="pages/form_task.php">Adicionar Tarefa</a></li>

    </ul>
  </body>
</html>
