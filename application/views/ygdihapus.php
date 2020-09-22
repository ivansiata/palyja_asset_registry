<div id="panelChart" class="nav-tabs-custom" style="width:730px;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a id="change1" data-toggle="tab">Full Scale</a></li>
                  <li><a id="change2" data-toggle="tab">Minimize</a></li>
                  <li class="pull-left header"></i> Asset Status</li>
                </ul>
                <div class="tab-content no-padding">
                  <div id="assetStatus1">
                  <canvas id="statusChart" width="400" height="140"></canvas>
                  </div>
                  <div id="assetStatus2" class="hidden">
                  <canvas id="statusChart2" width="400" height="140"></canvas>
                  </div>
                </div>
              
              </div>
              <br>
             

              <div id="panelChart" class="nav-tabs-custom" style="width:730px;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"></i> Asset Status</li>
                </ul>
                <div class="tab-content no-padding">
                  <h5>&nbsp &nbsp Active Asset</h5>
                  <div id="assetStatus3">
                  <canvas id="activeChart" width="400" height="90"></canvas>
                  </div>
                  <h5><br>&nbsp &nbsp Others</h5>
                  <div id="assetStatus4">
                  <canvas id="othersChart" width="400" height="140"></canvas>
                  </div>
                </div>
                
                </div>

                <div id="panelChart" class="nav-tabs-custom">
                  <div class="small-box bg-teal">
                    <div class="inner">
                      <h3><?php echo $outstandingCountTotal[0]->jumlah?></h3>
                      <h4>of <?php echo $capexopexTotal[0]->jumlah?></h4>
                      <p>Outstanding Purchase Order</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-document-text"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div id="panelChart" class="nav-tabs-custom" style="width:730px;">
                  <!-- Tabs within a box -->
                  <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header"><i class="fa fa-inbox"></i>Outstanding Purchase Order</li>
                  </ul>
                  <div class="tab-content no-padding">
                    <canvas id="outstandingChart" width="400" height="140"></canvas>
                  </div>
                </div>


var chart1 = document.getElementById("statusChart");
     var chart12 = document.getElementById("statusChart2");
     var chart2 = document.getElementById("conditionChart");
     var chart3 = document.getElementById("outstandingChart");
     var chartCoba1 = document.getElementById("activeChart");
     var chartCoba2 = document.getElementById("othersChart");


