<?php
session_start();
require_once 'config.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = trim($_POST['email']);
    $full_name = trim($_POST['full_name']);
    $phone = trim($_POST['phone']);

    // Validation
    if (empty($username) || empty($password) || empty($email) || empty($full_name)) {
        $error = "All required fields must be filled out";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long";
    } else {
        try {
            // Check if username already exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->execute([$username]);
            if ($stmt->rowCount() > 0) {
                $error = "Username already exists";
            } else {
                // Check if email already exists
                $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);
                if ($stmt->rowCount() > 0) {
                    $error = "Email already exists";
                } else {
                    // Insert new user
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $pdo->prepare("INSERT INTO users (username, password, email, full_name, phone) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$username, $hashed_password, $email, $full_name, $phone]);
                    
                    $success = "Registration successful! You can now login.";
                    // Redirect to login page after 2 seconds
                    header("refresh:2;url=user_login.php");
                }
            }
        } catch(PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Udupi Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/udupi-bg.jpg');
            background-size: cover;
            background-position: center;
            padding: 2rem 0;
        }
        .register-card {
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .register-header h2 {
            color: #333;
            font-weight: 600;
        }
        .form-control {
            padding: 0.75rem;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.9);
        }
        .btn-register {
            padding: 0.75rem;
            font-weight: 500;
        }
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <h2>Create an Account</h2>
                <p class="text-muted">Join Udupi Tourism</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username*</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email*</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name*</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password*</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <small class="text-muted">Minimum 6 characters</small>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password*</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 btn-register">Register</button>
            </form>

            <div class="login-link">
                <p>Already have an account? <a href="user_login.php">Login here</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 