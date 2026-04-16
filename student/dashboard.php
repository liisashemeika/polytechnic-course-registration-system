<?php
require_once '../includes/auth.php';
check_role('student');
?>

<?php include '../includes/header.php'; ?>

<h2 class="mb-4">Student Dashboard</h2>

<div class="row">

    <div class="col-md-4">
        <div class="card p-3 text-center">
            <h5>Available Courses</h5>
            <a href="courses.php" class="btn btn-primary mt-2">View</a>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>