</div>

</div>
	<center><h4 style='margin-top:0; margin-bottom:18px'>
		<?php if($_GET['condition'] == 1){echo "Very Good Condition Asset List";} 
				else if($_GET['condition'] == 2){echo "Good Condition Asset List";}
				else if($_GET['condition'] == 3){echo "Normal Condition Asset List";}
				else if($_GET['condition'] == 4){echo "Broken Condition Asset List";}
				else if($_GET['condition'] == 5){echo "Critical Condition Asset List";}
		?></h4>
	</center>

	<table id ="viewTable" class="custom table-bordered">
		<tr class="bHeader">
			<th>No</th>
			<th id= "tId">Asset ID</th>
			<th>Name</th>
			<th>Condition</th>
			<th>Action</th>
		</tr>
	<?php 
	$counter = 1;
	foreach($viewList as $vh=>$isi){
	
	$bla = $counter%2;
	if($bla != 0){ ?>
	<tr>
		<td style="width:1%"><?php if(isset($_GET['start'])){ echo $_GET['start']+$vh+1;}else{echo $vh+1;} ?></td>
		<td id= "tAss" class="row10"><?php echo $isi->asset_id ?></td>
		<td id="tAssetName" class="row11"><?php echo $isi->name ?></td>
		<td id="tLoc" class="row10"><?php echo $isi->con ?></td>
		<td id="tAct" class="row11"> 
				
				<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
				
			
		</td>
		
	</tr>
	<?php }else{ ?>
	<tr>
		<td><?php if(isset($_GET['start'])){ echo $_GET['start']+$vh+1;}else{ echo $vh+1;} ?></td>
		<td id= "tAss" class="row1"><?php echo $isi->asset_id ?></td>
		<td id="tAssetName" ><?php echo $isi->name ?></td>
		<td id="tLoc" class="row1"><?php echo $isi->con ?></td>	
		<td id="tAct"> 	
				<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
			
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
	    	<input type="text" name="jenisCondition" value="<?php echo $_GET['condition'] ?>" hidden>
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

});
</script>