var statusChart = new Chart(chart1, {
      type: "bar",
      data: {
        labels: ['Active', 'Idle', 'Surplus', 'Scrapped'],
        datasets: [{
          label: 'Total',
          data: [
          <?php foreach($countStatus as $kf=>$isi){
            echo '"'.$isi->jumlah.'",';
          } 
          ?>],
          backgroundColor: [
            'rgba(54, 99, 132, 1)',
            'rgba(169, 169, 169, 1)',
            'rgba(255, 225, 30, 1)',
            'rgba(255, 0, 0, 1)'
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
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
            }
          }],
          xAxes: [{
            barPercentage: 0.6
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

    var statusChart2 = new Chart(chart12, {
      type: "bar",
      data: {
        labels: ['Active', 'Idle', 'Surplus', 'Scrapped'],
        datasets: [{
          label: 'Total',
          data: [
          <?php foreach($countStatus as $kf=>$isi){
            echo '"'.$isi->jumlah.'",';
          } 
          ?>],
          backgroundColor: [
            'rgba(54, 99, 132, 1)',
            'rgba(169, 169, 169, 1)',
            'rgba(255, 225, 30, 1)',
            'rgba(255, 0, 0, 1)'
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
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
              max: <?php 
                    $max = 0;
                    rsort($countStatus);
                    echo ceil($countStatus[1]->jumlah/100) * 100; 
          ?>
        
            }
          }],
          xAxes: [{
            barPercentage: 0.6
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

      var activeChart = new Chart(chartCoba1, {
      type: "horizontalBar",
      data: {
        labels: ["Active"],
        datasets: [{
          label: 'Total',
          data: [
          <?php foreach($countStatusActive as $kf=>$isi){
            echo '"'.$isi->jumlah.'",';
          } 
          ?>],
          backgroundColor: [
            'rgba(54, 99, 132, 1)'
          ],
          borderColor: [
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
              barPercentage: 0.4,
          }],
          xAxes: [{
            ticks: {
              beginAtZero:true,
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
                ctx.fillText(data, bar._model.x + 20, bar._model.y+3)
              });
            });
          }
        }
      }

     });

      var othersChart = new Chart(chartCoba2, {
      type: "bar",
      data: {
        labels: ['Idle', 'Surplus', 'Scrapped'],
        datasets: [{
          label: 'Total',
          data: [
          <?php foreach($countStatusOthers as $kf=>$isi){
            echo '"'.$isi->jumlah.'",';
          } 
          ?>],
          backgroundColor: [
            'rgba(169, 169, 169, 1)',
            'rgba(255, 225, 30, 1)',
            'rgba(255, 0, 0, 1)'
          ],
          borderColor: [
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
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
            }
          }],
          xAxes: [{
            barPercentage: 0.4
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
          label: 'Total',
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
          display:false
        },
        scales: {
          yAxes: [{
              barPercentage: 0.5,
          }],
          xAxes: [{
            ticks: {
              beginAtZero:true,
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
                ctx.fillText(data, bar._model.x + 20, bar._model.y)
              });
            });
          }
        }
      }

     });


     <?php 
      if($this->session->userdata("role") == "admin"){ ?>
        <button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
        <a href="#">Delete</a>
        <?php }else if(strtolower($isi->family) == strtolower($this->session->userdata("role"))){?>
        <button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
        <a href="#">Delete</a>
      <?php }?>

      <?php 
      if($this->session->userdata("role") == "admin"){ ?>
        <button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button> 
        <a href="#">Delete</a>
        <?php }else if(strtolower($isi->family) == strtolower($this->session->userdata("role"))){?>
        <button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $isi->asset_id?>'><i class="fa faedit">Details</i></button>
        <a href="#">Delete</a>
      <?php }?>


      <div id="formGeneral" class="form">
              <table style="padding-left:3%;">
                <tr>
                  <th colspan="3">General</th>
                </tr>
                <tr>
                  <th colspan="3">
                </tr>
                <tr>
                  <td style="width:90px">Owner</td>
                  <td>:</td>
                  <td class="chozenSelect">
                    <select name="owner" id="ownerMod">
                                <option value="">--</option>
                                 <?php foreach($owner as $ow=>$isi){
                                    echo "<option value=".$isi->id." ".set_select('owner',$isi->id).">".$isi->owner."</option>";
                                  } ?>
                              </select>
                  </td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td class="chozenSelect">
                    <select class="chozen" name="name" id="name">
                                <option value="">--</option>
                                 <?php foreach($assetname as $kf=>$isi){
                                    echo "<option value=".$isi->id_assetname." ".set_select('name',$isi->id_assetname).">".$isi->name."</option>";
                                  } ?>
                              </select>
                  </td>
                </tr>

              </table>
          </div><!-- Form General -->


          for($row = 2; $row <= $highestRow; $row++){
      $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

      $dataFunding = $rowData[0][5];
      $query2 = $this->db->query("SELECT id_funding FROM ref_funding WHERE LOWER(funding) = LOWER('$dataFunding')");
      foreach($query2->result() as $rowinput){
        $rowData[0][5] =  $rowinput->id_funding;
      }

      $dataDept = $rowData[0][2];
      $query2 = $this->db->query("SELECT id_dept FROM ref_dept WHERE workingunit = '$dataDept'");
      foreach($query2->result() as $rowinput){
        $rowData[0][2] =  $rowinput->id_dept;
      }
