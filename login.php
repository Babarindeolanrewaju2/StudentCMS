<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['signin'])){
		$student = $_POST['student'];
		//$password = $_POST['password'];

		$sql = "SELECT * FROM students WHERE student_id = '$student'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find student with the ID';
		}
		else{
			$row = $query->fetch_assoc();
			$_SESSION['student'] = $row['id'];
			header('location: dashboard.php');
			}
		
	}
	else{
		$_SESSION['error'] = 'Input studdent ID first';
	}

	header('location: index.php');

?>