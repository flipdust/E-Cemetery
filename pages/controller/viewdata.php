<?php

class interest{

    function viewInterest(){
        
		$sql = "SELECT * FROM tblinterest WHERE intStatus = '0'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){
			
            $intInterestId = $row['intInterestId'];
            $intNoOfYear = $row['intNoOfYear'];
            $deciAtNeedInterest = $row['deciAtNeedInterest'];
            $deciRegularInterest = $row['deciRegularInterest'];
            $intStatus = $row['intStatus'];
            
            echo 
				"<tr>
					<td style = 'font-size:18px; text-align: right;'>$intNoOfYear</td>
					<td style = 'font-size:18px; text-align: right;'>$deciAtNeedInterest %</td>
					<td style = 'font-size:18px; text-align: right;'>$deciRegularInterest %</td>
				   
					<td align='center'>
                       <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#update$intInterestId'>
							<i class='glyphicon glyphicon-pencil'></i>
					   </button>
                       <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intInterestId'>
							<i class='glyphicon glyphicon-trash'></i>
					   </button>
					</td>
				</tr>
               
				<div class = 'modal fade' id = 'update$intInterestId'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' >
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Interest Rate</b></H3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'interest.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
										   <input type='hidden' class='form-control' name= 'tfInterestId' value='$intInterestId' >
										 </div>
									</div>
									
									<div class='row'>
										<div class='form-group' >
											<label class='col-md-5' style='font-size: 18px; margin-top:.30em' align='right'>No. of Year:</label>
											<div class='col-md-7'>
												<input type='number' class='form-control input-md' min='1' name='tfNoOfYear' onkeypress='return validateNumber(event)' value='$intNoOfYear' required/>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-5' style='font-size: 18px; margin-top:.30em' align='right'>At Need:</label>
											<div class='col-md-7'>
												<div class='input-group'>
													<input type='text' class='form-control input-md tfAtNeedInterest' name= 'tfAtNeedInterest' value='$deciAtNeedInterest' required/>
													<span class = 'input-group-addon'>%</span>
												</div>
											</div> 
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-5' style = 'font-size: 18px; margin-top:.30em' align='right'>Regular:</label>
											<div class='col-md-7'>
												<div class='input-group'>
													<input type='text' class='form-control input-md tfRegularInterest' name= 'tfRegularInterest' value='$deciRegularInterest' required/>
													<span class = 'input-group-addon'>%</span>
												</div>
											</div> 
										</div>
									</div>   
									
									<div class='form-group modal-footer'> 
										<div class='col-sm-offset-4 col-sm-8'>
											<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									</div>
								</form>
							</div>
						</div><!-- content-->
					</div><!-- modal-dialog-->
				</div><!-- modal-fade-->
                
				<!--DEACTIVATED MODAL-->
				<div class = 'modal fade' id = 'deactivate$intInterestId'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' style = 'height: 220px;'>
                            
							<!--header-->
							<div class = 'modal-header' style='background: light-red'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Deactivate Interest Rate</b></H3></center>
							</div>
                            
							<!--body (form)-->
							<div class = 'modal-body'>
								<h3>Are you sure you want to deactivate?</h3>
								
								<form class='form-horizontal' role='form' action = 'interest.php' method= 'POST'>						  
									<div class='form-group'>
										<div class='col-sm-8'>
											<input type='hidden' class='form-control' name= 'tfInterestId' value='$intInterestId' >
										</div>
									</div>
                                    
									<div class='modal-footer'> 
										<div class='col-sm-8'  style = 'margin-top: 10px;'>
											<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
										</div>
									</div>
								</form>
							</div><!-- modal-body-->
						</div><!--modal-content-->
					</div><!-- modal-dialog-->
				</div><!-- modal-fade-->
			";
		}//while($row = mysql_fetch_array($result))
		mysql_close($conn);         
    }//function viewInterest()
   
}//class interest
//______________________________________________________________


class types{

    function viewTypes(){
		$sql = "Select * from tbltypeoflot WHERE intStatus = 0 ORDER BY strTypeName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){
			
			$intTypeID = $row['intTypeID']; 
			$strTypeName = $row['strTypeName'];
			$intNoOfLot = $row['intNoOfLot'];
			$deciSellingPrice = $row['deciSellingPrice'];
			$intStatus = $row['intStatus']; 
            
			echo
				"
				<tr>
					<td style = 'font-size:18px;'>$strTypeName</td>
					<td style = 'font-size:18px; text-align: right;'>$intNoOfLot</td>
					<td style = 'font-size:18px; text-align: right;'>₱ ".number_format($deciSellingPrice,2)."</td>
			
					<td align='center'>
						<button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#update$intTypeID'>
							<i class='glyphicon glyphicon-pencil'></i>
						</button>
						<button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intTypeID'>
							<i class='glyphicon glyphicon-trash'></i>
						</button>
					</td>
				</tr>
                
				<div class = 'modal fade' id = 'update$intTypeID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' >
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Lot Type</b></H3></center>
							</div>
                            
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'typeoflot.php' method= 'POST'>						  
									
									<div class='form-group'>
									   <div>
										   <input type='hidden' class='form-control' name= 'tfTypeID' value='$intTypeID' >
									   </div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size:18px; margin-top:.30em;' >Lot Type:</label>
											<div class='col-md-7'>
												<input type='text' class='form-control input-md' name= 'tfTypeName' value= '$strTypeName' required/>
											</div>
										</div>
									</div>

									<div class='row'>     
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;' >No. of Lot:</label>
											<div class='col-md-7'>
												<input type='number' class='form-control input-md' min='1' name= 'tfNoOfLot' value= '$intNoOfLot' onkeypress='return validateNumber(event)' required/>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'> Selling Price:</label>
											<div class='col-md-7'>
												<div class='input-group'>
													<span class = 'input-group-addon'>₱</span>
													<input type='text' class='form-control input-md tfSellingPrice' name= 'tfSellingPrice' value='$deciSellingPrice' required/>
												</div>
											</div>
										</div>
									</div>
									
									<div class='form-group modal-footer'> 
										<div class='col-sm-offset-4 col-sm-8'>
											<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									</div>
								</form>
							</div><!-- modal-body-->
						</div><!-- modal-content-->
					</div><!-- modal-dialog-->
				</div><!--modal-fade-->
			
				<!--DEACTIVATED MODAL-->
				<div class = 'modal fade' id = 'deactivate$intTypeID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' style = 'height: 230px;'>
							
							<!--header-->
							<div class = 'modal-header' style='background: light-red'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><b><h3>Deactivate Lot Type</h3></b></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<h3>Are you sure you want deactivate $strTypeName?</h3>
								
								<form class='form-horizontal' role='form' action = 'typeoflot.php' method= 'POST'>						  
									<div class='form-group'>
										<div class='col-sm-8'>
											<input type='hidden' class='form-control' name= 'tfTypeID' value='$intTypeID' >
										</div>
									</div>
									
									<div class='modal-footer'> 
										<div class='col-sm-8'>
											<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
										</div>
									</div>
								</form>
							</div><!-- modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
			";
		}//while($row = mysql_fetch_array($result))
		mysql_close($conn);         
	}//function viewTypes()         
}//class lot type
//_________________________________________


