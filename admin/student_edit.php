<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		
		$sql = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', email='$email', address = '$address', birthdate = '$birthdate', contact_info = '$contact', gender = '$gender' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select student to edit first';
	}

	header('location: student.php');
?>