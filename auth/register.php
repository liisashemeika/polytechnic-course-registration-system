<?php
require_once '../includes/db.php';

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $matrix = $_POST['matrix'] ?? '';
    $diploma = $_POST['diploma'] ?? '';
    $pass = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if ($pass != $confirm) {
        $error = "Passwords do not match!";
    } else {

        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($check) > 0) {
            $error = "Email already exists!";
        } else {

            $hashed = password_hash($pass, PASSWORD_DEFAULT);

            mysqli_query($conn, "INSERT INTO users(name,email,password,role,matrix_no,diploma)
            VALUES('$name','$email','$hashed','student','$matrix','$diploma')");
            $success = "Registration successful! Redirecting to login...";

            echo "<script>
                setTimeout(function(){
                    window.location.href='login.php';
                }, 2000);
            </script>";
        }
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="container d-flex justify-content-center">

<div class="card shadow p-4 mt-4" style="width: 450px; border-radius: 20px;">

    <h3 class="text-center mb-3">Student Registration</h3>

    <!-- ALERTS -->
    <?php if($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <?php if($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">

        <div class="form-floating mb-2">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <label>Full Name</label>
        </div>

        <div class="form-floating mb-2">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <label>Email</label>
        </div>

        <div class="form-floating mb-2">
            <input type="text" name="matrix" class="form-control" placeholder="Matrix No" required>
            <label>Matrix Number</label>
        </div>

        <div class="form-floating mb-2">
            <input type="text" name="diploma" class="form-control" placeholder="Diploma" required>
            <label>Diploma Course</label>
        </div>

        <!-- PASSWORD -->
        <div class="form-floating mb-2 position-relative">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" onkeyup="checkStrength()" required>
            <label>Password</label>

            <span onclick="togglePassword()" style="position:absolute; right:15px; top:15px; cursor:pointer;">
                👁️
            </span>
        </div>

        <!-- STRENGTH BAR -->
        <div class="mb-3">
            <small id="strengthText">Password strength</small>
            <div class="progress">
                <div id="strengthBar" class="progress-bar" style="width:0%;"></div>
            </div>
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
            <label>Confirm Password</label>
        </div>

        <button class="btn btn-success w-100">Create Account</button>

    </form>

</div>

</div>

<!-- JS -->
<script>
function togglePassword() {
    let pass = document.getElementById("password");

    pass.type = (pass.type === "password") ? "text" : "password";
}

function checkStrength() {
    let pass = document.getElementById("password").value;
    let bar = document.getElementById("strengthBar");
    let text = document.getElementById("strengthText");

    let strength = 0;

    if (pass.length >= 6) strength++;
    if (pass.match(/[A-Z]/)) strength++;
    if (pass.match(/[0-9]/)) strength++;
    if (pass.match(/[^A-Za-z0-9]/)) strength++;

    if (strength == 0) {
        bar.style.width = "0%";
        bar.className = "progress-bar bg-danger";
        text.innerHTML = "Weak password";
    }
    else if (strength <= 2) {
        bar.style.width = "50%";
        bar.className = "progress-bar bg-warning";
        text.innerHTML = "Medium password";
    }
    else {
        bar.style.width = "100%";
        bar.className = "progress-bar bg-success";
        text.innerHTML = "Strong password";
    }
}
</script>

<?php include '../includes/footer.php'; ?>