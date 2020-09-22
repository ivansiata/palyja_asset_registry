 <center><h3><strong><?php echo $_GET['id']?><br>
	<?php echo $detail[0]->nama ?>
</strong></h3>
<button type='button' class='openUpdate' data-toggle="modal" data-target="#myModal" data-id='<?php echo $_GET['id']?>'><i class="fa faedit">View Asset Details</i></button> 
</center>
  <?php echo form_open_multipart('crud/updatedetail2')?>
    <div style="margin-top:4px" id="maincontainer">
           
    </div>
    <br>

     <div class="col-md-7" id="laporanFormAsses">
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Sipil dan Struktur</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Pondasi</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pondasi == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pondasi);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Penurunan</td>
		      		<td><input type="text" value="<?php if($laporan[0]->penurunan == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->penurunan);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Struktur Atas : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Sambungan pondasi-kolom</td>
		      		<td><input type="text" value="<?php if($laporan[0]->sambunganpondasikolom == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->sambunganpondasikolom);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Kolom/tiang/bearing</td>
		      		<td><input type="text" value="<?php if($laporan[0]->kolomtiangbearing == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kolomtiangbearing);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Sambungan kolom - balok</td>
		      		<td><input type="text" value="<?php if($laporan[0]->sambungankolomatas == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->sambungankolomatas);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Balok</td>
		      		<td><input type="text" value="<?php if($laporan[0]->balok == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->balok);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Sambungan balok - pelat</td>
		      		<td><input type="text" value="<?php if($laporan[0]->sambunganbalok == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->sambunganbalok);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Pelat</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pelat == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pelat);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Bracing vertikal</td>
		      		<td><input type="text" value="<?php if($laporan[0]->bracingvertikal == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->bracingvertikal);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Bracing horisontal</td>
		      		<td><input type="text" value="<?php if($laporan[0]->bracinghorizontal == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->bracinghorizontal);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Rangka momen</td>
		      		<td><input type="text" value="<?php if($laporan[0]->rangkamomen == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->rangkamomen);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Dinding Geser</td>
		      		<td><input type="text" value="<?php if($laporan[0]->dindinggeser == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->dindinggeser);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>4.</td>
		      		<td>Lain-lain</td>
		      		<td><input type="text" value="<?php if($laporan[0]->lainlain == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lainlain);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>5.</td>
		      		<td>Struktur Atap : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Sambungan kolom - rangka</td>
		      		<td><input type="text" value="<?php if($laporan[0]->sambungankolomatap == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->sambungankolomatap);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Rangka</td>
		      		<td><input type="text" value="<?php if($laporan[0]->rangka == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->rangka);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Gording</td>
		      		<td><input type="text" value="<?php if($laporan[0]->gording == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->gording);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Koneksi sambungan</td>
		      		<td><input type="text" value="<?php if($laporan[0]->koneksisambungan == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->koneksisambungan);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total1 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori1 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
     
      
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Arsitektur</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Dinding : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Pasangan dinding</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pasangandinding == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pasangandinding);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Plester</td>
		      		<td><input type="text" value="<?php if($laporan[0]->plester == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->plester);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Finishing dinding</td>
		      		<td><input type="text" value="<?php if($laporan[0]->finishingdinding == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->finishingdinding);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Plin</td>
		      		<td><input type="text" value="<?php if($laporan[0]->plin == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->plin);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Jendela : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Kusen jendela</td>
		      		<td><input type="text" value="<?php if($laporan[0]->kusenjendela == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kusenjendela);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Kaca jendela</td>
		      		<td><input type="text" value="<?php if($laporan[0]->kacajendela == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kacajendela);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Aksesoris</td>
		      		<td><input type="text" value="<?php if($laporan[0]->aksesorisjendela == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->aksesorisjendela);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>

		      	<tr>
		      		<td>3.</td>
		      		<td>Pintu : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Kusen pintu</td>
		      		<td><input type="text" value="<?php if($laporan[0]->kusenpintu == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kusenpintu);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Daun pintu</td>
		      		<td><input type="text" value="<?php if($laporan[0]->daunpintu == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->daunpintu);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Aksesoris</td>
		      		<td><input type="text" value="<?php if($laporan[0]->aksesoris == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->aksesoris);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>4.</td>
		      		<td>Lantai : </td>
		      		<td><input type="text" value="<?php if($laporan[0]->lantai == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lantai);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td>5.</td>
		      		<td>Kanopi : </td>
		      		<td><input type="text" value="<?php if($laporan[0]->kanopi == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kanopi);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td>6.</td>
		      		<td>Parapets : </td>
		      		<td><input type="text" value="<?php if($laporan[0]->parapets == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->parapets);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td>7.</td>
		      		<td>Plafon : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Rangka</td>
		      		<td><input type="text" value="<?php if($laporan[0]->rangkaplafon == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->rangkaplafon);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Penutup</td>
		      		<td><input type="text" value="<?php if($laporan[0]->penutupplafon == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->penutupplafon);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Kornis</td>
		      		<td><input type="text" value="<?php if($laporan[0]->kronisplafon == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kronisplafon);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>8.</td>
		      		<td>Atap : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Penutup atap</td>
		      		<td><input type="text" value="<?php if($laporan[0]->penutupatap == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->penutupatap);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Insulasi</td>
		      		<td><input type="text" value="<?php if($laporan[0]->insulasi == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->insulasi);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Lisplank</td>
		      		<td><input type="text" value="<?php if($laporan[0]->lisplank == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lisplank);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>9.</td>
		      		<td>Perkerasan jalan : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Beton</td>
		      		<td><input type="text" value="<?php if($laporan[0]->beton == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->beton);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Aspal</td>
		      		<td><input type="text" value="<?php if($laporan[0]->aspal == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->aspal);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Paving blok</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pavingblock == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pavingblock);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>10.</td>
		      		<td>Partisi : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Rangka partisi</td>
		      		<td><input type="text" value="<?php if($laporan[0]->rangkapartisi == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->rangkapartisi);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Lis atas</td>
		      		<td><input type="text" value="<?php if($laporan[0]->lisatas == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lisatas);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Plin</td>
		      		<td><input type="text" value="<?php if($laporan[0]->plinpartisi == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->plinpartisi);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>11.</td>
		      		<td>Tirai : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Sunshade</td>
		      		<td><input type="text" value="<?php if($laporan[0]->sunshade == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->sunshade);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Blind</td>
		      		<td><input type="text" value="<?php if($laporan[0]->blind == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->blind);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Sticker</td>
		      		<td><input type="text" value="<?php if($laporan[0]->sticker == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->sticker);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>11.</td>
		      		<td>Lainnya : </td>
		      		<td><input type="text" value="<?php if($laporan[0]->lainnya == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lainnya);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      		<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total2 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori2 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
      
      
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Mekanikal</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Generator</td>
		      		<td><input type="text" value="<?php if($laporan[0]->generator == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->generator);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Elevator</td>
		      		<td><input type="text" value="<?php if($laporan[0]->elevator == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->elevator);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Eskalator</td>
		      		<td><input type="text" value="<?php if($laporan[0]->eskalator == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->eskalator);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	
		      	<tr>
		      		<td>4.</td>
		      		<td>Pompa air</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pompaair == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pompaair);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>5.</td>
		      		<td>Lain-lain</td>
		      		<td><input type="text" value="<?php if($laporan[0]->lainlainmekanikal == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lainlainmekanikal);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total3 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori3 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
     
      
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Elektrikal</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Panel listrik : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td>&nbsp1.1</td>
		      		<td>&nbsp Main distribution : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Wiring diagram</td>
		      		<td><input type="text" value="<?php if($laporan[0]->wiringdiagrammain == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->wiringdiagrammain);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Identification Electrical equipment</td>
		      		<td><input type="text" value="<?php if($laporan[0]->identificationelectircalequipmentmain == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->identificationelectircalequipmentmain);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Cover protection</td>
		      		<td><input type="text" value="<?php if($laporan[0]->coverprotectionmain == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->coverprotectionmain);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Wiring cable</td>
		      		<td><input type="text" value="<?php if($laporan[0]->wiringcabelmain == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->wiringcabelmain);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	
		      	<tr>
		      		<td>&nbsp1.2</td>
		      		<td>&nbsp Sub distribution : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Wiring diagram</td>
		      		<td><input type="text" value="<?php if($laporan[0]->wiringdiagramsub == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->wiringdiagramsub);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Identification Electrical equipment</td>
		      		<td><input type="text" value="<?php if($laporan[0]->identificationelectircalequipmentsub == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->identificationelectircalequipmentsub);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Cover protection</td>
		      		<td><input type="text" value="<?php if($laporan[0]->coverprotectionsub == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->coverprotectionsub);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Wiring cable</td>
		      		<td><input type="text" value="<?php if($laporan[0]->wiringcabelsub == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->wiringcabelsub);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>

		      	<tr>
		      		<td>&nbsp 1.3</td>
		      		<td>&nbsp Local distribution : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Wiring diagram</td>
		      		<td><input type="text" value="<?php if($laporan[0]->wiringdiagramlocal == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->wiringdiagramlocal);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Identification Electrical equipment</td>
		      		<td><input type="text" value="<?php if($laporan[0]->identificationelectircalequipmentlocal == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->identificationelectircalequipmentlocal);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Cover protection</td>
		      		<td><input type="text" value="<?php if($laporan[0]->coverprotectionlocal == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->coverprotectionlocal);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp &nbsp Wiring cable</td>
		      		<td><input type="text" value="<?php if($laporan[0]->wiringcabellocal == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->wiringcabellocal);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Instalasi : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Pelindung jalur kabel</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pelindungjalurkabel == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pelindungjalurkabel);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp T-Dos</td>
		      		<td><input type="text" value="<?php if($laporan[0]->tdos == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->tdos);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Rak kabel</td>
		      		<td><input type="text" value="<?php if($laporan[0]->rakkabel == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->rakkabel);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Material Listrik : </td>
		      		<td><input type="text" value="<?php if($laporan[0]->materiallistrik == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->materiallistrik);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Saklar</td>
		      		<td><input type="text" value="<?php if($laporan[0]->saklar == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->saklar);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Stop Kontak</td>
		      		<td><input type="text" value="<?php if($laporan[0]->stopkontak == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->stopkontak);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Stop Kontak AC</td>
		      		<td><input type="text" value="<?php if($laporan[0]->stopkontakac == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->stopkontakac);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>4.</td>
		      		<td>Sistem Grounding : </td>
		      		<td><input type="text" value="<?php if($laporan[0]->sistemgrounding == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->sistemgrounding);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total4 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori4 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
     
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Sistem Pemipaan</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Debit air dan kontinuitas</td>
		      		<td><input type="text" value="<?php if($laporan[0]->debitair == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->debitair);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Pipa air bersih dan sistemnya</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pipaairbersih == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pipaairbersih);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Pipa air bekas dan sistemnya</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pipaairbekas == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pipaairbekas);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	
		      	<tr>
		      		<td>4.</td>
		      		<td>Pipa air kotor dan sistemnya</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pipaairkotor == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pipaairkotor);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>5.</td>
		      		<td>Tanki atas</td>
		      		<td><input type="text" value="<?php if($laporan[0]->tankiatas == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->tankiatas);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td>6.</td>
		      		<td>Tanki bawah</td>
		      		<td><input type="text" value="<?php if($laporan[0]->tankibawah == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->tankibawah);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td>7.</td>
		      		<td>Koneksi sambungan</td>
		      		<td><input type="text" value="<?php if($laporan[0]->koneksisambunganpemipaan == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->koneksisambunganpemipaan);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td>8.</td>
		      		<td>Vent pipe</td>
		      		<td><input type="text" value="<?php if($laporan[0]->ventpipe == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->ventpipe);} ?>"  class="form-control" disabled></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total5 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori5 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
     
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Sistem Sanitasi</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Pengolahan air limbah</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pengolahanairlimbah == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pengolahanairlimbah);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Septic tank</td>
		      		<td><input type="text" value="<?php if($laporan[0]->septictank == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->septictank);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Peralatan sanitari: </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Closet</td>
		      		<td><input type="text" value="<?php if($laporan[0]->closet == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->closet);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Urinal</td>
		      		<td><input type="text" value="<?php if($laporan[0]->urinal == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->urinal);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Wastafel</td>
		      		<td><input type="text" value="<?php if($laporan[0]->wastafel == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->wastafel);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Kitchen sink</td>
		      		<td><input type="text" value="<?php if($laporan[0]->kitchensink == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kitchensink);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Shower</td>
		      		<td><input type="text" value="<?php if($laporan[0]->shower == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->shower);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Valve</td>
		      		<td><input type="text" value="<?php if($laporan[0]->valve == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->valve);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total6 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori6 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
     
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Sistem Drainase</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Lay-out</td>
		      		<td><input type="text" value="<?php if($laporan[0]->layout == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->layout);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Prorositas tanah</td>
		      		<td><input type="text" value="<?php if($laporan[0]->porositastanah == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->porositastanah);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Sumur poros</td>
		      		<td><input type="text" value="<?php if($laporan[0]->sumurporos == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->sumurporos);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>4.</td>
		      		<td>Saluran terbuka</td>
		      		<td><input type="text" value="<?php if($laporan[0]->saluranterbuka == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->saluranterbuka);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>5.</td>
		      		<td>Saluran pengurasan</td>
		      		<td><input type="text" value="<?php if($laporan[0]->saluranpengurasan == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->saluranpengurasan);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>6.</td>
		      		<td>Saluran tertutup</td>
		      		<td><input type="text" value="<?php if($laporan[0]->salurantertutup == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->salurantertutup);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>7.</td>
		      		<td>Kemiringan saluran</td>
		      		<td><input type="text" value="<?php if($laporan[0]->kemiringansaluran == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kemiringansaluran);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>8.</td>
		      		<td>Perangkap lemak</td>
		      		<td><input type="text" value="<?php if($laporan[0]->perangkaplemak == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->perangkaplemak);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>9.</td>
		      		<td>Manhole</td>
		      		<td><input type="text" value="<?php if($laporan[0]->manhole == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->manhole);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>10.</td>
		      		<td>Lubang masuk tepi</td>
		      		<td><input type="text" value="<?php if($laporan[0]->lubangtepi == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lubangtepi);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>11.</td>
		      		<td>Pipa vertikal</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pipavertikalatap == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pipavertikalatap);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>12.</td>
		      		<td>Talang atap</td>
		      		<td><input type="text" value="<?php if($laporan[0]->talangatap == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->talangatap);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total7 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori7 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
      
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Air Conditioning</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Unit indoor</td>
		      		<td><input type="text" value="<?php if($laporan[0]->unitindoor == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->unitindoor);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Unit outdoor</td>
		      		<td><input type="text" value="<?php if($laporan[0]->unitoutdoor == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->unitoutdoor);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Pipa refrigerant</td>
		      		<td><input type="text" value="<?php if($laporan[0]->piparefrigerant == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->piparefrigerant);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>4.</td>
		      		<td>Pipa drainase</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pipadrainese == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pipadrainese);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>5.</td>
		      		<td>Remote control</td>
		      		<td><input type="text" value="<?php if($laporan[0]->remotecontrol == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->remotecontrol);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>6.</td>
		      		<td>Kinerja suhu ruangan</td>
		      		<td><input type="text" value="<?php if($laporan[0]->kinerjasuhuruangan == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kinerjasuhuruangan);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total8 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori8 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
     
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Proteksi Petir</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Terminal udara / perangkat pemutus hantaran</td>
		      		<td><input type="text" value="<?php if($laporan[0]->lightningrod == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lightningrod);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Down conductor : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Konduktor</td>
		      		<td><input type="text" value="<?php if($laporan[0]->konduktor == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->konduktor);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Koneksi atas</td>
		      		<td><input type="text" value="<?php if($laporan[0]->koneksiatap == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->koneksiatap);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Koneksi dinding</td>
		      		<td><input type="text" value="<?php if($laporan[0]->koneksidinding == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->koneksidinding);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Sistem pembumian: </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Ground rod</td>
		      		<td><input type="text" value="<?php if($laporan[0]->groundrod == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->groundrod);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Sumur inspeksi</td>
		      		<td><input type="text" value="<?php if($laporan[0]->sumurinspeksi == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->sumurinspeksi);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total9 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori9 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
      
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Lampu Penerangan</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Rumah lampu</td>
		      		<td><input type="text" value="<?php if($laporan[0]->rumahlampu == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->rumahlampu);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Lampu</td>
		      		<td><input type="text" value="<?php if($laporan[0]->lampu == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lampu);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Pencahayaan</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pencahayaan == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pencahayaan);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total10 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori10 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
      
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Proteksi Kebakaran</center></legend>
         <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Sistem deteksi : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Asap</td>
		      		<td><input type="text" value="<?php if($laporan[0]->asap == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->asap);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Panas</td>
		      		<td><input type="text" value="<?php if($laporan[0]->panas == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->panas);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Panel alarm</td>
		      		<td><input type="text" value="<?php if($laporan[0]->panelalarm == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->panelalarm);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Full station</td>
		      		<td><input type="text" value="<?php if($laporan[0]->fullstation == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->fullstation);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Kabel</td>
		      		<td><input type="text" value="<?php if($laporan[0]->kabel == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->kabel);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Fire extinguisher</td>
		      		<td><input type="text" value="<?php if($laporan[0]->fireextinguisher == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->fireextinguisher);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Fire hydrant</td>
		      		<td><input type="text" value="<?php if($laporan[0]->firehydrant == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->firehydrant);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Rencana keselamatan</td>
		      		<td><input type="text" value="<?php if($laporan[0]->safetyplan == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->safetyplan);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Jalur evakuasi : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Koridor</td>
		      		<td><input type="text" value="<?php if($laporan[0]->koridor == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->koridor);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Pintu keluar</td>
		      		<td><input type="text" value="<?php if($laporan[0]->pintukeluar == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->pintukeluar);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Titik berkumpul</td>
		      		<td><input type="text" value="<?php if($laporan[0]->titikberkumpul == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->titikberkumpul);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Assembly point</td>
		      		<td><input type="text" value="<?php if($laporan[0]->assemblypoint == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->assemblypoint);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Petunjuk bercahaya : </td>
		      		<td></td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Petunjuk keluar</td>
		      		<td><input type="text" value="<?php if($laporan[0]->petunjukkeluar == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->petunjukkeluar);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Lampu darurat</td>
		      		<td><input type="text" value="<?php if($laporan[0]->lampudarurat == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->lampudarurat);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Diagram evakuasi</td>
		      		<td><input type="text" value="<?php if($laporan[0]->diagramevakuasi == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->diagramevakuasi);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td>&nbsp Peralatan & perlengkapan keselamatan korban</td>
		      		<td><input type="text" value="<?php if($laporan[0]->peralatankeselamatan == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->peralatankeselamatan);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total11 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori11 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
      
        <fieldset style="border: 2px solid #ddd; padding:0px;">
         <legend style="width:30%; border-color:white; margin-left:10px;"><center>Tangga</center></legend>
        <div style="width:100%">
         <table style=" width:80%; margin:auto">
         	<thead>
		  		<th style="text-align:left">No</th>
		  		<th style="text-align:center">Categories</th>
		  		<th style="text-align:center">Grade</th>
		  	</thead>
		  	<tbody>
		      	<tr>
		      		<td>1.</td>
		      		<td>Struktur</td>
		      		<td><input type="text" value="<?php if($laporan[0]->struktur == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->struktur);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>2.</td>
		      		<td>Hand rail</td>
		      		<td><input type="text" value="<?php if($laporan[0]->handrail == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->handrail);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>3.</td>
		      		<td>Anak tangga</td>
		      		<td><input type="text" value="<?php if($laporan[0]->anaktangga == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->anaktangga);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>4.</td>
		      		<td>Perlakuan anti-slip</td>
		      		<td><input type="text" value="<?php if($laporan[0]->antislip == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->antislip);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>5.</td>
		      		<td>Sudut tangga</td>
		      		<td><input type="text" value="<?php if($laporan[0]->suduttangga == 0){echo '--';}else{$obj = $myClass->proses_ajaxrefnilai($laporan[0]->suduttangga);} ?>"  class="form-control" disabled>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td><strong>Jumlah Kategori</strong></td>
		      		<td><label><?php echo $laporan[0]->total12 ?></label> &nbsp of &nbsp <label><?php echo $laporan[0]->kategori12 ?></label></td>
		      	</tr>
		      	</tbody>
		    </table>
        </div>
        </fieldset>
      </div>

      <div class="col-md-5" id="laporan">
      	<table class="table table-bordered" id="tableHasilAssess" width="499px">
      		<tr>
	      		<th>
	      			<center><h4>Hasil Keseluruhan</h4></center>
	      		</th>
      		</tr>
      		<tr>
      			<td>
      				<div class="col-md-6">
      					<center><h5>Hasil</h5>
      					<div style="border:1px solid #ddd; width:30%; padding:10px"><center>
      					<?php echo $laporan[0]->total1 +
      					$laporan[0]->total2 + $laporan[0]->total3 + $laporan[0]->total4 + $laporan[0]->total5 + $laporan[0]->total6 +
      					$laporan[0]->total7 + $laporan[0]->total8 + $laporan[0]->total9 + $laporan[0]->total10 + $laporan[0]->total11 + 
      					$laporan[0]->total12
      					?>
      					</center></div>
      					dari
      					<div style="border:1px solid #ddd; width:30%; padding:10px"><center>
      					<?php echo $laporan[0]->kategori1 +
      					$laporan[0]->kategori2 + $laporan[0]->kategori3 + $laporan[0]->kategori4 + $laporan[0]->kategori5 + $laporan[0]->kategori6 +
      					$laporan[0]->kategori7 + $laporan[0]->kategori8 + $laporan[0]->kategori9 + $laporan[0]->kategori10 + $laporan[0]->kategori11 + 
      					$laporan[0]->kategori12
      					?>
      					</center></div>
      					<br>
      					<div style="border:1px solid #ddd; width:30%; padding:10px"><center>
      					<?php
      					$a = 
      					($laporan[0]->total1 +
      					$laporan[0]->total2 + $laporan[0]->total3 + $laporan[0]->total4 + $laporan[0]->total5 + $laporan[0]->total6 +
      					$laporan[0]->total7 + $laporan[0]->total8 + $laporan[0]->total9 + $laporan[0]->total10 + $laporan[0]->total11 + 
      					$laporan[0]->total12);
      					$b =
      					($laporan[0]->kategori1 +
      					$laporan[0]->kategori2 + $laporan[0]->kategori3 + $laporan[0]->kategori4 + $laporan[0]->kategori5 + $laporan[0]->kategori6 +
      					$laporan[0]->kategori7 + $laporan[0]->kategori8 + $laporan[0]->kategori9 + $laporan[0]->kategori10 + $laporan[0]->kategori11 + 
      					$laporan[0]->kategori12);
      					if($a != 0 && $b != 0){
      					$c = round($a/$b, 2) *100;
      					}else{
      					$c = 0;
      					}
      					echo $c."%";
      					?>
      					</center></div>
      					</center>
      				</div>
      				<div class="col-md-6">
      					<center><h5>Category</h5></center>
      					<div>
      					<ul class="chart-legend clearfix" id="legendReport">  
		                    <li>
		                    	<label class="btn btn-success <?php if($c >= 81){echo "active";}?>">
		                    		<span class="glyphicon glyphicon-ok"></span>
		                    	</label>
		                    	&nbsp Sangat Bagus
		                    	&nbsp(81%-100%)
		                	</li>
		                    <li>
		                    	<label class="btn btn-info <?php if($c >= 61 && $c <= 80){echo "active";}?>">
		                    		<span class="glyphicon glyphicon-ok"></span>
		                    	</label>
		                    	&nbsp Bagus
		                    	&nbsp(61%-80%)
		                	</li>
		                	<li>
		                    	<label class="btn btn-warning <?php if($c >= 41 && $c <= 60){echo "active";}?>">
		                    		<span class="glyphicon glyphicon-ok"></span>
		                    	</label>
		                    	&nbsp Cukup
		                    	&nbsp(41%-60%)
		                	</li>
		                	<li>
		                    	<label class="btn btn-danger <?php if($c >= 21 && $c <= 40){echo "active";}?>">
		                    		<span class="glyphicon glyphicon-ok"></span>
		                    	</label>
		                    	&nbsp Buruk
		                    	&nbsp(21%-40%)

		                	</li>
		                	<li>
		                    	<label class="btn btn-primary <?php if($c <= 20){echo "active";}?>">
		                    		<span class="glyphicon glyphicon-ok"></span>
		                    	</label>
		                    	&nbsp Sangat Buruk
		                    	&nbsp(0%-20%)
		                	</li>               
		                </ul>
		                </div>
      				</div>
      			</td>
      		</tr>
      	</table>
      </div>
      <!-- <div id="info" class="collapse" style="position:fixed; right:30px; bottom:40px; background-color:aqua; box-shadow: 0px 0px 1px 1px aqua; border-radius:2px; padding:4px">
      	1 = Rusak/tidak dapat diterima<br>
      	2 = <br>
      	3 = <br>
      	4 = <br>
      	5 =
      </div>
      <button class="btn btn-info" type="button" data-target="#info" data-toggle="collapse" style="position:fixed; right:15px; bottom:4px;">INFO</button>
	-->

	<div class="panel-group" style="position:fixed; right:15px; bottom:4px;">
		<div class="panel panel-default">
		<div id="collapse1" class="panel-collapse collapse">
			<div class="panel-heading" style="text-align:center; background-color:aqua">
			<h4 class="panel-title">
				Instructions
			</h4>
			</div>
			<div class="panel-body" style="height:100%;">
			<table class="table table-bordered" id="tableInfo">
				<tr>
					<th>Keterangan</th>
					<th>Kerusakan</th>
				</tr>
				<tr>
					<td>1 = Rusak / tidak dapat diterima</td>
					<td>81-100%</td>
				</tr>
				<tr>
					<td>2 = Major / bangun kembali</td>
					<td>61-80%</td>
				</tr>
				<tr>
					<td>3 = Minor / restorasi, pemugaran, rehabilitasi</td>
					<td>41-60%</td>
				</tr>
				<tr>
					<td>4 = Affected</td>
					<td>21-40%</td>
				</tr>
				<tr>
					<td>5 = None / tidak ada</td>
					<td> 0-20%</td>
				</tr>
			</table>
			</div>
		</div> 
		<div class="panel-footer" style="text-align:right; background-color:aqua" data-toggle="collapse" href="#collapse1">
			<a data-toggle="collapse" href="#collapse1" style="color:black">INFO</a>
		</div>
		</div>
	</div>

    </form>
    
   <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">

     <script>
     $(function(){
     	var elementPosition = $('#laporan').offset();

     	$(window).scroll(function(){
     		if($(window).scrollTop() > elementPosition.top){
     			$('#laporan').css({'position':'fixed', 'right':'3%', 'top':'10%', 'width':'528px'});
     		}else{
     			$('#laporan').css('position','static')
     		}

     	})
     });
     </script>

  </html>

