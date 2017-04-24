<div class="modal fade" id="viewDeceasedAsh<?php echo $intAvailUnitAshId ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1500;display:none;">
    <div class="modal-dialog" role="document" style="width:80%; height: 90%; overflow:auto;">
        <div class="modal-content">
             <div class="modal-header" style="background:#b3ffb3;">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><h3><b>ADD DECEASED</b></h3></center>
            </div>
            <div class='modal-body' >
                <div class="container-fluid" >
                    <div class ="row">
                    <div class="col-md-2">
                        <div class='form-group'>
                            <label class='control-label col-xs-12'>Deceased Name</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class='form-group'>
                            <label class='control-label '>Deceased Birthday</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class='form-group'>
                            <label class='control-label '>Date of Death</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class='form-group'>
                            <label class='control-label'>Deceased Gender</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class='form-group'>
                            <label class='control-label '>Deceased Age</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class='form-group'>
                            <label class='control-label '>Relationship to Owner</label>
                        </div>
                    </div>
                    </div>
                </div>
                <?php 
                    
                    $result2 =mysql_query("SELECT * FROM tbldeceasedash where intAvailUnitAshId='$intAvailUnitAshId'");
                    $num2= mysql_num_rows($result2);
                    if($num2>0){
                        while($row2=mysql_fetch_array($result2)){
                            $strDeceasedFirstName    =$row2['strDeceasedFirstName'];
                            $strDeceasedMiddleName   =$row2['strDeceasedMiddleName'];
                            $strDeceasedLastName     =$row2['strDeceasedLastName'];
                            $dateDeceasedBirthday    =$row2['dateDeceasedBirthday'];
                            $dateDeceasedDateOfDeath =$row2['dateDeceasedDateOfDeath'];
                            $intDeceasedGender       =$row2['intDeceasedGender'];
                            $strRelationship         =$row2['strRelationship'];
                            $intDeceasedAge          =$row2['intDeceasedAge'];
                            
                            if($intDeceasedGender == 0){
                                $gender = 'Male';
                            }else{
                                $gender = 'Female';
                            }
                ?>
                            <div class="container-fluid">
                                <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" style="text-align: center" value="<?php echo "$strDeceasedLastName, $strDeceasedFirstName $strDeceasedMiddleName";  ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" style="text-align: center" value="<?php echo $dateDeceasedBirthday ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" style="text-align: center" value="<?php echo $dateDeceasedDateOfDeath ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" style="text-align: center" value="<?php echo $gender ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" style="text-align: center" value="<?php echo $intDeceasedAge ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" style="text-align: center" value="<?php echo $strRelationship ?>" readonly>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                        <div class="container-fluid">
                                <div class="ROW">
                                    <div class="form-group col-md-12">
                                        <input type="text" value="NO DECEASED" readonly>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }


                ?>
            </div><!--modal-body-->
          
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-fade-->     