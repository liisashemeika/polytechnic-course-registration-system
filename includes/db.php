<?php
$conn = mysqli_connect("localhost", "root", "", "pcrs", "3307");

if (!$conn) {
    die("Connection failed");
}