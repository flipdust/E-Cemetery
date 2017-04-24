<?php
define('server','localhost');
define('user','root');
define('pass','');
define('mydb','dbholygarden');

$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
mysql_select_db(constant('mydb'));

$id = $_GET['serviceId'];
$age = $_GET['age'];
$sql1 = "SELECT s.intServiceID, s.strServiceName, s.dblServicePrice, d.dblPercent, d.strDescription FROM tblservice s
        INNER JOIN tbldiscount d ON d.intServiceID = s.intServiceID
        INNER JOIN tblservicetype st ON st.intServiceTypeId = s.intServiceTypeId WHERE s.intStatus = 0 AND s.intServiceID = '$id' AND st.strServiceTypeName = 'Service Scheduling' ORDER BY s.strServiceName ASC";

$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
mysql_select_db(constant('mydb'));
$result1 = mysql_query($sql1,$conn);

$row1 = mysql_fetch_array($result1); 

$intServiceID   =$row1['intServiceID'];
$strServiceName =$row1['strServiceName'];
$dblServicePrice=$row1['dblServicePrice'];
$dblPercent     =$row1['dblPercent'];
$strDescription =$row1['strDescription'];

if($age>=60){
    $discount=$dblServicePrice*$dblPercent;
    $total=$dblServicePrice-$discount;
}else{
    $total=$dblServicePrice;
}

echo json_encode($total);

?>