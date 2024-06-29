<?php

function showAlert($alertType, $message)
{
    if (isset($_SESSION['msg']) && isset($_SESSION['type'])) {
        $alertType = $_SESSION['type'];
        $message = $_SESSION['msg'];
    }

    $iconClass = '';
    $alertClass = '';

    switch ($alertType) {
        case 'success':
            $iconClass = 'fas fa-check-circle';
            $alertClass = 'alert-success';
            break;

        case 'info':
            $iconClass = 'fas fa-info-circle';
            $alertClass = 'alert-info';
            break;

        case 'warning':
            $iconClass = 'fas fa-exclamation-triangle';
            $alertClass = 'alert-warning';
            break;

        case 'danger':
            $iconClass = 'fas fa-times-circle';
            $alertClass = 'alert-danger';
            break;

        default:
            $iconClass = 'fas fa-exclamation-circle';
            $alertClass = 'alert-primary';
            break;
    }

    echo '<div class="container d-flex justify-content-center align-items-center">';
    echo '<div class="alert ' . $alertClass . ' d-flex align-items-center alert-dismissible fade show form mt-5" role="alert">';
    echo '<i class="' . $iconClass . ' fa-fw me-2"></i>';
    echo '<div>' . htmlspecialchars($message) . '</div>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
    echo '</div>';
}