class section{
    
    function viewSection(){
		
        $sql = "SELECT * FROM tblsection WHERE intStatus = 0 ORDER BY strSectionName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){
			
			$intSectionID = $row['intSectionID']; 
			$strSectionName = $row['strSectionName'];
			$intNoOfBlock = $row['intNoOfBlock'];
			$intStatus = $row['intStatus']; 
			
			echo 
				"<tr>
					<td style ='font-size:20px;'>$strSectionName</td>
					<td style = 'text-align: right; font-size: 18px;'>$intNoOfBlock</td>
				
					<td align='center'>
						<button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#update$intSectionID'>
							<i class='glyphicon glyphicon-pencil'></i>
						</button>
						<button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intSectionID'>
							<i class='glyphicon glyphicon-trash'>
						</i></button>
					  </td>
				</tr>
			
				<div class = 'modal fade' id = 'update$intSectionID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content'>
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Section</b></H3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'section.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
											<input type='hidden' class='form-control' name= 'tfSectionID' value='$intSectionID' >
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Section:</label>
											<div class='col-md-7'>
												<input type='text 'class='form-control input-md' name='tfSectionName' value= '$strSectionName' onkeypress='return validateSectionName(event)' required/>
											</div>
										</div>
									</div>
									
									<div class='row'>     
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>No. of Block:</label>
											<div class='col-md-7'>
												<input type='number' class='form-control input-md' min='1' name= 'tfNoOfBlock' value= '$intNoOfBlock' onkeypress='return validateNumber(event)' required/>
											</div>
										</div>
									</div>
									
									<div class='form-group modal-footer'> 
										<div class='col-sm-offset-4 col-sm-8'>
											<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									</div>
								</form>
							</div><!-- modal-body-->
						</div><!--modal-content-->
					</div><!-- modal-dialog-->
				</div><!-- modal-fade-->
				
				<!--DEACTIVATED MODAL-->
				<div class = 'modal fade' id = 'deactivate$intSectionID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' style = 'height: 220px;'>
							
							<!--header-->
							<div class = 'modal-header' style='background: light-red'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><h3 class = 'modal-title'>Deactivate:</h3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<h3>Are you sure you want deactivate $strSectionName?</h3>
							
								<form class='form-horizontal' role='form' action = 'section.php' method= 'POST'>						  
									<div class='form-group'>
										<div class='col-sm-8'>
											<input type='hidden' class='form-control' name= 'tfSectionID' value='$intSectionID' >
										</div>
									 </div>
									
									<div class='modal-footer'> 
										<div class='col-sm-8'  style = 'margin-top: 10px;'>
											<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!-- modal-dialog-->
				</div><!--modal-fade-->
			";
		}//while($row = mysql_fetch_array($result))
		mysql_close($conn);         
	}//function viewSection()
}//class section
//________________________________________________________________
	
class block{

    function viewBlock(){
        
		$sql = "SELECT b.intBlockID, b.strBlockName, b.intNoOfLot, b.intStatus, t.strTypeName, s.strSectionName FROM tblblock b 
					INNER JOIN tblsection s ON b.intSectionID = s.intSectionID 
					INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID WHERE b.intStatus = 0 ORDER BY strSectionName ASC";
        
		$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
		mysql_select_db(constant('mydb'));
		$result = mysql_query($sql,$conn);

		while($row = mysql_fetch_array($result)){
	
			$intBlockID = $row['intBlockID']; 
			$strBlockName = $row['strBlockName'];
			$intNoOfLot = $row['intNoOfLot'];
			$intStatus = $row['intStatus'];
			$strTypeName = $row['strTypeName'];
			$strSectionName = $row['strSectionName'];
			
			
			echo 
				"<tr>
				  <td style ='font-size:18px;'>$strBlockName</td>
				  <td style ='font-size:18px;'> $strTypeName</td>
				  <td style ='font-size:18px;'> $strSectionName</td>
				  <td style ='font-size:18px; text-align:right;'>$intNoOfLot</td>
			
				  <td align='center'>
						<button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#update$intBlockID'>
						<i class='glyphicon glyphicon-pencil'></i></button>
						<button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intBlockID'>
						<i class='glyphicon glyphicon-trash'></i></button>
				  </td>
				</tr>
				
				<div class = 'modal fade' id = 'update$intBlockID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content'>
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Block</b></H3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'block.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
										<input type='hidden' class='form-control' name= 'tfBlockID' value='$intBlockID' >
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Block:</label>
											<div class='col-md-7'>
												<input type='text 'class='form-control input-md'name= 'tfBlockName' value= '$strBlockName' required/>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Lot Type:</label>
											<div class='col-md-7'>
												<select class='form-control' id='sel1' name = 'typeBlock' required>";
													
													$sql1 =  " select * from dbholygarden.tbltypeoflot where intStatus='0' ORDER BY strTypeName ASC";
													$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
													mysql_select_db(constant('mydb'));
													$result1 = mysql_query($sql1,$conn);
													
													while($row1 = mysql_fetch_array($result1)){
														
														$intTypeID1 =$row1['intTypeID'];
														$strTypeName1 =$row1['strTypeName'];
														echo "<option value = $intTypeID1";
														
														if($strTypeName == $strTypeName1){
															echo " selected";
														}//if
														
														echo ">$strTypeName1</option>";
													}//while
												echo "</select>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Section:</label>
											<div class='col-md-7'>
												<select class='form-control' name = 'section' required>";
													
													$sql2 =  " SELECT * FROM dbholygarden.tblsection WHERE intStatus='0' ORDER BY strSectionName ASC";
													$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
													mysql_select_db(constant('mydb'));
													$result2 = mysql_query($sql2,$conn);
													
													while($row2 = mysql_fetch_array($result2)){
														$intSectionID1 =$row2['intSectionID'];
														$strSectionName1 =$row2['strSectionName'];
														echo "<option value = $intSectionID1";
														
														if($strSectionName == $strSectionName1){
															echo " selected";
														}//if
														
														echo ">$strSectionName1</option>";
													}//while
												echo "</select>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>No. of Unit:</label>
											<div class='col-md-7'>
												<input type='number' class='form-control input-md' min='1' name= 'tfNoOfLot' value= '$intNoOfLot' onkeypress='return validateNumber(event)' required/>
											</div>
										</div>
									</div>
									
									<div class='form-group modal-footer'> 
										<div class='col-sm-offset-4 col-sm-8'>
											<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
				
				<!--DEACTIVATED MODAL-->
				<div class = 'modal fade' id = 'deactivate$intBlockID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' style = 'height: 220px;'>
						
							<!--header-->
							<div class = 'modal-header' style='background: light-red'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><b><h3>Deactivate Block</h3></b></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<h3>Are you sure you want deactivate $strBlockName?</h3>
								
								<form class='form-horizontal' role='form' action = 'block.php' method= 'POST'>						  
									  <div class='form-group'>
										<div class='col-sm-8'>
											<input type='hidden' class='form-control' name= 'tfBlockID' value='$intBlockID' >
										</div>
									 </div>
												
									<div class='modal-footer'> 
										<div class='col-sm-8'  style = 'margin-top: 10px;'>
											<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
			";
		}//while($row = mysql_fetch_array($result))
		mysql_close($conn);         
	}//function viewBlock()         


