<br>
<center>
<h1>Sistem Sanitasi </h1>
<h3><span><?php echo $_GET['id']?></span>
	<?php echo $detail[0]->nama ?>
</h3>
</center>

<?php echo form_open('crud/updateSipil6')?>
	<input type="text" id="assessID" name="assessID" value="<?php echo $_GET['id']?>" hidden>
	<input type="text" id="table" name="table" value="assessmentsanitasi" hidden>
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
		      		<td>Pengolahan air limbah</td>
		      		<td><select id="select1" name="select1" class="form-control">
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
		      		<td>Septic tank</td>
		      		<td><select id="select2" name="select2" class="form-control">
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
		      		<td>Peralatan sanitari: </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Closet</td>
		      		<td><select id="select3" name="select3" class="form-control">
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
		      		<td></td>
		      		<td>&nbsp Urinal</td>
		      		<td><select id="select4" name="select4" class="form-control">
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
		      		<td></td>
		      		<td>&nbsp Wastafel</td>
		      		<td><select id="select5" name="select5" class="form-control">
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
		      		<td></td>
		      		<td>&nbsp Kitchen sink</td>
		      		<td><select id="select6" name="select6" class="form-control">
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
		      		<td></td>
		      		<td>&nbsp Shower</td>
		      		<td><select id="select7" name="select7" class="form-control">
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
		      		<td></td>
		      		<td>&nbsp Valve</td>
		      		<td><select id="select8" name="select8" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select>
		      		</td>
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
			$(this).attr("href", $('#baseurl').val()+"crud/assessment7?id="+$('#assessID').val())
		})
		$('#aPrev').on("click", function(){
			$(this).attr("href", $('#baseurl').val()+"crud/assessment5?id="+$('#assessID').val())
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
              		$('#select1 option[value='+item.pengolahanairlimbah+']').attr('selected', 'selected');
              		$('#select2 option[value='+item.septictank+']').attr('selected', 'selected');
              		$('#select3 option[value='+item.closet+']').attr('selected', 'selected');
              		$('#select4 option[value='+item.urinal+']').attr('selected', 'selected');
              		$('#select5 option[value='+item.wastafel+']').attr('selected', 'selected');
              		$('#select6 option[value='+item.kitchensink+']').attr('selected', 'selected');
              		$('#select7 option[value='+item.shower+']').attr('selected', 'selected');
              		$('#select8 option[value='+item.valve+']').attr('selected', 'selected');
              		
              	});

            },
             error: function(data){
             	alert('error');
             }

         });
	});
</script>
