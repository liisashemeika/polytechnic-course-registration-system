<?php require_once 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>PCRS System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/MiniProject2_Group2/assets/css/style.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark custom-nav px-3">
    <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="/MiniProject2_Group2/assets/img/logo.png" class="logo me-2">
        <b>PCRS System</b>
    </a>

    <div class="ms-auto">
        <?php if(isset($_SESSION['user'])): ?>
            <a href="/MiniProject2_Group2/auth/logout.php" class="btn btn-danger btn-sm">Logout</a>
        <?php endif; ?>
    </div>
</nav>

<div class="container mt-4">