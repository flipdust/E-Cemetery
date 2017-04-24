<?php
require('../../../fpdf/fpdf.php');
require ("../../controller/connection.php");
		
		

$pdfAvailUnitAshId = "";
$pdfUnitName = "";
$pdfLevel = "";
$pdfAshCrypt = "";
$pdfSellingPrice = "";
$pdfCustomer = "";
$pdfAddress = "";
$pdfDate = "";
$pdfModeOfPayment= "";
$pdfDiscountedPrice= "";
$pdfDiscount= "";
$pdfAmountPaid= "";
$pdfBalance= "";


$tfAvailUnitAshId = $_GET['tfAvailUnitAshId'];
$tfUnitName = $_GET['tfUnitName'];
$tfLevel = $_GET['tfLevel'];
$tfAshCrypt = $_GET['tfAshCrypt'];
$tfSellingPrice = $_GET['tfSellingPrice'];
$tfCustomer = $_GET['tfCustomer'];
$tfAddress = $_GET['tfAddress'];
$tfDate = $_GET['tfDate'];
$tfModeOfPayment = $_GET['tfModeOfPayment'];
$tfDiscountedPrice = $_GET['tfDiscountedPrice'];
$tfDiscount = $_GET['tfDiscount'];
$tfAmountPaid = $_GET['tfAmountPaid'];
$tfBalance = $_GET['tfBalance'];

$pdfAvailUnitAshId = $pdfAvailUnitAshId.$tfAvailUnitAshId;
$pdfUnitName = $pdfUnitName.$tfUnitName;
$pdfLevel = $pdfLevel.$tfLevel;
$pdfAshCrypt = $pdfAshCrypt.$tfAshCrypt;
$pdfSellingPrice = $pdfSellingPrice.$tfSellingPrice;
$pdfCustomer = $pdfCustomer.$tfCustomer;
$pdfAddress = $pdfAddress.$tfAddress;
$pdfDate = $pdfDate.$tfDate;
$pdfModeOfPayment= $pdfModeOfPayment.$tfModeOfPayment;
$pdfDiscountedPrice= $pdfDiscountedPrice.$tfDiscountedPrice;
$pdfDiscount= $pdfDiscount.$tfDiscount;
$pdfAmountPaid= $pdfAmountPaid.$tfAmountPaid;
$pdfBalance= $pdfBalance.$tfBalance;

		$companyName = "";
		$companyAddress = "";
		$companyContact = "";
		$companyEmail = "";
		$companyLogo = "";
		$add = "../";
		
		$sql = "SELECT * FROM tblcompanysettings WHERE intCompanyID = '1'";
                                        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
  		$result= mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
		{
		     // echo "<script>alert('Succesfully created!')</script>";
            $name = $row["strCompanyName"];
		    $address = $row["strAddress"];
		    $contact = $row["strContactNo"];
		    $email = $row["strEmailAddress"];
		    $logo = $row["strLogo"];


		    $companyName = $companyName.$name;
			$companyAddress = $companyAddress.$address;
			$companyContact = $companyContact.$contact;
			$companyEmail = $companyEmail.$email;
			$companyLogo = $add.$companyLogo.$logo;
			// echo $companyLogo;
		}
mysql_close($conn);
$pdf = new FPDF();


$pdf->AddPage();
//../../pages/images/employeeLogo.png"
$pdf-> SetX(35);
$pdf-> Image("$companyLogo",10,2,30);

$pdf-> SetFont("Arial","B",20);
$pdf-> SetY(8);
$pdf-> SetX(45);
$pdf-> Cell(150,10,"$companyName");

$pdf-> SetFont("Arial","",9);
$pdf-> SetY(15);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"$companyAddress","",1);

$pdf-> SetY(20);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"$companyEmail","",1);

$pdf-> SetY(25);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"$companyContact","",1);
// $pdf-> SetY(20);
// $pdf-> SetX(45);
// $pdf-> SetFont("Arial","","10");
// $pdf-> Cell(0,10,"Barangay Mayamot, Antipolo City","",1);

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
$pdf-> Cell(0,10,"$pdfAvailUnitAshId","",1);

//TRANSACTION DATE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Date:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(150);
$pdf-> Cell(0,10,"$pdfDate","",1);

//CUSTOMER NAME
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Customer Name:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(55);
$pdf-> Cell(0,10,"$pdfCustomer","",1);



$_Fields_Name_Position = 65; //Position Header
$_Table_Position = 71;	

$pdf-> SetFillColor(232,232,232);

$pdf-> SetFont("Arial", "B", 10);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(15);
$pdf-> Cell(25,6,"Unit Name",1,0,"C",1);

$pdf-> SetX(40);
$pdf-> Cell(20,6,"Level",1,0,"C",1);

$pdf-> SetX(60);
$pdf-> Cell(30,6,"Ash-Crypt Bldg.",1,0,"C",1);

$pdf-> SetX(90);
$pdf-> Cell(30,6,"Unit Price",1,0,"C",1);

$pdf-> SetX(120);
$pdf-> Cell(30,6,"Discount",1,0,"C",1);

