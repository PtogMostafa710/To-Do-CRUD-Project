<?php session_start();?>
<?php include('../inc/header.php') ?>
<?php include('../core/sqlActions.php') ?>
<?php include('../core/sanitization.php') ?>
<?php include('../core/session.php') ?>

<div class="container-sm position-absolute top-50 start-50 translate-middle">
    <div class="row w-100">

        <?= alert_message('success_add', 'success') ?>

        <?= alert_message('success_delete', 'danger') ?>
        
        <?php unset($_SESSION['success_add']) ?>
        <?php unset($_SESSION['success_delete']) ?>
        
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Ago</th>
                <th>Update</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach (get_tasks() as $task): ?>
                    <tr>
                        <th><?php echo $i++ ?></th>
                        <th><?php echo $task['ts_title'] ?></th>
                        <td><?php echo $task['ts_desc'] ?></td>
                        <td><?php echo timeHandler($task['created_at']) . ' ago' ?></td>
                        <td><a class="btn btn-primary" href="../controllers/update.php?id=<?= $task['id'] ?>&created_at=<?= $task['created_at'] ?>">Update</a></td>
                        <td>
                            <a class="btn btn-danger" href="../controllers/delete.php?id=<?= $task['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>