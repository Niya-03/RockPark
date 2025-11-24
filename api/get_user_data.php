<?php
session_start();
require_once "../db.php";

$userId = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT name, email, phone FROM users WHERE id = ?");
$stmt->bind_param("s", $userId);
$stmt->execute();
$res = $stmt->get_result();

if ($user = $res->fetch_assoc()) {
    echo json_encode(['status' => 'success', 'user' => $user]);
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => 'Грешка при зареждане!']);
    exit;
}
