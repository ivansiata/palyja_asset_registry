		
		
          <div id="inputPage" style="margin-left:7%; margin-top:2%;">
          <ul class="nav nav-pills" style="margin-top: 25px; height:60px;">
            <li role="presentation"><a href="<?php echo base_url()?>crud/entry_data"><img src="<?php echo base_url()?>assets/po2.png" style="background-color:red; padding:6px 8px 5px 8px; border-radius:80%; box-shadow: 2px 4px 7px; width:80px; height:67px; margin-left:-10px"></a></li>
            <li style="width:37%;padding-top:3px;"><hr></li>
            <li class ="active"><a href="<?php echo base_url()?>crud/entry_data21"><img src="<?php echo base_url()?>assets/general.png" style="margin-left:0px; margin-right:13px; opacity:0.4;"></a></li>
            <li style="width:37.9%; padding-top:3px; margin-left:-10px" ><hr></li>
            <li><a href="<?php echo base_url()?>crud/entry_data3" ><img src="<?php echo base_url()?>assets/detail2.png" style="opacity:0.4"></a></li>
            
            
          </ul>
          <ul class="nav nav-pills" style="margin-top: 3px; margin-left:-1.2%">
            <li role="presentation">Purchase Order</li>
            <li style="width:35.4%;padding-top:3px;"></li>
            <li class ="active">Asset Generals</li>
            <li style="width:36.3%; padding-top:3px;"></li>
            <li>Asset Details</li>
           
          </ul>
          </div>

          <div class="col-md-12">
	          <?php echo form_open('crud/entry_data_proses')?>
	          <div id="inputForm"> 
	          	<table>
	          		<input type="text" name="type" value="new" hidden>
		          	<tr>
		          		<td>PO Number<span class="binreq">*</span></td>
		          		<td><input type="text" name="po" id="po" maxlength="6" style="width:80px"> <button type="button" id="buttonSearch">search</button></td>
		          	</tr>
		          	<tr>
		          		<td>PO Description</td>
		          		<td><textarea name="podesc" id="podesc" cols="30" rows="4" readonly></textarea></td>
		          	</tr>
		          	<tr>
		          		<td>PO Department</td>
		          		<td>
		          			<select class="chozen" name="podept" id="podept" style="width: 160px;">
								<option value="">--</option>
									<?php foreach($pic as $kf=>$isi){
										echo "<option value=".$isi->id_dept." ".set_select('pic',$isi->id_dept).">".$isi->workingunit."</option>";
									} ?>
							</select>
						</td>
		          	</tr>
		          	<tr>
		          		<td>PO Requestor</td>
		          		<td><input type="text" name="popic"></td>
		          	</tr>
		          	<tr>
		          		<td>Key Facilities<span class="binreq">*</span></td>
		          		<td><select class="chozen" name="keyfac" id="keyfac" style="width: 160px">
                      		<option value="">--</option>
                       		<?php foreach($keyfac as $kf=>$isi){
                          		echo "<option value=".$isi->id." ".set_select('keyfac',$isi->id).">".$isi->facilities_name."</option>";
                        	} ?>
                      </select></td>
		          	</tr>
		          	<tr>
		          		<td style="width: 110px">Document Folder Number</td>
		          		<td><input type="text" name="docfol" style="width: 80px"></td>
		          	</tr>
		          	<tr>
		          		<td>Month</td>
		          		<td><select id="month" name="month" style="width:87px">
		          			<option>--</option>
		          			<option>Januari</option>
		          			<option>Februari</option>
		          			<option>Maret</option>
		          			<option>April</option>
		          			<option>Mei</option>
		          			<option>Juni</option>
		          			<option>Juli</option>
		          			<option>Agustus</option>
		          			<option>September</option>
		          			<option>Oktober</option>
		          			<option>November</option>
		          			<option>Desember</option>
		          		</select>
		          		</td>
		          	</tr>
		          	<tr>
		          		<td>Year</td>
		          		<td><select id="year" name="yearpicker" class="yearpicker">
		          			<option value="">--</option>
		          		</select>
		          		</td>
		          	</tr>
		          	<tr>
		          		<td>
		          			<input type="radio" id="capexopex" name="capexopex" value="capex|1">Capex &nbsp
		          			<input type="radio" id="capexopex" name="capexopex" value="opex|2">Opex
		          		</td>
		          	</tr>

		      		<tr>

		      			<td><input type="submit" id="submit" name="submit" value="SAVE"></td>
		      			<td><span class="binreq" style="float:right;">*required</span></td>
		      		</tr>
		          </table>
	             </div>
	     </div>
	 </form>
	    
	 <script>
	 $(function(){
	 	$('#realWrapper').css("min-height", "110vh");
	 	$('#entrynav').addClass("active");
	 	$('#po').keypress(function(e){
	 		if(e.keyCode == 13){
	 			$('#buttonSearch').click();
	 			e.preventDefault();
	 		}


	 	});

	 	$('#po').keyup(function(e){
	 		
		 		if($(this).val().length != 6){
		 			$('#podesc').val('');
		 		}
	 		

	 	});


	 	$('#buttonSearch').on('click', function(e){
	 		var base_url = "<?php echo base_url();?>";
	 		var po = $('#po').val();
	 		$('#podesc').val('');
	 		$.ajax({
            type:"POST",
            url: base_url+"/crud/proses_ajax_po/"+po,
            data: "po="+po,
    
            success: function(data){
               var json = jQuery.parseJSON(data);
               $.each(json, function(i, item){
               var funding = item.funding.toLowerCase();
               var fundingval;
               if(funding == "capex"){
               	fundingval = "capex|1"
               }else{
               	fundingval = "opex|2"
               }
                  $('#podesc').val(item.deskripsi_po);
                  $('#podept').find("option:contains('"+item.department+"')").attr('selected', 'selected').trigger('chosen:updated');
                  $('#month').find("option:contains('"+item.month+"')").attr('selected', 'selected');
                  $('#year').find("option:contains('"+item.year+"')").attr('selected', 'selected');
                  $('#capexopex[name=capexopex][value="'+fundingval+'"]').attr('checked', 'checked');
               });
             
            },
            error: function(data){
              alert('error');
             
            }
          });

	 		

	 	});

		$('#submit').on('click', function(e){
			if($('#podesc').val() == "" || $('#po').val() == ""){
				alert('PO Number Invalid!');
				e.preventDefault();
			}else if($('#keyfac').val() == ""){
				alert('Key Facilities Cannot be empty!');
				e.preventDefault();
			}
		});
		var date= new Date().getFullYear();
		for(var i=date;i>1980;i--)
		$('.yearpicker').append('<option value="'+i+'">'+i+'</option>')
	 })

	 </script>

</html>