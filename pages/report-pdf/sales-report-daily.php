<?php
require('../../fpdf/fpdf.php');
require ("../controller/connection.php");
		
	$companyName = "";
		$companyAddress = "";
		$companyContact = "";
		$companyEmail = "";
		$companyLogo = "";
				
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
			$companyLogo = $companyLogo.$logo;
			// echo $companyLogo;
		}
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
$pdf -> SetX(80);
$pdf-> Cell(0,10,"SALES REPORT","C",1);
$pdf-> SetFont("Arial","", 12);
$pdf-> SetY(40);
$pdf -> SetX(90);
$pdf-> Cell(0,10,"09/22/2016","C",1);



$_Fields_Name_Position = 55; //Position Header
$_Table_Position = 71;	

$pdf-> SetFillColor(232,232,232);

$pdf-> SetFont("Arial", "B", 10);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(8);
$pdf-> Cell(30,6,"Date Purchased",1,0,"C",1);
$pdf-> SetX(38);
$pdf-> Cell(35,6,"Customer Name",1,0,"C",1);
$pdf-> SetX(73);
$pdf-> Cell(35,6,"Unit Location",1,0,"C",1);
$pdf-> SetX(108);
$pdf-> Cell(30,6,"Unit Type",1,0,"C",1);
$pdf-> SetX(138);
$pdf-> Cell(30,6,"Date Fully Paid",1,0,"C",1);
$pdf-> SetX(168);
$pdf-> Cell(35,6,"Total Amount Paid",1,0,"C",1);



$pdf->Output();


?>