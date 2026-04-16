<?php
require_once 'includes/db.php';

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: student/dashboard.php");
    }
} else {
    header("Location: auth/login.php");
}