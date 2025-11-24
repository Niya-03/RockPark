<?php
session_start();
require_once "../db.php";

$userId = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT date, start_time, end_time, r.name, res.id FROM reservations res JOIN rooms r ON res.room_id = r.id WHERE res.user_id = ? ORDER BY date DESC, start_time ASC");
$stmt->bind_param('s', $userId);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0)
{
    echo "<div class='alert text-center fw-semibold'>Нямате резервации.</div>";
    exit;
}

while ($row = $result->fetch_assoc()) {
    echo "<div class='mb-2 mt-2 border border-2 p-2 rounded-2 border-black reservation-row'>";
    echo "<div class='container pt-2'>";
    echo "<div class='row'>";
    echo "<div class='col col-12'>";
    echo "<div class='h5'>Стая: {$row['name']}</div>";
    echo "<div class='h5'>Дата: {$row['date']}</div>";
    echo "<div class='h5'>Час: {$row['start_time']} - {$row['end_time']}</div>";
    echo "</div>";
    echo "<div class='col col-12 text-center mt-2'>";
    echo "<button class='btn btn-danger deleteReservationBtn' data-id='{$row['id']}'>Отменете резервация</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

?>
