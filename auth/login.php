<?php
require_once '../includes/db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        // SAVE USER IN SESSION
        $_SESSION['user'] = $user;

        // REDIRECT BASED ON ROLE
        if ($user['role'] == 'admin') {
            header("Location: ../admin/dashboard.php");
            exit;
        } else {
            header("Location: ../student/dashboard.php");
            exit;
        }

    } else {
        $error = "Invalid email or password!";
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="card p-4 login-box mt-5">
    <h3 class="text-center mb-3">Login</h3>

    <form method="POST">
        <input name="email" class="form-control mb-3" placeholder="Email" required>

        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

        <button class="btn btn-primary w-100">Login</button>
    </form>

    <p class="text-danger text-center mt-2"><?= $error ?></p>

    <div class="text-center">
        <a href="register.php">Create account</a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>