<?php header("refresh:4; url=entry_data3/?po=".$nopo."&name=".$nama."&id=".$idnext); ?>
<script src="<?php echo base_url()?>assets/bootstrap/js/jquery-3.2.1.min.js"></script>

<div id='proses'><center style='position:fixed; top:40%; left:50%; transform: translate(-50%, -50%);'>
		<img src='<?php echo base_url();?>/gambar/palyja.png' style='
		position: absolute;
		margin-top: -120px;
		margin-left: -41%;
		width: 300px;
		z-index: -1;
		opacity: 0.2;'>
		<h2>Asset Registration Completed!</h2><br>
		<?php echo "<a href=entry_data3/?po=".$nopo."&name=".$nama."&id=".$idnext.">Click here if the browser does not automaticly redirect you</a>"?>
		</center>
		<button id="tombol" hidden></button>
		<div id="assetid" hidden><?php echo $id ?></div>
</div>

<script>
	$(function(){
		
		var base_url = "<?php echo base_url();?>";
		setTimeout(function(){
		 	window.open(base_url+'/crud/search?owner=&family=&keyfac=&loc=&column=d.asset_id&searchBy=like&search='+$('#assetid').text()+'&submitSearch=Search');
		}, 1000);
		
	});
</script>