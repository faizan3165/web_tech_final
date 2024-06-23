<?php include '../partials/head.php' ?>

<div class="container">
    <h1 class="display-2 text-white text-center my-5">Admin Panel</h1>

    <ul class="nav nav-tabs nav-fill mb-3 bg-dark-subtle text-white" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a data-mdb-tab-init class="nav-link active" id="user-tab" href="#users" role="tab" aria-controls="users"
                aria-selected="true">Users</a>
        </li>

        <li class="nav-item" role="presentation">
            <a data-mdb-tab-init class="nav-link" id="todo-tab" href="#todos" role="tab" aria-controls="todos"
                aria-selected="false">Todo's</a>
        </li>
    </ul>

    <div class="tab-content" id="ex2-content">
        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="user-tab">
            <?php include __DIR__ . '/../../components/usersTable.php' ?>
        </div>

        <div class="tab-pane fade" id="todos" role="tabpanel" aria-labelledby="todo-tab">
            <?php include __DIR__ . '/../../components/todosTable.php' ?>
        </div>

    </div>
</div>

<?php include '../partials/foot.php' ?>