<?php
require('../../../fpdf/fpdf.php');

$pdfAvailUnitId = "";
$pdfLotName = "";
$pdfTypeName = "";
$pdfSectionName = "";
$pdfBlockName = "";
$pdfSellingPrice = "";
$pdfCustomer = "";
$pdfDate = "";
$pdfModeOfPayment= "";
$pdfDiscountedPrice= "";
$pdfDiscount= "";
$pdfAmountPaid= "";


$tfAvailUnitId = $_GET['tfAvailUnitId'];
$tfLotName = $_GET['tfLotName'];
$tfTypeName = $_GET['tfTypeName'];
$tfSectionName = $_GET['tfSectionName'];
$tfBlockName = $_GET['tfBlockName'];
$tfSellingPrice = $_GET['tfSellingPrice'];
$tfCustomer = $_GET['tfCustomer'];
$tfDate = $_GET['tfDate'];
$tfModeOfPayment = $_GET['tfModeOfPayment'];
$tfDiscountedPrice = $_GET['tfDiscountedPrice'];
$tfDiscount = $_GET['tfDiscount'];
$tfAmountPaid = $_GET['tfAmountPaid'];

$pdfAvailUnitId = $pdfAvailUnitId.$tfAvailUnitId;
$pdfLotName = $pdfLotName.$tfLotName;
$pdfTypeName = $pdfTypeName.$tfTypeName;
$pdfSectionName = $pdfSectionName.$tfSectionName;
$pdfBlockName = $pdfBlockName.$tfBlockName;
$pdfSellingPrice = $pdfSellingPrice.$tfSellingPrice;
$pdfCustomer = $pdfCustomer.$tfCustomer;
$pdfDate = $pdfDate.$tfDate;
$pdfModeOfPayment= $pdfModeOfPayment.$tfModeOfPayment;
$pdfDiscountedPrice= $pdfDiscountedPrice.$tfDiscountedPrice;
$pdfDiscount= $pdfDiscount.$tfDiscount;
$pdfAmountPaid= $pdfAmountPaid.$tfAmountPaid;


$pdf = new FPDF();


$pdf->AddPage();

$pdf-> SetX(35);
$pdf-> Image('c:\xampp\htdocs\MLMS\fpdf\tutorial\logo.png',10,2,30);

$pdf-> SetFont("Arial","B",20);
$pdf-> SetY(8);
$pdf-> SetX(45);
$pdf-> Cell(150,10,"Memorial Lot Management System");

$pdf-> SetFont("Arial","",9);
$pdf-> SetY(15);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"Room 203 F N Crisostomo Building, Sumulong Highway","",1);
$pdf-> SetY(20);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"Barangay Mayamot, Antipolo City","",1);

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
$pdf-> Cell(0,10,"$pdfAvailUnitId","",1);

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
$pdf-> Cell(0,10,"$pdfCustomer C.","",1);



$_Fields_Name_Position = 65; //Position Header
$_Table_Position = 71;	

$pdf-> SetFillColor(232,232,232);

$pdf-> SetFont("Arial", "B", 10);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(15);
$pdf-> Cell(25,6,"Unit Type",1,0,"C",1);

$pdf-> SetX(40);
$pdf-> Cell(20,6,"Section",1,0,"C",1);

$pdf-> SetX(60);
$pdf-> Cell(20,6,"Block",1,0,"C",1);

$pdf-> SetX(80);
$pdf-> Cell(20,6,"Lot",1,0,"C",1);

$pdf-> SetX(100);
$pdf-> Cell(30,6,"Unit Price",1,0,"C",1);

$pdf-> SetX(130);
$pdf-> Cell(30,6,"Discount",1,0,"C",1);

$pdf-> SetX(160);
$pdf-> Cell(35,6,"Discounted Price",1,0,"C",1);

$pdf-> SetFont("Arial","",10);
$pdf-> SetY($_Table_Position);
$pdf-> SetX(15);
$pdf-> MultiCell(25,6,"$pdfTypeName",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(40);
$pdf-> MultiCell(20,6,"$pdfSectionName",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(60);
$pdf-> MultiCell(20,6,"$pdfBlockName 1",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(80);
$pdf-> MultiCell(20,6,"$pdfLotName",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(100);
$pdf-> MultiCell(30,6,"PHP $pdfSellingPrice",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(130);
$pdf-> MultiCell(30,6,"PHP $pdfDiscount",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(160);
$pdf-> MultiCell(35,6,"PHP $pdfDiscountedPrice",1,"L");


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
$pdf-> Cell(0,10,"Php 0.00","",1);

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
$pdf-> Image('c:\xampp\htdocs\MLMS\fpdf\tutorial\logo.png',18,7,25);

$pdf-> SetFont("Arial","B",20);
$pdf-> SetY(15);
$pdf-> SetX(45);
$pdf-> Cell(150,10,"Memorial Lot Management System");

$pdf-> SetFont("Arial","",9);
$pdf-> SetY(22);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"Room 203 F N Crisostomo Building, Sumulong Highway","",1);
$pdf-> SetY(27);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"Barangay Mayamot, Antipolo City","",1);

$pdf-> SetX(30);
$pdf-> Line(20, 35, 300-50, 35);

$pdf-> SetFont("Arial","B", 40);
$pdf-> SetTextColor(0,100,0);
$pdf-> SetY(45);
$pdf -> SetX(40);
$pdf-> Cell(0,10,"CERTIFICATE OF OWNERSHIP","C",1);

$pdf-> SetTextColor(0,0,0);

$pdf-> SetFont("Arial","", 20);
$pdf-> SetY(70);
$pdf -> SetX(110);
$pdf-> Cell(0,10,"This is to certify that","C",1);

$pdf-> SetFont("Arial","B", 30);
$pdf-> SetY(85);
$pdf -> SetX(70);
$pdf-> Cell(0,10,"$pdfCustomer","C",1);

$pdf-> SetFont("Arial","", 20);
$pdf-> SetY(95);
$pdf -> SetX(130);
$pdf-> Cell(0,10,"of","C",1);

$pdf-> SetFont("Arial","B", 24);
$pdf-> SetY(105);
$pdf -> SetX(40);
$pdf-> Cell(0,10,"Gawaran Ext., Molino VII, Bacoor City, Cavite","C",1);

$pdf-> SetFont("Arial","", 20);
$pdf-> SetY(115);
$pdf -> SetX(110);
$pdf-> Cell(0,10,"is the legal owner of","C",1);

$pdf-> SetFont("Arial","B", 30);
$pdf-> SetY(128);
$pdf -> SetX(40);
$pdf-> Cell(0,10,"$pdfTypeName $pdfSectionName-BLOCK $pdfBlockName-LOT $pdfLotName","C",1);

$pdf-> SetFont("Arial","", 20);
$pdf-> SetY(140);
$pdf -> SetX(80);
$pdf-> Cell(0,10,"$pdfDate","C",1);

$pdf-> SetFont("Arial","", 18);
$pdf-> SetY(170);
$pdf -> SetX(130);
$pdf-> Cell(0,10,"Jeron Cruz","C",1);

$pdf-> SetX(30);
$pdf-> Line(120, 180, 180, 180);

$pdf-> SetY(183);
$pdf -> SetX(123);
$pdf-> Cell(0,10,"Managing Director","C",1);




$pdf->Output();


?>