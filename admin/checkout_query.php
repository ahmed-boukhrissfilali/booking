<?php
	require_once 'connect.php';
	$time = date("H:i:s", strtotime("+8 HOURS"));
	$conn->query("UPDATE `transaction` AS t
	INNER JOIN `room` AS r ON t.room_id = r.room_id
	SET t.`checkout_time` = '$time', t.`status` = 'Check Out', r.`chambre_livree` = r.`chambre_livree` - 1
	WHERE t.`transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
	header("location:checkout.php");




	
?>