<br>
<center>
<h1>Arsitektur </h1>
<h3><span><?php echo $_GET['id']?></span>
	<?php echo $detail[0]->nama ?>
</h3>
</center>

<?php echo form_open('crud/updateSipil2')?>
	<input type="text" id="assessID" name="assessID" value="<?php echo $_GET['id']?>" hidden>
	<input type="text" id="table" name="table" value="assessmentarsitektur" hidden>
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
		      		<td>Dinding : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Pasangan dinding</td>
		      		<td><select id="pasding" name="pasding" class="form-control">
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
		      		<td>&nbsp Plester</td>
		      		<td><select id="plester" name="plester" class="form-control">
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
		      		<td>&nbsp Finishing dinding</td>
		      		<td><select id="finding" name="finding" class="form-control">
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
		      		<td>&nbsp Plin</td>
		      		<td><select id="plin" name="plin" class="form-control">
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
		      		<td>Jendela : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Kusen jendela</td>
		      		<td><select id="kujen" name="kujen" class="form-control">
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
		      		<td>&nbsp Kaca jendela</td>
		      		<td><select id="kajen" name="kajen" class="form-control">
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
		      		<td>&nbsp Aksesoris</td>
		      		<td><select id="aksjen" name="aksjen" class="form-control">
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
		      		<td>Pintu : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Kusen pintu</td>
		      		<td><select id="kupin" name="kupin" class="form-control">
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
		      		<td>&nbsp Daun pintu</td>
		      		<td><select id="dapin" name="dapin" class="form-control">
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
		      		<td>&nbsp Aksesoris</td>
		      		<td><select id="akspin" name="akspin" class="form-control">
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
		      		<td>Lantai : </td>
		      		<td><select id="lantai" name="lantai" class="form-control">
		      			<option value="0">--</option>
		      			<option value="1">Rusak / tidak dapat diterima</option>
		      			<option value="2">Major / bangun kembali</option>
		      			<option value="3">Minor / restorasi</option>
		      			<option value="4">Affected</option>
		      			<option value="5">None</option>
		      		</select></td>
		      	</tr>
		      	<tr>
		      		<td>5.</td>
		      		<td>Kanopi : </td>
		      		<td><select id="kanopi" name="kanopi" class="form-control">
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
		      		<td>Parapets : </td>
		      		<td><select id="parapets" name="parapets" class="form-control">
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
		      		<td>Plafon : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Rangka</td>
		      		<td><select id="rangkapla" name="rangkapla" class="form-control">
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
		      		<td>&nbsp Penutup</td>
		      		<td><select id="penutuppla" name="penutuppla" class="form-control">
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
		      		<td>&nbsp Kornis</td>
		      		<td><select id="kronispla" name="kronispla" class="form-control">
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
		      		<td>8.</td>
		      		<td>Atap : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Penutup atap</td>
		      		<td><select id="penutupat" name="penutupat" class="form-control">
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
		      		<td>&nbsp Insulasi</td>
		      		<td><select id="insulasiat" name="insulasiat" class="form-control">
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
		      		<td>&nbsp Lisplank</td>
		      		<td><select id="lisplankat" name="lisplankat" class="form-control">
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
		      		<td>9.</td>
		      		<td>Perkerasan jalan : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Beton</td>
		      		<td><select id="betonper" name="betonper" class="form-control">
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
		      		<td>&nbsp Aspal</td>
		      		<td><select id="aspalper" name="aspalper" class="form-control">
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
		      		<td>&nbsp Paving blok</td>
		      		<td><select id="pavingper" name="pavingper" class="form-control">
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
		      		<td>10.</td>
		      		<td>Partisi : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Rangka partisi</td>
		      		<td><select id="rangpart" name="rangpart" class="form-control">
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
		      		<td>&nbsp Lis atas</td>
		      		<td><select id="lispart" name="lispart" class="form-control">
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
		      		<td>&nbsp Plin</td>
		      		<td><select id="plinpart" name="plinpart" class="form-control">
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
		      		<td>11.</td>
		      		<td>Tirai : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Sunshade</td>
		      		<td><select id="suntir" name="suntir" class="form-control">
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
		      		<td>&nbsp Blind</td>
		      		<td><select id="sunblind" name="sunblind" class="form-control">
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
		      		<td>&nbsp Sticker</td>
		      		<td><select id="sticktir" name="sticktir" class="form-control">
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
		      		<td>11.</td>
		      		<td>Lainnya : </td>
		      		<td><select id="lainnya" name="lainnya" class="form-control">
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
		<a href="" id="aNext" style="color:black">NEXT</a><br><br>
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
			$(this).attr("href", $('#baseurl').val()+"crud/assessment3?id="+$('#assessID').val())
		})
		$('#aPrev').on("click", function(){
			$(this).attr("href", $('#baseurl').val()+"crud/assessment?id="+$('#assessID').val())
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
              		$('#pasding option[value='+item.pasangandinding+']').attr('selected', 'selected');
              		$('#plester option[value='+item.plester+']').attr('selected', 'selected');
              		$('#finding option[value='+item.finishingdinding+']').attr('selected', 'selected');
              		$('#plin option[value='+item.plin+']').attr('selected', 'selected');
              		$('#kujen option[value='+item.kusenjendela+']').attr('selected', 'selected');
              		$('#kajen option[value='+item.kacajendela+']').attr('selected', 'selected');
              		$('#aksjen option[value='+item.aksesorisjendela+']').attr('selected', 'selected');
              		$('#kupin option[value='+item.kusenpintu+']').attr('selected', 'selected');
              		$('#dapin option[value='+item.daunpintu+']').attr('selected', 'selected');
              		$('#akspin option[value='+item.aksesoris+']').attr('selected', 'selected');
              		$('#lantai option[value='+item.aksesoris+']').attr('selected', 'selected');
              		$('#kanopi option[value='+item.kanopi+']').attr('selected', 'selected');
              		$('#parapets option[value='+item.parapets+']').attr('selected', 'selected');
              		$('#rangkapla option[value='+item.rangkaplafon+']').attr('selected', 'selected');
              		$('#penutuppla option[value='+item.penutupplafon+']').attr('selected', 'selected');
              		$('#kronispla option[value='+item.kronisplafon	+']').attr('selected', 'selected');
              		$('#penutupat option[value='+item.penutupatap+']').attr('selected', 'selected');
              		$('#insulasiat option[value='+item.insulasi+']').attr('selected', 'selected');
              		$('#lisplankat option[value='+item.lisplank+']').attr('selected', 'selected');
              		$('#betonper option[value='+item.beton+']').attr('selected', 'selected');
              		$('#aspalper option[value='+item.aspal+']').attr('selected', 'selected');
              		$('#pavingper option[value='+item.pavingblock+']').attr('selected', 'selected');
              		$('#rangpart option[value='+item.rangkapartisi+']').attr('selected', 'selected');
              		$('#lispart option[value='+item.lisatas+']').attr('selected', 'selected');
              		$('#plinpart option[value='+item.plinpartisi+']').attr('selected', 'selected');
              		$('#suntir option[value='+item.sunshade+']').attr('selected', 'selected');
              		$('#sunblind option[value='+item.blind+']').attr('selected', 'selected');
              		$('#sticktir option[value='+item.sticker+']').attr('selected', 'selected');
              		$('#lainnya option[value='+item.lainnya+']').attr('selected', 'selected');
              	});

            },
             error: function(data){
             	alert('error');
             }

       });
	});
</script>





