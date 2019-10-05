<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$class = $_POST['title'];
		$teacher_id = $_POST['class_teacher'];

		$sql = "INSERT INTO class (class_name, teacher_id) VALUES ('$class', '$teacher_id')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Class added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: class.php');

?>