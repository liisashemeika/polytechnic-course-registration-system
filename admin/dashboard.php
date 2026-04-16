<?php
require_once '../includes/auth.php';
check_role('admin');
?>

<?php include '../includes/header.php'; ?>

<h2>Admin Dashboard</h2>

<a href="add_course.php" class="btn btn-success">Add Course</a>

<?php include '../includes/footer.php'; ?>