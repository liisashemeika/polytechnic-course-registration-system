<?php
require_once '../includes/db.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM courses WHERE id='$id'");

header("Location: dashboard.php");