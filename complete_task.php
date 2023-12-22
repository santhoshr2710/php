<?php
// complete_task.php - Mark task as completed

// Check if task parameter is provided
if (isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];

    // Read tasks from file
    $tasks = file('tasks.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Mark task as completed
    foreach ($tasks as &$t) {
        if ($t === $task) {
            $t = '[x]' . $t;
            break;
        }
    }

    // Save updated tasks to file
    file_put_contents('tasks.txt', implode(PHP_EOL, $tasks));
}

// Redirect back to the main page
header('Location: index.php');
exit;
?>
