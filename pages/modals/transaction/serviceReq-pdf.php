<?php
require_once('mc_table.php');


$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
$intServiceRequested = $_GET['intServiceRequested'];
$ctrLang = $_GET['ctrLang'];

$sql = "SELECT * FROM tblservicerequested sr INNER JOIN tblcustomer c ON sr.intCustomerId=c.intCustomerId where intServiceRequested= $intServiceRequested";
$result = mysql_query($sql, $conn);
$row = mysql_fetch_array($result);
$strFirstName = $row['strFirstName'];
$strLastName = $row['strLastName'];

/*
$sql = "SELECT * FROM tblavailunit au INNER JOIN tbllot l ON au.intLotId = l.intLotID INNER JOIN tblblock b ON b.intBlockID = l.intBlockID INNER JOIN tblsection s ON s.intSectionID = b.intSectionID INNER JOIN tbltypeoflot tl ON tl.intTypeID = b.intTypeID INNER JOIN tblcustomer c ON c.intCustomerId = au.intCustomerId INNER JOIN tblcollectionlot cl ON cl.intAvailUnitId = au.intAvailUnitId WHERE au.intAvailUnitId = '".$intAvailUnitId."'";
$result = mysql_query($sql,$conn);
while($row = mysql_fetch_array($result))
{
	$strFirstName = $row['strFirstName'];
	$strMiddleName = $row['strMiddleName'];
	$strLastName = $row['strLastName'];
	$strTypeName = $row['strTypeName'];
	$strSectionName = $row['strSectionName'];
	$strBlockName = $row['strBlockName'];
	$strLotName = $row['strLotName'];
	$strModeOfPayment = $row['strModeOfPayment'];
	$deciAmountPaid = $row['deciAmountPaid'];
	$deciBalance = $row['deciBalance'];

}*/

$sqlServices = "SELECT *, s.deciAmountPaid as 'deciAmountPaidSr' FROM tblservicerequested s inner join tblcustomer c on c.intCustomerId=s.intCustomerId inner join tbllot l on l.intLotID=s.intUnitId inner join tblblock b on b.intBlockID=l.intBlockID inner join tblsection e on e.intSectionID=b.intSectionID inner join tblservice d on d.intServiceID=s.intServiceId order by s.intServiceRequested DESC limit 0,$ctrLang";
$resultServices = mysql_query($sqlServices);


$pdf = new PDF_MC_Table();
$pdf -> AddPage();
$pdf -> AliasNbPages();
$pdf -> Ln(5);
$pdf -> SetFont('Arial', 'B', 15);
$pdf -> Cell(120,0,'Service Receipt',0,0,'C');
$pdf -> Ln(15);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Customer Name: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(0,0,$strFirstName.' '.$strLastName,0,0,'L'); //palitan ng variable
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(145);
$pdf -> Cell(0,0,'Date: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(160);
$pdf -> Cell(0,0,date('Y-m-d'),0,0,'L'); //palita	n ng variable
$pdf -> Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Service Avail: ',0,0,'L');
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(60);
$pdf -> SetWidths(array(40,60,40));
$pdf -> Row(array('Service Name','Unit','Price'));
$pdf -> SetFont('Arial', '', 12);
$totalPrice=0;
while($row = mysql_fetch_array($resultServices))
{
		$pdf -> SetX(60);
		$pdf -> Row(array($row['strServiceName'],$row['strSectionName']." ".$row['strBlockName']." ".$row['strLotName'], number_format($row['dblServicePrice'],2))); //palitan ng variables
		$totalPrice += $row['dblServicePrice'];
		$deciAmountPaidSr = $row['deciAmountPaidSr'];
}
$pdf -> Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Employee-In-Charge: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(70);
$pdf -> Cell(0,0,'Jeron Joshua Cruz',0,0,'L');
$pdf -> Ln(28);
$pdf -> SetX(70);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(80,0,'Amount to Pay: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'P '.number_format($totalPrice,2),0,0,'R'); //palitan ng variable
$pdf -> Ln(7);
$pdf -> SetX(70);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(80,0,'Amount Paid: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'P '.number_format($deciAmountPaidSr,2),0,0,'R'); //palitan ng variable
$pdf->Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(70);
$pdf -> Cell(80,0,'Change: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'P '.number_format($deciAmountPaidSr-$totalPrice,2),0,0,'R'); //palitan ng variable

$pdf -> Ln(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'_________________________',0,0,'L');
$pdf -> Ln(5);
$pdf -> SetX(20);
$pdf -> Cell(0,0,"     Employee's Signature",0,0,'L');
$pdf -> Output();
?>