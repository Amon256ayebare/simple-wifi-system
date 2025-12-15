<?php require 'auth.php'; ?>

<div style="width:200px;float:left;background:#222;height:100vh;color:#fff;padding:20px">
    <h3>WiFi Admin</h3>
    <a href="dashboard.php" style="color:white">Dashboard</a><br><br>
    <a href="users.php" style="color:white">Users</a><br><br>

    <?php if (is_super()): ?>
        <a href="reset_bandwidth.php" style="color:red">Reset Bandwidth</a><br><br>
    <?php endif; ?>

    <a href="logout.php" style="color:white">Logout</a>
</div>
