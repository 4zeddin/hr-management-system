<?php
session_start();
include 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        // Valid credentials, set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] === 'admin') {
            header('Location: /views/admin/dashboard.php');
        } elseif ($user['role'] === 'rh') {
            header('Location: /views/rh.php');
        } elseif ($user['role'] === 'employee') {
            header('Location: /views/employee.php');
        } else {
            header('Location: /views/login.php');
        }
        exit();

    } else {
        // Invalid credentials
        $_SESSION['error'] = 'Invalid email or password!';
        header('Location: views/login.php');
        exit();
    }
} else {
    header('Location: views/login.php');
    exit();
}
