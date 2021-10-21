<?php
session_start();
$a=$_SESSION["a"];
$txnid=$_SESSION["txn"];
include ('dbcon.php');
        $sql="SELECT * FROM `payment` WHERE `enroll_id`='$a' AND `txd_id`='$txnid'";
        $runn= mysqli_query($con, $sql);
        $dataa= mysqli_fetch_assoc($runn);
        
        $qry="SELECT * FROM `student_info` WHERE `enroll_no`='$a'";
        $run= mysqli_query($con, $qry);
        $data= mysqli_fetch_assoc($run);
        

$number = $dataa['amount'];
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
           :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
    $aword= $result . "Rupees  Only in " ;


require('fpdf181/html_table.php');

$pdf = new PDF_HTML_Table('P','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$pdf->Cell(35);
$pdf->Cell(1,1,' "Techno-Social Excellenc"','C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(-20);
$pdf->Cell(1,10,'   Marathwada Mirta Mandals IT(MMIT)','C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30);
$pdf->Cell(1,18,'Cash Receipt','C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-30);
$pdf->Cell(1,30,'Name :' . $data['name'],0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-1);
$pdf->Cell(1,45,'Class :'. $data['class'],0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(40);
$pdf->Cell(1,45,'Branch :'. $data['dept'],0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(60);
$pdf->Cell(1,45,'Year :','C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-1);
$pdf->Cell(1,30,'Date :'. $dataa['date'],0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-1);
$pdf->Cell(1,20,'No :'. $dataa['sr_no'],0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-1);
$pdf->Cell(1,53,'Roll No :'. $data['roll_no'],0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-10);
$pdf->Cell(1,95,''. $dataa['amount'],0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-1);
$pdf->Cell(1,115,''. $dataa['amount'],0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-90);
$pdf->Cell(1,170,'Payers Signature',0,0,'C');
$pdf->Cell(90);
$pdf->Cell(1,170,'Cashiers Singnature',0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-70);
$pdf->Cell(1,150,'Received(inwords)  :-' .$aword,0,0,'C');


$htmlTable='<table >
<tr>
<td>No.</td>
<td>Particulars</td>
<td>Rs. </td>
<td>&nbsp;</td>
</tr>

<tr>
<td>1.</td>
<td>Tuition fee(Narration:Others)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<td></td>
<td>Total -</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>


</table>';

$pdf->WriteHTML("<br><br><br><br><br><br><br>$htmlTable<br>");

$pdf->Output();
 
?>