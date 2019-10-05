<?php
	include 'includes/session.php';

	function generateRow($from, $to, $conn){
		$contents = '';
		$to = date('Y-m-d');
		$from = date('Y-m-d', strtotime('-90 day', strtotime($to)));

		if(isset($_GET['range'])){
			$range = $_GET['range'];
			$ex = explode(' - ', $range);
			$from = date('Y-m-d', strtotime($ex[0]));
			$to = date('Y-m-d', strtotime($ex[1]));
		}

		$sql = "SELECT DISTINCT `student_id` AS stid, class_id FROM attendance WHERE date BETWEEN '$from' AND '$to' ";

		

		$query = $conn->query($sql);
		$count = $query->num_rows;
		$total = 20;
		while($row = $query->fetch_assoc()){   
			$st = $row['stid'];
			$cn = $row['class_id'];
			
			
			$sql1 = $conn->query("SELECT * FROM students WHERE students.id='$st'
					ORDER BY students.lastname ASC, students.firstname ASC");
			$sdetail = $sql1->fetch_assoc(); 
			
			$sql2 = $conn->query("SELECT * FROM class WHERE class.class_id='$cn'");
			$cname = $sql2->fetch_assoc(); 

			$sel = $conn->query("SELECT * FROM attendance WHERE student_id = '$st' AND class_id = '$cn' AND status = 1 ");   
			$cnt = $sel->num_rows;         
			
			$sel1 = $conn->query("SELECT * FROM attendance WHERE student_id = '$st' AND class_id = '$cn' AND status = 0 ");   
			$cnt1 = $sel1->num_rows;         
			$contents .= "
			<tr>
				<td>".$sdetail['student_id']."</td>
				<td>".$sdetail['lastname'].", ".$sdetail['firstname']."</td>
				<td>".$cname['class_name']."</td>
				<td>".$cnt."</td>
				<td>".$cnt1."</td>
				<td>".(($cnt/$total) * 100).'%'."</td>
			</tr>
			";
		}

                  
		return $contents;
	}
		
	$range = $_POST['date_range'];
	$ex = explode(' - ', $range);
	$from = date('Y-m-d', strtotime($ex[0]));
	$to = date('Y-m-d', strtotime($ex[1]));

	$from_title = date('M d, Y', strtotime($ex[0]));
	$to_title = date('M d, Y', strtotime($ex[1]));

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Payroll: '.$from_title.' - '.$to_title);  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">Attendance Management Solutions</h2>
      	<h4 align="center">'.$from_title." - ".$to_title.'</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
		   <tr>  
		   	<th>Student ID</th>
			<th>Student Name</th>
			<th>Class Name</th>
			<th>Present</th>
			<th>Absent</th>
			<th>Percentage</th>
           </tr>  
      ';  
    $content .= generateRow($from, $to, $conn);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output($from.'-'.$to.'Attendance.pdf', 'I');

?>