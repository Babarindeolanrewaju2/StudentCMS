<?php
	include 'includes/session.php';

	if(isset($_POST['student_id'])){
        $classid = $_POST['classid'];
		$student = $_POST['student_id'];
		$date =  date('Y-m-d');

		$sql = "SELECT * FROM students WHERE student_id = '$student'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Student not found';
		}
		else{
			$row = $query->fetch_assoc();
			$stu = $row['id'];
			$email = $row['email'];

			$sql = "SELECT * FROM `attendance` WHERE `student_id` = '$stu' AND `class_id` = '$classid' AND `date` = '$date'";
			$query = $conn->query($sql);

			if($query->num_rows > 0){
				$_SESSION['error'] = 'Student attendance for the day exist';
			}
			else{
				//updates
				$logstatus = 1;
				//
				$sql = "INSERT INTO attendance (`student_id`, `class_id`, `date`, `status`) VALUES ('$stu', '$classid', '$date', '$logstatus')";
				if($conn->query($sql)){
					$_SESSION['success'] = 'Attendance added successfully';
					$to = $email;

					$subject = "Attendance Management | System ";

					$message = '
					<html>
					<head>
						<title>Attendance | System</title>
					</head>
					<body>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
								
							<tr>          
							<td align="left" valign="middle">&nbsp;</td>          
							<td align="left" valign="middle" style="color:rgb(61,61,61);font-size:14px"><br><br>
							Hi <strong>'.$row['lastname'].',</strong>
							<br>
							Your attendance for '.$date.' has been taken.
							<br>
							Thank you for your recent application to the following vacancy:			
							<br><br>      
							</tr>
							<tr>
								<td align="left" valign="middle" bgcolor="#525252">&nbsp;</td>          
								<td height="120" align="center" valign="middle" bgcolor="#525252" style="font-size:12px;color:rgb(255,255,255)">
								This email was sent to you as a registered student of <a style="font-size:12px;color:rgb(87,146,244);text-decoration:none" href="" target="_blank">Attendace Management System</a>.<br>
								Physical address: Lagos, Nigeria.</td>
								<td align="left" valign="middle" bgcolor="#525252">&nbsp;</td>
							</tr>     
					</tbody>
					</table>
					</body>
					</html>';

					$headers[] = 'MIME-VERSION: 1.0';
					$headers[] = 'Content-type: text/html; charset=iso-8859-1';
					$headers[] = 'To: '.$to;
					$headers[] = 'From: afeezbabatunde@gmail.com';
					//you add more headers like Cc, Bcc;

					$resultmail = mail($to, $subject, $message, implode("\r\n", $headers)); // \r\n will return new line. 
    
					if($resultmail === TRUE) {
						$_SESSION['success'] = 'MailSent';

					} }
				else{
					$_SESSION['error'] = $conn->error;
				}
			}
		}
	}
	else{
		$_SESSION['error'] = 'Select student first';
	}
    header('location: take-attendance.php');
?>