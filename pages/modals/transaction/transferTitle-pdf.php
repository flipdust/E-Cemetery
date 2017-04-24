<?php
require_once('mc_table.php');

$intAvailUnitId = $_GET['intAvailUnitId'];
$strFirstName = $_GET['strFirstName'];
$strLastName = $_GET['strLastName'];
$amountPaid  = $_GET['amountPaid'];
$totalAmount =$_GET['totalAmount'];
$strAddress = $_GET['strAddress'];
$strTypeAsh = $_GET['strTypeAsh'];

 $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
// $intServiceServiceRequested = $_GET['intServiceServiceRequested'];
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
if($strTypeAsh=="Ash"){
$sql = "SELECT * FROM tblavailunitash a INNER JOIN tblacunit l ON a.intUnitID = l.intUnitID INNER JOIN tbllevelash la ON la.intLevelAshID = l.intLevelAshID INNER JOIN tblashcrypt ac ON ac.intAshID = la.intAshID where a.intAvailUnitAshId='".$intAvailUnitId."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	$strAshName = $row['strAshName'];
	$strLevelName = $row['strLevelName'];
	$deciAmountPaid = $row['deciDownpayment'];
	$deciBalance = $row['deciBalance'];
	$strUnitName = $row['strUnitName'];
	$strModeOfPayment = $row['strModeOfPayment'];


}
}
if($strTypeAsh=='Lot')
{
$sql = "SELECT * FROM tblavailunit au INNER JOIN tbllot l ON au.intLotId = l.intLotID INNER JOIN tblblock b ON b.intBlockID = l.intBlockID INNER JOIN tblsection s ON s.intSectionID = b.intSectionID INNER JOIN tbltypeoflot tl ON tl.intTypeID = b.intTypeID INNER JOIN tblcustomer c ON c.intCustomerId = au.intCustomerId WHERE au.intAvailUnitId = '".$intAvailUnitId."'";
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
}
$sqlID = "SELECT * FROM tbltransferlot";
$result = mysql_query($sqlID,$conn);
while($row = mysql_fetch_array($result))
$ID = $row['intTransferCustomerLotId'];

$pdf = new PDF_MC_Table();
$pdf -> AddPage();
$pdf -> AliasNbPages();
$pdf -> Ln(5);

$pdf-> SetX(30);
$pdf-> Line(20, 35, 250-50, 35);

$pdf-> SetFont("Arial","B", 15);
$pdf-> SetY(35);
$pdf -> SetX(87);
$pdf-> Cell(0,10,"RECEIPT","C",1);

//RECEIPT NO
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(45);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Receipt No.:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(45);
$pdf-> SetX(150);
$pdf-> Cell(0,10,$ID,"",1); //variable

//TRANSACTION DATE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Date:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(150);
$pdf-> Cell(0,10,date('Y-m-d'),"",1); //variable

//CUSTOMER NAME
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Customer Name:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(55);
$pdf-> Cell(0,10,$strFirstName." ".$strLastName,"",1); //variable



$_Fields_Name_Position = 65; //Position Header
$_Table_Position = 71;	