	function selectSection(){
		$sql = " SELECT * FROM dbholygarden.tblsection WHERE intStatus='0' ORDER BY strSectionName ASC";
		$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
		mysql_select_db(constant('mydb'));
		$result = mysql_query($sql,$conn);
		while($row = mysql_fetch_array($result)){
			echo "<option value = ".$row['intSectionID'].">".$row['strSectionName']."</option>";
		}//while
		mysql_close($conn);
	}//function

    function selectTypeBlock(){
        
		$sql = " SELECT * FROM dbholygarden.tbltypeoflot WHERE intStatus='0' ORDER BY strTypeName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result)){
            echo "<option value =". $row['intTypeID'].">".$row['strTypeName']."</option>";
        }//while
		mysql_close($conn);
    }//function

}//class block
//____________________________________________________	


class lot{

    function viewLot(){
        
		$sql = "Select l.intLotID, l.strLotName, b.strBlockName, t.strTypeName, s.strSectionName, l.intLotStatus, l.intStatus FROM tbllot l  
					INNER JOIN tblBlock b ON l.intBlockID = b.intBlockID 
					INNER JOIN	tbltypeoflot t ON b.intTypeID = t.intTypeID
					INNER JOIN tblsection s	ON b.intSectionID = s.intSectionID WHERE l.intStatus = '0' ORDER BY  strLotName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);

		while($row = mysql_fetch_array($result)){ 
			
			$intLotID =$row['intLotID'];
			$strLotName =$row['strLotName'];
			$strBlockName =$row['strBlockName'];
			$strTypeName=$row['strTypeName'];
			$strSectionName =$row['strSectionName'];
			$intLotStatus =$row['intLotStatus'];
			$intStatus =$row['intStatus'];

			if($intLotStatus==0){
			  $LotStatus ="Available";
			}else if($intLotStatus==1){
			  $LotStatus="Reserved";
			}else if($intLotStatus==2){
			  $LotStatus="Owned";
			}else{
              $LotStatus="At-Need";
            }
            
			echo 
				"<tr>
					<td style ='font-size:18px;'>$strLotName</td>
					<td style ='font-size:18px;'>$strBlockName</td>
					<td style ='font-size:18px;'>$strTypeName</td>
					<td style ='font-size:18px;'>$strSectionName</td>
					<td style ='font-size:18px;'>$LotStatus</td>

					<td align='center'>
					   <button type = 'button' class = 'btn btn-success' data-toggle = 'modal'  title='Edit' data-target = '#update$intLotID'>
					   <i class='glyphicon glyphicon-pencil'></i></button>
					   <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intLotID'>
					   <i class='glyphicon glyphicon-trash'></i></button>
					</td>
				</tr>
              
				<div class = 'modal fade' id = 'update$intLotID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content'>
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Lot-Unit</b></H3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'lot.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
										   <input type='hidden' class='form-control' name= 'tfLotID' value='$intLotID' >
										 </div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Lot Unit:</label>
											<div class='col-md-7'>
												<input type='text 'class='form-control input-md' name= 'tfLotName' value= '$strLotName' required/>
											</div>
										 </div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Block:</label>
											<div class='col-md-7'>
												<select class='form-control input-md' name = 'blockName' required>";
													
													$sql3 = " SELECT b.intBlockID as blockID, b.strBlockName as Bname, b.intNoOfLot, b.intStatus, t.strTypeName, s.strSectionName as Sname FROM tblblock b 
																	INNER JOIN tblsection s ON b.intSectionID = s.intSectionID 
																	INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID WHERE b.intStatus = 0 ORDER BY strBlockName ASC;";

													$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
													mysql_select_db(constant('mydb'));
													$result3 = mysql_query($sql3,$conn);
 
													while($row3 = mysql_fetch_array($result3)){
														$intBlockID2 =$row3['blockID'];
														$strBlockName2 =$row3['Bname'];
														$strSectionName2 =$row3['Sname'];
														
														echo "<option value = $intBlockID2";
														
														if($strBlockName == $strBlockName2){
															 echo " selected";
														}
														
														echo ">$strBlockName2 ($strSectionName2)</option>";
													}
													 
												echo "</select>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Lot Status:</label>
											<div class='col-md-7'>
											   <select class='form-control input-md' name = 'status' required>";
													
													$one = $two = $three = '';
													
													if($LotStatus == 'Available'){
														$one = 'selected';
													} else if($LotStatus == 'Reserved'){
														$two = 'selected';
													}else{
														$three = 'selected';
													}
													echo " <option value = '0' $one>Available</option>  
                                                
												</select>
											</div>
										</div>
									</div> 
									
									<div class='form-group modal-footer'> 
										<div class='col-sm-offset-4 col-sm-8'>
											<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
				
				<!--DEACTIVATED MODAL-->
				<div class = 'modal fade' id = 'deactivate$intLotID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' style = 'height: 220px;'>
							
							<!--header-->
							<div class = 'modal-header' style='background: light-red'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><b><h3>Deactivate Lot</h3></b></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<h3>Are you sure you want deactivate $strLotName?</h3>
                                
								<form class='form-horizontal' role='form' action = 'lot.php' method= 'POST'>						  
									<div class='form-group'>
										<div class='col-sm-8'>
											<input type='hidden' class='form-control' name= 'tfLotID' value='$intLotID' >
										</div>
									</div>
                                    
									<div class='modal-footer'> 
										<div class='col-sm-8'  style = 'margin-top: 10px;'>
											<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-dialog-->
					</div><!--modal-content-->
				</div><!--modal-fade-->
			";
		}//while($row = mysql_fetch_array($result))
		mysql_close($conn);         
    }//function viewLot()    
    
	function selectBlock(){
		$sql = " SELECT b.intBlockID as blockID, b.strBlockName as Bname, b.intNoOfLot, b.intStatus, t.strTypeName, s.strSectionName as Sname FROM tblblock b 
					INNER JOIN tblsection s ON b.intSectionID = s.intSectionID 
					INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID WHERE b.intStatus = 0 ;";
                
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
		
        while($row = mysql_fetch_array($result)){
            echo "<option value = '". $row['blockID']."'>". $row['Bname']." ( ".$row['Sname']." )</option>";
        }//while
		mysql_close($conn);
    }//function selectBlock
    
}//class Lot-Unit
//___________________________________________________

