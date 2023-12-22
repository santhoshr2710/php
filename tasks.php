<?php
// tasks.php - Display tasks and handle task updates

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new task
    if (isset($_POST['task']) && !empty($_POST['task'])) {
        $task = $_POST['task'];
        file_put_contents('tasks.txt', $task . PHP_EOL, FILE_APPEND);
    }
}

// Read tasks from file
$tasks = file('tasks.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Display tasks
foreach ($tasks as $task) {
    echo '<li><input type="checkbox" onclick="window.location.href=\'complete_task.php?task=' . urlencode($task) . '\'" /> ';
    echo '<span class="' . (strpos($task, '[x]') === 0 ? 'completed' : '') . '">' . htmlspecialchars(substr($task, 3)) . '</span></li>';
}
?>
