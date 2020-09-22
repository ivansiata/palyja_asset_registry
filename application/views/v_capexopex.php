		<div id="info" hidden><?php echo $info ?></div>
		<div id="infoErr" hidden><?php echo $err ?></div>
		<div class="col-md-6" style="margin-top:5%; padding-left:15%;">
	          <div class="panel with-nav-tabs panel-default" id="panelnew">
					<div class="panel-heading">
						<center><strong>Upload Capex Excel File</strong></center>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url();?>/crud/uploadcapexopex" method="post" enctype="multipart/form-data">
							<table>
								<tr>
									<td><strong><center>&nbsp &nbsp &nbsp  Choose Excel File</center></strong></td>
								</tr>
								<tr>
									<td><br><input type="file" name="file" accept=".csv, .xlsx, .xls"></td>
								</tr>
								<tr>
									<td><br><a href="<?php echo base_url().'crud/download' ?>" style="text-decoration: none;">Click here to download template</a></td>
								</tr>
								<tr>
									<td><br><strong><input type="submit" name="submitExcel1" value="SUBMIT"></strong></td>
								</tr>
							</table>	
						</form>
					</div>
					<div class="panel-footer">
						<center><a href="<?php echo base_url();?>/crud/viewCapexOpex?view=1">View Capex Data List</a></center>
					</div>
				</div>
	     </div>
	      <div class="col-md-6" style="margin-top:5%; padding-left:15%">
	          <div class="panel with-nav-tabs panel-default" id="panelnew">
					<div class="panel-heading">
						<center><strong>Upload Opex Excel File</strong></center>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url();?>/crud/uploadcapexopex" method="post" enctype="multipart/form-data">
							<table>
								<tr>
									<td><strong><center>&nbsp &nbsp &nbsp  Choose Excel File</center></strong></td>
								</tr>
								<tr>
									<td><br><input type="file" name="file" accept=".csv, .xlsx, .xls"></td>
								</tr>
								<tr>
									<td><br><a href="<?php echo base_url().'crud/download' ?>" style="text-decoration: none;">Click here to download template</a></td>
								</tr>
								<tr>
									<td><br><br><strong><input type="submit" name="submitExcel2" value="SUBMIT"></strong></td>
								</tr>
							</table>	
						</form>
					</div>
					<div class="panel-footer">
						<center><a href="<?php echo base_url();?>/crud/viewCapexOpex?view=2">View Opex Data List</a></center>
					</div>
				</div>
	     </div>

	     <div class="panel-group" style="position:fixed; right:15px; bottom:4px; z-index:3;">
		<div class="panel panel-default" style="width:100%">
		<div id="collapse1" class="panel-collapse collapse">
			<div class="panel-heading" style="text-align:center; background-color:aqua">
			<h4 class="panel-title">
				Excel Format Instructions
			</h4>
			</div>
			<div class="panel-body" style="height:100%;">
			<p>1. Kolom PO Number harus berupa angka dengan jumlah karakter tepat 6 digit.</p>
			<p>2. Kolom PO Department diisi dengan memilih pilihan pada combo box yang sudah <br>&nbsp &nbsp tersedia.</p>
			<p>3. Kolom Month diisi dengan nama bulan, bukan dengan angka. <br>&nbsp &nbsp(contoh: Januari, Februari, Maret). </p>
			<p>4. Kolom Year diisi dengan 4 digit angka tahun. <br>&nbsp &nbsp(contoh : 2017, 2018, 2019)</p>
			<br><strong> Informasi kesalahan akan diberikan sistem jika terjadi kesalahan pengisian file excel. </strong>
			</div>
		</div> 
		<div class="panel-footer" style="text-align:right; background-color:aqua; " data-toggle="collapse" href="#collapse1">
			<a data-toggle="collapse" href="#collapse1" style="color:black; text-decoration: none">Excel File Instructions</a>
		</div>
		</div>
	</div>

<script>
$(function(){
	$('#capexopexnav').addClass('active');
	$('#realWrapper').css('margin-bottom', '-1%')

	if($('#info').text() == "true"){
		if($('#infoErr').text() == "true"){
			alert("Import Completed! \nSome row of data not uploaded due to data format failure\nRecheck your Excel File!");
		}else{
			alert("Import Completed!");
		}
	}
})
</script>

