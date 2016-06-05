<?php

	$db = new PDO("sqlite:database.sqlite");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$db->exec("CREATE TABLE IF NOT EXISTS iptables (
			   id INTEGER PRIMARY KEY AUTOINCREMENT,
			   port_out TEXT,
			   ip_port TEXT,
			   desc TEXT)");
?>