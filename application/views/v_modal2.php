<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times</button>
					<h4 class="modal-title">Update Data</h4>

				</div>
				<div class="modal-body" style="max-height: 460px; overflow: auto">
					<div class="row">
					<div id="updateLeft" class="col-sm-6" style="padding-left:2%">
						<h3 style="margin-top: 1px;">Asset ID : <input type = "text" id="updateID" name="updateID" value="" style="background-color: transparent; border:0px solid;" readonly></h3>
						<h4><input type ="text" id="namaasset" value="" style="background-color: transparent; border:0px solid;" readonly></h4>
						<div id="formDetail" class="form">
		    			 <?php echo form_open_multipart('crud/updateProses')?>
		    				<input type = "text" id="IDUpdate" name="updateIDUp" value="" hidden>
		    				<input type = "text" id="baseurl" value="<?php echo base_url()?>" hidden>

							<table style="padding-left:3%;">
								<tr>
									<th colspan="3">Detail</th>
								</tr>
								<tr>
									<th colspan="3">
								</tr>
								<tr>
									<td style="width:90px">Barcode</td>
									<td>:</td>
									<td><input type="text" name="barcode" id="barcode" style="width:210px;" value="" ></td>
								</tr>
								<tr>
									<td>Brand</td>
									<td>:</td>
									<td><input type="text" name="brand" id="brand" style="width:210px;" value="" ></td>
								</tr>
								<tr>
									<td>Type</td>
									<td>:</td>
									<td><input type="text" name="type" id="type" style="width:210px;" value="" ></td>
								</tr>
								<tr>
									<td>Dimension</td>
									<td>:</td>
									<td><input type="text" name="dimension" id="dimension" style="width:210px;" value="" ></td>
								</tr>
								<tr>
									<td>Serial Number</td>
									<td>:</td>
									<td><input type="text" name="serial" id="serial" style="width:210px;" value="" ></td>
								</tr>
								<tr>
									 <td>Status</td>
									 <td>:</td>
					                  <td id="status">
					                    <select class="status" style="width: 100px;" name="status" id="status">
					                      <option value="">--</option>
					                      <?php foreach($status as $kf=>$isi){echo "<option value=".$isi->id_status.">".$isi->status."</option>";} ?>
					                    </select></td>
								</tr>
								<tr>
									 <td>Used by</td>
									 <td>:</td>
					                  <td id="usedByModal" class="chozenSelect">
					                    <select class="chozen" name="usedby" id="pic" style="width: 160px;">
						                <option value="">--</option>
						                  <?php foreach($pic as $kf=>$isi){
						                    echo "<option value=".$isi->id_dept." ".set_select('pic',$isi->id_dept).">".$isi->workingunit."</option>";
						                  } ?>
						              	</select>
					                </td>
								</tr>

								<tr>
									 <td>Purchasing Date</td>
									 <td>:</td>
					                  <td id="purchDatetd">
					                   <input type="date" name="purchDate" id="purchDate">
					                </td>
								</tr>
								<tr>
									 <td> Install Date</td>
									 <td>:</td>
					                  <td id="instDatestd">
					                   <input type="date" name="instDate" id="instDate">
					                </td>
								</tr>
	
								<tr>
									<td colspan="3" class="cFile"></td>
								</tr>
								<input type="hidden" name="curPhoto" value="">
								

							</table>
						
					</div> <!-- add data -->
					

					<div id="formFamily" class="form">
							<table style="padding-left:3%;">
								<tr>
									<th colspan="3">Family</th>
								</tr>
								<tr>
									<th colspan="3">
								</tr>
								<tr>
									<td style="width:90px">Family</td>
									<td>:</td>
									<td class="chozenSelect">
										<select style="width: 132px;" name="familyasset" id="familyasset" disabled>
						                    <option value="">--</option><?php foreach($family as $kf=>$isi){echo "<option value='a|".$isi->id_familyasset."'>".$isi->family."</option>";} ?>
						                </select>
									</td>
								</tr>
								<tr>
									<td>Subfamily</td>
									<td>:</td>
									<td class="chozenSelect">
										<select style="width: 132px;" name="subfamilyasset" id="subfamilyasset">
						                    <option value="">--</option><?php foreach($subfamily as $kf=>$isi){echo "<option value='a|".$isi->id_subfamilyasset."' data-chained='a|".$isi->id_familyasset."'>".$isi->subfamily."</option>";} ?>
						                </select>
									</td>
								</tr>
								<tr>
									<td>Unit</td>
									<td>:</td>
									<td class="chozenSelect">
										<select style="width: 132px;" name="unitasset" id="unitasset">
						                   <option value="">--</option><?php foreach($unitasset as $kf=>$isi){echo "<option value=".$isi->id_unitasset." data-chained='a|".$isi->id_subfamilyasset."'>".$isi->unitasset."</option>";} ?>
						                </select>
									</td>
								</tr>

							</table>
					</div><!-- Form Family -->

					<div id="formCondition" class="form">
							<table style="padding-left:3%;">
								<tr>
									<th colspan="3">Overall Condition</th>
								</tr>
								<tr>
									<th colspan="3">
								</tr>
								<tr>
									<td style="width:90px">Date of Survey</td>
									<td>:</td>
									<td><input type="date" name="dateofsurvey" id="datepicker" style="width:190px;" value=""></td>
								</tr>
								<tr>
									<td>Surveyor</td>
									<td>:</td>
									<td><input type="text" name="surveyor" id="surveyor" style="width:190px;" value="" ></td>
								</tr>
								<tr>    		
									<td>Score 1</td>
									<td>:</td>
									<td><input type="text" name="score1" id="score1" style="width:190px;" value="" readonly></td>
				
								</tr>
								<tr>
									<td>Score 2</td>
									<td>:</td>
									<td><input type="text" name="score2" id="score2" style="width:190px;" value="" readonly></td>
								</tr>
								<tr>
									<td>Score 3</td>
									<td>:</td>
									<td><input type="text" name="score3" id="score3" style="width:190px;" value="" readonly></td>
								</tr>
								<tr>
									<td>Score 4</td>
									<td>:</td>
									<td><input type="text" name="score4" id="score4" style="width:190px;" value="" readonly></td>
								</tr>
								<tr>
									<td>Score 5</td>
									<td>:</td>
									<td><input type="text" name="score5" id="score5" style="width:190px;" value="" readonly></td>
								</tr>
								<tr>
									<td>Score 6</td>
									<td>:</td>
									<td><input type="text" name="score6" id="score6" style="width:190px;" value="" readonly></td>
								</tr>
								<tr>
									<td>Overall Condition Score</td>
									<td>:</td>
									<td><input type="text" name="overallconditionscore" id="overallconditionscore" style="width:190px;" value="" ></td>
								</tr>
								<tr><td colspan="3" style="font-size:11px"><div id="linkReportAssess"><a href="#" id="hrefAssesRep">View Assessment Report</a></div></td></tr>
								<tr><td>&nbsp</td></tr>
								<tr>
									<td>Remarks</td>
									<td>:</td>
									<td><input type="text" name="remarks" id="remarks" style="width:190px;" value="" ></td>
								</tr>
								<tr>
									<td>Notes</td>
									<td>:</td>
									<td><textarea name="note" id="note" cols="30" rows="4" style="margin-left:10px;"></textarea></td>
								</tr>

							</table>
							
					</div><!-- Form Condition -->

					</div>

					<div id="updateRight" class="col-sm-6">
					<div id="gambar">
		    			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
		    				<div class="carousel-inner">
		    					<div class="item">
		    						<img id="img" class="img" alt="photo preview" src="">
		    					</div>
		    				</div>
		    				<input type="file" id="inputfile" accept=".jpg, .jpeg" name="berkas" >
		    				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    					<span class="glyphicon glyphicon-chevron-left"></span>
		    					<span class="sr-only">Previous</span>
		    				</a>
		    				<a class="right carousel-control" href="#myCarousel" data-slide="next">
		    					<span class="glyphicon glyphicon-chevron-right"></span>
		    					<span class="sr-only">Next</span>
		    				</a>
		    			</div>
		    			
		    		</div> <!-- gambar --> 
		    		<br><br><br>
		    		<div id="formLocation" class="form" style="width:75%; margin-left:11%">
							<table style="padding-left:3%;">
								<tr>
									<th colspan="3">Location</th>
								</tr>
								<tr>
									<th colspan="3">
								</tr>
								<tr>
									<td style="width:90px">Main Location</td>
									<td>:</td>
									<td>
										 <select class="mainlocation" style="width: 150px;" name="mainlocation" id="mainlocation">
							                      <option value="">--</option>
							                      <?php foreach($mainlocation as $kf=>$isi){echo "<option value='a|".$isi->id_mainlocation."|".$isi->id_group."'>".$isi->mainlocation."</option>";} ?>
							              </select>
									</td>
								</tr>
								<tr>
									<td>Sub Location</td>
									<td>:</td>
									<td>
										 <select class="sublocation" style="width: 150px;" name="sublocation" id="sublocation">
							                      <option value="">--</option>
							                      <?php foreach($sublocation as $kf=>$isi){echo "<option value='a|".$isi->id_sublocation."'data-chained='a|".$isi->id_mainlocation."|".$isi->id_group."'>".$isi->sublocation."</option>";} ?>
							             </select>
									</td>
								</tr>
								<tr>
									<td>Unit Location</td>
									<td>:</td>
									<td>
										 <select class="unitlocation" style="  width: 150px;" name="unitlocation" id="unitlocation">
										 		  <option value="">--</option>
							                      <?php foreach($unitlocation as $kf=>$isi){echo "<option value='".$isi->id_unitlocation."' data-chained='a|".$isi->id_sublocation."'>".$isi->unitlocation."</option>";} ?>
							             </select>
									</td>
								</tr>
								<tr>
									<td>Address</td>
									<td>:</td>
									<td>
										 <textarea id="addresslocation" name="addresslocation"></textarea>
									</td>
								</tr>

							</table>
					</div><!-- Form Location -->
					<br>

					<div id="formDetailPam" class="form" style="width:75%; margin-left:11%;">
						<table style="padding-left:3%;">
								<tr>
									<th colspan="3">Detail PAM</th>
								</tr>
								<tr>
									<th colspan="3">
								</tr>
								<tr>
									<td style="width:90px">Original PAM Number</td>
									<td>:</td>
									<td>
										<input type="text" id="originalpamnum" name="originalpamnum">
									</td>
								</tr>
								<tr>
									<td>PAM Asset Name</td>
									<td>:</td>
									<td>
										 <input type="text" id="pamassetname" name="pamassetname">
									</td>
								</tr>

							</table>
					</div><!-- Form Detail PAM --><br>
				
					
					<br>
					<div id="formProgress" style="width:75%; margin-left:11%;" hidden>
						<div id="disposalSelect"></div>
						<table id ="disposalTable" class="table table-hover table-bordered">
				          <tr>
				            <th style="width:2%;">No</th>
				            <th id= "tCondition">Date</th>
				            <th id= "tQuanity">Status</th>
				            
				          </tr>
				          <div id="disposalPro"></div>
				           
				         </table>
					</div><!-- Form Dispoasal Progress -->

		    		</div>
				</div>
				</div>
				<div class="modal-footer">
					<div id="session" hidden><?php echo $this->session->userdata("role")?></div>
					<div id="assessLink" style="text-align:left"><a href='#' id="hrefAsses">Click here to assessment menu</a></div>
					<div id="inputSave"><input type="submit" value="SAVE"></div>
				</div>
				</form>
				
			</div>
		</div>
	</div>

