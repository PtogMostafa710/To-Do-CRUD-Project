<!-- session_start() ==> to get stored data form session -->

<?php session_start(); ?>
<?php include("../core/session.php"); ?>

<!-- Require header navbar -->
<?php require_once('../inc/header.php') ?>

<div class="container-sm position-absolute top-50 start-50 translate-middle">
    <div class="row w-100">
        <div class="col-12">
            <h1>Add New Task</h1>

            <form action='../controllers/insertTask.php' method='POST' class='form-control border p-3 shadow-sm rounded'>

                <!-- Title Field -->
                <div class="mb-3">
                    <label for="t" class="form-label">Title:</label>
                    <input name='title' type="text" class="form-control" id="t"
                        placeholder="task title..." />
                </div>

                <!-- Description Field -->
                <div class="mb-3">
                    <label for="d" class="form-label">Description:</label>
                    <input name='desc' type="text" class="form-control" id="d"
                        placeholder="task description..." />
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>

        </div>
    </div>
</div>