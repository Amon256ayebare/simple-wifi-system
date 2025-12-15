<?php
session_start();
require 'db.php';

if ($_POST) {
    $q = $conn->prepare(
        "SELECT * FROM admins WHERE username=? AND password=crypt(?,password)"
    );
    $q->execute([$_POST['u'], $_POST['p']]);
    $a = $q->fetch();

    if ($a) {
        $_SESSION['admin'] = true;
        $_SESSION['role'] = $a['role'];
        header("Location: dashboard.php");
        exit;
    }
}
?>

<h2>Admin Login</h2>
<form method="post">
    <input name="u" placeholder="Username"><br>
    <input name="p" type="password" placeholder="Password"><br>
    <button>Login</button>
</form>
