<?php
	class UnscheduledController
	{
		public function getUnscheduled()
		{
			$conn 		= mysql_connect(constant('server'),constant('user'),constant('pass'));
        				  mysql_select_db(constant('mydb'));
        	//select customer
			$sql = "SELECT c.intCustomerId, c.strFirstName, c.strMiddleName, c.strLastName FROM tbllotdeceased ld INNER JOIN tbldeceased d ON d.intDeceasedId = ld.intDeceasedId LEFT JOIN tblschedule s ON ld.intLotDeceasedId = s.intLotDeceasedId INNER JOIN tblcustomer c ON c.intCustomerId = d.intCustomerId WHERE s.intScheduleId IS NULL";
			$result = mysql_query($sql, $conn);
			while($row = mysql_fetch_array($result))
			{
				$intCustomerId = $row['intCustomerId'];
				$strFirstName = $row['strFirstName'];
				$strMiddleName = $row['strMiddleName'];
				$strLastName = $row['strLastName'];

				//select
				$sql2 = "SELECT ser.strServiceName, d.strFirstName, d.strMiddleName, d.strLastName FROM tbllotdeceased ld INNER JOIN tbldeceased d ON d.intDeceasedId = ld.intDeceasedId LEFT JOIN tblschedule s ON ld.intLotDeceasedId = s.intLotDeceasedId INNER JOIN tblcustomer c ON c.intCustomerId = d.intCustomerId INNER JOIN tbltransactiondeceased td ON d.intDeceasedId = td.intDeceasedId INNER JOIN tblservice ser ON ser.intServiceId = td.intServiceId WHERE c.intCustomerId = '".$intCustomerId."' AND s.intScheduleId IS NULL";
				$result2 = mysql_query($sql2, $conn)
				while($row = mysql_fetch_array($result2))
				{
					$strServiceName = $row['strServiceName'];
					$strFirstNameDeceased = $row['strFirstName'];
					$strMiddleNameDeceased = $row['strMiddleName'];
					$strLastNameDeceased = $row['strLastName'];
				}
			}
		}
	}
?>