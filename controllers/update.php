<?php
include("../core/sqlActions.php");

include("../inc/header.php");

include("../core/sanitization.php");

$target_task = '';

foreach (get_tasks() as $task) {
    if ($task["id"] == $_GET['id']) {
        $target_task = $task;
    }
}

include('../views/updated_form.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
    }

    $current_timestamp = date('Y:m:d H:i:s', strtotime('+1'));

    update_tasks($updated_title, $updated_desc, $_GET['id'], $current_timestamp);

    header('location:all_tasks.php');
}
