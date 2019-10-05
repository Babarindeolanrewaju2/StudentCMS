<?php
	include 'includes/st-session.php';

	if(isset($_POST['add'])){
		$cid = $_POST['courseName'];
		$sid = $stuser['student_id'];
		$qclass = "SELECT * FROM class WHERE class_id = $cid ";
		$queryC = $conn->query($qclass);
		$crow = $queryC->fetch_assoc();
        $cteacher = $crow['teacher_id'];
		
		//creating add
		$sql = "INSERT INTO student_class (student_id, class_id, class_teacher_id, created_on) VALUES ('$sid', '$cid', '$cteacher', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New course added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}		
	
	elseif(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM student_class WHERE student_class_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
    }
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}	
	header('location: studentCourse.php');

?>