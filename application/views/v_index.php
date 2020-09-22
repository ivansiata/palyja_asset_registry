
          
           <div id="maintenance" style="border:1px solid black; border-radius:3px; overflow:hidden; box-shadow:0px 2px 2px 1px #888888">
            <h2 style="margin-top:0%; padding:0.5%; background-color:#142b51; color:white">Report</h2>
            <div id="backgroundLeft" class="col-md-7" style="margin-top:0%; padding-left:1%">
               <div id="panelChart" class="nav-tabs-custom" style="width:100%; height:100%;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right with-border">
                  <li class="pull-left header">Asset Status</li>
                </ul>
                <div class="tab-content" style="height:100%">
                  <div class="row" style="width: 100%; background-color:white !important; margin-left:0">
                  <div class="col-md-8" style="padding-top:1%; padding-bottom:1%;">
                  <canvas id="statusChartPie" height="100"></canvas>
                  </div>
                  <div class="col-md-4" style="padding-left:2%" id="assetStatusPie">
                    <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle text-aqua"></i> Active</li>  
                    <li><i class="fa fa-circle text-light-blue"></i> Idle</li>
                    <li><i class="fa fa-circle text-green"></i> Surplus</li>
                    <li><i class="fa fa-circle text-yellow"></i> Scrapped</li>                
                  </ul>
                  </div>
                  </div>
                </div>
               <div class="box-footer text-center" style="border-top-right-radius: 0px; border-top-left-radius: 0px; border-top-color: #f4f4f4; border-top: 1px solid #ddd">
                  <a href="#myModal1" class='openUpdate' data-toggle="modal">View Details</a>
                </div>             
              </div>


              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Recent Update</h3>
                    <div class="box-body">
                    <div class="table-responsive" style="overflow:auto; height:175px !important">
                      <table class="table no-margin">
                        <thead>
                        <tr>
                          <th>Asset ID</th>
                          <th>Name</th>
                          <th>Update Date</th>
                          <th>Update By</th>
                        </tr>
                        </thead>
                         <?php
                         $counter = 0; 
                         foreach($tabelRecent as $kf=>$isi){ ?>
                            <tr>
                             
                              <td><?php echo $isi->asset_id ;?></td>
                              <td><?php echo $isi->name ;?></td>
                              <td><?php echo $isi->updatedate ;?></td>
                              <td><?php echo $isi->updateby?></td>
                            </tr>

                          <?php 
                          $counter++;
                        }
                        if($counter == 0){
                          echo "<tr><td colspan='4'><center>No Data Found<center></td></tr>";
                        }
                        ?>
                      </table>
                    </div>
                    </div>

                </div>
              </div>

            </div>

            <div id="backgroundRight" class="col-md-5" style="margin-top:0%; padding-left:1%">
               <div id="panelChart" class="box box-default" style="width:100%; height:100%; margin-left:0%">
                <!-- Tabs within a box -->
                <ul class="box-header with-border">
                  <li class="box-title" style="font-size: 16px">Asset Condition</li>
                </ul>
                <div class="tab-content" style="height:100%">
                  <div class="row" style="width: 100%; background-color:white !important; margin-left:0">
                  <div class="col-md-8" style="padding-top:1%; padding-bottom:1%;">
                  <canvas id="conditionChart" width:"100"></canvas>
                  </div>
                  <div class="col-md-4" style="padding-left:2%" id="assetConditionPie">
                    <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle text-aqua"></i> Very Good</li>  
                    <li><i class="fa fa-circle text-light-blue"></i> Good</li>
                    <li><i class="fa fa-circle text-green"></i> Normal</li>
                    <li><i class="fa fa-circle text-yellow"></i> Broken</li>
                    <li><i class="fa fa-circle text-red"></i> Critical</li>                
                  </ul>
                  </div>
                  </div>
                </div>
                <div class="box-footer text-center" style="border-top-right-radius: 0px; border-top-left-radius: 0px; border-top-color: #f4f4f4; border-top: 1px solid #ddd">
                  <a href="#myModal2" class='openUpdate' data-toggle="modal">View Details</a>
                </div> 
              </div>

              <div style="height:126px;">
                <div class="col-md-4" style="padding-left:3px; padding-right:3px">
                  <div class="small-box bg-teal">
                    <div class="inner">
                      <h3><?php echo $totalUser[0]->total?></h3><br><br>
                      <p>User Registration</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer"></i></a>
                  </div>
                </div>

                <div class="col-md-4" style="padding-left:3px; padding-right:3px">
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?php echo $totalAsset[0]->total?></h3><br><br>
                      <p>Total Asset</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-document-text"></i>
                    </div>
                    <a href="#" class="small-box-footer"></i></a>
                  </div>
                </div>

                <div class="col-md-4" style="padding-left:3px; padding-right:3px" id="boxNotCompleted" onclick="openInNewTab('<?php echo base_url();?>crud/viewNotCompleted?not=true');">
                  <div class="small-box bg-red">
                    <div class="inner" style="padding-bottom:0">
                      <h3><?php echo $notComplete[0]->total?></h3><br><br>
                      <p style="margin-bottom:0">Not Completed Details</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-alert"></i>
                    </div>
                    <a href="#" class="small-box-footer"></i></a>
                  </div>
                </div>
              </div>

            </div>
              
            </div><!-- bagian atas -->

            <div id="report" style="border:1px solid black; overflow:hidden; margin-top:10px; box-shadow:0px 2px 2px 1px #888888">
             <h2 style="margin-top:0%; padding:0.5%; background-color:#142b51; color:white">Invoice</h2>
              <div id="backgroundLeft" class="col-md-6" style="margin-top:0%; padding-left:1%">

                <div id="panelChart" class="nav-tabs-custom" style="width:100%;">
                  <!-- Tabs within a box -->
                  <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header"><i class="fa fa-inbox"></i>Outstanding Purchase Order</li>
                  </ul>
                  <div class="tab-content no-padding">
                    <canvas id="outstandingChart2" width="400" height="140"></canvas>
                  </div>
                  <div class="box-footer text-center" style="border-top-right-radius: 0px; border-top-left-radius: 0px; border-top-color: #f4f4f4; border-top: 1px solid #ddd">
                  <a href="#myModal3" class='openUpdate' data-toggle="modal">View Details</a>
                </div>
                </div>
              </div>

                <div id="backgroundRight" class="col-md-6" style="margin-top:0%; padding-left: 1%">
                  <div id="panelChart" class="nav-tabs-custom" style="width:100%;">
                  <!-- Tabs within a box -->
                  <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header"><i class="fa fa-inbox"></i>Outstanding Purchase Order</li>
                  </ul>
                  <div class="tab-content no-padding">
                    <canvas id="outstandingChart" width="400" height="140"></canvas>
                  </div>
                  <div class="box-footer text-center" style="border-top-right-radius: 0px; border-top-left-radius: 0px; border-top-color: #f4f4f4; border-top: 1px solid #ddd">
                  <a href="#myModal3" class='openUpdate' data-toggle="modal">View Details</a>
                </div>
                </div>
                </div>
            </div> <!-- bagian tengah -->

            <div id="report" style="border:1px solid black; overflow:hidden; margin-top:10px; box-shadow:0px 2px 2px 1px #888888">
             <h2 style="margin-top:0%; padding:0.5%; background-color:#142b51; color:white">Assessment</h2>
             <h4 style="margin-left:1%">Department 
                   <select class="form-control" style="width:20%; display:inline">
                      <option selected>Building & Office Management</option>
                   </select>
                   <input type="submit" class="btn btn-default" value="GO">
                 </h4>
                 <br>
              <div id="backgroundLeft" class="col-md-5" style="margin-top:0%; padding-left:1%">
                <div id="left" class="col-md-6">
                  <div id="boxpercent1" class="small-box ">
                    <div class="inner" <?php if($percentSipil[0]->average < 41){echo "style='padding-bottom:2px'";}else{echo "style='padding-bottom:19px'";} ?>>
                      <h3><span id="percent1"><?php echo $percentSipil[0]->average?></span>%</h3><br><br>
                      <p style="margin-bottom:0px">Sipil & Struktur</p>
                      <?php if($percentSipil[0]->average < 41){ ?><span onclick="openInNewTab('<?php echo base_url();?>crud/viewList?category=1')"><a href='#' style='color:red; font-size:11px;'>See Asset List</a></span> <?php } ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-settings"></i>
                    </div>
                    <a href="#" class="small-box-footer"></i></a>
                  </div>

                  <div id="boxpercent2" class="small-box ">
                    <div class="inner" <?php if($percentMekanik[0]->average < 41){echo "style='padding-bottom:2px'";}else{echo "style='padding-bottom:19px'";} ?>>
                      <h3><span id="percent2"><?php echo $percentMekanik[0]->average?></span>%</h3><br><br>
                      <p style="margin-bottom:0px ">Mekanikal</p>
                      <?php if($percentMekanik[0]->average < 41){ ?><span onclick="openInNewTab('<?php echo base_url();?>crud/viewList?category=3')"><a href='#' style='color:red; font-size:11px;'>See Asset List</a></span> <?php } ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-wrench"></i>
                    </div>
                    <a href="#" class="small-box-footer"></i></a>
                  </div>

                  <div id="boxpercent3" class="small-box ">
                    <div class="inner" <?php if($percentPemipaan[0]->average < 41){echo "style='padding-bottom:2px'";}else{echo "style='padding-bottom:19px'";} ?>>
                      <h3><span id="percent3"><?php echo $percentPemipaan[0]->average?></span>%</h3><br><br>
                      <p style="margin-bottom:0px">Sistem Pemipaan</p>
                      <?php if($percentPemipaan[0]->average < 41){ ?><span onclick="openInNewTab('<?php echo base_url();?>crud/viewList?category=5')"><a href='#' style='color:red; font-size:11px;'>See Asset List</a></span> <?php } ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-levels"></i>
                    </div>
                    <a href="#" class="small-box-footer"></i></a>
                  </div>
                </div>      

                <div id="right" class="col-md-6">
                  <div id="boxpercent4" class="small-box">
                    <div class="inner" <?php if($percentArsitek[0]->average < 41){echo "style='padding-bottom:2px'";}else{echo "style='padding-bottom:19px'";} ?> >
                      <h3><span id="percent4"><?php echo $percentArsitek[0]->average?></span>%</h3><br><br>
                      <p style="margin-bottom:0px">Arsitektur</p>
                      <?php if($percentArsitek[0]->average < 41){ ?><span onclick="openInNewTab('<?php echo base_url();?>crud/viewList?category=2')"><a href='#' style='color:red; font-size:11px;'>See Asset List</a></span> <?php } ?> 
                      
                    </div>
                    <div class="icon">
                      <i class="ion ion-grid"></i>
                    </div>
                    <a href="#" class="small-box-footer"></i></a>
                  </div>

                  <div id="boxpercent5" class="small-box">
                    <div class="inner" <?php if($percentElektrik[0]->average < 41){echo "style='padding-bottom:4px'";}else{echo "style='padding-bottom:19px'";} ?> >
                      <h3><span id="percent5"><?php echo $percentElektrik[0]->average?></span>%</h3><br><br>
                      <p style="margin-bottom:0px">Elektrikal</p>
                       <?php if($percentElektrik[0]->average < 41){ ?><span onclick="openInNewTab('<?php echo base_url();?>crud/viewList?category=4')"><a href='#' style='color:red; font-size:11px;'>See Asset List</a></span> <?php } ?>
                    </div>
                    <div class="icon">
                      <i class="ion ion-flash"></i>
                    </div>
                    <a href="#" class="small-box-footer"></i></a>
                  </div>

                <div id="panelChart" class="box box-default" style="width:100%; height:100%; margin-left:0%">
                <!-- Tabs within a box -->
                <ul class="box-header with-border" style="text-align:center;">
                  <li class="box-title" style="font-size: 16px">Legend</li>
                </ul>
                <div class="tab-content" style="height:100%">
                  <div class="row" style="width: 100%; background-color:white !important; margin-left:0">
                  <div class="col-md-6" style="padding-top:1%; padding-bottom:1%;">
                  <ul class="chart-legend clearfix" id="percentgraph">
                    <li><i class="fa fa-circle text-aqua"></i> Very Good</li>  
                    <li><i class="fa fa-circle text-light-blue"></i> Good</li>
                    <li><i class="fa fa-circle text-green"></i> Normal</li>
                                   
                  </ul>
                  </div>
                  <div class="col-md-6" style="padding-left:2%">
                  <ul class="chart-legend clearfix" id="percentgraph">
                    <li><i class="fa fa-circle text-yellow"></i> Broken</li>
                    <li><i class="fa fa-circle text-red"></i> Critical</li> 
                  </ul>
                  </div>
                  </div>
                </div>
      
                </div>
              
              </div>     


          
              </div>

                <div id="backgroundRight" class="col-md-7" style="margin-top:0%; padding-left: 1%">
          
                  <div id="panelChart" class="nav-tabs-custom" style="width:100%; margin-bottom:5px">
                  <!-- Tabs within a box -->
                  <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header"><i class="fa fa-inbox"></i>Building Criticality</li>
                  </ul>
                  <div class="tab-content no-padding">
                    <div class="chartWrapper"  style="max-width:1200px;">
                      <div class="chartAreaWrapper" style="width:6075px;">
                         <canvas id="grafikAssesstment" width="1200" height="84" style="width:1200px; height:300px"></canvas>
                      </div>
                      <canvas id="myChartAxis" height="300" width="0"></canvas>
                    </div>
                     
                  </div>
                  <div class="box-footer text-center" style="border-top-right-radius: 0px; border-top-left-radius: 0px; border-top-color: #f4f4f4; border-top: 1px solid #ddd">
                  <a href="#myModal5" class='openUpdate' data-toggle="modal">View Details</a>
                  </div>
                  </div>

                 <div id="panelChart" class="nav-tabs-custom" style="width:100%;">
                   <ul class="nav nav-tabs" data-toggle="collapse" href="#collapse1" id="colIndex" aria-expanded="false">
                    <center><h5><a data-toggle="collapse" href="#collapse1" style="color:black; text-decoration: none">Capital Expenditure Plan Priority Legend</a></h5>
                      <span id="legendBut">Click to Show</span></center>
                  </ul>
                  <div id="collapse1" class="tab-content no-padding panel-collapse collapse">
                    <table class="table" style="text-align:center">
                      <tr>
                        <th style="text-align:center; width:50%">Score</th>
                        <th style="text-align:center">Description</th>
                      </tr>
                      <tr>
                        <td>0 - 0.2</td>
                        <td>Tidak Mendukung</td>
                      </tr> 
                      <tr>
                        <td>0.21 - 0.4</td>
                        <td>Kurang Mendukung</td>
                      </tr> 
                      <tr>
                        <td>0.41 - 0.6</td>
                        <td>Cukup Mendukung</td>
                      </tr> 
                      <tr>
                        <td>0.61 - 0.8</td>
                        <td>Mendukung</td>
                      </tr> 
                      <tr>
                        <td>0.81 - 1</td>
                        <td>Sangat Mendukung</td>
                      </tr>                 
                    </table>               
                     
                  </div>
                 </div>
                </div> 
            </div> <!-- bagian bawah -->

            </div> <!-- abu2 -->
           


        </div>
      </div>
    </div>
    
  </body>

