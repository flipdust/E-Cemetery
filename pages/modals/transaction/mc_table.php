<?php
require_once('../../../fpdf/fpdf.php');
require('../../controller/connection.php');


class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
    function Header()
{
    
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
    $this->Image($companyLogo,15,6,25);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    $this->SetLeftMargin(45);
    // Title
    $this->Cell(0,0,$companyName,0,0,'L');
    $this->SetFont('Arial','',10);
    $this->Ln(7);
    $this->Cell(0,0,$companyAddress,0,0,'L');    
    $this->Ln(5);
    $this->Cell(0,0,$companyEmail,0,0,'L');
    $this->Ln(5);
    $this->Cell(0,0,$companyContact,0,0,'L');
    $this->Ln(7);
    $this->SetX(15);
    $this->Cell(0,0,"__________________________________________________________________________________________",0,0,'L');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        $date = date('F d, Y h:i:sa',strtotime("+6 hours"));
        $this->Cell(0,10,$date,0,0,'R');
}

}
?>