$pdf-> SetX(150);
$pdf-> Cell(35,6,"Discounted Price",1,0,"C",1);


$pdf-> SetFont("Arial","",10);
$pdf-> SetY($_Table_Position);
$pdf-> SetX(15);
$pdf-> MultiCell(25,6,"$pdfUnitName",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(40);
$pdf-> MultiCell(20,6,"$pdfLevel",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(60);
$pdf-> MultiCell(30,6,"$pdfAshCrypt",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(90);
$pdf-> MultiCell(30,6,"P $pdfSellingPrice",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(120);
$pdf-> MultiCell(30,6,"P $pdfDiscount",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(150);
$pdf-> MultiCell(35,6,"P $pdfDiscountedPrice",1,"L");


//TOTAL AMOUNT TO PAY
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(100);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Mode of Payment:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(100);
$pdf-> SetX(160);
$pdf-> Cell(0,10,"$pdfModeOfPayment","",1);

//TOTAL AMOUNT TO PAY
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(115);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Total Amount:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(115);
$pdf-> SetX(160);
$pdf-> Cell(0,10,"Php $pdfDiscountedPrice","",1);

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
$pdf-> Cell(0,10,"Php $pdfAmountPaid","",1);

//CHANGE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(130);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Change:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(130);
$pdf-> SetX(160);
$pdf-> Cell(0,10,"Php $tfBalance","",1);

//Received By
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(140);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Received by:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(140);
$pdf-> SetX(50);
$pdf-> Cell(0,10,"Kevin Bernacer","",1);

//-------------------------NEW PAGE---------------------------

$pdf->AddPage('L','Letter','');

$pdf-> SetX(35);
$pdf-> Image("$companyLogo",18,7,25);

$pdf-> SetFont("Arial","B",20);
$pdf-> SetY(15);
$pdf-> SetX(45);
$pdf-> Cell(150,10,"$companyName");

$pdf-> SetFont("Arial","",9);
$pdf-> SetY(22);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"$companyAddress","",1);

$pdf-> SetY(27);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"$companyEmail","",1);

$pdf-> SetY(32);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"$companyContact","",1);
// $pdf-> SetY(27);
// $pdf-> SetX(45);
// $pdf-> SetFont("Arial","","10");
// $pdf-> Cell(0,10,"Barangay Mayamot, Antipolo City","",1);

$pdf-> SetX(30);
$pdf-> Line(20, 40, 300-50, 40);

$pdf-> SetFont("Arial","B", 40);
$pdf-> SetTextColor(0,100,0);
$pdf-> SetY(50);
$pdf -> SetX(35);
$pdf-> Cell(0,10,"CERTIFICATE OF OWNERSHIP","C",1);

$pdf-> SetTextColor(0,0,0);

$pdf-> SetFont("Arial","", 20);
$pdf-> SetY(70);
$pdf -> SetX(103);
$pdf-> Cell(0,10,"This is to certify that","C",1);

$pdf-> SetFont("Arial","B", 30);
// $pdf-> SetY(85);
// $pdf -> SetX(105);
$mid_x = 135;
$text = $pdfCustomer;
$pdf->Text($mid_x - ($pdf->GetStringWidth($text) / 2), 90, $text);
// $pdf-> Cell(0,10,"$pdfCustomer","C",1);

$pdf-> SetFont("Arial","", 20);
$pdf-> SetY(95);
$pdf -> SetX(129);
$pdf-> Cell(0,10,"of","C",1);

$pdf-> SetFont("Arial","B", 24);
$pdf-> SetY(105);
$pdf -> SetX(60);

$mid_x = 135;
$text = $pdfAddress;
$pdf->Text($mid_x - ($pdf->GetStringWidth($text) / 2), 112, $text);
//$pdf-> Cell(0,10,"$pdfAddress","C",1);

$pdf-> SetFont("Arial","", 20);
$pdf-> SetY(115);
$pdf -> SetX(103);
$pdf-> Cell(0,10,"is the legal owner of","C",1);

$pdf-> SetFont("Arial","B", 30);
// $pdf-> SetY(128);
// $pdf -> SetX(35);
// $pdf-> Cell(0,10,"$pdfTypeName $pdfSectionName-BLOCK $pdfBlockName-LOT $pdfLotName","C",1);
$mid_x = 135;
$block = "-LEVEL";
$lot = "-UNIT";
$space = " ";
$text = $tfAshCrypt.$block.$space.$pdfLevel.$lot.$space.$tfUnitName;
$pdf->Text($mid_x - ($pdf->GetStringWidth($text) / 2), 135, $text);

$pdf-> SetFont("Arial","", 20);
$pdf-> SetY(140);
$pdf -> SetX(97);
$pdf-> Cell(0,10,"Given this on $pdfDate","C",1);

$pdf-> SetFont("Arial","", 18);
$pdf-> SetY(170);
$pdf -> SetX(115);
$pdf-> Cell(0,10,"Jeron Cruz","C",1);

$pdf-> SetX(30);
$pdf-> Line(105, 180, 160, 180);

$pdf-> SetY(181);
$pdf -> SetX(105);
$pdf-> Cell(0,10,"Managing Director","C",1);




$pdf->Output();


?>