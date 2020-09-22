<div class="col-xs-12 col-sm-12 col-md-10">
	<p style="margin-bottom:10px;">
		<strong style="font-size:18pt;"><span class="fa fa-bomb"></span> Analisa Kriteria</strong>
	</p>
<div class="panel panel-default" id="panelAnalisaKriteria">
<div class="panel-body">
	
	    <?php echo form_open('ahp/analisa_kriteria_tabel')?>
			<div class="row">
			  <div class="col-xs-12 col-md-3">
				<div class="form-group">
					<label>Kriteria Pertama</label>
				</div>
			  </div>
			  <div class="col-xs-12 col-md-6">
				<div class="form-group">
					<label>Pernilaian</label>
				</div>
			  </div>
			  <div class="col-xs-12 col-md-3">
				<div class="form-group">
					<label>Kriteria Kedua</label>
				</div>
			  </div>
			</div>
			<?php foreach($analisaKriteria as $ak=>$isi){ ?>
			<div class="row" id="row<?php echo $ak ?>">
			  <div class="col-xs-12 col-md-3">
			  	<input type="text" name="akID[]" value="<?php echo $isi->id ?>" hidden>
				<div class="form-group" id="formGK1<?php echo $ak?>" name="<?php echo $isi->kriteria_pertama ?>">
					<input type="text" class="form-control" value="<?php echo $isi->nama1 ?>" readonly />
					<input type="text" name="C1[]" id="val" value="<?php echo $isi->kriteria_pertama ?>" hidden>
				</div>
			  </div>
			  <div class="col-xs-12 col-md-6">
				<div class="form-group">
					<select class="form-control selectNilai" name="nilai[]" id="selectNilai<?php echo substr($isi->kriteria_pertama, 1); echo substr($isi->kriteria_kedua, 1)?>">
						<?php foreach ($dataNilai as $dn => $isiN) { ?>
						<option value="<?php echo $isiN->jum_nilai ?>"><?php echo $isiN->jum_nilai." - ".$isiN->ket_nilai ?></option>
						<?php }?>
					</select>
				</div>
			  </div>
			  <div class="col-xs-12 col-md-3">
				<div class="form-group" id="formGK2<?php echo $ak?>" name="<?php echo $isi->kriteria_kedua ?>">
					<input type="text" class="form-control" value="<?php echo $isi->nama2 ?>" readonly />
					<input type="text" name="C2[]" id="val" value="<?php echo $isi->kriteria_kedua ?>" hidden>
				</div>
			  </div>
			</div>
			<?php } ?>
			<button type="submit" name="analyze" class="btn btn-primary"> Analyze <span class="fa fa-arrow-right"></span></button>
			<button type ="button" name="subankr" class="btn btn-secondary" onclick="location.href='<?php echo base_url()?>ahp/analisa_kriteria_tabel'">View Current Table</button>
		</form>

</div>
</div>
</div>

<script>
  $(function(){
  	var base_url = "<?php echo base_url();?>"
  	var po2 = "haha";

  	$.ajax({
            type:"POST",
            url: base_url+"ahp/proses_ajaxKriteria",
            data: {},
    
            success: function(data){
              var json = jQuery.parseJSON(data);
              $.each(json,function(i,item){

              	if(item.kriteria_kedua.substring(1) < item.kriteria_pertama.substring(1)){
						var n= 1/$("#selectNilai"+item.kriteria_kedua.substring(1)+item.kriteria_pertama.substring(1)+" option").filter(":selected").val();
						if(n.toString().length > 4){
							n = n.toFixed(3);
							if(n==0.111){
								n=0.1;
							}
						}
						$('#selectNilai'+item.kriteria_pertama.substring(1)+item.kriteria_kedua.substring(1)+' option[value="'+n+'"]').attr('selected','selected');
					}else{
						$('#selectNilai'+item.kriteria_pertama.substring(1)+item.kriteria_kedua.substring(1)+' option[value="'+item.nilai_analisa_kriteria.slice(0,5)+'"]').attr('selected','selected');
					}
					
					if($('#formGK1'+i+' #val').val() == $('#formGK2'+i+' #val').val() || $('#formGK1'+i).attr('name') > $('#formGK2'+i).attr('name')){
						$('#row'+i).attr('hidden', 'hidden');
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
						
						// alert(n);
						$('#selectNilai'+alter2+alter1).find('option:selected').removeAttr('selected');
						$('#selectNilai'+alter2+alter1+' option[value="'+n+'"]').attr('selected','selected');
					})
            },
            error: function(data){
            	alert('error');
            }

        });

  });

  </script>