class ashCrypt{

    function viewAshCrypt(){
		
		$sql = "SELECT * FROM tblashcrypt WHERE intStatus='0' ORDER BY strAshName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
       
		while($row = mysql_fetch_array($result)){ 
			
			$intAshID = $row['intAshID'];
			$strAshName =$row['strAshName'];
			$intNoOfLevel =$row['intNoOfLevel'];
            
			echo 
				"<tr>
					<td style ='font-size:18px;'>$strAshName</td>
					<td style = 'text-align: right; font-size:20px;'>$intNoOfLevel</td>

					<td align = 'center'>
						<button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit'data-target = '#update$intAshID'>
							<i class='glyphicon glyphicon-pencil'></i>
						</button>
						<button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intAshID'>
							<i class='glyphicon glyphicon-trash'></i>
						</button>
					</td>
			   </tr>
               
               <div class = 'modal fade' id = 'update$intAshID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content'>
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Ash Crypt</b></H3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'ashcrypt.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
										   <input type='hidden' class='form-control' name= 'tfAshID' value='$intAshID' >
										 </div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Block:</label>
											<div class='col-md-5'>
												<input type='text 'class='form-control input-md' name= 'tfAshName' value= '$strAshName' required/>
											</div>
										 </div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>No. of Level:</label>
											<div class='col-md-5'>
												<input type='number' class='form-control input-md' min='1' name= 'tfNoOfLevel' value= '$intNoOfLevel' onkeypress='return validateNumber(event)' required/>
											</div>
										</div>
									</div>
									
									<div class='form-group modal-footer'> 
										<div class='col-sm-offset-5 col-sm-7'>
											<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--moda-dialog-->
				</div><!--modal-fade-->
                
				<!--DEACTIVATED MODAL-->
				<div class = 'modal fade' id = 'deactivate$intAshID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' style = 'height: 220px;'>
							
							<!--header-->
							<div class = 'modal-header' style='background: light-red'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><b><h3>Deactivate Ash Crypt</h3></b></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<h3>Are you sure you want deactivate $strAshName?</h3>
								
								<form class='form-horizontal' role='form' action = 'ashcrypt.php' method= 'POST'>						  
									<div class='form-group'>
										<div class='col-sm-8'>
											<input type='hidden' class='form-control' name= 'tfAshID' 
												   value='$intAshID' >
										</div>
									</div>
									
									<div class='modal-footer'> 
										<div class='col-sm-8'  style = 'margin-top: 10px;'>
											<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
			";
		}//while($row = mysql_fetch_array($result))
		mysql_close($conn);         
    }//function viewBuilding()
	
}//class aschcrypt
//___________________________________________


class levelAC{

    function viewLevelAC(){
        
		$sql = "Select la.intLevelAshID, la.strLevelName, la.intStatus, la.intNoOfUnit, ac.strAshName, la.dblSellingPrice from tbllevelash la
		          INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID where la.intStatus ='0' ORDER BY la.strLevelName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){
			
            $intLevelAshID =$row['intLevelAshID'];
            $strLevelName =$row['strLevelName'];
            $strAshName =$row['strAshName'];
            $intNoOfUnit =$row['intNoOfUnit'];
            $dblSellingPrice =$row['dblSellingPrice'];
            
			echo 
				"<tr>
					<td style ='font-size:18px;'>$strLevelName</td>
					<td style ='font-size:18px;'>$strAshName</td>
					<td style = 'text-align: right; font-size:18px;'>$intNoOfUnit</td>

					<td style = 'text-align: right; font-size:18px;'>₱ ".number_format($dblSellingPrice,2)."</td>

					<td align = 'center'>
						<button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#update$intLevelAshID'>
							<i class='glyphicon glyphicon-pencil'></i>
						</button>
						<button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intLevelAshID'>
							<i class='glyphicon glyphicon-trash'></i>
						</button>
					</td>
			   </tr>
               
				<div class = 'modal fade' id = 'update$intLevelAshID'>
					<div class = 'modal-dialog' style = 'width: 45%;'>
						<div class = 'modal-content'>
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Level</b></H3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'levelAsh.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
										   <input type='hidden' class='form-control' name= 'tfLevelAshID'  value='$intLevelAshID' >
										 </div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Level:</label>
											<div class='col-md-7'>
												<input type='text 'class='form-control input-md' name= 'tfLevelName' value= '$strLevelName' onkeypress='return validateLevelName(event)' readonly/>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Block:</label>
											<div class='col-md-7'>
												<select class='form-control' id='sel1' name = 'ashName' readonly>";
													
													$sql7 =  " select * from dbholygarden.tblashcrypt where intStatus='0' Order by strAshName asc";
													$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
													mysql_select_db(constant('mydb'));
													$result7 = mysql_query($sql7,$conn);
													
													while($row7 = mysql_fetch_array($result7)){
														$intAshID2 =$row7['intAshID'];
														$strAshName2 =$row7['strAshName'];
														echo "<option value = $intAshID2";
														
														if($strAshName == $strAshName2){
															echo " selected";
														}//if
														
														echo ">$strAshName2</option>";
													}//while
												
												echo "</select>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>No. of Unit:</label>
											<div class='col-md-7'>
												<input type='number' class='form-control input-md' min='1' name= 'tfNoOfUnit' value= '$intNoOfUnit' onkeypress='return validateNumber(event)' readonly/>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Selling Price:</label>
											<div class='col-md-7'>
												<div class='input-group'>
													<span class = 'input-group-addon'>₱</span>
													<input type='text' class='form-control input-md tfSellingUpdate' name= 'tfSellingPrice' value= '$dblSellingPrice' required/>
											   </div>
											</div>
										</div>
									</div>
									
									<div class='form-group modal-footer'> 
										<div class='col-sm-offset-5 col-sm-7'>
											<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
                
				<!--DEACTIVATED MODAL-->
				<div class = 'modal fade' id = 'deactivate$intLevelAshID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' style = 'height: 220px;'>
							
							<!--header-->
							<div class = 'modal-header' style='background: light-red'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><b><h3>Deactivate Level</h3></b></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<h3>Are you sure you want deactivate $strLevelName?</h3>
								
								<form class='form-horizontal' role='form' action = 'levelash.php' method= 'POST'>						  
									<div class='form-group'>
										<div class='col-sm-8'>
											<input type='hidden' class='form-control' name= 'tfLevelAshID' value='$intLevelAshID' >
										</div>
									</div>
									
									<div class='modal-footer'> 
										<div class='col-sm-8'  style = 'margin-top: 10px;'>
											<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
			";
		}//while($row = mysql_fetch_array($result))
		mysql_close($conn);         
    }//function viewLA()
    
    
	
	function selectAC(){
		$sql = " SELECT * FROM dbholygarden.tblashcrypt WHERE intStatus='0' ORDER BY strAshName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result)){
            $intAshID = $row['intAshID'];
            $strAshName = $row['strAshName'];
            
            echo "<option value = '$intAshID'>$strAshName</option>";
        }//while
		mysql_close($conn);
    }//function selectAC()
	
}//class level
//____________________________________________________


