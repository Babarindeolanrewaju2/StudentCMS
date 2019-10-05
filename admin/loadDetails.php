<?php 
	include 'includes/session.php';
    $output = '';
	if(isset($_POST['courseName'])) {
        $id = $_POST['courseName'];
        $date =  date('Y-m-d');
        if($id != ''){
            $sql = "SELECT * FROM student_class LEFT JOIN students ON students.student_id = student_class.student_id 
            WHERE class_id = '$id' ";
        }
        else {
            $sql = "SELECT * FROM student_class";
        }
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
            $cd = $row['class_id'];
            $sel = "SELECT * FROM class WHERE class_id = '$cd' ";
            $qSelect = $conn->query($sel);
            $rowClass = $qSelect->fetch_assoc();

            $st = $row['student_id'];
            $qq = $conn->query("SELECT * FROM students WHERE student_id = '$st' ");
            $qqrow = $qq->fetch_assoc();
            $stu = $qqrow['id'];

            $sql1 = "SELECT * FROM `attendance` WHERE `student_id` = '$stu' AND `class_id` = '$id' AND `date` = '$date'";
			$query1 = $conn->query($sql1);
            $output .= "
            <tr>
                <td>".$rowClass['class_name']."</td>
                <td>".$row['student_id']."</td>
                <td>".$row['firstname'].' '.$row['lastname']."</td>
                <td>
                <input type='hidden' name='classid' id='classid' value='".$id."' >";

			    if($query1->num_rows > 0){
            $output .= "
                <button class='btn btn-success btn-sm btn-flat' disabled><i class='fa fa-edit'></i> Marked</button>
                <button class='btn btn-danger btn-sm btn-flat' disabled><i class='fa fa-trash'></i> Absent</button>
                ";
                }else{
            $output .= "
                <button class='btn btn-success btn-sm btn-flat edit' data-id='".$row['student_id']."'><i class='fa fa-edit'></i> Present</button>
                <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['student_id']."'><i class='fa fa-trash'></i> Absent</button>
                ";    
            $output .= "
                </td>
            </tr>
            ";
                }
        }  
        echo $output;
	}
?>