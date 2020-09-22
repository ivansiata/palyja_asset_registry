</div>

</div>
	<?php if($_GET['category'] == 1){ 
			echo "<center><h4>Low Sipil & Struktur Assessment</h4></center>";
		}else if($_GET['category'] == 2){
			echo "<center><h4>Low Arsitektur Assessment</h4></center>";
		}else if($_GET['category'] == 3){
			echo "<center><h4>Low Mekanikal Assessment</h4></center>";
		}else if($_GET['category'] == 4){
			echo "<center><h4>Low Elektrikal Assessment</h4></center>";
		}else if($_GET['category'] == 5){
			echo "<center><h4>Low Sistem Pemipaan Assessment</h4></center>";
		}

	?>
	<table id ="viewTable" class="custom table-bordered">
		<tr class="bHeader">
			<th id= "tId">Asset ID</th>
			<th>Name</th>
			<th>Sipil & Struktur</th>
			<th id= "tDate">Arsitektur</th>
			<th id= "tSurv">Mekanikal</th>
			<th id= "tFam">Elektrikal</th>
			<th id= "tSub">Sistem Pemipaan</th>
			<th>Action</th>
		</tr>
	<?php 
	$counter = 1;
	foreach($viewList as $vh=>$isi){
	
	$bla = $counter%2;
	if($bla != 0){ ?>
	<tr>
		<td id= "tAss" class="row10"><?php echo $isi->asset_id ?></td>
		<td id="tAssetName" class="row11"><?php echo $isi->nama ?></td>
		<td id="tLoc" class="row10" <?php if($_GET['category'] == 1){ echo "style='color:red'";} ?> ><?php echo $isi->sipil ?></td>
		<td id= "tUnit" class="row11" <?php if($_GET['category'] == 2){ echo "style='color:red'";} ?> ><?php echo $isi->arsitektur ?></td>
		<td id= "tBar" class="row10" <?php if($_GET['category'] == 3){ echo "style='color:red'"; } ?> ><?php echo $isi->mekanikal ?></td>
		<td id= "tBra" class="row11" <?php if($_GET['category'] == 4){ echo "style='color:red'";} ?> ><?php echo $isi->elektrikal ?></td>
		<td id= "tType" class="row10" <?php if($_GET['category'] == 5){ echo "style='color:red'";} ?> ><?php echo $isi->sistempemipaan ?></td>
		<td id="tAct" class="row11"> 
				
				<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
				
			
		</td>
		
	</tr>
	<?php }else{ ?>
	<tr>
		<td id= "tAss" class="row1"><?php echo $isi->asset_id ?></td>
		<td id="tAssetName" ><?php echo $isi->nama ?></td>
		<td id="tLoc" class="row1" <?php if($_GET['category'] == 1){ echo "style='color:red'"; } ?>><?php echo $isi->sipil ?></td>
		<td id= "tUnit"  <?php if($_GET['category'] == 2){ echo "style='color:red'"; } ?>><?php echo $isi->arsitektur ?></td>
		<td id= "tBar" class="row1" <?php if($_GET['category'] == 3){ echo "style='color:red'"; } ?>><?php echo $isi->mekanikal ?></td>
		<td id= "tBra"  <?php if($_GET['category'] == 4){ echo "style='color:red'"; } ?>><?php echo $isi->elektrikal ?></td>
		<td id= "tType" class="row1" <?php if($_GET['category'] == 5){ echo "style='color:red'"; } ?>><?php echo $isi->sistempemipaan ?></td>
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

	<div class="panel-group" style="position:fixed; right:15px; bottom:4px; z-index:3">
		<div class="panel panel-default">
		<div id="collapse1" class="panel-collapse collapse">
			<div class="panel-heading" style="text-align:center; background-color:aqua">
			<h4 class="panel-title">
				Instructions
			</h4>
			</div>
			<div class="panel-body" style="height:100%;">
			<table class="table table-bordered" id="tableInfo">
				<tr>
					<th>Keterangan</th>
					<th>Kerusakan</th>
				</tr>
				<tr>
					<td>1 = Rusak / tidak dapat diterima</td>
					<td>81-100%</td>
				</tr>
				<tr>
					<td>2 = Major / bangun kembali</td>
					<td>61-80%</td>
				</tr>
				<tr>
					<td>3 = Minor / restorasi, pemugaran, rehabilitasi</td>
					<td>41-60%</td>
				</tr>
				<tr>
					<td>4 = Affected</td>
					<td>21-40%</td>
				</tr>
				<tr>
					<td>5 = None / tidak ada</td>
					<td> 0-20%</td>
				</tr>
			</table>
			</div>
		</div> 
		<div class="panel-footer" style="text-align:right; background-color:aqua; " data-toggle="collapse" href="#collapse1">
			<a data-toggle="collapse" href="#collapse1" style="color:black; text-decoration: none">INFO</a>
		</div>
		</div>
	</div>
	
</div>

</div>


<script type="text/javascript">
$(function(){
	$('#homenav').addClass('active');
	$('#wrapper').addClass('col-sm-12');

});
</script>