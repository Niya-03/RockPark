<?php
session_start();
require_once "../db.php";

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    echo json_encode(['status' => 'error', 'message' => 'Моля, попълнете всички полета!']);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($user = $result->fetch_assoc()){
    if(password_verify($password, $user['password'])){
        $_SESSION['username'] = $user['name'];
        $_SESSION['user_id'] = $user['id'];

        echo json_encode(['status' => 'success', 'message' => 'Добре дошъл!']);
        exit;
    }else{
        echo json_encode(['status' => 'error', 'message' => 'Грешни данни за вход!']);
        exit;
    }
}else {
    echo json_encode(['status' => 'error', 'message' => 'Грешни данни за вход!']);
    exit;
}

?>