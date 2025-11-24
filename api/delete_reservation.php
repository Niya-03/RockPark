<?php
session_start();
require_once "../db.php";

$reservationId = $_POST['deleteId'];

$stmt = $conn->prepare("DELETE FROM reservations WHERE id = ?");
$stmt->bind_param('s', $reservationId);


if($stmt->execute())
{
    echo json_encode(['status' => 'success', 'message' => 'Успешно изтриване!']);
    exit;
}else{
    echo json_encode(['status' => 'error', 'message' => 'Възникна грешка при изтриването!']);
    exit;
}

?>