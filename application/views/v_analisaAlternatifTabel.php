<div class="col-xs-12 col-sm-12 col-md-10">
	<div class="col-md-6 text-left" style="margin-bottom:10px;">
		<strong style="font-size:18pt;"><span class="fa fa-table"></span> Alternatif Menurut Kriteria</strong>
	</div>
	<div id="idkriteria" hidden><?php echo $kriteria ?></div>
	<table width="100%" class="table table-striped table-bordered">
		<thead>
		    <tr>
		        <th><?php echo $dataKriteriaAlernatif[0]->nama_kriteria ?></th>
		        <?php foreach($dataAlternatif as $dk => $isi) { ?>
		        <th><?php echo $isi->nama_alternatif?></th>
		        <?php } ?>
		    </tr>
		</thead>
		<tbody>
		<?php foreach($dataAlternatif as $dk => $isi) { ?>
			<tr>
				<th><?php echo $isi->nama_alternatif?></th>
				<?php foreach($dataAlternatif as $dk => $isi2) { ?>
					<td>
						<?php if($isi->id_alternatif == $isi2->id_alternatif){
							echo "1";
							$update = $myClass->update_jadiSatuAlternatif($isi->id_alternatif, $isi2->id_alternatif, $kriteria);
						}else{ 
							$obj = $myClass->proses_ajaxAnalisaAlternatif($isi->id_alternatif, $isi2->id_alternatif);
						}?>
					</td>
				<?php } ?>
			</tr>
		 <?php } ?>
		</tbody>
		<tfoot>
         	<tr>
                <th>Jumlah</th>
                <?php foreach($dataAlternatif as $dk => $isi) { ?>
                <th>
                	<?php 
                	$update = $myClass->update_table_jumlahAlternatif($kriteria, $isi->id_alternatif);
                	$obj = $myClass->proses_ajaxJumlahAlternatif($isi->id_alternatif); 

                	?>
                </th>
            	<?php } ?>
            </tr>
        </tfoot>
	</table>

	<table width="100%" class="table table-striped table-bordered">
		<thead>
		    <tr>
		        <th>Perbandingan Alternatif</th>
		        <?php foreach($dataAlternatif as $dk => $isi) { ?>
		        <th><?php echo $isi->nama_alternatif?></th>
		        <?php } ?>
		       	<th>Skor</th>
		       	<th>Jumlah</th>
		       	<th>Prioritas</th>
		       	<th>Prioritas Subkriteria</th>
		    </tr>
		</thead>
		<tbody>
		<?php foreach($dataAlternatif as $dl => $isi) { ?>
			<tr>
				<th><?php echo $isi->nama_alternatif?></th>
				<?php foreach($jumAltKri as $dk => $isi2) { ?>
					<td>
						<?php 
							$update = $myClass->update_table_analisaAlternatif($isi->id_alternatif, $isi2->id_alternatif, $kriteria);
							$myClass->proses_ajaxAnalisaAlternatifPerbandingan($isi->id_alternatif, $isi2->id_alternatif, $kriteria);
						?>
					</td>
				<?php } ?>
				
	            <th>
	            	<?php 
	            	$update = $myClass->update_table_skorAltKri($isi->id_alternatif, $kriteria);
	            	
	            	$obj = $myClass->proses_ajaxAnalisaAlternatifSkorAvg($isi->id_alternatif); 
	            	?>
	            </th>

	            <td>
					<?php 
					$update = $myClass->update_table_analisaAlternatifJumlah($isi->id_alternatif, $isi2->id_alternatif, $kriteria);
					$myClass->proses_ajaxAnalisaAlternatifJumlah($isi->id_alternatif, $isi2->id_alternatif, $kriteria);
					?>
				</td>

				<td>
					<?php
					$update = $myClass->update_table_skorAvg($isi->id_alternatif, $kriteria);
					$myClass->proses_ajaxAnalisaAlternatifPrioritas($isi->id_alternatif, $isi2->id_alternatif, $kriteria);
					?>
				</td>

	            <th id="appended<?php echo $dl+1?>">
	            	
	            </th>
	        	
			</tr>
		 <?php } ?>
		 <?php foreach($dataAlternatif as $dk => $isi) {
		 	$update = $myClass->update_table_subPrio($isi->id_alternatif, $kriteria);
		 } ?>
		</tbody>
		<tfoot>
	     	<tr>
	            <th>Jumlah</th>
	            <?php foreach($dataAlternatif as $dk => $isi) { ?>
	            <th>
	            	<?php $obj = $myClass->proses_ajaxJumlahAlternatifPerbandingan($isi->id_alternatif); ?>
	            </th>
	        	<?php } ?>
	        	<th>
	        		<?php 
	        			$obj = $myClass->proses_ajaxJumlahSkorPerbandingan($kriteria);
                	?>
                </th>
	        </tr>
	    </tfoot>
	</table>
</div>

<script>
  $(function(){
	$('.lala').append(''); 
	var base_url = "<?php echo base_url();?>";
	var idkriteria =  $('#idkriteria').text();
	  $.ajax({
	  			type:"POST",	
                url: base_url+"/ahp/get_tabel_subPrio",
                data: {idkriteria:idkriteria},
                success: function(data){
                  var json = jQuery.parseJSON(data);
                  $.each(json, function(i, item){
                  	$("#appended"+(i+1)).append(item.prioritas_subkriteria	);
                  });
              	},error: function(data){
              	alert('error');
              }

          });
  });
</script>
