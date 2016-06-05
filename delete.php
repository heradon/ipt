<?php
include('database.php');
$db->exec("DELETE from iptables where ID=" .$_GET["id"] . "");
include('execute.php');
header("Location: index.php");
die();
?>