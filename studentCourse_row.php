<?php 
	include 'includes/st-session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM student_class 
				LEFT JOIN class ON student_class.class_id = class.class_id
				LEFT JOIN students ON student_class.student_id = students.student_id
				WHERE student_class_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>