<div class="container-sm position-absolute top-50 start-50 translate-middle">
    <div class="row w-100">
        <div class="col-12">
            <h1>Update Task</h1>

            <form action='<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>&created_at=<?= $_GET['created_at'] ?>' method='POST' class='form-control border p-3 shadow-sm rounded'>
                <!-- Title Field -->
                <div class="mb-3">
                    <label for="t" class="form-label">Title:</label>
                    <input name='updated_title' type="text" class="form-control" id="t"
                        placeholder="task title..." value="<?= $target_task['ts_title'] ?>" />
                </div>

                <!-- Description Field -->
                <div class="mb-3">
                    <label for="d" class="form-label">Description:</label>
                    <input name='updated_desc' type="text" class="form-control" id="d"
                        placeholder="task description..." value="<?= $target_task['ts_desc'] ?>" />
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>

        </div>
    </div>
</div>
