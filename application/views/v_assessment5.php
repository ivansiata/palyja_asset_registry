<br>
<center>
<h1>Sistem Pemipaan </h1>
<h3><span><?php echo $_GET['id']?></span>
	<?php echo $detail[0]->nama ?>
</h3>
</center>

<?php echo form_open('crud/updateSipil5')?>
	<input type="text" id="assessID" name="assessID" value="<?php echo $_GET['id']?>" hidden>
	<input type="text" id="table" name="table" value="assessmentpemipaan" hidden>
	<input type = "text" id="baseurl" value="<?php echo base_url()?>" hidden>
	<div class="col-md-3"></div>
	<div class="col-md-6" style="text-align:center">
	<div class ="panel panel-default">
	<div class="panelbody" >
		<div id="assessmentForm" style="text-align:center; max-height:460px; overflow:auto"> 
			
			<table style="display:inline-block; text-align:left">
		  		<input type="text" name="type" value="new" hidden>
		  		<th style="width:25px; text-align:left">No</th>
		  		<th style="width:200px; text-align:center">Categories</th>
		  		<th style="width:200px; text-align:center">Grade</th>
		      	<tr>
		      		<td>1.</td>
		      		<td>Debit air dan kontinuitas</td>
		      		<td><select id="debair" name="debair" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Pipa air bersih dan sistemnya</td>
		      		<td><select id="piber" name="piber" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Pipa air bekas dan sistemnya</td>
		      		<td><select id="pibek" name="pibek" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select></td>
		      	</tr>
		      	
		      	<tr>
		      		<td>4.</td>
		      		<td>Pipa air kotor dan sistemnya</td>
		      		<td><select id="pikot" name="pikot" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>5.</td>
		      		<td>Tanki atas</td>
		      		<td><select id="tanat" name="tanat" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select></td>
		      	</tr>
		      	<tr>
		      		<td>6.</td>
		      		<td>Tanki bawah</td>
		      		<td><select id="tanbaw" name="tanbaw" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select></td>
		      	</tr>
		      	<tr>
		      		<td>7.</td>
		      		<td>Koneksi sambungan</td>
		      		<td><select id="konsam" name="konsam" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select></td>
		      	</tr>
		      	<tr>
		      		<td>8.</td>
		      		<td>Vent pipe</td>
		      		<td><select id="ventpipe" name="ventpipe" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select></td>
		      	</tr>

		    </table>
		</div>
	</div>
	<div class ="panel-footer">
		<a href="#" id="aPrev" style="color:black">PREV</a>
		<input type="submit" name="save" value="SAVE">
		<a href="#" id="aNext" style="color:black">NEXT</a><br><br>
		<input type="submit" name="finish" value="SAVE ALL & VIEW REPORT">
	</div>
	</div>
	</div>
	<div class="col-md-3"></div>
</form>

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

<script type="text/javascript">
	$(function(){
		$('#aNext').on("click", function(){
			$(this).attr("href", $('#baseurl').val()+"crud/assessment6?id="+$('#assessID').val())
		})
		$('#aPrev').on("click", function(){
			$(this).attr("href", $('#baseurl').val()+"crud/assessment4?id="+$('#assessID').val())
		})

		assessID = $("#assessID").val();
		table = $("#table").val();
		var base_url = "<?php echo base_url();?>";
		var updateID = $('#assessID').val();

		$.ajax({
            type:"POST",
            url: base_url+"crud/get_dataAssess/"+updateID,
            data: {"updateID" : updateID, "table" : table},
    
            success: function(data){
          
            	var json = jQuery.parseJSON(data);
              	$.each(json,function(i,item){
              		$('#debair option[value='+item.debitair+']').attr('selected', 'selected');
              		$('#piber option[value='+item.pipaairbersih+']').attr('selected', 'selected');
              		$('#pibek option[value='+item.pipaairbekas+']').attr('selected', 'selected');
              		$('#pikot option[value='+item.pipaairkotor+']').attr('selected', 'selected');
              		$('#tanat option[value='+item.tankiatas+']').attr('selected', 'selected');
              		$('#tanbaw option[value='+item.tankibawah+']').attr('selected', 'selected');
              		$('#konsam option[value='+item.koneksisambungan+']').attr('selected', 'selected');
              		$('#ventpipe option[value='+item.ventpipe+']').attr('selected', 'selected');
              		
              	});

            },
             error: function(data){
             	alert('error');
             }

         });
	});
</script>
