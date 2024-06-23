<?php include __DIR__ . '/../src/scripts/fetch_todos.php' ?>

<div class="row">
    <?php foreach ($todos as $todo): ?>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 p-3">
            <div class="card bg-dark-subtle text-white">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($todo['title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($todo['description']); ?></p>
                </div>

                <div class="card-footer d-flex justify-content-space-between">
                    <a href="/project/src/scripts/complete_todo.php?id=<?php echo $todo["id"] ?>"
                        class="btn complete-btn card-link"><i class="fa-solid fa-check"></i></a>

                    <a href="/project/views/pages/edit.php?id=<?php echo $todo["id"] ?>"
                        class="btn edit-btn card-link"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a href="/project/src/scripts/delete_todo.php?id=<?php echo $todo["id"] ?>"
                        class="btn delete-btn card-link"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>