<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Asset Registry</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/bootstrap/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url()?>assets/bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/bootstrap/js/ie-emulation-modes-warning.js"></script>
    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/bootstrap/js/chosen.jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/bootstrap/js/jquery_chained-2.x/jquery.chained.min.js"></script>
    <script src="<?php echo base_url()?>assets/validasiTabelGeneral.js"></script>
    <script src="<?php echo base_url()?>assets/bower_components/chart/Chart.min.js"></script>
  <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.css">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/js/chosen.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/style.css">

  
    <script type="text/javascript">
     $(window).on('load',function(){
      $('.loader').fadeOut('slow');  
    })

    $(document).ready(function(){ 
     
     

     
              

    
        


        
          /*if($('#name0 :selected').val(" ")){
          $('#name0').on('change', function(){
               alert('ha');
               if(assets.indexOf(this.value) === -1){
                assets.push(this.value);
               }else{
                alert('Name Duplicated!');
                this.value = "";
                $(this).trigger('chosen:updated');
               }
              if(assets.length > 1){
                assets.splice(assets.indexOf('001'),1);
              }

            
                prev = this.value;
                $('#result').html(assets.toString());
          });
          }else{
            alert('bla');
          }*/

          
        
           
        
    });
    
    

    </script>

    <script>
      $(document).ready(function(){  
        $( ".buttonHide1" ).click(function(){
          
            $("#detail1").hide("fast");
        });
        $( ".buttonShow1" ).click(function(){
          
            $("#detail1").show("fast");  
        });

        $("#menu-toggle").click(function(e){
          e.preventDefault();
          $("#wrapper").toggleClass("active");
        });

        

        $(".chozen").chosen({
          search_contains: true,
          inherit_select_classes: true
        });
      });
    </script>

   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
    <div id="realWrapper" style="height:100%; margin-top:50px">
    <div class="loader"></div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <li class="sidebar-brand" id="sidebarBrand"><a href="#" id="menu-toggle"><span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
          <li><a class="navbar-brand" href="<?php echo base_url().'crud/' ?>">Asset Registry</a></li>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url().'crud/' ?>">Dashboard</a></li>
            <li><a href="<?php echo base_url().'login/logout'?>">Logout</a></li>
            <li><a href="#">Welcome, <?php echo $this->session->userdata('username') ?></a></li>
            <li id="doc"><a href="<?php echo base_url().'crud/downloadDokumentasi' ?>" style="text-decoration: none;"><img src="<?php echo base_url().'assets/question.png' ?>" title="documentation" style="width:20px"></a></td></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="session" hidden><?php echo $this->session->userdata("role")?></div>

    <div id="wrapper">

     <div id="wrapper2" class="col-sm-9 col-sm-offset-3 col-md-12 col-md-offset-1 main">
          <ul class="nav nav-tabs" id="navig" style="margin-top:-25px; margin-bottom:20px">
            
           <?php if($this->session->userdata('role') != "manager"){  ?><li id="homenav"><a href="<?php echo base_url()?>crud/home">Home</a></li> <?php } ?>
            <li role="presentation" id="mainnav"><a href="<?php echo base_url().'crud/' ?>">Dashboard</a></li>
           <?php if($this->session->userdata('role') != "manager"){ ?><li id="entrynav"><a href="<?php echo base_url()?>crud/entry_data">Entry Data</a></li>
            <?php if($this->session->userdata('role') == "admin"){  ?>
            <li id="capexopexnav"><a href="<?php echo base_url()?>crud/capexopex">Capex / Opex</a></li>
            <?php } ?>
           <?php } ?>
          </ul>


  <script type="text/javascript">
  $(function(){
    if($('#session').text().toLowerCase() != "manager" && $('#session').text().toLowerCase() != "admin" ){
                  $('#doc').empty();
      }

  });
</script>