<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$class_teacher = $_POST['class_teacher'];

		$sql = "UPDATE class SET class_name = '$title', teacher_id = '$class_teacher' WHERE class_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Class updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:class.php');

?>