<?php include __DIR__ . '/../src/scripts/fetchAllTodos.php' ?>

<table class="table table-dark align-middle mb-0 bg-white table-responsive table-striped table-bordered mb-5">
    <thead class="bg-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Status</th>
            <th>Task</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($todos as $todo): ?>
            <tr>
                <td>
                    <p class="fw-normal mb-1"><?php echo $todo['id'] ?></p>

                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <img src="/web_tech_final/uploads/<?php echo $_SESSION['profile_picture']; ?>" alt="" style="width: 45px; height: 45px"
                            class="rounded-circle" />

                        <div class="ms-3">
                            <p class="fw-bold mb-1"><?php echo htmlspecialchars($todo['title']); ?></p>
                            <p class="text-muted mb-0">By - <?php echo htmlspecialchars($todo['author_name']); ?></p>
                        </div>
                    </div>
                </td>

                <td>
                    <?php if ($todo['is_completed']): ?>
                        <span class="badge badge-success rounded-pill d-inline">Completed</span>
                    <?php else: ?>
                        <span class="badge badge-primary rounded-pill d-inline">In-Complete</span>
                    <?php endif; ?>
                </td>

                <td>
                    <p class="fw-normal mb-1"><?php echo $todo['description'] ?></p>
                </td>

                <td>
                    <a href="/web_tech_final/src/scripts/delete_todo.php?id=<?php echo $todo["id"] ?>" class="delete-btn"><i
                            class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>