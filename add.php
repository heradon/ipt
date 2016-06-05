<?php
	echo $_POST["port_out"];
	echo $_POST["ip_port"];
	echo $_POST["desc"];

	$po = $_POST["port_out"];
	$ip = $_POST["ip_port"];
	$des = $_POST["desc"];

	include('database.php');
	$db->exec("INSERT INTO iptables (port_out, ip_port, desc) VALUES ('$po', '$ip', '$des')");
	include('execute.php');
	header("Location: index.php");
	die();
?>