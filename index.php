<?php
if (isset($_POST['task'])){
  $task = $_POST['task'];
  $task = trim($task);
  if ($task == "") {
    echo 'Enter the task';
  } else {
    echo 'Data take';
  }
} else {
  echo "Поле не пришло";
}
?>



<h1> Мои задачи </h1>
<form method="post" action="">
  <label for="task">Задача</label>
  <input type="text" id="task" name="task">
  <button type="submit">Добавить</button>
</form>