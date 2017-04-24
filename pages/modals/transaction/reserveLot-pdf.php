<?php
//HINDI TO RESERVE LOT!! DOWNPAYMENT TO!
require_once('mc_table.php');

$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
$intAvailUnitId = $_GET['intAvailUnitId'];
$sql = "SELECT *, dpl.deciAmountPaid as downPaymentPaid FROM tbldownpaymentlot dpl INNER JOIN tblavailunit au ON au.intAvailUnitId = dpl.intAvaiUnitId INNER JOIN tbllot l ON l.intLotID = au.intLotId INNER JOIN tblblock b ON b.intBlockID = l.intBlockID INNER JOIN tblcustomer c ON c.intCustomerId = au.intCustomerId WHERE au.intAvailUnitId = '".$intAvailUnitId."'";
$result = mysql_query($sql,$conn);
while($row = mysql_fetch_array($result))
{
	$intSectionID = $row['intSectionID'];
	$intTypeID = $row['intTypeID'];
	$strFirstName = $row['strFirstName'];
	$strMiddleName = $row['strMiddleName'];
	$strLastName = $row['strLastName'];

	$strBlockName = $row['strBlockName'];
	$strLotName = $row['strLotName'];
	$strModeOfPayment = $row['strModeOfPayment'];
	$deciAmountPaid = $row['downPaymentPaid'];
	$deciBalance = $row['deciBalance'];
}
$sqlSection = "SELECT * from tbltypeoflot where intTypeID='$intTypeID'";
$resultSection = mysql_query($sqlSection,$conn);
$row = mysql_fetch_array($resultSection);
$strTypeName = $row['strTypeName'];
$sqlType = "SELECT * from tblsection where intSectionID = '$intSectionID'";
$resultType = mysql_query($sqlType,$conn);
$row = mysql_fetch_array($resultType);
$strSectionName = $row['strSectionName'];
$pdf = new PDF_MC_Table();
$pdf -> AddPage();
$pdf -> AliasNbPages();
$pdf -> Ln(5);
$pdf -> SetFont('Arial', 'B', 15);
$pdf -> Cell(120,0,'Down Payment Receipt',0,0,'C');
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
$pdf -> Cell(0,0,date('Y-m-d'),0,0,'L'); //palitan ng variable
$pdf -> Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Lot Information: ',0,0,'L');
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(60);
$pdf -> SetWidths(array(30,30,30,30));
$pdf -> Row(array('Lot Type', 'Section', 'Block', 'Lot Name'));
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Row(array($strTypeName, $strSectionName, $strBlockName, $strLotName)); //palitan ng variables
$pdf -> Ln(7);
$pdf -> SetX(70);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(90,0,'Mode of Payment: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'Reservation',0,0,'R'); //palitan ng variable
$pdf -> Ln(15);
$pdf -> SetX(70);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(80,0,'Amount Paid: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'P '.number_format($deciAmountPaid, 2),0,0,'R'); //palitan ng variable
$pdf->Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(70);
$pdf -> Cell(80,0,'Balance: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'P '.number_format($deciBalance,2),0,0,'R'); //palitan ng variable

$pdf -> Ln(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'_________________________',0,0,'L');
$pdf -> Ln(5);
$pdf -> SetX(20);
$pdf -> Cell(0,0,"     Employee's Signature",0,0,'L');
$pdf -> Output();
?>