<?php
require_once '../includes/db.php';
session_start();

$result = mysqli_query($conn, "SELECT * FROM users WHERE role='student'");
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-4">

<h3 class="mb-3">Student List</h3>

<div class="card shadow p-3" style="border-radius:20px;">

<table class="table table-hover">

<thead class="table-dark">
<tr>
<th>Name</th>
<th>Email</th>
<th>Matrix</th>
<th>Diploma</th>
</tr>
</thead>

<tbody>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['email'] ?></td>
<td><span class="badge bg-primary"><?= $row['matrix_no'] ?></span></td>
<td><span class="badge bg-success"><?= $row['diploma'] ?></span></td>
</tr>
<?php endwhile; ?>
</tbody>

</table>

</div>

</div>

<?php include '../includes/footer.php'; ?>