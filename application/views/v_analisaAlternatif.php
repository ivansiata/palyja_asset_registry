<div class="col-xs-12 col-sm-12 col-md-10">
	<p style="margin-bottom:10px;">
		<strong style="font-size:18pt;"><span class="fa fa-bomb"></span> Analisa Alternatif</strong>
	</p>
<div class="panel panel-default" id="panelAnalisaKriteria">
<div class="panel-body">
	<?php echo form_open('ahp/analisa_alternatif_tabel')?>
	<div class="row" style="margin-bottom:10px">
	<div class="col-xs-12 col-md-3"><h4 class="modal-title" id="myModalLabelalt">Pilih Kriteria</h4></div>
	<div class="col-xs-12 col-md-7">
		<select class="form-control" id="kriteria" name="kriteria">
			<?php foreach ($dataKriteria as $key => $isi) { ?>
			<option value="<?php echo $isi->id_kriteria ?>"><?php echo $isi->nama_kriteria ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="col-xs-12 col-md-2"><button type="button" id="goButton" class="btn btn-default">GO</button></div>
	</div>
		<div id="append"></div>
		<button type='button' class="btn btn-secondary" data-toggle="modal" data-target="#myModalAlt"><a href="#">View Current Table</a></button>
	</form>

</div>
</div>
</div>

<script>
  $(function(){
  	var base_url = "<?php echo base_url();?>"
  	
  	$('#goButton').on('click',function(){
  		var kriteria = $('#kriteria').val();
	  	$.ajax({
	        type:"POST",
	        url: base_url+"ahp/proses_ajaxAlternatif",
	        data: {kriteria:kriteria},

	        success: function(data){
	          $('#append').empty();
	          var json = jQuery.parseJSON(data);
	          $('#append').append('<div class="row">'+
	          '<div class="col-xs-12 col-md-3">'+
						'<div class="form-group">'+
							'<label>Alternatif Pertama</label>'+
						'</div>'+
					 '</div>'+
					  '<div class="col-xs-12 col-md-6">'+
						'<div class="form-group">'+
							'<label>Pernilaian</label>'+
						'</div>'+
					  '</div>'+
					  '<div class="col-xs-12 col-md-3">'+
						'<div class="form-group">'+
							'<label>Alternatif Kedua</label>'+
						'</div>'+
					  '</div>'+
					'</div>'
					);

	          $.each(json,function(i,item){
	          
			  		$('#append').append('<div class="row" id="row'+i+'">'+
					  '<div class="col-xs-12 col-md-3">'+
					  '<input type="text" name="akID[]" value="'+item.id+'" hidden>'+
						'<div class="form-group" id="formGA1'+i+'" name="'+item.alternatif_pertama.substring(1)+'">'+
							'<input type="text" class="form-control" value="'+item.nama1+'" readonly />'+
							'<input type="text" name="A1[]" id="val" value="'+item.alternatif_pertama+'" hidden />'+
						'</div>'+
					  '</div>'+
					  '<div class="col-xs-12 col-md-6">'+
						'<div class="form-group">'+
							'<select id="selectNilai'+item.alternatif_pertama.substring(1)+item.alternatif_kedua.substring(1)+'" name="selectNilai[]" class="form-control selectNilai">'+
								'<?php foreach ($dataNilai as $dn => $isiN) { ?>'+
								'<option value="<?php echo $isiN->jum_nilai ?>"><?php echo $isiN->jum_nilai." - ".$isiN->ket_nilai ?></option>'+
								'<?php }?>'+
							'</select>'+
						'</div>'+
					 '</div>'+
					  '<div class="col-xs-12 col-md-3">'+
						'<div class="form-group" id="formGA2'+i+'" name="'+item.alternatif_kedua.substring(1)+'"">'+
							'<input type="text" class="form-control" value="'+item.nama2+'" readonly />'+
							'<input type="text" name="A2[]" id="val" value="'+item.alternatif_kedua+'" hidden />'+
						'</div>'+
					  '</div>'+
					'</div>'
					);
					

					if(item.alternatif_kedua.substring(1) < item.alternatif_pertama.substring(1)){
						var n= 1/$("#selectNilai"+item.alternatif_kedua.substring(1)+item.alternatif_pertama.substring(1)+" option").filter(":selected").val();
						if(n.toString().length > 4){
							n = n.toFixed(3);
							if(n==0.111){
								n=0.1;
							}
						}
						$('#selectNilai'+item.alternatif_pertama.substring(1)+item.alternatif_kedua.substring(1)+' option[value="'+n+'"]').attr('selected','selected');
					}else{
						$('#selectNilai'+item.alternatif_pertama.substring(1)+item.alternatif_kedua.substring(1)+' option[value="'+item.nilai_analisa_alternatif.slice(0,5)+'"]').attr('selected','selected');
					}
					
					if($('#formGA1'+i+' #val').val() == $('#formGA2'+i+' #val').val() || $('#formGA1'+i).attr('name') > $('#formGA2'+i).attr('name')){
						$('#row'+i).attr('hidden', 'hidden')
					}
					
	          });

	          $('.selectNilai').on('change', function(){
						var alter = $(this).attr('id').substring(11);
						var alter1 = alter.substring(0,1);
						var alter2 = alter.substring(1,2);
						var n= 1/$(this).val();
						if(n.toString().length > 4){
							n = n.toFixed(3);
							if(n==0.111){
								n=0.1;
							}
						}
					
						$('#selectNilai'+alter2+alter1).find('option:selected').removeAttr('selected');
						$('#selectNilai'+alter2+alter1+' option[value="'+n+'"]').attr('selected','selected');
					})
	          $('#append').append('<button type="submit" name="analyze" class="btn btn-primary"> Analyze <span class="fa fa-arrow-right"></span></button>');
	        },
	        error: function(data){
	        	alert('error');
	        }

	        });

  		});

		

  

  });

  </script>