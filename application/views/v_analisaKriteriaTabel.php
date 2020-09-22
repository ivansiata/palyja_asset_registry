<div class="col-xs-12 col-sm-12 col-md-10">
	<div class="col-md-6 text-left" style="margin-bottom:10px;">
		<strong style="font-size:18pt;"><span class="fa fa-table"></span> Perbandingan Kriteria</strong>
	</div>

	<table width="100%" class="table table-striped table-bordered">
		<thead>
		    <tr>
		        <th>Antar Kriteria</th>
		        <?php foreach($dataKriteria as $dk => $isi) { ?>
		        <th><?php echo $isi->nama_kriteria?></th>
		        <?php } ?>
		    </tr>
		</thead>
		<tbody>
		<?php foreach($dataKriteria as $dk => $isi) { ?>
			<tr>
				<th><?php echo $isi->nama_kriteria?></th>
				<?php foreach($dataKriteria as $dk => $isi2) { ?>
					<td>
						<?php if($isi->id_kriteria == $isi2->id_kriteria){
							echo "1";
							
						}else{ 
							$obj = $myClass->proses_ajaxAnalisaKriteria($isi->id_kriteria, $isi2->id_kriteria);
						}?>
					</td>
				<?php } ?>
			</tr>
		 <?php } ?>
		</tbody>
		<tfoot>
         	<tr>
                <th>Jumlah</th>
                <?php foreach($dataKriteria as $dk => $isi) { ?>
                <th>
                	<?php 
                	
                	$obj = $myClass->proses_ajaxJumlahKriteria($isi->id_kriteria); 
                	?>
                </th>
            	<?php } ?>
            </tr>
        </tfoot>
	</table>

	<table width="100%" class="table table-striped table-bordered">
		<thead>
		    <tr>
		        <th>Perbandingan Kriteria</th>
		        <?php foreach($dataKriteria as $dk => $isi) { ?>
		        <th><?php echo $isi->nama_kriteria?></th>
		        <?php } ?>
		        <th>Jumlah</th>
		        <th>Prioritas</th>
		    </tr>
		</thead>
		<tbody>
		<?php foreach($dataKriteria as $dk => $isi) { ?>
			<tr>
				<th><?php echo $isi->nama_kriteria?></th>
				<?php foreach($dataKriteria as $dk => $isi2) { ?>
					<td>
						<?php if($isi->id_kriteria == $isi2->id_kriteria){
							$update = $myClass->update_table_analisaKriteria2($isi->id_kriteria, $isi2->id_kriteria,$isi2->jumlah_kriteria);
							$myClass->proses_ajaxAnalisaKriteriaPerbandingan($isi->id_kriteria, $isi2->id_kriteria, $isi2->jumlah_kriteria);
						}else{ 
							$update = $myClass->update_table_analisaKriteria2($isi->id_kriteria, $isi2->id_kriteria,$isi2->jumlah_kriteria);
							$myClass->proses_ajaxAnalisaKriteriaPerbandingan($isi->id_kriteria, $isi2->id_kriteria, $isi2->jumlah_kriteria);
						}?>
					</td>
				<?php } ?>
				<td>
					<?php 
					$update = $myClass->update_table_jumlahKriteria($isi->id_kriteria);
					$obj = $myClass->proses_ajaxJumlahKriteriaPerbandingan2($isi->id_kriteria);
					?>
				</td>
				<td>
					<?php 
					$update = $myClass->update_table_bobotKriteria($isi->id_kriteria);
					$obj = $myClass->proses_ajaxBobotKriteriaPerbandingan2($isi->id_kriteria);
					?>
				</td>
			</tr>
		 <?php } ?>
		</tbody>
		<tfoot>
	     	<tr>
	            <th>Jumlah</th>
	            <?php foreach($dataKriteria as $dk => $isi) { ?>
	            <th>

	            	<?php $obj = $myClass->proses_ajaxJumlahKriteriaPerbandingan($isi->id_kriteria); ?>
	            </th>
	        	<?php } ?>
	        </tr>
	    </tfoot>
	</table>
</div>

<script>
  $(function(){
	$('.lala').append('');  	
  });
</script>
