<?php
include '../partials/head.php';
$todo_id = $_GET['id'];
include __DIR__ . '/../../src/scripts/fetch_todo.php';
?>

<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="card bg-dark-subtle mt-5 rounded-5 form">
            <div class="card-body">
                <div class="card-title text-center mb-4 d-flex justify-content-center">
                    <h4 class="bg-white rounded-pill p-2">Edit Todo</h4>
                </div>

                <form action="../../src/scripts/update_todo.php" method="POST">
                    <input type="hidden" name="todo_id" value="<?php echo htmlspecialchars($todo['id']); ?>">

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="title" id="title" class="form-control" required
                            value="<?php echo htmlspecialchars($todo['title']); ?>" />

                        <label class="form-label" for="title">Title</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea class="form-control" name="task" id="task" rows="4" required>
                            <?php echo htmlspecialchars($todo['task']); ?>
                        </textarea>
                        <label class="form-label" for="task">Task</label>
                    </div>

                    <button data-mdb-ripple-init type="submit" name="update_todo"
                        class="btn btn-primary btn-block mb-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/foot.php' ?>