class ashUnit{

    function viewAshUnit(){
        
		$sql = "SELECT acUnit.intUnitID, acUnit.strUnitName, acUnit.intUnitStatus, acUnit.intStatus, la.strLevelName, ac.strAshName, acUnit.intCapacity FROM tblacunit acUnit
					INNER JOIN tbllevelash la ON acUnit.intLevelAshID = la.intLevelAshID 
					INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID WHERE acUnit.intStatus='0' ORDER BY acUnit.strUnitName ASC";    
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){
			
            $intUnitID =$row['intUnitID'];
            $strUnitName =$row['strUnitName'];
            $strLevelName =$row['strLevelName'];
            $strAshName =$row['strAshName'];
            $intCapacity =$row['intCapacity'];
            
            $intUnitStatus =$row['intUnitStatus'];
            $intStatus=$row['intStatus'];
            
            
            if($intUnitStatus==0){
			  $AshStatus ="Available";
			}else if($intUnitStatus==1){
			  $AshStatus="Reserved";
			}else if($intUnitStatus==2){
			  $AshStatus="Owned";
			}else{
              $AshStatus="At-Need";
            }
            
			echo 
				"<tr>
					<td style ='font-size:18px;'>$strUnitName</td>
					<td style ='font-size:18px;'>$strLevelName</td>
					<td style ='font-size:18px;'>$strAshName</td>
					<td align='right'; style ='font-size:18px;'>$intCapacity</td>
					<td style ='font-size:18px;'>$AshStatus</td>
					
					<td align = 'center'>
						<button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#update$intUnitID'>
							<i class='glyphicon glyphicon-pencil'></i>
						</button>
						<button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intUnitID'>
							<i class='glyphicon glyphicon-trash'></i>
						</button>
					</td>
				</tr>
			 
				<div class = 'modal fade' id = 'update$intUnitID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content'>
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Ashcrypt-Unit</b></H3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'ashcryptUnit.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
										   <input type='hidden' class='form-control' name= 'tfUnitID' value='$intUnitID' >
										 </div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											 <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>AC-Unit:</label>
											 <div class='col-md-7'>
												<input type='text 'class='form-control input-md' name= 'tfUnitName' value= '$strUnitName' required/>
											</div>
										 </div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Level:</label>
											<div class='col-md-7'>
												<select class='form-control' id='sel1' name = 'levelName' required>";
													
													$sql4 = " SELECT la.intLevelAshID AS levelAsh, la.strLevelName AS levelName, la.dblSellingPrice, ac.strAshName AS ashName, la.intStatus FROM tbllevelash la
																INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID WHERE la.intStatus = '0' ORDER BY la.strLevelName ASC";
													
													$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
													mysql_select_db(constant('mydb'));
													$result4 = mysql_query($sql4,$conn);
													
													while($row4 = mysql_fetch_array($result4)){
														
														$intLevelAshID2 =$row4['levelAsh'];
														$strLevelName2 =$row4['levelName'];
														$strAshName2 =$row4['ashName'];
														
														echo "<option value = $intLevelAshID2";
                                                            
															if($strLevelName == $strLevelName2 && $strAshName == $strAshName2){
																echo " selected";
															}
															echo ">$strLevelName2 ($strAshName2)</option>";
													}
												echo "</select>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group' >
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Capacity:</label>
											<div class='col-md-7'>
												<input type='number' class='form-control input-md' min='1' name='tfCapacity' value = '$intCapacity' onkeypress='return validateNumber(event)' required/>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Status:</label>
											<div class='col-md-7'>
												<select class='form-control input-md' name = 'status' required>";
													
													$one = $two = $three = '';
												  
													if($AshStatus == 'Available'){
														$one = 'selected';
														
													}else if($AshStatus == 'Reserved'){
														$two = 'selected';
													}else{
														
														$three = 'selected';
													}
													echo " <option value = '0' $one>Available</option>    
												</select>
											</div>
										</div>
									</div>
									
									<div class='form-group modal-footer'> 
										<div class='col-sm-offset-4 col-sm-8'>
											<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
				
				<!--DEACTIVATED MODAL-->
				<div class = 'modal fade' id = 'deactivate$intUnitID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' style = 'height: 220px;'>
							
							<!--header-->
							<div class = 'modal-header' style='background: light-red'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><b><h3>Deactivate Ashcrypt-Unit</h3></b></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
                                <h3>Are you sure you want deactivate $strUnitName?</h3>
                                
								<form class='form-horizontal' role='form' action = 'ashcryptUnit.php' method= 'POST'>						  
									<div class='form-group'>
										<div class='col-sm-8'>
											<input type='hidden' class='form-control' name= 'tfUnitID' value='$intUnitID' >
										</div>
									</div>
									
									<div class='modal-footer'> 
										<div class='col-sm-8'  style = 'margin-top: 10px;'>
											<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
			";
		}//while($row = mysql_fetch_array($result))
		mysql_close($conn);         
    }//function viewAshUnit()

	function selectLevel(){
		$sql = " SELECT la.intLevelAshID AS levelAsh, la.strLevelName AS levelName, la.dblSellingPrice, ac.strAshName AS ashName, la.intStatus FROM tbllevelash la
		            INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID WHERE la.intStatus = '0' ORDER BY la.strLevelName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
       
		while($row = mysql_fetch_array($result)){
			
            $intLevelAshID = $row['levelAsh'];
            $strLevelName = $row['levelName'];
            $strAshName = $row['ashName'];
            
            echo "<option value = '$intLevelAshID'>$strLevelName ($strAshName)</option>";
        }//while
		mysql_close($conn);
    }//function selectLevel()
	
}//class AC-Unit
//________________________________________________

