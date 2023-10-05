<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `contact` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	header("location:messages.php");
?>