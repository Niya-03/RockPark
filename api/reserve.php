<?php
session_start();
require_once "../db.php";
$room = $_POST['room'] ?? '';
$date = $_POST['date'] ?? '';
$hours = $_POST['hours'] ?? '';

if (empty($room) || empty($date) || empty($hours)) {
    echo json_encode(['status' => 'error', 'message' => 'Моля, попълнете всички полета!']);
    exit;
}

$user_id = $_SESSION['user_id'];
$successfulReservations = [];
$message = '';

foreach ($hours as $hour) {
    $h = intval($hour);
    $start_time = sprintf('%02d:00:00', $h);
    $end_time = sprintf('%02d:00:00', $h + 1);

    $stmt = $conn->prepare("SELECT * FROM reservations WHERE room_id = ? AND date = ? AND start_time = ?");
    $stmt->bind_param("sss", $room, $date, $start_time);

    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows > 0) {

            if (count($successfulReservations) > 0) {
                $successMessage = implode(', ', $successfulReservations);
                $message = 'Стаята е заета за ' . $date . ' в ' . $h . ' часа!' . ' Успешни резервации за ' . $successMessage . ' часа';
            } else {
                $message = 'Стаята е заета за ' . $date . ' в ' . $h . ' часа!';
            }

            echo json_encode(['status' => 'error', 'message' => $message]);
            exit;
        }
    } else {

        if (count($successfulReservations) > 0) {
            $successMessage = implode(', ', $successfulReservations);
            $message = 'Грешка при резервация за ' . $h . ' часа!' . ' Успешни резервации за ' . $successMessage . ' часа';
        } else {
            $message = 'Грешка при резервация за ' . $h . ' часа!';
        }
        echo json_encode(['status' => 'error', 'message' => $message]);
        exit;
    }


    $stmt = $conn->prepare("INSERT INTO reservations (user_id, room_id, date, start_time, end_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $user_id, $room, $date, $start_time, $end_time);

    if (!$stmt->execute()) {

        if (count($successfulReservations) > 0) {
            $successMessage = implode(', ', $successfulReservations);
            $message = 'Грешка при резервация за ' . $h . ' часа!' . ' Успешни резервации за ' . $successMessage . ' часа';
        } else {
            $message = 'Грешка при резервация за ' . $h . ' часа!';
        }
        echo json_encode(['status' => 'error', 'message' => $message]);
        exit;
    }

    array_push($successfulReservations, $start_time);
}

echo json_encode(['status' => 'success', 'message' => 'Успешна резервация!']);
exit;
