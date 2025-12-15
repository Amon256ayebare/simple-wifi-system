<?php
require 'db.php';

$l=[]; $v=[];
$q=$conn->query("
 SELECT usage_date, total_bandwidth_mb
 FROM daily_usage
 ORDER BY usage_date
");

foreach($q as $r){
 $l[]=$r['usage_date'];
 $v[]=$r['total_bandwidth_mb'];
}

echo json_encode(["labels"=>$l,"values"=>$v]);
