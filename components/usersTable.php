<?php include __DIR__ . '/../src/scripts/fetchAllUsers.php' ?>

<table class="table table-dark align-middle mb-0 bg-white table-responsive table-striped table-bordered">
    <thead class="bg-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Todo's</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <p class="fw-normal mb-1"><?php echo $user['id'] ?></p>

                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo $user['profile_picture']; ?> alt=" pfp" style="width: 45px; height: 45px"
                            class="rounded-circle" />

                        <div class="ms-3">
                            <p class="fw-bold mb-1"><?php echo htmlspecialchars($user['username']); ?></p>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($user['email']); ?></p>
                        </div>
                    </div>
                </td>

                <td>
                    <?php if ($user['isAdmin']): ?>
                        <span class="badge badge-success rounded-pill d-inline">Admin</span>
                    <?php else: ?>
                        <span class="badge badge-warning rounded-pill d-inline">User</span>
                    <?php endif; ?>
                </td>

                <td>
                    <p class="fw-normal mb-1"><?php echo $user['todo_count'] ?></p>
                </td>

                <td>
                    <?php if ($_SESSION['user_id'] != $user['id']): ?>
                        <a href="/web_tech_final/src/scripts/delete_user.php?id=<?php echo $user["id"] ?>" class="delete-btn"><i
                                class="fa-solid fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>