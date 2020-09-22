</div>

</div>
	<center><h4 style="margin-top:0; margin-bottom:18px">Not Completed Detail Asset List</h4></center>

	<table id ="viewTable" class="custom table-bordered">
		<tr class="bHeader">
			<th id= "tId">Asset ID</th>
			<th>Name</th>
			<th>Location</th>
			<th id= "tDate">Unit Asset</th>
			<th id= "tSurv">Barcode</th>
			<th id= "tFam">Brand</th>
			<th id= "tSub">Type</th>
			<th id= "tNam">Dimension</th>
			<th id= "tBra">Serial Number</th>
			<th id= "tTyp">Status</th>
			<th id= "tDim">Purchasing Date</th>
			<th id= "tSer">Install Date</th>
			<th>Action</th>
		</tr>
	<?php 
	$counter = 1;
	foreach($viewList as $vh=>$isi){
	
	$bla = $counter%2;
	if($bla != 0){ ?>
	<tr>
		<td id= "tAss" class="row10"><?php echo $isi->ai ?></td>
		<td id="tAssetName" class="row11" <?php if($isi->name == ""){echo "style=background-color:red";} ?> ><?php echo $isi->name ?></td>
		<td id="tLoc" class="row10" <?php if($isi->mainlocation == ""){echo "style=background-color:red";} ?>><?php echo $isi->mainlocation ?></td>
		<td id= "tUnit" class="row11" <?php if($isi->unitasset == ""){echo "style=background-color:red";} ?> ><?php echo $isi->unitasset ?></td>
		<td id= "tBar" class="row10" <?php if($isi->barcode == ""){echo "style=background-color:red";} ?>><?php echo $isi->barcode ?></td>
		<td id= "tBra" class="row11" <?php if($isi->brand == ""){echo "style=background-color:red";} ?>><?php echo $isi->brand ?></td>
		<td id= "tType" class="row10" <?php if($isi->type == ""){echo "style=background-color:red";} ?>><?php echo $isi->type ?></td>
		<td id= "tDim" class="row11" <?php if($isi->dimension == ""){echo "style=background-color:red";} ?>><?php echo $isi->dimension ?></td>
		<td id= "tSer" class="row10" <?php if($isi->serial_numb == ""){echo "style=background-color:red";} ?>><?php echo $isi->serial_numb ?></td>
		<td id= "tStat" class="row11" <?php if($isi->status == ""){echo "style=background-color:red";} ?>><?php echo $isi->status ?></td>
		<td id= "tPurch" class="row10" <?php if($isi->purchasingdate == "" || $isi->purchasingdate == "0000-00-00"){echo "style=background-color:red";} ?>><?php echo $isi->purchasingdate ?></td>
		<td id= "tInst" class="row11" <?php if($isi->installdate == "" || $isi->installdate == "0000-00-00"){echo "style=background-color:red";} ?>><?php echo $isi->installdate ?></td>
		<td id="tAct" class="row10"> 
				
				<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details <span style="color:red">!</span></i></button> 
				
			
		</td>
		
	</tr>
	<?php }else{ ?>
	<tr>
		<td id= "tAss" class="row1"><?php echo $isi->ai ?></td>
		<td id="tAssetName" <?php if($isi->name == ""){echo "style=background-color:red";} ?>><?php echo $isi->name ?></td>
		<td id="tLoc" class="row1" <?php if($isi->mainlocation == ""){echo "style=background-color:red";} ?>><?php echo $isi->mainlocation ?></td>
		<td id= "tUnit" <?php if($isi->unitasset == ""){echo "style=background-color:red";} ?>><?php echo $isi->unitasset ?></td>
		<td id= "tBar" class="row1" <?php if($isi->barcode == ""){echo "style=background-color:red";} ?>><?php echo $isi->barcode ?></td>
		<td id= "tBra" <?php if($isi->brand == ""){echo "style=background-color:red";} ?>><?php echo $isi->brand ?></td>
		<td id= "tType" class="row1" <?php if($isi->type == ""){echo "style=background-color:red";} ?>><?php echo $isi->type ?></td>
		<td id= "tDim" <?php if($isi->dimension == ""){echo "style=background-color:red";} ?> ><?php echo $isi->dimension ?></td>
		<td id= "tSer" class="row1" <?php if($isi->serial_numb == ""){echo "style=background-color:red";} ?>><?php echo $isi->serial_numb ?></td>
		<td id= "tStat" <?php if($isi->status == ""){echo "style=background-color:red";} ?>><?php echo $isi->status ?></td>
		<td id= "tPurch" class="row1" <?php if($isi->purchasingdate == "" || $isi->purchasingdate == "0000-00-00" ){echo "style=background-color:red";} ?>><?php echo $isi->purchasingdate ?></td>
		<td id= "tInst" <?php if($isi->installdate == "" || $isi->installdate == "0000-00-00"){echo "style=background-color:red";} ?>><?php echo $isi->installdate ?></td>
		<td id="tAct" class="row10"> 	
				<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details <span style="color:red">!</i></button> 
			
		</td>
		
	</tr>

	<?php }
	$counter++;
	}
	 ?>
	</table>
	<?php echo $this->pagination->create_links(); ?>
	
