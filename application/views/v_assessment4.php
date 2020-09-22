<br>
<center>
<h1>Elektrikal </h1>
<h3><span><?php echo $_GET['id']?></span>
	<?php echo $detail[0]->nama ?>
</h3>
</center>

<?php echo form_open('crud/updateSipil4')?>
	<input type="text" id="assessID" name="assessID" value="<?php echo $_GET['id']?>" hidden>
	<input type="text" id="table" name="table" value="assessmentelektrikal" hidden>
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
		      		<td>Panel listrik : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td>&nbsp1.1</td>
		      		<td>&nbsp Main distribution : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Wiring diagram</td>
		      		<td><select id="wirdima" name="wirdima" class="form-control">
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
		      		<td>&nbsp &nbsp Identification Electrical equipment</td>
		      		<td><select id="iema" name="iema" class="form-control">
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
		      		<td>&nbsp &nbsp Cover protection</td>
		      		<td><select id="coprma" name="coprma" class="form-control">
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
		      		<td>&nbsp &nbsp Wiring cable</td>
		      		<td><select id="wircama" name="wircama" class="form-control">
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
		      		<td>&nbsp1.2</td>
		      		<td>&nbsp Sub distribution : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Wiring diagram</td>
		      		<td><select id="wirdisub" name="wirdisub" class="form-control">
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
		      		<td>&nbsp &nbsp Identification Electrical equipment</td>
		      		<td><select id="iesub" name="iesub" class="form-control">
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
		      		<td>&nbsp &nbsp Cover protection</td>
		      		<td><select id="coprosub" name="coprosub" class="form-control">
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
		      		<td>&nbsp &nbsp Wiring cable</td>
		      		<td><select id="wircasub" name="wircasub" class="form-control">
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
		      		<td>&nbsp 1.3</td>
		      		<td>&nbsp Local distribution : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Wiring diagram</td>
		      		<td><select id="wirdiloc" name="wirdiloc" class="form-control">
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
		      		<td>&nbsp &nbsp Identification Electrical equipment</td>
		      		<td><select id="ieloc" name="ieloc" class="form-control">
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
		      		<td>&nbsp &nbsp Cover protection</td>
		      		<td><select id="coproloc" name="coproloc" class="form-control">
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
		      		<td>&nbsp &nbsp Wiring cable</td>
		      		<td><select id="wircaloc" name="wircaloc" class="form-control">
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
		      		<td>Instalasi : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Pelindung jalur kabel</td>
		      		<td><select id="pejal" name="pejal" class="form-control">
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
		      		<td>&nbsp T-Dos</td>
		      		<td><select id="tdos" name="tdos" class="form-control">
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
		      		<td>&nbsp Rak kabel</td>
		      		<td><select id="rakka" name="rakka" class="form-control">
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
		      		<td>Material Listrik : </td>
		      		<td><select id="malis" name="malis" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Saklar</td>
		      		<td><select id="saklar" name="saklar" class="form-control">
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
		      		<td>&nbsp Stop Kontak</td>
		      		<td><select id="stopkon" name="stopkon" class="form-control">
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
		      		<td>&nbsp Stop Kontak AC</td>
		      		<td><select id="stopkonac" name="stopkonac" class="form-control">
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
		      		<td>4.</td>
		      		<td>Sistem Grounding : </td>
		      		<td><select id="sisgro" name="sisgro" class="form-control">
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
			$(this).attr("href", $('#baseurl').val()+"crud/assessment5?id="+$('#assessID').val())
		})
		$('#aPrev').on("click", function(){
			$(this).attr("href", $('#baseurl').val()+"crud/assessment3?id="+$('#assessID').val())
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
              		$('#wirdima option[value='+item.wiringdiagrammain+']').attr('selected', 'selected');
              		$('#iema option[value='+item.identificationelectircalequipmentmain+']').attr('selected', 'selected');
              		$('#coprma option[value='+item.coverprotectionmain+']').attr('selected', 'selected');
              		$('#wircama option[value='+item.wiringcabelmain+']').attr('selected', 'selected');
              		$('#wirdisub option[value='+item.wiringdiagramsub+']').attr('selected', 'selected');
              		$('#iesub option[value='+item.identificationelectircalequipmentsub+']').attr('selected', 'selected');
              		$('#coprosub option[value='+item.coverprotectionsub+']').attr('selected', 'selected');
              		$('#wircasub option[value='+item.wiringcabelsub+']').attr('selected', 'selected');
              		$('#wirdiloc option[value='+item.wiringdiagramlocal+']').attr('selected', 'selected');
              		$('#ieloc option[value='+item.identificationelectircalequipmentlocal+']').attr('selected', 'selected');
              		$('#coproloc option[value='+item.coverprotectionlocal+']').attr('selected', 'selected');
              		$('#wircaloc option[value='+item.wiringcabellocal+']').attr('selected', 'selected');
              		$('#pejal option[value='+item.pelindungjalurkabel+']').attr('selected', 'selected');
              		$('#tdos option[value='+item.tdos+']').attr('selected', 'selected');
              		$('#rakka option[value='+item.rakkabel+']').attr('selected', 'selected');
              		$('#malis option[value='+item.materiallistrik+']').attr('selected', 'selected');
              		$('#saklar option[value='+item.saklar+']').attr('selected', 'selected');
              		$('#stopkon option[value='+item.stopkontak+']').attr('selected', 'selected');
              		$('#stopkonac option[value='+item.stopkontakac+']').attr('selected', 'selected');
              		$('#sisgro option[value='+item.sistemgrounding+']').attr('selected', 'selected');
              	});

            },
             error: function(data){
             	alert('error');
             }

         });
	});
</script>

