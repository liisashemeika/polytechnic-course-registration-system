<?php
require_once '../includes/auth.php';
check_role('student');
require_once '../includes/db.php';

$result = mysqli_query($conn, "SELECT * FROM courses");
?>

<?php include '../includes/header.php'; ?>

<div class="card p-3">
    <h3 class="mb-3">Courses List</h3>

<table class="table table-bordered">
<tr>
<th>Name</th>
<th>Code</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['code'] ?></td>
<td>
<button class="btn btn-primary regBtn" data-id="<?= $row['id'] ?>">Register</button>
</td>
</tr>
<?php endwhile; ?>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(".regBtn").click(function(){
    let id = $(this).data("id");

    $.post("register_course.php", {course_id:id}, function(res){
        alert(res);
    });
});
</script>

<?php include '../includes/footer.php'; ?>