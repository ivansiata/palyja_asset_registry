<div id="myModalAlt" class="modal fade" role="dialog">
		 <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabelalt">Kriteria</h4>
		      </div>
		      <div class="modal-body">
		        <div class="list-group">
		        	<?php foreach ($dataKriteria as $key => $isi) { ?>
		        		<a href="<?php echo base_url().'ahp/analisa_alternatif_tabel?kriteria='.$isi->id_kriteria ?>" class="list-group-item"><?php echo $isi->nama_kriteria ?></a>
		        	<?php } ?>
				</div>
		      </div>
		    </div>
		  </div>
	</div>

