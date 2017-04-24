<?php
require_once('mc_table.php');

$intUnitId = $_GET['intAvailUnitId'];
$intAvailUnitId = $_GET['intAvailUnitId'];
$strDeceasedFirstName = $_GET['strDeceasedFirstName'];
$strDeceasedLastName = $_GET['strDeceasedLastName'];
$strGender = $_GET['strGender'];
$intDeceasedAge = $_GET['intDeceasedAge'];
$strDateOfBirth = $_GET['strDateOfBirth'];
$strDateOfDeath = $_GET['strDateOfDeath'];
$dateOfInterment = $_GET['dateOfInterment'];
$amountPaid = $_GET['amountPaid'];
$intServiceId = $_GET['intServiceId'];
$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
/*$sql = "SELECT * FROM tblavailunit au INNER JOIN tbllot l ON au.intLotId = l.intLotID INNER JOIN tblblock b ON b.intBlockID = l.intBlockID INNER JOIN tblsection s ON s.intSectionID = b.intSectionID INNER JOIN tbltypeoflot tl ON tl.intTypeID = b.intTypeID INNER JOIN tblcustomer c ON c.intCustomerId = au.intCustomerId INNER JOIN tblcollectionlot cl ON cl.intAvailUnitId = au.intAvailUnitId WHERE au.intAvailUnitId = '".$intAvailUnitId."'";
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
}
*/

$sql = "SELECT strServiceName FROM tblservice where intServiceID = $intServiceId";
$result = mysql_query($sql, $conn);
$row = mysql_fetch_array($result);
$strServiceName = $row['strServiceName'];

if($strGender == 0) {
	$strGender = "MALE";
}
else{
	$strGender = "FEMALE";
}

$pdf = new PDF_MC_Table();
$pdf -> AddPage();
$pdf -> AliasNbPages();
$pdf -> SetLeftMargin(20);
$pdf -> Ln(5);
$pdf -> SetFont('Arial', 'B', 15);
$pdf -> Cell(0,0,'Add Deceased Receipt',0,0,'C');
$pdf -> Ln(15);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'Deceased Information',0,0,'C');
$pdf -> Ln(1);
$pdf -> Cell(0,0,'_______________________________________________________________________',0,0,'L');
$pdf -> Ln(7);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Deceased Name: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(0,0,$strDeceasedFirstName.' '.$strDeceasedLastName,0,0,'L'); //palitan ng variable
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(130);
$pdf -> Cell(0,0,'Date of Birth: ',0,0,'L');

$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(160);
$pdf -> Cell(0,0,$strDateOfBirth,0,0,'L'); //palita	n ng variable
$pdf -> Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(130);
$pdf -> Cell(0,0,'Date of Death: ',0,0,'L');

$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(160);
$pdf -> Cell(0,0,$strDateOfDeath,0,0,'L'); //palita	n ng variable
$pdf -> SetX(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'Gender: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(40);
$pdf -> Cell(0,0,$strGender,0,0,'L');
$pdf -> Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Age: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(33);
$pdf -> Cell(0,0,$intDeceasedAge,0,0,'L');
$pdf -> Ln(15);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'Service Information',0,0,'C');
$pdf -> Ln(1);
$pdf -> SetX(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'_______________________________________________________________________',0,0,'L');
$pdf -> Ln(7);
$pdf -> SetX(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'Service: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(40);
$pdf -> Cell(0,0,$strServiceName,0,0,'L'); //palitan ng variable
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(80);
$pdf -> Cell(80,0,'Date Of Internment: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(125,0,$dateOfInterment,0,0,'R'); //palitan ng variable
$pdf -> Ln(7);
$pdf -> SetX(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'Amount Paid: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(50);
$pdf -> Cell(0,0,'P '.number_format($amountPaid,2),0,0,'L'); //palitan ng variable

$pdf -> Ln(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'_________________________',0,0,'L');
$pdf -> Ln(5);
$pdf -> SetX(20);
$pdf -> Cell(0,0,"     Employee's Signature",0,0,'L');
$pdf -> Output();
?>