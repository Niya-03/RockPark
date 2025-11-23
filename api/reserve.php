<?php
session_start();
require_once "../db.php";
$room = $_POST['room'] ?? '';
$date = $_POST['date'] ?? '';
$hours = $_POST['hours'] ?? '';

if(empty($room) || empty($date) || empty($hours)){
    echo json_encode(['status' => 'error', 'message' => 'Моля, попълнете всички полета!']);
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("INSERT INTO reservations (user_id, room_id, date, start_time, end_time) VALUES (?, ?, ?, ?, ?)");

foreach($hours as $hour)
{
    $h = intval($hour);
    $start_time = sprintf('%02d:00:00', $h);
    $end_time = sprintf('%02d:00:00', $h + 1);
    $stmt->bind_param("sssss", $user_id, $room, $date, $start_time, $end_time);

    if (!$stmt->execute()) {
        echo json_encode(['status' => 'error', 'message' => 'Грешка при резервация за' . $h . ' часа!']);
        exit;
    }
}

echo json_encode(['status' => 'success', 'message' => 'Успешна резервация!']);
exit;

?>