<?php
session_start();

include("../core/sqlActions.php");
include("../core/session.php");


delete_tasks($_GET['id']);

session_set('success_delete', 'Task Deleted SuccessFully');


header('location: ../views/all_tasks.php');
