<?php
require_once '../includes/db.php';
session_start();

$user = $_SESSION['user'];
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-4">

<div class="card shadow p-4 text-center" style="border-radius:20px;">

    <h3>Student Profile</h3>

    <hr>

    <h5>Name: <?= $user['name'] ?></h5>
    <p>Email: <?= $user['email'] ?></p>

    <span class="badge bg-primary p-2">Matrix: <?= $user['matrix_no'] ?></span>
    <span class="badge bg-success p-2">Diploma: <?= $user['diploma'] ?></span>

</div>

</div>

<?php include '../includes/footer.php'; ?>