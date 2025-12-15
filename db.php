<?php
$conn = new PDO(
 "pgsql:host=".getenv("DB_HOST").";port=5432;dbname=".getenv("DB_NAME"),
 getenv("DB_USER"),
 getenv("DB_PASS"),
 [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
?>
