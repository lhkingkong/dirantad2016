<?php

$conn = @mysql_connect('127.0.0.1','ipsight_antad','bto191269');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('ipsight_antad', $conn);

?>