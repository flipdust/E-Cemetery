<?php
require_once('mc_table.php');
$intUnitId = $_GET['unitId'];


$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
$sql = "SELECT * FROM tblcustomer c INNER JOIN tblavailunitash a ON a.intCustomerId = c.intCustomerId INNER JOIN tblinterest i ON a.intInterestId = i.intInterestId INNER JOIN tblacunit l ON a.intUnitID = l.intUnitID INNER JOIN tbllevelash la ON la.intLevelAshID = l.intLevelAshID INNER JOIN tblashcrypt ac ON ac.intAshID = la.intAshID INNER JOIN tblcollectionash da ON da.intAvailUnitAshId = a.intAvailUnitAshId where a.intAvailUnitAshId='".$intUnitId."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	$strFirstName = $row['strFirstName'];
	$strLastName = $row['strLastName'];
	$strAshName = $row['strAshName'];
	$strLevelName = $row['strLevelName'];
	$deciAmountPaid = $row['deciAmountPaid'];
	$deciBalance = $row['deciBalance'];
	$strUnitName = $row['strUnitName'];
	$strModeOfPayment = $row['strModeOfPayment'];


}


$pdf = new PDF_MC_Table();
$pdf -> AddPage();
$pdf -> AliasNbPages();
$pdf -> Ln(5);
$pdf -> SetFont('Arial', 'B', 15);
$pdf -> Cell(120,0,'Collection Receipt',0,0,'C');
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
$pdf -> Cell(0,0,'Ashcrypt Details: ',0,0,'L');
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(60);
$pdf -> SetWidths(array(40,40,40));
$pdf -> Row(array('Ashcrypt Name', 'Level', 'Unit Name'));
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Row(array($strAshName, $strLevelName, $strUnitName)); //palitan ng variables
$pdf -> Ln(28);
$pdf -> SetX(70);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(80,0,'Amount Paid: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'P '.number_format($deciAmountPaid,2),0,0,'R'); //palitan ng variable
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