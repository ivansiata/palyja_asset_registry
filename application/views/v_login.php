<html>
<head>
	<title>Asset Registry</title>
	<link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="<?php echo base_url()?>assets/bootstrap/js/jquery-3.2.1.min.js"></script>
	 <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<img src="<?php echo base_url()?>assets/palyja.png" style="width:80px; height:80px;">
	<span style="margin-top:1%; margin-left:2%; position:absolute; font-size:26px; color:green; font-weight:bold">Asset Registry</span>
	<br><br>
	<?php echo form_open('login/login_action')?>
	<center><div id="login" style="background-color:#009999; height:300px; width:350px; box-shadow: 2px 2px 3px #888888;">
		<h1 style="color:white; padding-top:10px;">LOGIN</h1><br>
		<div class="form-group"> 
			<span style="color:white; font-size:24px">Username</span><br>
			<input type="text" name="username" id="username" class="form-control" style="width:70%">
		</div>
		<div class="form-group"> 
			<span style="color:white; font-size:24px">Password</span><br>
			<input type="password" name="password" id="password" class="form-control" style="width:70%">
		</div>
		<input type="submit" value="Login" class="btn btn-default" style="background-color:#0066cc; color:white; border-color:black;">
	</div></center>
	</form>
</body>
</html>