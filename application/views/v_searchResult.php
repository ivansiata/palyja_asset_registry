</div>

</div>
	<div style="background-color: yellow; padding:4px; display:inline-block; border-radius:2px; margin-bottom:2px; box-shadow: 0px 0px 2px; float:right">
		Showing Result <?php echo "<strong>";if(isset($_GET['start'])){echo $_GET['start'] +1;}else{if($jumlah[0]->jumlah == 0){echo "0";}
		else{echo "1";}} echo "-"; 
		if(isset($_GET['start'])){echo $_GET['start'] + 10;}else{ if($jumlah[0]->jumlah < 10){echo $jumlah[0]->jumlah;}
		else{echo "10";}} echo "</strong> of <strong>".$jumlah[0]->jumlah."</strong> Total Assets"?></div>

	<?php if(isset($_GET['jenisStatus'])){
		if($_GET['jenisStatus'] == 1){echo "<h4 style='margin-top:0; margin-bottom:18px'>Active Asset List</h4>";} 
		else if($_GET['jenisStatus'] == 2){echo "<h4 style='margin-top:0; margin-bottom:18px'>Idle Asset List</h4>";}
		else if($_GET['jenisStatus'] == 3){echo "<h4 style='margin-top:0; margin-bottom:18px'>Surplus Asset List</h4>";}
		else if($_GET['jenisStatus'] == 4){echo "<h4 style='margin-top:0; margin-bottom:18px'>Scrapped Asset List</h4>";}
	} ?>

	<?php if(isset($_GET['jenisCondition'])){
		if($_GET['jenisCondition'] == 1){echo "<h4 style='margin-top:0; margin-bottom:18px'>Very Good Condition Asset List</h4>";} 
		else if($_GET['jenisCondition'] == 2){echo "<h4 style='margin-top:0; margin-bottom:18px'>Good Condition Asset List</h4>";}
		else if($_GET['jenisCondition'] == 3){echo "<h4 style='margin-top:0; margin-bottom:18px'>Normal Condition Asset List</h4>";}
		else if($_GET['jenisCondition'] == 4){echo "<h4 style='margin-top:0; margin-bottom:18px'>Broken Condition Asset List</h4>";}
		else if($_GET['jenisCondition'] == 5){echo "<h4 style='margin-top:0; margin-bottom:18px'>Critical Condition Asset List</h4>";}
	} ?>

	<?php if(isset($_GET['not'])){
		echo "<h4 style='margin-top:0; margin-bottom:18px'>Not Completed Detail Asset List</h4>";} 
	?>
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
			<th></th>
		</tr>
	<?php 
	$counter = 1;
	foreach($viewHome as $vh=>$isi){
	
	$bla = $counter%2;
	if($bla != 0){ ?>
	<tr>
		<td id= "tAss" class="row10"><?php echo $isi->asset_id ?></td>
		<td id="tAssetName" class="row11"><?php echo $isi->name ?></td>
		<td id="tLoc" class="row10"><?php echo $isi->mainlocation ?></td>
		<td id= "tUnit" class="row11"><?php echo $isi->unitasset ?></td>
		<td id= "tBar" class="row10"><?php echo $isi->barcode ?></td>
		<td id= "tBra" class="row11"><?php echo $isi->brand ?></td>
		<td id= "tType" class="row10"><?php echo $isi->type ?></td>
		<td id= "tDim" class="row11"><?php echo $isi->dimension ?></td>
		<td id= "tSer" class="row10"><?php echo $isi->serial_numb ?></td>
		<td id= "tStat" class="row11"><?php echo $isi->status ?></td>
		<td id= "tPurch" class="row10"><?php echo $isi->purchasingdate ?></td>
		<td id= "tInst" class="row11"><?php echo $isi->installdate ?></td>
		<td id="tAct" class="row10"> 
			
				<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
				
				
		</td>
	</tr>
	<?php }else{ ?>
		<tr>
			<td id= "tAss" class="row1"><?php echo $isi->asset_id ?></td>
			<td id="tAssetName"><?php echo $isi->name ?></td>
			<td id="tLoc" class="row1"><?php echo $isi->mainlocation ?></td>
			<td id= "tUnit"><?php echo $isi->unitasset ?></td>
			<td id= "tBar" class="row1"><?php echo $isi->barcode ?></td>
			<td id= "tBra"><?php echo $isi->brand ?></td>
			<td id= "tType" class="row1"><?php echo $isi->type ?></td>
			<td id= "tDim" ><?php echo $isi->dimension ?></td>
			<td id= "tSer" class="row1"><?php echo $isi->serial_numb ?></td>
			<td id= "tStat"><?php echo $isi->status ?></td>
			<td id= "tPurch" class="row1"><?php echo $isi->purchasingdate ?></td>
			<td id= "tInst"><?php echo $isi->installdate ?></td>
			<td id="tAct" class="row10"> 
			
					<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
					
				
			</td>
		</tr>

	<?php }
	$counter++;
	}
	if($counter == 1){
          echo "<tr><td colspan='13'><center>No Data Found<center></td></tr>";
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
	    	<?php if(isset($_GET['jenisStatus'])){ echo "<input type='text' name='jenisStatus' value='".$_GET['jenisStatus']."' hidden>";} ?>
			<?php if(isset($_GET['jenisCondition'])){ echo "<input type='text' name='jenisCondition' value='".$_GET['jenisCondition']."' hidden>";} ?>
			<?php if(isset($_GET['not'])){ echo "<input type='text' name='not' value='".$_GET['not']."' hidden>";} ?>
	    	<table>
	    		<tr><li><td>Owner</td> <td><select name="owner" id="owner">
	    			<option value="">--</option>
	    			 <?php foreach($owner as $ow=>$isi){
                          echo "<option value='".$isi->id."'>".$isi->owner."</option>";
                        } ?>
	    		</select></td></li></tr>

	    		<tr><li><td>Family</td> <td><select name="family" id="family">
	    			<option value="">--</option>
	    			<?php 
                       foreach($family as $fam=>$isi){ 
                        $ostring = $isi->family."|".$isi->id_familyasset;
                        $nstring = str_replace(' ','', $ostring);
                        echo "<option value='".$isi->id_familyasset."'>".$isi->family."</option>";
                        } ?>
	    		</select></td></li></tr>

	    		<tr><li><td>Key Facilities</td> <td><select name="keyfac" id="keyfac">
	    			<option value="">--</option>
                       		<?php foreach($keyfac as $kf=>$isi){
                          		echo "<option value='".$isi->id."'>".$isi->facilities_name."</option>";
                        	} ?>
	    		</select></td></li></tr>

	    		<tr><li><td>Location</td> <td><select name="loc" id="loc">
	    			<option value="">--</option>
                      <?php foreach($mainlocation as $kf=>$isi){echo "<option value='".$isi->id_mainlocation."'>".$isi->mainlocation."</option>";} ?>
	    		</select></td></li></tr>
	    		</table>
	    		
	    	
	</div>

	<div id="searchBox" style="margin-top:2px">
    		

	    	<table>
	    		<tr><li><td>Column</td> <td><select name="column" id="column">
	    			<option value="d.asset_id">Id</option>
	    			<option value="dateofsurvey">Date of Survey</option>
	    			<option value="surveyor">Surveyor</option>
	    			<option value="d.barcode">Barcode</option>
	    			<option value="subfamily">Subfamily</option>
	    			<option value="ra.name">Name</option>
	    			<option value="d.brand">Brand</option>
	    			<option value="d.type">Type</option>
	    			<option value="d.dimension">Dimension</option>
	    			<option value="d.serial_numb">Serial</option>
	    		</select></td></li></tr>

	    		<tr><li><td>Search by</td> <td><select name="searchBy" id="searchBy">
	    			<option value="like">like</option>
	    			<option value="=">equal</option>
	    			<option value=">">greater than</option>
	    			<option value="<">less than</option>
	    		</select></td></li></tr>

	    		<li><td>Text</td> <td><input type = "text" name="search" id="searchText" style="width:90px;"><br></td></li>
	    		</table>
	    		
	    	
	</div>
				<input type = "submit" name="submitSearch" value="Search" style="margin-top:10px;">
	    	</form>

</div>

	<div id="ownerGet" hidden><?php if(isset($_GET['owner'])) {echo $_GET['owner'];} ?></div>
    <div id="familyGet" hidden><?php if(isset($_GET['family'])) {echo $_GET['family'];} ?></div>
    <div id="keyfacGet" hidden><?php if(isset($_GET['keyfac'])) {echo $_GET['keyfac'];} ?></div>
    <div id="locGet" hidden><?php if(isset($_GET['loc'])) {echo $_GET['loc'];} ?></div>
    <div id="columnGet" hidden><?php if(isset($_GET['column'])) {echo $_GET['column'];} ?></div>
    <div id="serachByGet" hidden><?php if(isset($_GET['searchBy'])) {echo $_GET['searchBy'];} ?></div>
    <div id="searchGet" hidden><?php if(isset($_GET['search'])) {echo $_GET['search'];} ?></div>

<script type="text/javascript">
$(function(){
	$('#homenav').addClass('active');
	$('#wrapper').addClass('col-sm-10');

	 var owner = document.getElementById('ownerGet');
	 var family = document.getElementById('familyGet');
	 var keyfac = document.getElementById('keyfacGet');
	 var loc = document.getElementById('locGet');
	 var column = document.getElementById('columnGet');
	 var searchBy = document.getElementById('serachByGet');
	 var search = document.getElementById('searchGet');

	 $('#owner option[value="'+owner.innerHTML+'"]').attr('selected', 'selected');
	 $('#family option[value="'+family.innerHTML+'"]').attr('selected', 'selected');
	 $('#keyfac option[value="'+keyfac.innerHTML+'"]').attr('selected', 'selected');
	 $('#loc option[value="'+loc.innerHTML+'"]').attr('selected', 'selected');
	 $('#column option[value="'+column.innerHTML+'"]').attr('selected', 'selected');
	 $('#searchBy option[value="'+searchBy.innerHTML+'"]').attr('selected', 'selected');
	 $('#searchText').val(search.innerHTML);

});
</script>