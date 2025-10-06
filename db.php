<?php
$host = "localhost";
$db   = "briglwxe_brightplan_db";
$user = "briglwxe_brightplan_user";
$pass = "Willow2269!";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
