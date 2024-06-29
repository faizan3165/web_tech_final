<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="card bg-dark-subtle mt-5 rounded-5 form">
            <div class="card-body">
                <div class="card-title text-center mb-4 d-flex justify-content-center">
                    <h4 class="bg-white rounded-pill p-2">Add Todo</h4>
                </div>

                <form action="/web_tech_final/src/scripts/add_todo.php" method="POST">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="title" id="title" class="form-control text-white" required />
                        <label class="form-label" for="title">Title</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea class="form-control text-white" name="task" id="task" rows="4" required></textarea>
                        <label class="form-label" for="task">Task</label>
                    </div>

                    <button data-mdb-ripple-init type="submit" name="add_todo"
                        class="btn btn-primary btn-block mb-4">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>