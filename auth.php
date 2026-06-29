<?php
session_start();
header('Content-Type: application/json');

$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'DB Connection Failed']);
    exit;
}

$action = $_POST['action'] ?? '';

// --- LOGIN ---
if ($action === 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(['status' => 'error_not_found']);
    } elseif (password_verify($password, $user['password'])) {
        // SET SESSION DATA
        $_SESSION['user_name'] = $user['name'];
        echo json_encode(['status' => 'success', 'name' => $user['name']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Wrong password!']);
    }
}

// --- SIGNUP ---
if ($action === 'signup') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);
        
        // AUTO-LOGIN AFTER SIGNUP
        $_SESSION['user_name'] = $name;
        echo json_encode(['status' => 'success', 'name' => $name]);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Email already exists!']);
    }
}
?>