</div>

</div>

<div id="searchPanel" class="col-sm-2">
	<div id="searchBox">
    		
	    	<h4 style="color:black">Search</h4>
	    	<form action="<?php echo base_url()?>crud/search" method="GET" id="formid">
	    	<input type="text" name="not" value="true" hidden>
	    	<table>
	    		<tr><li><td>Owner</td> <td><select name="owner">
	    			<option value="">--</option>
	    			 <?php foreach($owner as $ow=>$isi){
                          echo "<option value=".$isi->id." ".set_select('owner',$isi->id).">".$isi->owner."</option>";
                        } ?>
	    		</select></td></li></tr>

	    		<tr><li><td>Family</td> <td><select name="family">
	    			<option value="">--</option>
	    			<?php 
                       foreach($family as $fam=>$isi){ 
                        $ostring = $isi->family."|".$isi->id_familyasset;
                        $nstring = str_replace(' ','', $ostring);
                        echo "<option value='".$isi->id_familyasset."'>".$isi->family."</option>";
                        } ?>
	    		</select></td></li></tr>

	    		<tr><li><td>Key Facilities</td> <td><select name="keyfac">
	    			<option value="">--</option>
                       		<?php foreach($keyfac as $kf=>$isi){
                          		echo "<option value='".$isi->id."'>".$isi->facilities_name."</option>";
                        	} ?>
	    		</select></td></li></tr>

	    		<tr><li><td>Location</td> <td><select name="loc">
	    			<option value="">--</option>
                      <?php foreach($mainlocation as $kf=>$isi){echo "<option value='".$isi->id_mainlocation."'>".$isi->mainlocation."</option>";} ?>
	    		</select></td></li></tr>
	    		</table>
	    		
	    	
	</div>

	<div id="searchBox" style="margin-top:2px">
    		

	    	<table>
	    		<tr><li><td>Column</td> <td><select name="column">
	    			<option value="d.asset_id">Id</option>
	    			<option value="dateofsurvey">Date of Survey</option>
	    			<option value="surveyor">Surveyor</option>
	    			<option value="barcode">Barcode</option>
	    			<option value="subfamily">Subfamily</option>
	    			<option value="ra.name">Name</option>
	    			<option value="brand">Brand</option>
	    			<option value="type">Type</option>
	    			<option value="dimension">Dimension</option>
	    			<option value="serial_numb">Serial</option>
	    		</select></td></li></tr>

	    		<tr><li><td>Search by</td> <td><select name="searchBy">
	    			<option value="like">like</option>
	    			<option value="=">equal</option>
	    			<option value=">">greater than</option>
	    			<option value="<">less than</option>
	    		</select></td></li></tr>

	    		<li><td>Text</td> <td><input type = "text" name="search" style="width:90px;"><br></td></li>
	    		</table>
	    		
	    	
	</div>
				<input type = "submit" name="submitSearch" value="Search" style="margin-top:10px;">
	    	</form>

</div>

<script type="text/javascript">
$(function(){
	$('#homenav').addClass('active');
	$('#wrapper').addClass('col-sm-10');

	if($('#viewTable td').text() == ""){
		$('#viewTable td').css('background-color', 'red')
	}
});
</script>