if($strTypeAsh=='Lot')
{
$pdf-> SetFillColor(232,232,232);

$pdf-> SetFont("Arial", "B", 10);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(15);
$pdf-> Cell(25,6,"Lot Type",1,0,"C",1);

$pdf-> SetX(40);
$pdf-> Cell(20,6,"Section",1,0,"C",1);

$pdf-> SetX(60);
$pdf-> Cell(25,6,"Block",1,0,"C",1);

$pdf-> SetX(85);
$pdf-> Cell(20,6,"Lot",1,0,"C",1);

$pdf-> SetX(105);
$pdf-> Cell(30,6,"Transfer Fee",1,0,"C",1);

$pdf-> SetFont("Arial","",10);
$pdf-> SetY($_Table_Position);
$pdf-> SetX(15);
$pdf-> MultiCell(25,6,$strTypeName,1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(40);
$pdf-> MultiCell(20,6,$strSectionName,1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(60);
$pdf-> MultiCell(25,6,$strBlockName,1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(85);
$pdf-> MultiCell(20,6,$strLotName,1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(105);
$pdf-> MultiCell(30,6,number_format($totalAmount,2),1,"L"); //variable
}

if($strTypeAsh=='Ash')
{
$pdf-> SetFillColor(232,232,232);

$pdf-> SetFont("Arial", "B", 10);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(15);
$pdf-> Cell(25,6,"Ashcrypt",1,0,"C",1);

$pdf-> SetX(40);
$pdf-> Cell(20,6,"Level",1,0,"C",1);

$pdf-> SetX(60);
$pdf-> Cell(20,6,"Unit",1,0,"C",1);

$pdf-> SetX(80);
$pdf-> Cell(30,6,"Transfer Fee",1,0,"C",1);

$pdf-> SetFont("Arial","",10);
$pdf-> SetY($_Table_Position);
$pdf-> SetX(15);
$pdf-> MultiCell(25,6,$strAshName,1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(40);
$pdf-> MultiCell(20,6,$strLevelName,1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(60);
$pdf-> MultiCell(20,6,$strUnitName,1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(80);
$pdf-> MultiCell(30,6,number_format($totalAmount,2),1,"L"); //variable
}
//TOTAL AMOUNT TO PAY
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(115);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Total Amount:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(115);
$pdf-> SetX(160);
$pdf-> Cell(0,10,number_format($totalAmount,2),"",1); //variable

$pdf-> SetX(30);
$pdf-> Line(120, 125, 200, 125);

//AMOUNT PAID
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(125);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Amount Received:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(125);
$pdf-> SetX(160);
$pdf-> Cell(0,10,number_format($amountPaid,2),"",1); //variable
 
//CHANGE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(130);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Change:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(130);
$pdf-> SetX(160);
$pdf-> Cell(0,10,number_format($amountPaid-$totalAmount,2),"",1); //variable

//Received By
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(140);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Received by:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(140);
$pdf-> SetX(50);
$pdf-> Cell(0,10,"Kevin Bernacer","",1);

$pdf->AddPage('','Letter','');
$pdf-> SetFont("Arial","B", 25);
$pdf-> SetTextColor(0,100,0);
$pdf-> SetY(40);
$pdf -> SetX(33);
$pdf-> Cell(0,10,"TRANSFER CERTIFICATE OF TITLE","C",1);
$pdf -> Ln(15);

$pdf-> SetTextColor(0,0,0);
$pdf-> SetFont("Arial","", 15);
$pdf-> SetY(50);
$pdf -> SetX(100);
$pdf-> Cell(0,10,"No: ".$ID,"C",1);

$pdf-> SetFont("Arial","", 14);
$pdf-> SetY(65);
$pdf -> SetX(30);
$pdf-> Cell(0,10,"It is hereby certified that certain land situated in the Province of Rizal","C",1);
$pdf-> SetY(72);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"City of Antipolo, more particularly bounded and described as follows:","C",1);

$pdf-> SetFont("Arial","B", 20);
$pdf-> SetY(85);
$pdf -> SetX(25);
$pdf -> Ln(5);
if($strTypeAsh=='Ash')
{
	$pdf-> Cell(40,0,'           '.$strAshName.' '.$strLevelName.'-'.$strUnitName,"C"); //PALITAN NG VARIABLES
}
if($strTypeAsh=='Lot')
{
	$pdf-> Cell(40,0,$strTypeName.' '.$strSectionName.' '.$strBlockName.'-'.$strLotName,"C"); //PALITAN NG VARIABLES
}



$pdf-> SetFont("Arial","", 12);
$pdf-> SetY(93);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"is registered in accordance with the registration of the Property Registration Decree","C",1);
$pdf-> SetY(99);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"in the name of","C",1);

$pdf-> SetFont("Arial","B", 13);
$pdf-> SetY(110);
$pdf -> SetX(20);

$pdf-> Cell(0,10,"NEW OWNER NAME: ".$strFirstName." ".$strLastName,"C",1); //VARIABLES
$pdf ->Ln(10);
$pdf-> SetY(120);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"ADDRESS: ".$strAddress,"C",1); //VARIABLES

$pdf-> SetFont("Arial","", 18);
$pdf-> SetY(190);
$pdf -> SetX(115);
$pdf-> Cell(0,10,"Jeron Cruz","C",1);

$pdf-> SetX(30);
$pdf-> Line(105, 190, 160, 190);

$pdf-> SetY(201);
$pdf -> SetX(105);
$pdf-> Cell(0,10,"Managing Director","C",1);
$pdf -> Output();
?>
