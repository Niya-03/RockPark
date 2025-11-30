<?php
session_start();
require_once "../db.php";

$reservationId = $_POST['deleteId'];

$stmt = $conn->prepare("SELECT id FROM reservations WHERE id = ?");
$stmt->bind_param('s', $reservationId);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows() == 0){
    echo json_encode(['status' => 'error', 'message' => 'Невалидно изтриване на несъществуваща резервация!']);
    exit;
}

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