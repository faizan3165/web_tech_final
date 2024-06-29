<!-- import html document starting layout -->
<?php include './views/partials/head.php';

// include __DIR__ . '/./src/scripts/show_message.php';

if (isset($_SESSION['msg']) && isset($_SESSION['type'])) {
    showAlert($_SESSION['type'], $_SESSION['msg']);
    unset($_SESSION['type']);
    unset($_SESSION['msg']);
}

include './views/pages/home.php';

include './views/partials/foot.php';
?>