class requirement{

    function viewRequirement(){
		
        $sql = "SELECT * FROM tblrequirement WHERE intStatus='0' ORDER BY strRequirementName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        

		while($row = mysql_fetch_array($result)){
          
			$intRequirementId = $row['intRequirementId'];
			$strRequirementName = $row['strRequirementName'];
			$strRequirementDesc = $row['strRequirementDesc'];
			
			echo
				"<tr>
				   <td style ='font-size:18px;'>$strRequirementName</td>
				   <td style ='font-size:18px;'>$strRequirementDesc</td>
                    
                    <td align = 'center'>
                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal'  title='Edit' data-target = '#update$intRequirementId'>
								<i class='glyphicon glyphicon-pencil'></i>
							</button>
                            <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intRequirementId'>
								<i class='glyphicon glyphicon-trash'></i>
							</button>
                       </td>
				</tr>
               
                <div class = 'modal fade' id = 'update$intRequirementId'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content'>
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Requirement</b></H3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'requirement.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
										  <input type='hidden' class='form-control' name= 'tfRequirementId' value='$intRequirementId' >
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Requirement Name:</label>
											<div class='col-md-7'>
												<input type='text 'class='form-control input-md' name= 'tfRequirementName' value= '$strRequirementName' onkeypress='return validateServiceName(event)' required/>
											</div>
										</div>
									</div>
                                    
                                    <div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Description:</label>
											<div class='col-md-7'>
												<input type='text 'class='form-control input-md' name= 'tfRequirementDesc' value= '$strRequirementDesc' onkeypress='return validateServiceName(event)' />
											</div>
										</div>
									</div>
									
									<div class='form-group modal-footer'> 
											<div class='col-sm-offset-4 col-sm-8'>
												<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
												<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
											</div>
										</div>
									</form>
								</div><!--modal-body-->
							</div><!--modal-content-->
						</div><!--modal-dialog-->
					</div><!--modal-fade-->
					
					<!--DEACTIVATED MODAL-->
					<div class = 'modal fade' id='deactivate$intRequirementId'>
						<div class = 'modal-dialog' style = 'width: 40%;'>
							<div class = 'modal-content' style = 'height: 230px;'>
								
								<!--header-->
								<div class = 'modal-header' style='background: light-red'>
									<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
									<center><b><h3>Deactivate Requirement</h3></b></center>
								</div>
								
								<!--body (form)-->
								<div class = 'modal-body'>
									<h3>Are you sure you want deactivate $strRequirementName?</h3>
									
									<form class='form-horizontal' role='form' action = 'requirement.php' method= 'POST'>						  
										
										<div class='form-group'>
											<div class='col-sm-8'>
												<input type='hidden' class='form-control' name= 'tfRequirementId' value='$intRequirementId' >
											</div>
										</div>
										
										<div class='modal-footer'> 
											<div class='col-sm-8'>
												<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
												<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
											</div>
										</div>
									</form>
								</div><!--modal-body-->
                            </div><!--modal-content-->
						</div><!--modal-dialog-->
					</div><!--modal-fade-->
				";
                
            }//while($row = mysql_fetch_array($result))
			mysql_close($conn);         
    }//function viewRequirement()


}//class requirement
//____________________________________________________




class service{

