<?php
// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['admin_id']);
}

// Check if user is admin
function isAdmin() {
    return isset($_SESSION['admin_id']) && isset($_SESSION['admin_role']) && $_SESSION['admin_role'] === 'admin';
}

// Require admin login
function requireAdmin() {
    if (!isAdmin()) {
        header('Location: ../login.php');
        exit();
    }
}

// Redirect to login if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

// Get current admin user
function getCurrentAdmin() {
    global $pdo;
    if (isLoggedIn()) {
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE id = ?");
        $stmt->execute([$_SESSION['admin_id']]);
        return $stmt->fetch();
    }
    return null;
}
?> 