<?php
require 'auth.php';
require 'db.php';

if($_POST){
 $conn->prepare("
  INSERT INTO users(full_name,device_mac,bandwidth_used_mb)
  VALUES (?,?,?)
 ")->execute([$_POST['n'],$_POST['m'],$_POST['b']]);
}

$u=$conn->query("SELECT * FROM users")->fetchAll();
?>

<?php include 'sidebar.php'; ?>

<div style="margin-left:220px;padding:20px">
<h2>Users</h2>
<form method="post">
<input name="n" placeholder="Name">
<input name="m" placeholder="MAC">
<input name="b" placeholder="Bandwidth MB">
<button>Add</button>
</form>

<table border="1">
<tr><th>Name</th><th>MAC</th><th>Bandwidth</th></tr>
<?php foreach($u as $x): ?>
<tr>
<td><?=htmlspecialchars($x['full_name'])?></td>
<td><?=htmlspecialchars($x['device_mac'])?></td>
<td><?=$x['bandwidth_used_mb']?></td>
</tr>
<?php endforeach; ?>
</table>
</div>
