<div id="home2">
	<br>
	<ul class="nav nav-pills" style="margin-top: 0px; height:60px; margin-left:9%">
	            <li role="presentation"><a href="<?php echo base_url()?>crud/view?owner=<?php echo $owner?>&family=1&keyfac=&loc="><center><img src="<?php echo base_url()?>assets/production.png"></center><center>Production</center></a></li>
	            <li style="width:29.5%;padding-top:3px;"></li>
	            <li class ="active"><a href="<?php echo base_url()?>crud/view?owner=<?php echo $owner?>&family=2&keyfac=&loc="><center><img src="<?php echo base_url()?>assets/boosterPump.png" ></center><center>Booster Pump</center></a></li>
	            <li style="width:30%; padding-top:3px; margin-left:-10px" ></li>
	            <li class ="active"><a href="<?php echo base_url()?>crud/view?owner=<?php echo $owner?>&family=3&keyfac=&loc="><center><img src="<?php echo base_url()?>assets/Moveable.png" ></center><center>Moveable Asset</center></a></li>
	</ul>
	<br><br><br><br><br><br>
	<ul class="nav nav-pills" style="margin-top: 25px; height:60px; margin-left:6%">            
	            <li role="presentation"><a href="<?php echo base_url()?>crud/view?owner=<?php echo $owner?>&family=4&keyfac=&loc="><center><img src="<?php echo base_url()?>assets/transmisi.png" ></center><center>Network Transmisi</center></a></li>
	            <li style="width:23.5%;padding-top:3px;"></li>
	            <li class ="active"><a href="<?php echo base_url()?>crud/view?owner=<?php echo $owner?>&family=5&keyfac=&loc="><center><img src="<?php echo base_url()?>assets/distribusi.png" ></center><center>Network Distribusi</center></a></li>
	            <li style="width:31%; padding-top:3px; margin-left:-10px" ></li>
	            <li><a href="<?php echo base_url()?>crud/view?owner=<?php echo $owner?>&family=6&keyfac=&loc="><center><img src="<?php echo base_url()?>assets/IS.png"></center><center>IS</center></a></li>    
	</ul>
	<br><br><br><br><br><br>
	<ul class="nav nav-pills" style="margin-left:43.4%">
		 <li><a href="<?php echo base_url()?>crud/view?owner=<?php echo $owner?>&family=7&keyfac=&loc="><center><img src="<?php echo base_url()?>assets/building.png"></center><center>Land & Building</center></a></li>
	</ul>
</div>

<script type="text/javascript">
$(function(){
	$('#navig').remove();
	$('#homenav').addClass('active');
	$('#realWrapper').css('margin-bottom', '-1%')
});
</script>