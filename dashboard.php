<?php
require 'auth.php';
require 'db.php';

/* AUTO UPDATE */
$conn->query("
 UPDATE users
 SET bandwidth_used_mb = bandwidth_used_mb + (RANDOM() * 5)::INT
");

/* STORE DAILY TOTAL */
$conn->query("
 INSERT INTO daily_usage (usage_date, total_bandwidth_mb)
 SELECT CURRENT_DATE, COALESCE(SUM(bandwidth_used_mb),0)
 FROM users
 ON CONFLICT DO NOTHING
");
?>

<?php include 'sidebar.php'; ?>

<div style="margin-left:220px;padding:20px">
<h2>Daily Bandwidth Usage</h2>
<canvas id="lineChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch("charts_daily.php")
.then(r=>r.json())
.then(d=>{
 new Chart(document.getElementById("lineChart"),{
  type:"line",
  data:{
    labels:d.labels,
    datasets:[{
      label:"Bandwidth (MB)",
      data:d.values,
      fill:false
    }]
  }
 });
});
</script>