<script type="text/javascript">
	$(function(){
		
		$('#hrefAssesRep').on("click", function(){
			$(this).attr("href", $('#baseurl').val()+"dashboard/assessmentHasilView?id="+$('#updateID').val())
		})

		var base_url = "<?php echo base_url();?>";

		$('#subfamilyasset').chained('#familyasset');
        $('#unitasset').chained('#subfamilyasset');

         $("#sublocation").chained("#mainlocation");
         $("#unitlocation").chained("#sublocation");


		$('#myModal').on('shown.bs.modal', function(){

			$('.chosen-select').chosen('destroy').chosen();
			$('.chozen').css('width','160px');
			$('.chozen').css('margin-','160px');
		})
		$(".openUpdate").on("click", function(){
			var updateID = $(this).data('id');
			$('#updateID').val(updateID);
			$('#IDUpdate').val(updateID);
			$('#myCarousel').find('.itemNext').remove();
			$('#img').attr('src',"");
			$('.carousel-inner div.active').removeClass('active')

			$.ajax({
            type:"POST",
            url: base_url+"dashboard/get_dataView/"+updateID,
            data: "updateID="+updateID,
    
            success: function(data){
              var json = jQuery.parseJSON(data);
              $.each(json,function(i,item){
                if(item.photo != null){
                	$('#img').attr('src', base_url+'photo/'+item.asset_id+'.jpg');
                }
                $('#namaasset').val(item.name);
                $('#barcode').val(item.barcode);
                $('#brand').val(item.brand);
                $('#type').val(item.type);
                $('#dimension').val(item.dimension);
                $('#serial').val(item.serial_numb);
                $('#status option[value='+item.id_status+']').attr('selected', 'selected');
                $('#pic option[value='+item.id_dept+']').attr('selected', 'selected').trigger('chosen:updated');
                $('#purchDate').val(item.purchasingdate);
                $('instDate').val(item.installdate);
               
                $('#ownerMod option[value='+item.id_owner+']').attr('selected', 'selected').trigger('chosen:updated');
                $('#name option[value='+item.id_assetname+']').attr('selected', 'selected').trigger('chosen:updated');

                $('#familyasset option[value="a|'+item.id_family+'"]').attr('selected', 'selected');
                $('#familyasset').change();
                
                
                $('#subfamilyasset option[value="a|'+item.id_subfamilyasset+'"]').attr('selected', 'selected');
                $('#subfamilyasset').change();
                $('#unitasset option[value="'+item.id_unitasset+'"]').attr('selected', 'selected');
                $('#unitasset').change();

                $('#mainlocation option[value="a|'+item.id_mainlocation+'|'+item.grupM+'"]').attr('selected', 'selected');
                $('#mainlocation').change();
                $('#sublocation option[value="a|'+item.id_sublocation+'"]').attr('selected', 'selected');
                $('#sublocation').change();
                $('#unitlocation option[value="'+item.id_unitlocation+'"]').attr('selected', 'selected');
                $('#unitlocation').change();
               	if(item.address1 != null){
                	$('#addresslocation').val(item.address1);
                }else{
                	$('#addresslocation').val(item.address2)
                }

                $('#datepicker').val(item.dateofsurvey);
                $('#surveyor').val(item.surveyor);
                $('#score1').val(item.score1);
                $('#score2').val(item.score2);
                $('#score3').val(item.score3);
                $('#score4').val(item.score4);
                $('#score5').val(item.score5);
                $('#score6').val(item.score6);
                $('#overallconditionscore').val(item.overallscore);
                $('#remarks').val(item.remarks);
                $('#note').val(item.notes);

                $('#originalpamnum').val(item.originalpamnumber);
				$('#pamassetname').val(item.pamassetname);
				
				if(item.family != "Land & Building"){
					$('#assessLink').empty();
					$('#hrefAssesRep').empty();
					$('#hrefAsses').empty();
				}
               	
                
                if($('#session').text().toLowerCase() != item.family.toLowerCase() && $('#session').text().toLowerCase() != "admin" ){
                	$('#inputSave').empty();
                	$('#assessLink').empty();
          
                	$('#hrefAsses').empty();
                }
                
               

              });

			$.ajax({
            type:"POST",
            url: base_url+"dashboard/get_dataSurplusPro/"+updateID,
            data: "updateID="+updateID,
    
            success: function(data){
              var json = jQuery.parseJSON(data);
              $('#disposalTable tr').empty();
              $('#disposalTable tr:first').before('<tr><th colspan="4">Disposal : Surplus</th></tr>')
              $.each(json,function(i,item){
           		if(item.status != null){
           			$('#buttonDisposal').show();
           		}

           		$('#disposalTable tr:last').after('<tr><td>'+(i+1)+'</td><td>'+item.date+'</td><td>'+item.status+'</td></tr>')
               });
               
            }
            });
              
			$('#buttonDisposal').on("click", function(){
				$('#formProgress').show();

			});

              $.ajax({
		            type:"POST",
		            url: base_url+"dashboard/countFiles/"+updateID,
		            data: "updateID="+updateID,
		            success: function(data){

		            	for(i = 1; i<data; i++){
		            		if(data > 0){
								$('.carousel-inner').append('<div class="item itemNext"><img class="img" src="'+base_url+'photo/'+updateID+(i)+'.jpg"></div>');
							}
						}
						$('#myCarousel').find('.item').last().addClass('active');
						
						var la = $('.active .img');
						$('#inputfile').on('change', function(){
							la.attr('src', window.URL.createObjectURL(this.files[0]))
						});
						
		            },
		            error: function(data){
		              alert('error');
		            }
	        	});

            },
            error: function(data){
              alert('error');
            }
         	});
		})
		
	})

	
</script>