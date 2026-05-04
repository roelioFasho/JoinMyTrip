<?php
$conn = new PDO("mysql:host=localhost;dbname=trip_db", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>