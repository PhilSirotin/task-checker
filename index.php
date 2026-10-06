<?php
session_start();


if (isset($_POST['delete_index'])) {
  $delete_index = $_POST['delete_index'];
  if (isset($_SESSION['tasks']) && is_array($_SESSION['tasks'])) {
    if (array_key_exists($delete_index, $_SESSION['tasks'])) {
      
      unset($_SESSION['tasks'][$delete_index]);
      $_SESSION['tasks'] = array_values($_SESSION['tasks']);
    }
  }
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

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
foreach (($_SESSION['tasks'] ?? []) as $index => $item) {
    echo '<li>' . ($index + 1) . ' - '
        . htmlspecialchars($item, ENT_QUOTES, 'UTF-8')
        . '<form method="post" action="">'
        . '<input type="hidden" name="delete_index" value="' . $index . '">'
        . '<button type="submit">Удалить</button>'
        . '</form></li>';
}
?>  


</ul>