<?php
require_once 'config.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = trim($_POST['email']);

    // Validate input
    if (empty($username) || empty($password) || empty($email)) {
        $error = "All fields are required";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long";
    } else {
        try {
            // Check if username already exists
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin_users WHERE username = ?");
            $stmt->execute([$username]);
            if ($stmt->fetchColumn() > 0) {
                $error = "Username already exists";
            } else {
                // Create new admin user
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO admin_users (username, password, email) VALUES (?, ?, ?)");
                $stmt->execute([$username, $hashed_password, $email]);
                
                // Redirect to login page with success message
                header("Location: login.php?created=true");
                exit();
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
    <title>Create Admin Account - Udupi Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .create-admin-container {
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            padding: 2rem 0;
        }
        .create-admin-card {
            width: 100%;
            max-width: 500px;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0,0,0,0.1);
            background: white;
        }
        .create-admin-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .create-admin-header h2 {
            color: #333;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .create-admin-header p {
            color: #6c757d;
            font-size: 1.1rem;
        }
        .form-control {
            padding: 0.875rem;
            border-radius: 8px;
            border: 1px solid #ced4da;
            font-size: 1rem;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .btn-create {
            padding: 0.875rem;
            font-weight: 500;
            font-size: 1.1rem;
            border-radius: 8px;
            margin-top: 1.5rem;
        }
        .back-to-login {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #dee2e6;
        }
        .back-to-login a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }
        .back-to-login a:hover {
            text-decoration: underline;
        }
        .form-text {
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }
        .alert {
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
        @media (max-width: 576px) {
            .create-admin-container {
                padding: 1rem;
            }
            .create-admin-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="create-admin-container">
        <div class="create-admin-card">
            <div class="create-admin-header">
                <h2>Create Admin Account</h2>
                <p class="text-muted">Fill in the details to create a new admin account</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="form-text">Password must be at least 6 characters long</div>
                </div>

                <div class="mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 btn-create">Create Account</button>
            </form>

            <div class="back-to-login">
                <p>Already have an account? <a href="login.php">Back to login</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 