<?php 
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
$result = getPhysicianSchedule($conn); 
echo $result;

?>