<?php
require_once('mc_table.php');

$intAvailUnitId = $_GET['intAvailUnitId'];

$sql = "SELECT a.intAvailUnitId,  a.dateAvailUnit, c.strLastName, c.strFirstName, c.strMiddleName, l.strLotName, b.strBlockName, s.strSectionName, t.strTypeName, a.deciAmountPaid FROM tblavailunit a 
        INNER JOIN tblcustomer c ON c.intCustomerId = a.intCustomerId
        INNER JOIN tbllot l ON a.intLotId = l.intLotID
        INNER JOIN tblblock b ON l.intBlockID = b.intBlockId
        INNER JOIN tblsection s ON s.intSectionID = b.intSectionID
        INNER JOIN tbltypeoflot t ON t.intTypeID = b.intTypeID WHERE a.strModeOfPayment = 'Spotcash' AND a.intAvailUnitId = '".$intAvailUnitId."' ORDER BY a.dateAvailUnit ASC;"

$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
mysql_select_db(constant('mydb'));
$result = mysql_query($sql,$conn);

while($row = mysql_fetch_array($result)){
    $intAvailUnitId =$row['intAvailUnitId'];
    $dateAvailUnit =$row['dateAvailUnit'];
    $strLastName =$row['strLastName'];
    $strFirstName=$row['strFirstName'];
    $strMiddleName=$row['strMiddleName'];
    $strLotName =$row['strLotName'];
    $strBlockName =$row['strBlockName'];
    $strSectionName =$row['strSectionName'];
    $strTypeName =$row['strTypeName'];
    $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        
}//while

$pdf = new PDF_MC_Table();
$pdf -> AddPage();
$pdf -> AliasNbPages();
$pdf -> Ln(5);
$pdf -> SetFont('Arial', 'B', 15);
$pdf -> Cell(120,0,'UNIT PURCHASE REPORT',0,0,'C');

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