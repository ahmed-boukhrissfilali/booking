<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
		require_once 'admin/connect.php';
		if (ISSET($_POST['add_guest'])) {
			$type = $_SESSION['roomid'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$address = $_POST['address'];
			$contactno = $_POST['contactno'];
			$checkin = $_POST['datein'];
			$checkout = $_POST['dateout'];

			$conn->query("INSERT INTO `guest` (firstname, lastname, address, contactno) VALUES('$firstname', '$lastname', '$address', '$contactno')") or die(mysqli_error());
			$query = $conn->query("SELECT * FROM `guest` WHERE `firstname` = '$firstname' && `lastname` = '$lastname' && `contactno` = '$contactno'") or die(mysqli_error());
			$fetch = $query->fetch_array();
			$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `room_id` = '$type' && `status` = 'Pending'") or die(mysqli_error());
			$row = $query2->num_rows;
			if ($checkin < date("Y-m-d", strtotime('+8 HOURS'))) {
				echo "<script>alert('Must be present date')</script>";
			} else {
				// if($row > 0){
				// 	echo "<div class = 'col-md-4'>
				// 				<label style = 'color:#ff0000;'>Not Available Date</label><br />";
				// 			$q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
				// 			while($f_date = $q_date->fetch_array()){
				// 				echo "<ul>
				// 						<li>	
				// 							<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkin']."+8HOURS"))."</label>	
				// 						</li>
				// 					</ul>";
				// 			}
				// 		"</div>";
				// }else{	
				if ($guest_id = $fetch['guest_id']) {
					$conn->query("INSERT INTO `transaction`(guest_id, room_id, status, checkin,checkout) VALUES('$guest_id', '$type', 'Pending', '$checkin','$checkout')") or die(mysqli_error());
					// header("location:reply_reserve.php");
					$redirectUrl = "reply_reserve.php";
					echo "<script>window.location.href = '$redirectUrl';</script>";
					exit();
				} else {
					echo "<script>alert('Error Javascript Exception!')</script>";
				}
			}
	} 
?>
