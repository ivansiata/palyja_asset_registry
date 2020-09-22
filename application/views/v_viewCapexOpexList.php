</div>

</div>
	<?php if(isset($_GET['view'])){
		if($_GET['view'] == 3){ echo "<center style='margin-bottom:10px'><h4>Outstanding Purchase Order List</h4></center>";} 
	} ?>
	<table class="table table-bordered" style="width:100%;">
		<tr>
			<th style="text-align:center">PO Number</th>
			<th style="text-align:center">PO Description</th>
			<th style="text-align:center">Department</th>
			<th style="text-align:center">Month</th>
			<th style="text-align:center">Year</th>
			<th style="text-align:center">Funding</th>
		</tr>
		<?php 
		$counter = 0; 
		foreach($datapo as $vh=>$isi){ ?>
		<tr>
			<td><?php echo $isi->no_po ?></td>
			<td><?php echo $isi->deskripsi_po ?></td>
			<td><?php echo $isi->department ?></td>
			<td><?php echo $isi->month ?></td>
			<td><?php echo $isi->year ?></td>
			<td><?php echo $isi->funding ?></td>
		</tr>
		<?php 
		$counter++; 
		} 
		if($counter == 0){
          echo "<tr><td colspan='6'><center>No Data Found<center></td></tr>";
        }
		?>
		
	</table>
	<?php if(!isset($_GET['search'])){ echo $this->pagination->create_links();}?><br>
	
</div>

</div>

<div id="searchPanel" class="col-sm-2">
	<form action="<?php echo base_url()?>crud/searchCapexOpex" method="GET" id="formid">
	<?php if(isset($_GET['view'])){ 
	if($_GET['view'] == 3){ ?> 
		<input type="text" name="outstand" value="true" hidden>
		<input type="text" name="view" value="3" hidden>
	<?php 
	}
	} ?>
	<div id="searchBox">
    		<h4 style="color:black">Search</h4>

	    	<table>
	    		<tr><td>PO Number</td> <td><input type = "text" name="search" style="width:90px;"><br></td></tr>
	    		<tr><td>Department</td> <td><input type = "text" name="dept" style="width:90px;"><br></td></tr>
	    	</table>
	    		
	    	
	</div>
				<input type = "submit" name="submitSearch" value="Search" style="margin-top:10px;">
	    	</form>

</div>

<script type="text/javascript">
$(function(){
	$('#capexopexnav').addClass('active');
	$('#wrapper').addClass('col-sm-10');

});
</script>