<style type="text/css">
.row{
  background-color: #f1f1f1;
}
.nav-tabs>li.active>a{
  border-bottom: 1px solid #f4f4f4 !important;
  
  background-color: transparent;
}
</style>
<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">


<script>
  $(function(){
    $('#change1').on('click',function(){
      $('#assetStatus2').addClass('hidden');
      $('#assetStatus1').removeClass('hidden');
    })

    $('#change2').on('click',function(){
      $('#assetStatus1').addClass('hidden');
      $('#assetStatus2').removeClass('hidden');
    })

    $('#mainnav').addClass('active');

    var base_url = "<?php echo base_url();?>";

     var chart2 = document.getElementById("conditionChart");
     var chart4 = document.getElementById("statusChartPie");
     var chartCapex = document.getElementById("outstandingChart2");
     var chart3 = document.getElementById("outstandingChart");
     var chartAssesstment = document.getElementById("grafikAssesstment");
     

    var statusChartPie = new Chart(chart4, {
      type: "pie",
      data: {
        labels: ['Active', 'Idle', 'Surplus', 'Scrapped'],
        datasets: [{
          label: 'Total',
          data: [
            <?php 
            sort($countStatus);
            foreach($countStatus as $kf=>$isi){
            echo '"'.$isi->jumlah.'",';
          } ?>
          ],
          backgroundColor: [
            'rgba(103, 202, 225, 0.8)',
            'rgba(54, 99, 132, 0.8)',
            'rgba(77, 170, 87, 0.8)',
            'rgba(255, 220, 70, 0.8)'
          ],
          borderColor: [
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)'

          ],
          borderWidth:1
        }]
      },
      options: {
        legend:{
          display:false
        },
        
      }

    })

     var conditionChart = new Chart(chart2, {
      type: "pie",
      data: {
        labels: ['Very Good', 'Good', 'Normal', 'Broken', 'Cricital'],
        datasets: [{
          label: 'Total',
          data: [
          <?php foreach($overallScore as $kf=>$isi){
            echo '"'.$isi->jumlah.'",';
          } ?>
          ],
          backgroundColor: [
            'rgba(103, 202, 225, 0.8)',
            'rgba(54, 99, 132, 0.8)',
            'rgba(77, 170, 87, 0.8)',
            'rgba(255, 220, 70, 0.8)',
            'rgba(255, 0, 0, 0.7)'
          ],
          borderColor: [
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)'

          ],
          borderWidth:1
        }]
      },
      options: {
        legend:{
          display:false
        },
        
      }

     });


     var outstandingChart = new Chart(chartCapex, {
      type: "bar",
      data: {
        labels: ["Capex & Opex Total Data", "Outstanding"],
        datasets: [{
          label: ['Outstanding', 'Total'],
          data: [
          <?php foreach($countOutstanding as $kf=>$isi){
            echo '"'.$isi->total.'",';
            echo '"'.$isi->outstanding.'",';
          } 
          ?>],
          backgroundColor: [
            'rgba(54, 99, 132, 1)',
            'red'
          ],
          borderColor: [
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)',
          ],
          borderWidth:1
        }]
      },
      options: {
        legend:{
          display:false
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
              max: <?php echo ceil(($countOutstanding[0]->total + 5)/10) *10 ?>
            }
          }],
          xAxes: [{
            barPercentage: 0.2
          }]
        },
        tooltips:{
           enabled: false,
        },
        hover: {
          animationDuration:1
        },
        animation: {
          duration: 1,
          onComplete: function(){
            var chartInstance = this.chart,
                ctx = chartInstance.ctx;
            ctx.fillStyle = 'black',
            ctx.textAlign = 'center';
            ctx.textBaseLine = 'Bottom';

            this.data.datasets.forEach(function(dataset, i){
              var meta = chartInstance.controller.getDatasetMeta(i);
              meta.data.forEach(function (bar, index){
                var data = dataset.data[index];
                ctx.fillText(data, bar._model.x, bar._model.y - 5)
              });
            });
          }
        }
        
      }

     });


      var outstandingChart = new Chart(chart3, {
      type: "horizontalBar",
      data: {
        labels: [
              <?php foreach($outstandingDept as $kf=>$isi){
                echo '"'.$isi->department.'",';
              } 
          ?>],
        datasets: [{
          label: 'No Data Found',
          data: [
          <?php foreach($outstandingCount as $kf=>$isi){
            echo '"'.$isi->jumlah.'",';
          } 
          ?>],
          backgroundColor: [
            'rgba(63, 191, 127, 0.7)',
            'rgba(63, 191, 80, 0.7)',
            'rgba(54, 99, 132, 0.7)',
            'rgba(169, 169, 169, 0.7)'
          ],
          borderColor: [
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)'

          ],
          borderWidth:1
        }]
      },
      options: {
        legend:{
          display:<?php if($countOutstanding[0]->outstanding != 0){echo "false,";}else{echo "true,";} ?>
          position: 'bottom',

        },
        scales: {
          yAxes: [{
              barPercentage: 0.5,
          }],
          xAxes: [{
            ticks: {
              beginAtZero:true,
              fixedStepSize: 1,
              max: <?php
                $highest = 0;
                  foreach($outstandingCount as $kf=>$isi){
                    if($isi->jumlah > $highest){
                      $highest = $isi->jumlah;
                    }
                  }
                  echo $highest +1;
               ?> 
            }
          }]
        },
        tooltips:{
           enabled: false,
        },
        hover: {
          animationDuration:1
        },
        animation: {
          duration: 1,
          onComplete: function(){
            var chartInstance = this.chart,
                ctx = chartInstance.ctx;
            ctx.fillStyle = 'black',
            ctx.textAlign = 'center';
            ctx.textBaseLine = 'Bottom';

            this.data.datasets.forEach(function(dataset, i){
              var meta = chartInstance.controller.getDatasetMeta(i);
              meta.data.forEach(function (bar, index){
                var data = dataset.data[index];
                ctx.fillText(data, bar._model.x + 10, bar._model.y+3);
              });
            });
          }
        }
      }

     });
    
   

    var assess = new Chart(chartAssesstment, {
      responsive:true,
        maintainAspectRatio:false,
      type: "bar",
      data: {
        labels: [<?php foreach($hasilCriciality as $key=>$isi){
            echo '"'.$isi->nama.'",';
          } ?>],
        datasets: [{
          data: [
          <?php foreach($hasilCriciality as $kf=>$isi){
            echo '"'.round($isi->total,3).'",';
          } 
          ?>],
          backgroundColor: [
          <?php foreach($hasilCriciality as $key=>$isi2){
            if(round($isi2->total, 3) >= 0.81){
              echo "'#FF0000',";
            }else if(round($isi2->total,3) >= 0.61 && $isi2->total < 0.81){
              echo "'#FFA500',";
            }else if(round($isi2->total,3) >= 0.41 && $isi2->total < 0.61){
              echo "'#32CD32',";
            }else if(round($isi2->total,3) >= 0.21 && $isi2->total < 0.41){
              echo "'#1E90FF',";
            }else{
              echo "'#00FFFF',";
            }
          } ?>
          ],
          borderColor: [
            
          ],
          borderWidth:1
        }]
      },
      options: {
        legend:{
          display:false
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
              max:1.2
            }
          }],
          xAxes: [{
            barPercentage: 0.58,
          }]
        },
        tooltips:{
           enabled: false,
        },
        hover: {
          animationDuration:1
        },
        animation: {
          duration: 1,
          onComplete: function(){
            var chartInstance = this.chart,
                ctx = chartInstance.ctx;
            ctx.fillStyle = 'black',
            ctx.textAlign = 'center';
            ctx.textBaseLine = 'Bottom';

            this.data.datasets.forEach(function(dataset, i){
              var meta = chartInstance.controller.getDatasetMeta(i);
              meta.data.forEach(function (bar, index){
                var data = dataset.data[index];
                ctx.fillText(data, bar._model.x, bar._model.y - 5)
              });
            });

           
          }
          
        }
        
      }

     });
    
    for(var i = 1; i<=5; i++){
      if($("#percent"+i).text() <= 20){
        $("#boxpercent"+i).addClass('bg-red');
      }else if($("#percent"+i).text() >= 21 && $("#percent"+i).text() <= 40){
        $("#boxpercent"+i).addClass('bg-orange');
      }else if($("#percent"+i).text() >= 41 && $("#percent"+i).text() <= 60){
        $("#boxpercent"+i).addClass('bg-green');
      }else if($("#percent"+i).text() >= 61 && $("#percent"+i).text() <= 80){
        $("#boxpercent"+i).addClass('bg-blue');
      }else{
         $("#boxpercent"+i).addClass('bg-aqua');
      }
    }

    $('#colIndex').on('click', function(){
    if($('#colIndex').attr('aria-expanded') == 'true'){
      $('#legendBut').text("Click to Show")
    }else{
       $('#legendBut').text("Click to Hide")
    }
    })
   
   
  });

function openInNewTab(url){
    var win = window.open(url, '_blank');
    win.focus();
   }

  </script>

</html>
