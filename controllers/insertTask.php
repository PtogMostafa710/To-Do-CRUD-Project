<?php
session_start();
include("../core/sqlActions.php");
include("../core/sanitization.php");
include("../core/session.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
    }


    $connect = connect_to_database();

    if (!$connect) {
        die('Error during Connection');
    }

    createTable();

    insertTask($title, $desc);

    session_set('success_add', 'Task Adding has Succeeded');

    header('location: ../views/all_tasks.php');
}
