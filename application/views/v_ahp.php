<div class ="col-md-10" style="padding:0; padding-right:2%">
  <ol class="breadcrumb">
        <li class="active" id="liPrio"><a href="#"><span class="fa fa-bomb"></span> Nilai Prioritas</a></li>
        <li id="liChart"><a href="#"><span class="fa fa-table"></span> Grafik Perangkingan</a></li>
      </ol>
	<div id="chart" hidden><canvas id="rangkingChart" width="100" height="30"></canvas></div>
  <div id="tableHasil">
    <div style="margin-bottom:15px"><strong style="font-size:18pt;">Nilai Prioritas Criticality Building</strong></div>
    <table class="table table-striped table-bordered" id="tabelPrio">
      <tr>
        <thead>
          <?php foreach ($dataKriteria as $key => $isi) { ?>
            <th><?php echo $isi->nama_kriteria ?></th>
          <?php } ?>
        </thead>
      </tr>
      <tr>
        <thead>
          <?php foreach ($dataKriteria as $key => $isi) { ?>
            <th><?php echo $isi->bobot_kriteria ?></th>
          <?php } ?>
        </thead>
      </tr>
      <tr>
        <td style="padding:0; border:none">
          <table class="table table-striped table-bordered">
          <?php foreach ($dataAlternatifHasil1 as $key => $isi) { ?>
             <tr>
              <td><?php echo $isi->nama_alternatif ?></td>
            </tr>
            <tr>
              <td><?php echo $isi->prioritas_subkriteria ?></td>
            </tr>
          <?php } ?>
          </table>
        </td>
        <td style="padding:0; border:none">
          <table class="table table-striped table-bordered">
          <?php foreach ($dataAlternatifHasil2 as $key => $isi) { ?>
             <tr>
              <td><?php echo $isi->nama_alternatif ?></td>
            </tr>
            <tr>
              <td><?php echo $isi->prioritas_subkriteria ?></td>
            </tr>
          <?php } ?>
          </table>
        </td>
        <td style="padding:0; border:none">
          <table class="table table-striped table-bordered">
          <?php foreach ($dataAlternatifHasil3 as $key => $isi) { ?>
             <tr>
              <td><?php echo $isi->nama_alternatif ?></td>
            </tr>
            <tr>
              <td><?php echo $isi->prioritas_subkriteria ?></td>
            </tr>
          <?php } ?>
          </table>
        </td>
        <td style="padding:0; border:none">
          <table class="table table-striped table-bordered">
          <?php foreach ($dataAlternatifHasil4 as $key => $isi) { ?>
             <tr>
              <td><?php echo $isi->nama_alternatif ?></td>
            </tr>
            <tr>
              <td><?php echo $isi->prioritas_subkriteria ?></td>
            </tr>
          <?php } ?>
          </table>
        </td>
        <td style="padding:0; border:none">
          <table class="table table-striped table-bordered">
          <?php foreach ($dataAlternatifHasil5 as $key => $isi) { ?>
             <tr>
              <td><?php echo $isi->nama_alternatif ?></td>
            </tr>
            <tr>
              <td><?php echo $isi->prioritas_subkriteria ?></td>
            </tr>
          <?php } ?>
          </table>
        </td>
      </tr>

    </table>

  </div>
	<div class="row" id="detailDataAhp" style="margin-top:2%">
	  <div class="col-md-4">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Data Nilai</h3>
		  </div>
		  <div class="panel-body">
		     <ol>
		    	<?php
				foreach($dataNilai as $dn=>$isi){
				?>
			  	<li><?php echo $isi->ket_nilai ?> (<?php echo $isi->jum_nilai ?>)</li>
			  	<?php
				}
			  	?>
			</ol>
		  </div>
		</div>
	  </div>
	  <div class="col-md-4">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Data Kriteria</h3>
		  </div>
		  <div class="panel-body">
		   <ol>
		    	<?php
				foreach($dataKriteria as $dn=>$isi){
				?>
			  	<li><?php echo $isi->nama_kriteria ?></li>
			  	<?php
				}
			  	?>
			</ol>
		  </div>
		</div>
	  </div>
	  <div class="col-md-4">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Data Alternatif</h3>
		  </div>
		  <div class="panel-body">
		  <ol>
		    	<?php
				foreach($dataAlternatif as $dn=>$isi){
				?>
			  	<li><?php echo $isi->nama_alternatif ?></li>
			  	<?php
				}
			  	?>
			</ol>
		  </div>
		</div>
	  </div>
	</div>
</div>



<script>
  $(function(){

  	 var chartRangking = document.getElementById("rangkingChart");

  	 var rangkingChart = new Chart(chartRangking, {
      type: "bar",
      data: {
        labels: ["Sangat Rusak", "Rusak", "Cukup Rusak", "Kurang Rusak", "Tidak Rusak"],
        datasets: [{
          label: ['Outstanding', 'Total'],
          data: [
         <?php foreach($hasilAkhir as $kf=>$isi){
            echo '"'.$isi->hasil_akhir.'",';
          } 
          ?>
         ],
          backgroundColor: [
            '#d34c59',
            '#bf4c16',
            '#599952',
            '#90ed7d',
            '#73bec6'

          ],
          borderColor: [
            'rgba(225, 99, 132, 0.2)',
            'rgba(225, 99, 132, 0.2)',
          ],
          borderWidth:1
        }]
      },
      options: {
      	title:{
      		display : true,
      		text : 'Grafik Perangkingan'
      	},
        legend:{
          display:false
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
            },
            scaleLabel: {
	        	display: true,
	            labelString: 'Jumlah Nilai'
	        }
          }],
          xAxes: [{
            barPercentage: 0.6,
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

     $('#liPrio').on('click', function(){
      $('#tableHasil').show(1);
      $('#chart').hide(1);
     })

     $('#liChart').on('click', function(){
      $('#tableHasil').hide(1);
      $('#chart').show(1);
     })

  });
</script>