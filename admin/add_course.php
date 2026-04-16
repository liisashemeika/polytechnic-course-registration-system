<?php
require_once '../includes/auth.php';
check_role('admin');
require_once '../includes/db.php';

if ($_POST) {
    $name = $_POST['name'];
    $code = $_POST['code'];

    mysqli_query($conn, "INSERT INTO courses(name,code)
    VALUES('$name','$code')");
}
?>

<?php include '../includes/header.php'; ?>

<h3>Add Course</h3>

<form method="POST">
<input name="name" class="form-control mb-2">
<input name="code" class="form-control mb-2">
<button class="btn btn-success">Add</button>
</form>

<?php include '../includes/footer.php'; ?>