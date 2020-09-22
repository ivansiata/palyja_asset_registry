<center><h3>Purchase Order Number :  <?php echo $datapo[0]->no_po ?></h3></center><br>
<div style="background-color: white; border:1px solid #e1e8ff; box-shadow:0px 0px 1px 1px #e1e8ff; padding:8px">
<h5>PO Description :  <?php echo $datapo[0]->deskripsi_po ?></h5>
<h5>PO Department :  <?php echo $datapo[0]->workingunit ?></h5>
<h5>Requestor :  <?php echo $datapo[0]->porequestor ?></h5>
<h5>Key Facility :  <?php echo $datapo[0]->facilities_name ?></h5>
<h5>Document Folder Number :  <?php echo $datapo[0]->documentfoldernumber ?></h5>
<h5>Month :  <?php echo $datapo[0]->month ?> &nbsp &nbsp Year :  <?php echo $datapo[0]->year ?></h5>
<h5>Funding :  <?php echo $datapo[0]->funding ?></h5>

<table id ="viewTable" class="custom table-bordered" style="width:40%">
		<tr>
			<th id= "tId" colspan="4">Asset List</th>
		</tr>
		<tr class="bHeader">
			<th id= "tId" >No</th>
			<th>Asset ID</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
	<?php 
	$counter = 1;
	foreach($datapo as $vh=>$isi){
	
	$bla = $counter%2;
	if($bla != 0){ ?>
	<tr>
		<td class="row10" width="1%"><?php echo $vh+1 ?></td>
		<td id="tAssetName" class="row11"><?php echo $isi->asset_id ?></td>
		<td id="tLoc" class="row10"><?php echo $isi->name ?></td>
		<td id="tAct" class="row11"> 
				
				<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
				
			
		</td>
		
	</tr>
	<?php }else{ ?>
	<tr>
		<td  class="row1"><?php echo $vh + 1 ?></td>
		<td id="tAssetName"><?php echo $isi->asset_id ?></td>
		<td id="tLoc" class="row1"><?php echo $isi->name ?></td>
		<td id="tAct"> 	
				<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
			
		</td>
		
	</tr>

	<?php }
	$counter++;
	}
	 ?>
	</table>

</div><br>

