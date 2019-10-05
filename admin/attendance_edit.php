<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$status = $_POST['edit_status'];

		$sql = "UPDATE attendance SET status = '$status' WHERE attendance_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Attendance updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:attendance.php');

?>