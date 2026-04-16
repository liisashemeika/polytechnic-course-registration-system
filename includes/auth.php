<?php

function check_login() {
    if (!isset($_SESSION['user'])) {
        header("Location: ../auth/login.php");
        exit;
    }
}

function check_role($role) {
    check_login();
    if ($_SESSION['user']['role'] != $role) {
        die("Access denied");
    }
}