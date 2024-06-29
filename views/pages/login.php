<?php include '../partials/head.php' ?>

<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="card bg-dark-subtle mt-5 rounded-5 form">
            <div class="card-body">
                <div class="card-title text-center mb-4 d-flex justify-content-center">
                    <h4 class="bg-white rounded-pill p-2">Login</h4>
                </div>

                <form action="../../src/scripts/signin.php" method="POST">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" name="email" id="email" class="form-control" />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" name="password" id="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                    </div>


                    <button data-mdb-ripple-init type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign
                        in</button>

                    <div class="text-center">
                        <p>Not a member? <a href="signup.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/foot.php' ?>