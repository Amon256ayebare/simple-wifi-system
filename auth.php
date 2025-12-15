<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

function is_super() {
    return $_SESSION['role'] === 'SUPER';
}
