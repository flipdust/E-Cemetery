<?php
define('server','localhost');
define('user','root');
define('pass','');
define('mydb','dbholygarden');

                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                    mysql_select_db(constant('mydb'));
$id = $_GET['id'];
$sql="select * from tblavailunit u inner join tblcustomer c on c.intCustomerId=u.intCustomerId inner join tbllot l on l.intLotId=u.intLotId inner join tblblock b on b.intBlockID = l.intBlockID inner join tblsection s on s.intSectionID = b.intSectionID where u.intCustomerId='$id' AND (boolDownpaymentStatus=1 OR strModeOfPayment='Spotcash')";
$result = mysql_query($sql,$conn);
$i=0;
$lot='';
while ($row=mysql_fetch_array($result)) {
	$lots=$row['strLotName'];
	$intLot=$row['intLotId'];
	$section=$row['strSectionName'];
	$block=$row['strBlockName'];
	$space=" ";
	$lot.="<option value='$intLot'>$lots$space$block$space$section</option>";
}
echo json_encode($lot);

?>