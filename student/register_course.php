<?php
require_once '../includes/auth.php';
check_role('student');
require_once '../includes/db.php';

$user_id = $_SESSION['user']['id'];
$course_id = $_POST['course_id'];

mysqli_query($conn, "INSERT INTO registrations(user_id,course_id)
VALUES('$user_id','$course_id')");

echo "Registered!";