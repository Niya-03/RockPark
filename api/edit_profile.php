<?php
session_start();
require_once "../db.php";

$userId = $_SESSION['user_id'];

$editName = $_POST['editName'] ?? '';
$editEmail = $_POST['editEmail'] ?? '';
$editPhone = $_POST['editPhone'] ?? '';
$currentPass = $_POST['currentPass'] ?? '';
$newPass = $_POST['newPass'] ?? '';
$reNewPass = $_POST['reNewPass'] ?? '';

if (empty($editName) || empty($editEmail) || empty($editPhone)) {
    echo json_encode(['status' => 'error', 'message' => 'Моля, попълнете всички полета!']);
    exit;
}

if (!empty($currentPass)) {
    if (empty($newPass) || empty($reNewPass)) {
        echo json_encode(['status' => 'error', 'message' => 'Моля, попълнете всички полета за нова парола!']);
        exit;
    }
}

if (empty($currentPass)) {
    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->bind_param('ssss', $editName, $editEmail, $editPhone, $userId);
} else {
    if ($newPass != $reNewPass) {
        echo json_encode(['status' => 'error', 'message' => 'Паролите не съвпадат!']);
        exit;
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($currentPass, $user['password'])) {
            $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, phone = ?, password = ? WHERE id = ?");
            $stmt->bind_param('sssss', $editName, $editEmail, $editPhone, $hashedPass, $userId);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Грешна парола!']);
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Възникна грешка при редактирането!']);
        exit;
    }
}


if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Успешно редактиране!']);
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => 'Възникна грешка при редактирането!']);
    exit;
}
