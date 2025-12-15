<?php
require 'auth.php';
require 'db.php';

if (!is_super()) {
    die("Access denied");
}

$conn->query("UPDATE users SET bandwidth_used_mb = 0");
header("Location: dashboard.php");
