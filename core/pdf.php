<?php
include('connect.php');
include('functions.php');
require('../assets/fpdf/fpdf.php');
$id = $_REQUEST['id'];
$query2 = "select * from request_data where id=$id";
$result2 = mysqli_query($con,$query2) or die(mysqli_error($con));
$a = mysqli_fetch_assoc($result2);
$emp_id = $a['emp_id'];
$query = "select * from userprofile where uid=$emp_id";
$query1 = "select * from bank_details where emp_id=$emp_id";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
$b = mysqli_fetch_assoc($result);
$c = mysqli_fetch_assoc($result1);
$d = get_words($a['amount']);
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',13);
// Add logo

$pdf->Cell(60,19);
$pdf->Cell(130,10,'Mayur Polymers','TR',1,'L');
$pdf->Cell(60,5,'','L',0,'L' );
$pdf->SetFont('Arial','',12);
$pdf->Cell(130,5,'Shed no.7/8, Sai Industries Area,','R',1,'L');
$pdf->Cell(60,5,'','L',0,'L' );
$pdf->Cell(130,5,'N.H.No.8, Navagam,','R',1,'L');
$pdf->Cell(60,5,'','L',0,'L' );
$pdf->Cell(130,5,'Kamrej','R',1,'L');
$pdf->SetFont('Arial','B',13);
$pdf->Cell(60,5,'','L',0,'L' );
$pdf->Cell(130,5,'','R',1,'L');
$pdf->Cell(60,5,'','L',0,'L' );
$pdf->Cell(130,5,'Payslip for the month of '.$a['month'].' - '.$a['year'],'R',1,'L');
$pdf->Cell(60,5,'','LB',0,'L' );
$pdf->Cell(130,5,'','RB',1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(48,10,"Name:  ",'L',0);
$pdf->Cell(47,10,"".$b['firstname'].' '.$b['lastname'],0,0);
$pdf->Cell(48,10,"Bank Name:  ",'L',0);
$pdf->Cell(47,10,"".$c['bank_name'],'R',0);
$pdf->Ln(9.99);
$pdf->Cell(48,10,"Date of Joining:  ",'TL',0);
$pdf->Cell(47,10,"".$b['join_date'],'T',0);
$pdf->Cell(48,10,"Bank Account No.:  ",'TL',0);
$pdf->Cell(47,10,"".$c['account_number'],'TR',0);
$pdf->Ln(9.99);
$pdf->Cell(48,10,"No of leaves:  ",'TL',0);
$pdf->Cell(47,10,"".$b['designation'],'T',0);
$pdf->Cell(48,10,"PAN No.:  ",'TL',0);
$pdf->Cell(47,10,"".$c['pan_no'],'TR',0);

$pdf->Ln(9.99);
$pdf->Cell(48,10,"Effective Work Days:",'BTL',0);
$pdf->Cell(47,10,"",'BT',0);
$pdf->Cell(48,10,"PF No.:  ",'BLT',0);
$pdf->Cell(47,10,"".$c['pf_no'],'BTR',0);

$pdf->Ln(9.99);
$pdf->Cell(48,10,"Total Salary:  ",'TL',0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(142,10,"".$a['amount'].'/-','TR',1);
$pdf->SetFont('Arial','I',9);
$pdf->Cell(190,5,"(".$d." Rupees)",'LRB',0);
$pdf->Ln(1);
$pdf->Cell(190,30,"This is a system generated payslip and does not require signature.",0,0,'C');
$pdf->Output('Payslip_'.$b['username'].'_'.$a['month'].' - '.$a['year'].'.pdf','I');
?>