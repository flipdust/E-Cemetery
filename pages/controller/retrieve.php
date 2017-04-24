<?php


class archiveInterest{

    function archive($tfInterestId){
        
        $sql = "UPDATE `dbholygarden`.`tblinterest` SET `intStatus`='0' WHERE `intInterestId`= '$tfInterestId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertInterest = new alerts();
            $alertInterest -> alertRetrieve();
        }
    }        
}

class archiveType   {

    function archive($tfTypeID){
        
        $sql = "UPDATE `dbholygarden`.`tbltypeoflot` SET `intStatus`='0' WHERE `intTypeID`= '$tfTypeID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertType = new alerts();
            $alertType -> alertRetrieve();
        }
    }        
}



class archiveSection{

    function archive($tfSectionID){
        $sql = "call retrieveSection($tfSectionID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertSection = new alerts();
            $alertSection -> alertRetrieve();
        }//if
    }//function        
}//archiveSection



class archiveBlock{

    function archive($tfBlockID){
        
        $sql = "call retrieveBlock($tfBlockID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";

            $alertBlock = new alerts();
            $alertBlock -> alertRetrieve();
        }//if
    }//function      
}//archiveBlock

class archiveLot{

    function archive($tfLotID){
        $sql = "UPDATE `dbholygarden`.`tbllot` SET `intStatus`='0' WHERE `intLotID`= '$tfLotID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)) {
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertLot = new alerts();
            $alertLot -> alertRetrieve();

        }//if
    }//function      
}//archiveLot

class archiveAC {

    function archive($tfAshID){
        $sql = "call retrieveAshCrypt($tfAshID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertAC = new alerts();
            $alertAC -> alertRetrieve();
        }//if
    }//function      
}//archiveAC

class archiveLA {

    function archive($tfLevelAshID){
        $sql = "call retrieveLevel($tfLevelAshID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertLA = new alerts();
            $alertLA -> alertRetrieve();

        }//if
    }//function
}//archiveLA


class archiveAsh{

    function archive($tfUnitID){
        $sql = "UPDATE `dbholygarden`.`tblacunit` SET `intStatus`='0' WHERE `intUnitID`= '$tfUnitID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertAsh = new alerts();
            $alertAsh -> alertRetrieve();
        }//if
    }//function        
}//archiveAsh

class archiveRequirement{

    function archive($tfRequirementId){
        $sql = "UPDATE `dbholygarden`.`tblrequirement` SET `intStatus`='0' WHERE `intRequirementId`= '$tfRequirementId'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertRequire = new alerts();
            $alertRequire -> alertRetrieve();
        }
    }        
}

class archiveService{

    function archive($tfServiceID){
        $sql = "call retrieveService($tfServiceID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertService = new alerts();
            $alertService -> alertRetrieve();
        }
    }        
}

class archiveDiscount{

    function archive($tfDiscountID){
        $sql = "UPDATE `dbholygarden`.`tbldiscount` SET `intStatus`='0' WHERE `intDiscountID`= '$tfDiscountID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Retrieve!')</script>";
            $alertsDiscount = new alerts();
            $alertsDiscount -> alertRetrieve();
        }
    }        
}



?>