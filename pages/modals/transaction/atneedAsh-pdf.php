<?php
require('../../../fpdf/fpdf.php');
require ("../../controller/connection.php");

$pdfAvailUnitAshId = "";
$pdfDate = "";
$pdfCustomer = "";
$pdfUnitName = "";
$pdfLevel = "";
$pdfAshCrypt = "";
$pdfSellingPrice = "";
$pdfReservationFee = "";

$pdfDueDate= "";
$pdfDownpayment="";
$pdfYearsToPay="";
$pdfMonthlyAmortization="";

$pdfModeOfPayment= "";
$pdfAmountPaid= "";
$pdfBalance= "";


$tfAvailUnitAshId = $_GET['tfAvailUnitAshId'];
$tfDate = $_GET['tfDate'];
$tfCustomer = $_GET['tfCustomer'];
$tfUnitName = $_GET['tfUnitName'];
$tfLevel = $_GET['tfLevel'];
$tfAshCrypt = $_GET['tfAshCrypt'];
$tfSellingPrice = $_GET['tfSellingPrice'];
$tfReservationFee = $_GET['tfReservationFee'];

$tfDueDate = $_GET['tfDueDate'];
$tfDownpayment = $_GET['tfDownpayment'];
$tfYearsToPay = $_GET['tfYearsToPay'];
$tfamortization = $_GET['tfamortization'];

$tfModeOfPayment = $_GET['tfModeOfPayment'];
$tfAmountPaid = $_GET['tfAmountPaid'];
$tfBalance = $_GET['tfBalance'];


$pdfAvailUnitAshId = $pdfAvailUnitAshId.$tfAvailUnitAshId;
$pdfDate = $pdfDate.$tfDate;
$pdfCustomer = $pdfCustomer.$tfCustomer;
$pdfUnitName = $pdfUnitName.$tfUnitName;
$pdfLevel = $pdfLevel.$tfLevel;
$pdfAshCrypt = $pdfAshCrypt.$tfAshCrypt;
$pdfSellingPrice = $pdfSellingPrice.$tfSellingPrice;
$pdfReservationFee = $pdfReservationFee.$tfReservationFee;

$pdfDueDate = $pdfDueDate.$tfDueDate;
$pdfDownpayment = $pdfDownpayment.$tfDownpayment;
$pdfYearsToPay = $pdfYearsToPay.$tfYearsToPay;
$pdfMonthlyAmortization = $pdfMonthlyAmortization.$tfamortization;


$pdfModeOfPayment= $pdfModeOfPayment.$tfModeOfPayment;
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

while($row = mysql_fetch_array($result)){
    
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
    
}//while
mysql_close($conn);
          

$pdf = new FPDF();


$pdf->AddPage();

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

$pdf-> SetFont("Arial", "B", 12);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(20);
$pdf-> Cell(30,6,"Unit Name",1,0,"C",1);

$pdf-> SetX(50);
$pdf-> Cell(25,6,"Level",1,0,"C",1);

$pdf-> SetX(75);
$pdf-> Cell(35,6,"Ash-Crypt Bldg.",1,0,"C",1);

$pdf-> SetX(110);
$pdf-> Cell(30,6,"Unit Price",1,0,"C",1);

$pdf-> SetX(140);
$pdf-> Cell(35,6,"Reservation Fee",1,0,"C",1);


$pdf-> SetFont("Arial","",10);
$pdf-> SetY($_Table_Position);
$pdf-> SetX(20);
$pdf-> MultiCell(30,6,"$pdfUnitName",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(50);
$pdf-> MultiCell(25,6,"$pdfLevel",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(75);
$pdf-> MultiCell(35,6,"$pdfAshCrypt",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(110);
$pdf-> MultiCell(30,6,"$tfSellingPrice",1,"L");

$pdf-> SetY($_Table_Position);
$pdf-> SetX(140);
$pdf-> MultiCell(35,6,"P $pdfReservationFee",1,"L");




//DUE DATE FOR DOWNPAYMENT
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(95);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Due Date for Dowpayment:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(95);
$pdf-> SetX(75);
$pdf-> Cell(0,10,"$pdfDueDate","",1);


//DOWNPAYMENT FEE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(105);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Downpayment Amount:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(105);
$pdf-> SetX(75);
$pdf-> Cell(0,10,"Php $pdfDownpayment","",1);

//YEARS TO PAY
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(115);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Years to pay:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(115);
$pdf-> SetX(75);
$pdf-> Cell(0,10,"$pdfYearsToPay","",1);


//MONTHLY AMORTIZATION
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(125);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Monthly Amortization:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(125);
$pdf-> SetX(75);
$pdf-> Cell(0,10,"Php $pdfMonthlyAmortization","",1);

//MODE OF PAYMENT
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
$pdf-> Cell(0,10,"Php $pdfReservationFee","",1);

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
$pdf-> Cell(0,10,"Php $pdfBalance","",1);

//Received By
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(170);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Received by:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(170);
$pdf-> SetX(50);
$pdf-> Cell(0,10,"Kevin Bernacer","",1);


$pdf->Output();


?>