    function viewService(){
		
        $sql = "SELECT d.intServiceID,  d.strServiceName,  d.dblServicePrice, d.intStatus, d.intServiceTypeId, s.strServiceTypeName FROM tblservice d
	               INNER JOIN tblservicetype s ON d.intServiceTypeId = s.intServiceTypeId WHERE d.intStatus='0' ORDER BY d.strServiceName ASC";
       
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        

		while($row = mysql_fetch_array($result)){
          
			$intServiceID = $row['intServiceID'];
			$strServiceName = $row['strServiceName'];
			$strServiceTypeName = $row['strServiceTypeName'];
			$dblServicePrice = $row['dblServicePrice'];

			echo
				"<tr>
				   <td style ='font-size:18px;'>$strServiceName</td>
				   <td style ='font-size:18px;'>$strServiceTypeName</td>
                   <td style = 'text-align: right; font-size:18px;'>Php ".number_format($dblServicePrice,2)."</td>
                   <td align = 'center'>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal'  title='View' data-target = '#view$intServiceID'>
                            <i class='glyphicon glyphicon-eye-open'></i>
                        </button>
                   </td>    
                   <td align = 'center'>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal'  title='Edit' data-target = '#update$intServiceID'>
                            <i class='glyphicon glyphicon-pencil'></i>
                        </button>
                        <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intServiceID'>
                            <i class='glyphicon glyphicon-trash'></i>
                        </button>
                    </td>
				</tr>
                
                <!--UPDATE MODAL-->
                <div class = 'modal fade' id = 'update$intServiceID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content'>
							
							<!--header-->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Service</b></H3></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'service.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
										  <input type='hidden' class='form-control' name= 'tfServiceID' value='$intServiceID' >
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Service:</label>
											<div class='col-md-7'>
												<input type='text 'class='form-control input-md' name= 'tfServiceName' value= '$strServiceName' onkeypress='return validateServiceName(event)' required/>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' style = 'font-size: 18px; margin-top:.30em;' align='right'>Service Type:</label>
											<div class='col-md-7'>
												<select class='form-control input-md' name = 'serviceType' required>";
													
													$sql5 = "SELECT * FROM tblservicetype ORDER BY strServiceTypeName ASC ";
													
													$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
													mysql_select_db(constant('mydb'));
													$result5 = mysql_query($sql5,$conn);
													
													while($row5 = mysql_fetch_array($result5)){
														
														$intServiceTypeId2 =$row5['intServiceTypeId'];
														$strServiceTypeName2 =$row5['strServiceTypeName'];
														
														echo "<option value = $intServiceTypeId2";
                                                            
															if($strServiceTypeName == $strServiceTypeName2){
																echo " selected";
															}
															echo ">$strServiceTypeName2</option>";
													}
												echo "</select>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Price:</label>
											<div class='col-md-7'> 
												<div class='input-group'>
													<span class = 'input-group-addon'>Php</span>
													<input type='text' class='form-control input-md tfServiceUpdate' name= 'tfServicePrice' value='$dblServicePrice' required/>
												</div>
											</div>
										</div>
									</div>
									
									<div class='form-group modal-footer'> 
											<div class='col-sm-offset-4 col-sm-8'>
												<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
												<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
											</div>
										</div>
									</form>
								</div><!--modal-body-->
							</div><!--modal-content-->
						</div><!--modal-dialog-->
					</div><!--modal-fade-->
					
					<!--DEACTIVATED MODAL-->
					<div class = 'modal fade' id='deactivate$intServiceID'>
						<div class = 'modal-dialog' style = 'width: 40%;'>
							<div class = 'modal-content' style = 'height: 220px;'>
								
								<!--header-->
								<div class = 'modal-header' style='background: light-red'>
									<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
									<center><b><h3>Deactivate Service</h3></b></center>
								</div>
								
								<!--body (form)-->
								<div class = 'modal-body'>
									<h3>Are you sure you want deactivate $strServiceName?</h3>
									
									<form class='form-horizontal' role='form' action = 'service.php' method= 'POST'>						  
										
										<div class='form-group'>
											<div class='col-sm-8'>
												<input type='hidden' class='form-control' name= 'tfServiceID' value='$intServiceID' >
											</div>
										</div>
										
										<div class='modal-footer'> 
											<div class='col-sm-8'  style = 'margin-top: 10px;'>
												<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
												<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
											</div>
										</div>
									</form>
								</div><!--modal-body-->
                            </div><!--modal-content-->
						</div><!--modal-dialog-->
					</div><!--modal-fade-->
                    
                    <!--VIEW MODAL-->
                    <div class = 'modal fade' id='view$intServiceID'>
                        <div class = 'modal-dialog' style = 'width: 40%;'>
                            <div class = 'modal-content' style = 'height: 230px;'>
                                
                                <!--header-->
                                <div class = 'modal-header' style='background:#b3ffb3;'>
                                    <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                    <center><b><h3>List of Requirements</h3></b></center>
                                </div>
                                
                                <!--body (form)-->
                                <div class = 'modal-body'>";
                                    
                                           
                                    $sql6 = 'SELECT sr.intServiceId, sr.intRequirementId, r.strRequirementName FROM tblservicerequirement sr
                                                INNER JOIN tblrequirement r ON sr.intRequirementId = r.intRequirementId WHERE sr.intServiceId = '.$intServiceID.' ORDER BY r.strRequirementName ASC';
                                            
                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                    mysql_select_db(constant('mydb'));
                                    $result6 = mysql_query($sql6,$conn);
                                    
                                    while($row6 = mysql_fetch_array($result6)){
                                        
                                        $strRequirementName =$row6['strRequirementName'];
                                        
                                        echo "<center><b><h3>$strRequirementName</h3></b></center>";
                                    }//while
                                  echo "<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                        </div>  
                                </div><!--modal-body-->
                            </div><!--modal-content-->
                        </div><!--modal-dialog-->
                    </div><!--modal-fade-->
                    
                    
				";
                
            }//while($row = mysql_fetch_array($result))
			mysql_close($conn);         
    }//function viewService()
    
    function selectServiceType(){
		$sql = " SELECT * FROM dbholygarden.tblservicetype ORDER BY strServiceTypeName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result)){
            $intServiceTypeId = $row['intServiceTypeId'];
            $strServiceTypeName = $row['strServiceTypeName'];
            
            echo "<option value = '$intServiceTypeId'>$strServiceTypeName</option>";
        }
		mysql_close($conn);
    }//function selectServiceType()
    
    function selectRequirement(){
		$sql = " SELECT * FROM dbholygarden.tblrequirement ORDER BY strRequirementName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result)){
            $intRequirementId = $row['intRequirementId'];
            $strRequirementName = $row['strRequirementName'];
            
            echo 
                "<li>
                    <a  class='large' data-value='$intRequirementId' tabIndex='-1'><input value='$intRequirementId' name='checkRequirement[]' type='checkbox' class='input-md'/>&nbsp; $strRequirementName</a>
                </li>";
        }
		mysql_close($conn);
    }//function selectServiceType()
 function viewServiceRequest(){
		
        $sql = "SELECT d.intServiceID,  d.strServiceName,  d.dblServicePrice, d.intStatus, d.intServiceTypeId, s.strServiceTypeName FROM tblservice d
	               INNER JOIN tblservicetype s ON d.intServiceTypeId = s.intServiceTypeId WHERE s.strServiceTypeName!='Service Scheduling' AND d.strServiceStatus IS NULL  ORDER BY d.strServiceName ASC";
       
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        

		while($row = mysql_fetch_array($result)){
          
			$intServiceID = $row['intServiceID'];
			$strServiceName = $row['strServiceName'];
			$strServiceTypeName = $row['strServiceTypeName'];
			$dblServicePrice = $row['dblServicePrice'];

			echo
				"<tr>
				<form method ='POST' >
				   <input type='hidden' name='inputCode' value='$intServiceID'>
				   <td style ='font-size:18px;'>$strServiceName</td>
				    <td style = 'text-align: right; font-size:18px;'>Php ".number_format($dblServicePrice,2)."</td>
                    <td align = 'center'>
                    	 <button type='submit' class='btn btn-success' data-toggle='modal' name= 'btnAdd[$intServiceID]'  data-target='#modalSerRequest'> <i class='glyphicon glyphicon-plus'></i></button>
                    </td>
                  </form>
				</tr>
                
                                   
				";
                
                if(isset($_POST['btnAdd'][$intServiceID])){
                	
                	$inputCode =$_POST['inputCode'];
					$sqlAdd= "Update tblservice SET strServiceStatus = 'added' where intServiceID='".$inputCode."'";

					       if(mysql_query($sqlAdd,$conn))
					     {
					            ?>
					            <script>
					             location.assign('service-request-transaction.php');
					            </script>

					            <?php
					     }else{
					        ?>
					          <script>
					             alert("Failed.");
					          </script>
					        <?php
					     }


                }
            }//while($row = mysql_fetch_array($result))      
    }//function viewService()
    
 function viewServiceRequested(){
		
        $sql = "SELECT d.intServiceID,  d.strServiceName,  d.dblServicePrice, d.intStatus, d.intServiceTypeId, s.strServiceTypeName FROM tblservice d
	               INNER JOIN tblservicetype s ON d.intServiceTypeId = s.intServiceTypeId WHERE s.strServiceTypeName!='Service Scheduling' AND d.strServiceStatus='added' ORDER BY d.strServiceName ASC";
       
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        

		while($row = mysql_fetch_array($result)){
          
			$intServiceID = $row['intServiceID'];
			$strServiceName = $row['strServiceName'];
			$strServiceTypeName = $row['strServiceTypeName'];
			$dblServicePrice = $row['dblServicePrice'];

			echo
				"<tr>
				<form method ='POST' >
				   <input type='hidden' name='inputCode' value='$intServiceID'>
				   <td style ='font-size:18px;'>$strServiceName</td>
				    <td style = 'text-align: right; font-size:18px;'>Php ".number_format($dblServicePrice,2)."</td>
                    <td align = 'center'>
                    	 <button type='submit' class='btn btn-success' data-toggle='modal' name= 'btnRemove[$intServiceID]'  data-target='#modalSerRequest'> <i class='glyphicon glyphicon-minus'></i></button>
                    </td>
                  </form>
				</tr>
                
                                   
				";
                
                if(isset($_POST['btnRemove'][$intServiceID])){
                	$inputCode =$_POST['inputCode'];

					$sqlRemove= "Update tblservice SET strServiceStatus = null where intServiceID='".$inputCode."'";
					       if(mysql_query($sqlRemove,$conn))
					     {

					            ?>
					            <script>
					             location.assign('service-request-transaction.php');
					            </script>

					            <?php
					     }else{
					        ?>
					          <script>
					             alert("Failed.");
					          </script>
					        <?php
					     }

                }
            }//while($row = mysql_fetch_array($result))
    }//function viewService()

}//class service
//____________________________________________________

