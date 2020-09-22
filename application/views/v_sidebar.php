
<div class="container-fluid" >
      <div class="row">
        <div class="sidebar" id="sidebar" style="background-color:rgba(0,0,0,0.85); opacity:2; margin-top:-1px; color:white">
          <ul class="nav nav-sidebar">
            <li id="linkHome"><a href="<?php echo base_url().'crud/home'?> "><i class="ion ion-home"></i>&nbsp Home</a></li>
            <li id="linkSearch"><a href="<?php echo base_url().'crud/view?owner=0&family=0&keyfac=&loc='?>"><i class="ion ion-search"></i>&nbsp Search</a></li>
            <li id="linkAssessment"><a href="#"><i class="ion ion-edit"></i>&nbspAssessment</a></li>
            <li id="linkExport"><a href="<?php echo base_url().'crud/capexopex'?>"><i class="ion ion-document"></i>&nbsp Export Excel</a></li>
          </ul>
          <ul class="nav nav-sidebar" id="linkAHP">
            <li><center><a href="#" style="color:white; font-size:13px;">Criticality Analyze</a></center></li>
            <li><a href="<?php echo base_url().'ahp/' ?>"><i class="ion ion-ribbon-b"></i>&nbsp AHP Analyitics</a></li>
          </ul>
         
          <div id="session" hidden><?php echo $this->session->userdata("role")?></div>
        </div>

  <script type="text/javascript">
  $(function(){
    if($('#session').text().toLowerCase() != "manager" && $('#session').text().toLowerCase() != "admin" ){
                  $('#linkAHP').empty();
                  $('#linkExport').empty();
      }

    if($('#session').text().toLowerCase() == "manager"){
                $('#linkHome').empty();
                $('#linkSearch').empty();
                $('#linkExport').empty();
               
    }
     $('#linkAssessment a').attr("data-target", "#myModal6");
    $('#linkAssessment a').attr("data-toggle", "modal");
  });
</script>