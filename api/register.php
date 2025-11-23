<?php
session_start();
require_once "../db.php";
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';
$repPassword = $_POST['repPassword'] ?? '';

if(empty($username) || empty($email) || empty($phone) || empty($password) || empty($repPassword)){
    echo json_encode(['status' => 'error', 'message' => 'Моля, попълнете всички полета!']);
    exit;
}

if($password != $repPassword){
    echo json_encode(['status' => 'error', 'message' => 'Паролите не съвпадат!']);
    exit;
}

$check_recaptcha = $_POST["recaptcha"];
$secretKey = '6Lf8rBEsAAAAAOR3uyHgeD-Tvh-9d9GTZkJULK-E';
$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$check_recaptcha}");
$response = json_decode($verify);

if(!$response->success)
{
    echo json_encode(['status' => 'error', 'message' => 'Моля потвърдете, че не сте робот!']);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    echo json_encode(['status' => 'error', 'message' => 'Съществува потребител с този имейл!']);
    exit;
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $email, $phone ,$passwordHash);

if($stmt->execute())
{
    $_SESSION['username'] = $username;
    echo json_encode(['status' => 'success', 'message' => 'Успешна регистрация!']);
    exit;
}
else
{
    echo json_encode(['status' => 'error', 'message' => 'Възникна грешка при регистрация!']);
    exit;
}
?>