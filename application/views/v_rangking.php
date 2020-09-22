<div class="col-xs-12 col-sm-12 col-md-10">
	<div class="col-md-6 text-left" style="margin-bottom:10px;">
		<strong style="font-size:18pt;">Data Rangking</strong>
	</div>

	<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <th colspan="<?php echo $rowCount; ?>" class="text-center">Kriteria</th>
		            </tr>
		            <tr>
		            	<?php foreach($dataKriteria as $dk => $isi) { ?>
		        			<th><?php echo $isi->nama_kriteria?></th>
		        		<?php } ?>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php foreach($dataAlternatif as $dk => $isi) { ?>
						<tr>
							<th><?php echo $isi->nama_alternatif?></th>
							<?php $obj = $myClass->proses_ajaxDataRangking($isi->id_alternatif) ?>
						<tr>
					<?php } ?>
					<tr>
						<th>Jumlah</th>
						<?php foreach($dataKriteria as $dk => $isi) { ?>
						<td><?php $obj = $myClass->proses_ajaxJumlahDataRangking($isi->id_kriteria) ?></td>
						<?php } ?>
					</tr>

		        </tbody>
		
	</table>

	<div class="col-md-6 text-left" style="margin-bottom:10px;">
		<strong style="font-size:18pt;">Hasil Perangkingan</strong>
	</div>

	<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <th colspan="<?php echo $rowCount; ?>" class="text-center">Kriteria</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Hasil</th>
		            </tr>
		            <tr>
		            	<?php foreach($dataKriteria as $dk => $isi) { ?>
		        			<th><?php echo $isi->nama_kriteria?></th>
		        		<?php } ?>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php foreach($dataAlternatif as $dk => $isi) { ?>
						<tr>
							<th><?php echo $isi->nama_alternatif?></th>
							<?php 
							foreach($dataKriteria as $dk2 => $isi2) {
							$update = $myClass->update_hasilAltKri($isi->id_alternatif, $isi2->id_kriteria);
							}
							$obj = $myClass->proses_ajaxDataPerangkingan($isi->id_alternatif) 
							?>
							<td>
								<?php 
								$update = $myClass->update_hasilAltKriJumlah($isi->id_alternatif);
								$obj = $myClass->proses_ajaxHasil($isi->id_alternatif) 
								?>
							</td>
						<tr>
					<?php } ?>

					<tr>
						<th>Jumlah</th>
						<?php foreach($dataKriteria as $dk => $isi) { ?>
						<td>
						<?php 
						$obj = $myClass->proses_ajaxJumlahDataPerangkingan($isi->id_kriteria) ?></td>
						<?php } ?>
						<td><?php echo number_format($jumlahHasil[0]->jumlah, 5, '.', ','); ?></td>
					</tr>

		        </tbody>
		
	</table>
	
</div>

<script>

</script>
