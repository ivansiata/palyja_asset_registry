</div>

</div>
	<table id ="viewTable" class="custom">
		<tr class="bHeader">
			<th id= "tId">Asset ID</th>
			<th id= "tDate">Unit Asset</th>
			<th id= "tSurv">Barcode</th>
			<th id= "tBar">Used By</th>
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
		<td id= "tDate" class="row10"><?php echo $isi->asset_id ?></td>
		<td id= "tSurv" class="row11"><?php echo $isi->id_unitasset ?></td>
		<td id= "tBar" class="row10"><?php echo $isi->barcode ?></td>
		<td id= "tFam" class="row11"><?php echo $isi->id_dept ?></td>
		<td id= "tSub" class="row10"><?php echo $isi->brand ?></td>
		<td id= "tNam" class="row11"><?php echo $isi->type ?></td>
		<td id= "tBra" class="row10"><?php echo $isi->dimension ?></td>
		<td id= "tTyp" class="row11"><?php echo $isi->serial_numb ?></td>
		<td id= "tDim" class="row10"><?php echo $isi->id_status ?></td>
		<td id= "tSer" class="row11"><?php echo $isi->purchasingdate ?></td>
		<td id= "tSer" class="row10"><?php echo $isi->installdate ?></td>
		<td class="row10"><a href="#">Update</a> 
			<a href="#">Delete</a></td>
	</tr>
	<?php }else{ ?>
		<tr>
			<td id= "tId1" class="row1"><?php echo $isi->asset_id ?></td>
			<td id= "tDate"><?php echo $isi->id_unitasset ?></td>
			<td id= "tSurv" class="row1"><?php echo $isi->barcode ?></td>
			<td id= "tBar"><?php echo $isi->id_dept ?></td>
			<td id= "tFam" class="row1"><?php echo $isi->brand ?></td>
			<td id= "tSub"><?php echo $isi->type ?></td>
			<td id= "tNam" class="row1"><?php echo $isi->dimension ?></td>
			<td id= "tBra"><?php echo $isi->serial_numb ?></td>
			<td id= "tTyp" class="row1"><?php echo $isi->id_status ?></td>
			<td id= "tDim"><?php echo $isi->purchasingdate ?></td>
			<td id= "tSer" class="row1"><?php echo $isi->installdate ?></td>
			<td class="row10"><a href="#">Update</a> 
			<a href="#">Delete</a></td>
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
	    	<form action="<?php echo base_url()?>/crud/search" method="GET" id="formid">
	    	<table>
	    		<tr><li><td>Owner</td> <td><select name="column">
	    			<option>--</option>
	    			 <?php foreach($owner as $ow=>$isi){
                          echo "<option value=".$isi->id." ".set_select('owner',$isi->id).">".$isi->owner."</option>";
                        } ?>
	    		</select></td></li></tr>

	    		<tr><li><td>Family</td> <td><select name="searchBy">
	    			<option>--</option>
	    			<?php 
                       foreach($family as $fam=>$isi){ 
                        $ostring = $isi->family."|".$isi->id_familyasset;
                        $nstring = str_replace(' ','', $ostring);
                        echo "<option value=".$nstring." ".set_select('family',$nstring).">".$isi->family."</option>";
                        } ?>
	    		</select></td></li></tr>

	    		<tr><li><td>Key Facilities</td> <td><select name="searchBy">
	    			<option value="">--</option>
                       		<?php foreach($keyfac as $kf=>$isi){
                          		echo "<option value=".$isi->id." ".set_select('keyfac',$isi->id).">".$isi->facilities_name."</option>";
                        	} ?>
	    		</select></td></li></tr>

	    		<tr><li><td>Location</td> <td><select name="searchBy">
	    			<option value="">--</option>
                      <?php foreach($mainlocation as $kf=>$isi){echo "<option value='a|".$isi->id_mainlocation."'>".$isi->mainlocation."</option>";} ?>
	    		</select></td></li></tr>
	    		</table>
	    		
	    	
	</div>

	<div id="searchBox" style="margin-top:2px">
    		

	    	<table>
	    		<tr><li><td>Column</td> <td><select name="column">
	    			<option value="id">Id</option>
	    			<option value="dateofsurvey">Date of Survey</option>
	    			<option value="surveyor">Surveyor</option>
	    			<option value="barcode">Barcode</option>
	    			<option value="family">Family</option>
	    			<option value="subfamily">Subfamily</option>
	    			<option value="name">Name</option>
	    			<option value="brand">Brand</option>
	    			<option value="type">Type</option>
	    			<option value="dimension">Dimension</option>
	    			<option value="serial">Serial</option>
	    			<option value="owner">Owner</option>
	    		</select></td></li></tr>

	    		<tr><li><td>Search by</td> <td><select name="searchBy">
	    			<option value="like">like</option>
	    			<option value="equal">equal</option>
	    			<option value="greater">greater than</option>
	    			<option value="less">less than</option>
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