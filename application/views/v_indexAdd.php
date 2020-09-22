				

				<div class=" main">
					<ul class="nav nav-tabs" style="margin-top:-25px;">
						<li role="presentation"><a href="<?php echo base_url().'crud/' ?>">Main</a></li>
						<li><a href="<?php echo base_url()?>crud/entry_data">Entry Data</a></li>
						<li class ="active"><a href="<?php echo base_url().'crud/add_data' ?>" data-toggle="pill">Input Data</a></li>
						<li ><a href="">Advance Search</a></li>
					</ul>
					<br>

					<div class="totalSelect">Total data : <select style="width:33px;"></select></div><br>

					
						</div><!-- Mandatory --><?php echo form_open('crud/add_proses')?>
					<div class="repeat col-sm-9">
						<div class="mandatory" id="mandatory1" style="border:1px solid rgba(0,0,0,.3); padding:10px; margin-bottom:10px;">
							<table >

								<tr>
									<td style="width: 80px;"><span style="color:red">Mandatory <br> Attributes</span></td>
									<td style="width: 20px;"><div class="vline" style="height: 40px;"></div></td>
									<td style="width: 80px;">PO Number</td>
									<td colspan ='4' style="width: 130px;"><input type="text" id="po" class="po" name="po" value="<?php echo set_value('po'); ?>" style="width:100px;">
										&nbsp<?php echo form_error('po'); ?></td>
								</tr>
								<tr>
									
								</tr>

								<tr>
									<td style="width: 80px;"></td>
									<td style="width: 20px;"><div class="vline" style="height: 40px;"></div></td>
									<td style="width: 60px;">Owner</td>
									<td style="width: 170px;">
										<select class="chozen" name="owner" id="owner" style="width: 142px;" value="2">
										<option value="">--</option>
										 <?php foreach($owner as $ow=>$isi){
												echo "<option value=>".$isi->owner."</option>";
											} ?>
										</select>
										<br><?php echo form_error('owner'); ?>
									</td>

									<td style="width: 100px;">Key Facilities</td>
									<td style="width: 180px; padding-right:10px" >
										<select class="chozen" name="keyfac" id="keyfac" style="width: 150px;">
										<option value="">--</option>
										 <?php foreach($keyfac as $kf=>$isi){
												echo "<option value=".$isi->id." ".set_select('keyfac',$isi->id).">".$isi->facilities_name."</option>";
											} ?>
										</select>
										<br><?php echo form_error('keyfac'); ?>
									</td>

									<td style="width: 40px;">PIC</td>
									<td style="width: 100px;">
										<select class="chozen" name="pic" id="pic" style="width: 160px;">
										<option value="">--</option>
										 <?php foreach($pic as $kf=>$isi){
												echo "<option value=".$isi->id_dept." ".set_select('pic',$isi->id_dept).">".$isi->workingunit."</option>";
											} ?>
										</select>
										<br><?php echo form_error('pic'); ?>
									</td>
								</tr>

								<tr>
									<td></td>
									<td><div class="vline" style="height: 40px;"></div></td>
									<td>Family</td>
									<td>
										<select class="chozen" id="family" name="family" id="family" style="width: 145px;">
										<option value="">--</option>
										 <?php 
										 foreach($family as $fam=>$isi){ 
										 	$ostring = $isi->family."|".$isi->id_familyasset;
										 	$nstring = str_replace(' ','', $ostring);
											echo "<option value=".$nstring." ".set_select('family',$nstring).">".$isi->family."</option>";
											} ?>
										</select>
										<br><?php echo form_error('family'); ?>
									</td>

									<td>Asset Name</td>
									<td>
										<select class="chozen" name="name" id="name" style="width: 150px;">
										<option value="">--</option>
										 <?php foreach($assetname as $kf=>$isi){
												echo "<option value=".$isi->id_assetname." ".set_select('name',$isi->id_assetname).">".$isi->name."</option>";
											} ?>
										</select>
										<br><?php echo form_error('name'); ?>
									</td>
								</tr>

							</table>
							<hr>
							<div class="buttonBox" id="buttonBox">
								&nbsp &nbsp Asset Details<br>
								<button class="buttonHide1" id="buttonHide" type="button">Hide</button>
								<button class="buttonShow1" id="buttonShow" type="button">Show</button><br><br>

							<div class="detail1" id="detail1">
							<table>
	<!--Asset Details-->
								<tr>
									<td style="width: 60px;">Details</td>
									<td style="width: 20px;"><div class="vline" style="height: 40px;"></div></td>
									<td style="width: 100px;">Unit Asset</td>
									<td style="width: 100px;" colspan="3">
										<select class="chozen" id="subfamily" name="subfamily" id="subfamily" style="width: 142px;">
										<option value="">Sub Family</option>
										<?php foreach($subfamily as $sf=>$isi){
											$ostring = $isi->family."|".$isi->id_familyasset;
										 	$nstring = str_replace(' ','', $ostring);
											echo "<option value='".$isi->subfamily."|".$isi->id_subfamilyasset."' data-chained='".$nstring."'>".$isi->subfamily."</option>";
										} ?>
										</select>
										<select class="chozen" id="unitfamily" name="unitfamily" id="unitfamily" style="width: 150px;">
										<option value="">Unit</option>
										<?php foreach($unitasset as $ua=>$isi){
											echo "<option value=".$isi->unitasset." data-chained=".$isi->subfamily."|".$isi->id_subfamilyasset.">".$isi->unitasset."</option>";
										} ?>
										</select>
									</td>
								</tr>

								<tr>
									<td style="width: 80px;"></td>
									<td><div class="vline" style="height: 40px;"></div></td>

									<td style="width: 70px;">Brand</td>
									<td style="width: 180px;"><input type="text" style="width:100px;" name="brand" id="brand"></td>

									<td style="width: 80px;">Dimension</td>
									<td style="width: 166px;"><input type="text" style="width:100px;" name="dimension" id="dimension"></td>

									<td  style="width: 70px;">Serial Number</td>
									<td><input type="text" style="width:100px;" name="serialnum" id="serialnum"></td>


								</tr>

								 <tr>
									<td></td>
									<td><div class="vline" style="height: 40px;"></div></td>

									<td>Type</td>
									<td>
										<input type="text" name="type" style="width:100px;">
									</td>

									<td>Status</td>
									<td>
										<select class="chozen" style="width: 100px;" name="status" id="status">
										<option value="">--</option>
										 <?php foreach($status as $kf=>$isi){
												echo "<option value=\"".$isi->id_status."\""; if($isi->id_status) {echo "selected";} echo">".$isi->status."</option>" ;

											} ?>
										</select>
									</td>

									<td>Funding</td>
									<td>
										<select class="chozen" style="width: 80px;" name="funding" id="funding">
										<option value="">--</option>
										 <?php foreach($funding as $kf=>$isi){
												echo "<option value=".$isi->id_funding.">".$isi->funding."</option>";
											} ?>
										</select>
									</td>
								</tr>

								<tr>
									<td></td>
									<td><div class="vline" style="height: 40px;"></div></td>
									<td>Purchasing Date</td>
									<td><input type="date" style="width:132px;" name="purchdate" id="purchdate"></td>

									<td>Install Date</td>
									<td><input type="date" style="width:132px;" name="instdate" id="instdate"></td>
									
									<td>Used by</td>
									<td>
										<select class="chozen" style="width: 150px;" name="usedby" id="usedby">
										<option value="">--</option>
										 <?php foreach($pic as $kf=>$isi){
												echo "<option value=".$isi->id_dept.">".$isi->workingunit."</option>";
											} ?>
										</select>
									</td>
								</tr>
								<tr>
									<td style="width: 80px;"></td>
									<td><div class="vline" style="height: 40px;"></div></td>
									<td>Original PAM Number</td>
									<td><input type="text" style="width:132px;" name="oripam" id="oripam"></td>
									<td>PAM Asset Name</td>
									<td><input type="text" style="width:132px;" name="pamname" id="pamname"></td>
								</tr>
								<tr>
									<td style="width: 80px;"></td>
									<td><div class="vline" style="height: 40px;"></div></td>
								</tr>
								<tr>
									<td style="width: 80px;"></td>
									<td><div class="vline" style="height: 40px;"></div></td>
									<td colspan="3">Photo <input type="file" name="photo" id="photo"><td>
									<td></td>
								</tr>


							</table>
							<hr>

							<table>
	<!--Asset Location-->
								<tr>
									<td style="width: 80px;">Location</td>
									<td style="width: 20px;"><div class="vline" style="height: 40px;"></div></td>
									<td style="width: 100px;">Main Location</td>
									<td style="width: 100px;" colspan="3">
										<select class="chozen" id="mainlocation" name="mainlocation" id="mainlocation" style="width: 154px;">
										<option value="">--</option>
										<?php foreach($mainlocation as $sf=>$isi){
											$ostring = $isi->mainlocation."|".$isi->id_mainlocation;
										 	$nstring = str_replace(' ','', $ostring);
											echo "<option value=".$nstring.">".$isi->mainlocation."</option>";
										} ?>
										</select>
								</tr>

								<tr>
									<td style="width: 80px;"></td>
									<td><div class="vline" style="height: 40px;"></div></td>
									<td style="width: 80px;">Sub Location</td>
									<td style="width: 100px;">
										<select class="chozen" id="sublocation" name="sublocation" id="sublocation" style="width: 142px;">
										<option value="">--</option>
										<?php foreach($sublocation as $sf=>$isi){
											$ostring = $isi->mainlocation."|".$isi->id_mainlocation;
										 	$nstring = str_replace(' ','', $ostring);

										 	$ostringv = $isi->sublocation."|".$isi->id_sublocation;
										 	$nstringv = str_replace(' ','', $ostringv);
											echo "<option value=".$nstringv." data-chained=".$nstring.">".$isi->sublocation."</option>";
										} ?>
										</select>
									</td>
								</tr>

								 <tr>
									<td style="width: 80px;"></td>
									<td><div class="vline" style="height: 40px;"></div></td>
									<td style="width: 80px;">Unit Location</td>
									<td style="width: 100px;">
										<select class="chozen" id="unitlocation" name="unitlocation" id="unitlocation" style="width: 154px;">
										<option value="">--</option>
										<?php foreach($unitlocation as $sf=>$isi){
											$ostring = $isi->sublocation."|".$isi->id_sublocation;
										 	$nstring = str_replace(' ','', $ostring);
											echo "<option value=".$nstring." data-chained=".$nstring.">".$isi->unitlocation."</option>";
										} ?>
										</select>
									</td>
								</tr>
							</table>
							<hr>
	<!-- Asset Document -->
							<table>
								<tr>
									<td style="width: 80px;">Document</td>
									<td style="width: 20px;"><div class="vline" style="height: 40px;"></div></td>
									<td style="width: 130px;">Document Number</td>
									<td style="width: 160px;"><input type="text" name="docnum" id="docnum" style="width:100px;"></td>
									<td>File &nbsp</td>
									<td><input type="file"></td>
									
								</tr>

								<tr>
									<td></td>
									<td><div class="vline" style="height: 40px;"></div></td>
									<td>Document Name</td>
									<td>
										<select class="chozen" id="sublocation" name="docname" id="docname" style="width: 142px;">
										<option value="">--</option>
										<?php foreach($document as $sf=>$isi){
											echo "<option value=".$isi->id_namadoc.">".$isi->namadocument."</option>";
										} ?>
										</select>
									</td>
								</tr>

								 <tr>
									<td></td>
									<td><div class="vline" style="height: 40px;"></div></td>
									<td>Document Year</td>
									<td><input type="text" name="docyear" id="docyear" style="width:100px;"></td>
								</tr>
							</table>
							<hr>
							</div><!-- Detail -->

							</div><!-- Button Box -->
							<br>
					<br>
						<input type="submit" value="SUBMIT">

				</form>
					</div><!-- Repeat -->
			<div id="excel" class="col-sm-3">
				<div class="panel with-nav-tabs panel-primary" id="panel">
					<div class="panel-heading">
						<center>Upload Excel File</center>
					</div>
					<div class="panel-body">
						<form>
							<table>
								<tr>
									<td><strong><center>Choose Excel File</center></strong></td>
								</tr>
								<tr>
									<td><br><input type="file" name="fileEx"></td>
								</tr>
								<tr>
									<td><br><a href="<?php echo base_url().'crud/download' ?>" style="text-decoration: none;">Click here to download template</a></td>
								</tr>
								<tr>
									<td><br><br><br><br><input type="submit" name="submit" value="SUBMIT"></td>
								</tr>
							</table>	
						</form>
					</div>
				</div>
			</div>
			
			
		</div><!-- Main -->
	</div><!-- Wrapper -->
	</body>
	
	
	<script>
	$(function(){
			$("[name='subfamily']").chained("[name='family']");
			$("[name='unitfamily']").chained("[name='subfamily']");

			// buat ganti isi chosen #series menjadi isi yang chained
			$("[name='subfamily']").trigger("chosen:updated");
			//buat refresh #series setiap #series diganti
			$("[name='family']").bind("change", function(){
				$("[name='subfamily']").trigger("chosen:updated")
			})


			// buat ganti isi chosen #series menjadi isi yang chained
			$("[name='unitfamily']").trigger("chosen:updated");
			//buat refresh #series setiap #series diganti
			$("[name='subfamily']").bind("change", function(){
			$("[name='unitfamily']").trigger("chosen:updated")
			})


	})
		
	</script>

	<script>
		
		
	</script>

	<script>
	$(function(){
		$("#sublocation").chained("#mainlocation");

		// buat ganti isi chosen #series menjadi isi yang chained
		$("#sublocation").trigger("chosen:updated");
		//buat refresh #series setiap #series diganti
		$("#mainlocation").bind("change", function(){
		$("#sublocation").trigger("chosen:updated")
		})


		// buat ganti isi chosen #series menjadi isi yang chained
		$("#unitlocation").trigger("chosen:updated");
		//buat refresh #series setiap #series diganti
		$("#sublocation").bind("change", function(){
			$("#unitlocation").trigger("chosen:updated")
		})


	})
		
	</script>

	<script>
		$("#unitlocation").chained("#sublocation");
	</script>

</html>
