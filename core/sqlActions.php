<?php

function create_database($host, $user, $password)
{
    $conn = mysqli_connect($host, $user, $password);

    $create_database = "CREATE DATABASE IF NOT EXISTS `tasks`";

    return mysqli_query($conn, $create_database);
}


function connect_to_database()
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'tasks';

    create_database($host, $user, $password);


    $connect = mysqli_connect($host, $user, $password, $database);

    return $connect;
}

function createTable()
{

    // task table pattern
    $table = "CREATE TABLE IF NOT EXISTS `my_tasks` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ts_title VARCHAR(100) NOT NULL,
        ts_desc TEXT NOT NULL,
        created_at VARCHAR(50) NOT NULL 
    )";

    return mysqli_query(connect_to_database(), $table);
}

function insertTask($title, $desc)
{
    // Set the correct timezone
    date_default_timezone_set('Africa/Cairo');
    $created_at = date('Y:m:d H:i:s', strtotime('+1'));


    $newTask = "INSERT INTO `my_tasks` (`ts_title`, `ts_desc`, `created_at`) VALUES ('$title', '$desc', '$created_at')";

    return mysqli_query(connect_to_database(), $newTask);
}


function get_tasks()
{
    $tasks = "SELECT * FROM `my_tasks`";

    $all_tasks =  mysqli_query(connect_to_database(), $tasks);

    $tasksArray = [];

    if ($all_tasks) {
        while ($task = mysqli_fetch_array($all_tasks)) {
            $tasksArray[] = $task;
        }
    }

    return $tasksArray;
}

function update_tasks($edited_title, $edited_desc, $task_id, $current_timestamp)
{
    $edited_task = "UPDATE `my_tasks` SET `ts_title` = '$edited_title', `ts_desc` = '$edited_desc', `created_at` = '$current_timestamp' WHERE `id` = $task_id";

    $edited_task =  mysqli_query(connect_to_database(), $edited_task);

    if ($edited_task) {
        return $edited_task;
    }
}

function delete_tasks($task_id)
{
    $deleted = "DELETE FROM `my_tasks` WHERE `id` = $task_id";

    $deleted =  mysqli_query(connect_to_database(), $deleted);
    
    return $deleted;
}


function timeHandler($created)
{
    $created_timestamp = strtotime($created);

    $current_timestamp = date('Y:m:d H:i:s', strtotime('+1'));

    $current_timestamp = strtotime($current_timestamp);

    $time_difference = $current_timestamp - $created_timestamp;

    $hours = floor($time_difference / 3600);

    $minutes = floor($time_difference / 60);

    if ($hours > 0) {
        return $hours . 'hr';
    } else {
        return $minutes . 'mt';
    }
}
