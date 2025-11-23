<?php
session_start();
require_once "../db.php";

$room = $_POST['room'] ?? '';
$date = $_POST['date'] ?? '';


$stmt = $conn->prepare("SELECT HOUR(start_time) AS hour FROM reservations WHERE room_id = ? AND date = ?");
$stmt->bind_param("is", $room, $date);
$stmt->execute();
$res = $stmt->get_result();

$hours = [];
while ($row = $res->fetch_assoc()) {
    $hours[] = (int)$row['hour'];
}

echo json_encode(['status' => 'success', 'hours' => $hours]);
exit;
?>