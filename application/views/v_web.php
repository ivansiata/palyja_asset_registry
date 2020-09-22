<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Belajar JQuery dan Bootstrap</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url()?>assets/bootstrap/js/jquery-3.2.1.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   	<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.js"></script>
   	<link rel="stylesheet" type="text/css" href="assets/bootstrap/js/chosen.css">
   	
    <script>
    	$( document ).ready(function(){

    		$( "#buttonHide" ).click(function(){
    			$("#table1").hide();
    		});
    		$( "#buttonShow" ).click(function(){
    			$("#table1").show();
    		});
    		
    	});   		
    </script>
  </head>
  <body>
     <button id="buttonHide">Hide</button>
     <button id="buttonShow">Show</button>
     <br>
    <div id="table1">
      nesjfnslzdszdl
    </div>


    edesfffzrdgzrfrfrffzdf<br>frfn;diobhlxbjzkjfbvzdf
  </body>
</html>

