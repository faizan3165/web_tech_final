<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-bottom-3 shadow-lg">
    <div class="container-fluid">
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="/project">
                <img src="assets/icon.png" class="icon" alt="Logo" loading="lazy" />
            </a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['user_id']) && $_SESSION['isAdmin'] && $_SESSION['isAdmin'] === true): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/project/views/pages/adminPanel.php">Admin Panel</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="d-flex align-items-center">
            <?php
            if (!isset($_SESSION['user_id'])) {
                ?>
                <a href="/project/views/pages/login.php" class="mx-3 btn-floating" data-mdb-ripple-init
                    data-mdb-tooltip-init data-mdb-placement="bottom" title="Login">
                    <i class="fa-solid fa-user"></i>
                </a>
            <?php } else { ?>
                <div class="dropdown">
                    <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center " href="#"
                        id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                        <img src="uploads/<?php echo $_SESSION['profile_picture']; ?>" class="rounded-circle" height="30"
                            width="30" alt="Profile Picture" />
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="/project/src/scripts/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            <?php } ?>

        </div>
    </div>
</nav>