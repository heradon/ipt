<?php

	include('database.php');
	
	echo exec("iptables -t nat -F");
	echo exec("iptables -t nat -X");
	echo exec("iptables -t nat -A POSTROUTING -s 192.168.4.0/24 -o vmbr0 -j MASQUERADE");
	$result = $db->query("SELECT * FROM iptables");
	foreach ($result as $row) {
		$port_out = $row["port_out"];
		$ip_port = $row["ip_port"];

		echo exec("iptables -t nat -A PREROUTING -i vmbr0 -p tcp -m tcp --dport $port_out -j DNAT --to-destination $ip_port");
	}



?>
