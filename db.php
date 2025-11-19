<?php
$servername='localhost';
$username='root';
$password='';
$dbname = 'rock_park_db';
$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error)
    die('Грешка при свързване!');
?>