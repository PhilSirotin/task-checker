<?php
session_start();

$task = "";
if (isset($_POST['task'])){
  $task = $_POST['task'];
  $task = trim($task);
  if ($task == "") {
    echo 'Enter the task';
  } else {
    if(!isset($_SESSION['tasks']) || !is_array($_SESSION['tasks'])){
      $_SESSION['tasks'] = [];
    }
     $_SESSION['tasks'][] = $task;
      header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
  }
} else {
  echo "The field did not arrive";
}

// session_destroy();
// unset($_SESSION['tasks']);
?>



<h1> Мои задачи </h1>
<form method="post" action="">
  <label for="task">Задача</label>
  <input 
        type="text" 
        id="task" 
        name="task" 
        value="<?php echo htmlspecialchars($task, ENT_QUOTES, 'UTF-8'); ?>"
        >
  <button type="submit">Добавить</button>
</form>

  <ul> 
<?php
    foreach(($_SESSION['tasks'] ?? []) as $item) {
        echo '<li>' . htmlspecialchars($item, ENT_QUOTES, 'UTF-8') . '</li>'; 
    }
?>
</ul>