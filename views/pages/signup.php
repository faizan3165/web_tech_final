<?php include '../partials/head.php' ?>

<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="card bg-dark-subtle form mt-5 rounded-5">
            <div class="card-body">
                <div class="card-title text-center mb-4 d-flex justify-content-center">
                    <h4 class="bg-white rounded-pill w-25 p-1">Sign Up</h4>
                </div>

                <form action="../../src/scripts/register.php" method="POST">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" class="form-control text-white" id="profile_picture" name="profile_picture"
                            required />
                        <label class="form-label" for="profile_picture">Enter Profile Picture URL</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="username" class="form-control text-white" name="username" required />
                        <label class="form-label" for="username">User name</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="email" class="form-control text-white" name="email" required />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="password" class="form-control text-white" name="password" required />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <button data-mdb-ripple-init type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign
                        up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/foot.php' ?>