class discount{

    function viewDiscount(){
        
		$sql = "SELECT d.intDiscountID, s.strServiceName, d.strDescription, d.dblPercent, d.intStatus FROM tbldiscount d
				   INNER JOIN tblservice s ON d.intServiceID = s.intServiceID where d.intStatus='0' ORDER BY s.strServiceName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);

		while($row = mysql_fetch_array($result)){ 
            
			$intDiscountID =$row['intDiscountID'];
			$strServiceName =$row['strServiceName'];
			$strDescription =$row['strDescription'];
			$dblPercent =$row['dblPercent'];
			$intStatus =$row['intStatus'];

			$dblPercentValue = $dblPercent*100;               

			echo
				"<tr>
                    <td style ='font-size:18px;'>$strServiceName</td>
                    <td style ='font-size:18px;'>$strDescription</td>
                    <td style = 'text-align: right; font-size:18px;'>$dblPercentValue %</td>
                        
                    <td align = 'center'>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#update$intDiscountID'>
							<i class='glyphicon glyphicon-pencil'></i>
						</button>
						<button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intDiscountID'>
							<i class='glyphicon glyphicon-trash'></i>
						</button>
                    </td>
				</tr>
               
				<div class = 'modal fade' id = 'update$intDiscountID'>
					<div class = 'modal-dialog' style='width:40%;'>
						<div class = 'modal-content'>
							
							<!-- header -->
							<div class = 'modal-header' style='background:#b3ffb3;'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><H3><b>Update Discount</b></H3></center>
							</div>
							
							<!-- body (form) -->
							<div class = 'modal-body'>
								<form class='form-horizontal' role='form' action = 'discount.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class=''>
										   <input type='hidden' class='form-control' name= 'tfDiscountID' value='$intDiscountID' >
										</div>
									</div>
									
									<div class='row'>
                                       <div class='form-group'>
                                            <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Description:</label>
                                            <div class='col-md-7'>
												<input type='text' class='form-control input-md' name= 'tfDescription' value= '$strDescription' required/>
											</div>
                                        </div>
                                    </div>
									
									<div class='row'>
										<div class='form-group'>
											<label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Percent:</label>
											<div class='col-md-7'>
												<div class='input-group'>
													<input type='text 'class='form-control input-md' name= 'tfPercent' id='$intDiscountID' value= '$dblPercentValue' onkeypress='return validateNumber(event)' required/>
													<span class = 'input-group-addon'>%</span>
												</div>
											</div>
									   </div>
									</div>
					
									<div class='form-group modal-footer'> 
										<div class='col-sm-offset-4 col-sm-8'>
											<button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										</div>
									</div>
                                </form>
                            </div><!--modal-body-->
						</div><!--modal-content-->
                    </div><!--modal-dialog-->
				</div><!--modal-fade-->
                
                <!--DEACTIVATED MODAL-->
				<div class = 'modal fade' id='deactivate$intDiscountID'>
					<div class = 'modal-dialog' style = 'width: 40%;'>
						<div class = 'modal-content' style = 'height: 220px;'>
							
							<!--header-->
							<div class = 'modal-header' style='background: light-red'>
								<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
								<center><b><h3>Deactivate Discount</h3></b></center>
							</div>
							
							<!--body (form)-->
							<div class = 'modal-body'>
								<h4>Are you sure you want deactivate $strDescription?</h4>
								
								<form class='form-horizontal' role='form' action = 'discount.php' method= 'POST'>						  
									
									<div class='form-group'>
										<div class='col-sm-8'>
											<input type='hidden' class='form-control' name= 'tfDiscountID' value='$intDiscountID' >
										</div>
									</div>
									
									<div class='modal-footer'> 
										<div class='col-sm-8'  style = 'margin-top: 10px;'>
											<button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
											<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
										</div>
									</div>
								</form>
							</div><!--modal-body-->
						</div><!--modal-content-->
					</div><!--modal-dialog-->
				</div><!--modal-fade-->
			";
        }//while($row = mysql_fetch_array($result))
		mysql_close($conn);         
    }//function viewDiscount()

	function selectService(){
		$sql = " SELECT * FROM dbholygarden.tblService WHERE intStatus='0' ORDER BY strServiceName asc";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result)){
            $intServiceID = $row['intServiceID'];
            $strServiceName = $row['strServiceName'];
            
            echo "<option value = '$intServiceID'>$strServiceName</option>";
        }
		mysql_close($conn);
    }//function selectService()
	
}//class discount
/**
* 
*/

?>   
