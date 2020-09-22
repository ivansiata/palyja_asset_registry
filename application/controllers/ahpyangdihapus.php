$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataNilai' => $this->m_ahp->get_dataNilai()->result(),
				'dataKriteria' => $this->m_ahp->get_dataKriteria()->result(),
				'dataAlternatif' => $this->m_ahp->get_dataAlternatif()->result(),
				'dataAlternatifSipil' => $this->m_ahp->get_dataAlternatifCategory('ahp_analisa_alternatif_sipil')->result(),
				'dataAlternatifArsitektur' => $this->m_ahp->get_dataAlternatifCategory('ahp_analisa_alternatif_arsitektur')->result(),
				'dataAlternatifMekanikal' => $this->m_ahp->get_dataAlternatifCategory('ahp_analisa_alternatif_mekanikal')->result(),
				'dataAlternatifElektrikal' => $this->m_ahp->get_dataAlternatifCategory('ahp_analisa_alternatif_elektrikal')->result(),
				'dataAlternatifPemipaan' => $this->m_ahp->get_dataAlternatifCategory('ahp_analisa_alternatif_pemipaan')->result(),
			);


<td style="padding:0; border:none">
          <table class="table table-striped table-bordered">
          <?php foreach ($dataAlternatifArsitektur as $key => $isi) { ?>
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
          <?php foreach ($dataAlternatifSipil as $key => $isi) { ?>
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
          <?php foreach ($dataAlternatifSipil as $key => $isi) { ?>
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
          <table class="table table-striped table-bordered" style="margin:0">
          <?php foreach ($dataAlternatifSipil as $key => $isi) { ?>
             <tr>
              <td><?php echo $isi->nama_alternatif ?></td>
            </tr>
            <tr>
              <td><?php echo $isi->prioritas_subkriteria ?></td>
            </tr>
          <?php } ?>
          </table>
        </td>


        if($b == 'C1'){
			$this->m_ahp->update($where, $data, 'ahp_analisa_alternatif_sipil');
		}elseif ($b == 'C2') {
			$this->m_ahp->update($where, $data, 'ahp_analisa_alternatif_arsitektur');
		}elseif ($b == 'C3') {
			$this->m_ahp->update($where, $data, 'ahp_analisa_alternatif_mekanikal');
		}elseif ($b == 'C4') {
			$this->m_ahp->update($where, $data, 'ahp_analisa_alternatif_elektrikal');
		}elseif ($b == 'C5') {
			$this->m_ahp->update($where, $data, 'ahp_analisa_alternatif_pemipaan');
		}

		$where = array(
			'alternatif' => $a,
		);


		public function update_table_analisaAlternatifJumlah($a,$b, $c){
		$alternatif =  $this->m_ahp->get_analisaAlternatifJumlaha1($a, $c)->result();
		$data = array(
			'jumlah_alternatif_pertama' => $alternatif[0]->jumlah,
		);
		$where = array(
			'id_alternatif' => $a,
			'id_kriteria' => $c
		);
		$this->m_ahp->update($where, $data, 'ahp_jum_alt_kri');

		$data = array(
			'jumlah' => $alternatif[0]->jumlah,
		);
		$where = array(
			'alternatif' => $a,
		);
	
	}
	
	public function update_table_skorAvg($a, $b){
		$avgAlternatif =  $this->m_ahp->get_AnalisaAlternatifSkorPrio($a, $b)->result();
		$data = array(
			'skor_avg' => $avgAlternatif[0]->average,
		);
		$where = array(
			'id_alternatif' => $a,
			'id_kriteria' => $b
		);
		$this->m_ahp->update($where, $data, 'ahp_jum_alt_kri');

		$avgAlternatif =  $this->m_ahp->get_AnalisaAlternatifSkorPrio($a, $b)->result();
		$data = array(
			'prioritas' => $avgAlternatif[0]->average,
		);
		$where = array(
			'alternatif' => $a,
		);
		
	}

	$update = $myClass->update_table_analisaAlternatifJumlah($isi->id_alternatif, $isi2->id_alternatif, $kriteria);

	$update = $myClass->update_table_skorAvg($isi->id_alternatif, $kriteria);

	function get_hasilAHP(){
		return $this->db->query("SELECT ah.*, ba.*, rc.category AS cat1, rc2.category AS cat2, rc3.category AS cat3, rc4.category AS cat4, rc5.category AS cat5  
			FROM ahp_analisa_hasil ah JOIN building_assessment ba ON ah.id_building = ba.id 
			LEFT JOIN ref_categoryCriticality rc ON rc.id = ba.`sipil&struktur`
			LEFT JOIN ref_categoryCriticality rc2 ON rc2.id = ba.arsitektur
			LEFT JOIN ref_categoryCriticality rc3 ON rc3.id = ba.mekanikal
			LEFT JOIN ref_categoryCriticality rc4 ON rc4.id = ba.elektrikal
			LEFT JOIN ref_categoryCriticality rc5 ON rc5.id = ba.sistempemipaan 
			ORDER BY ah.total DESC");
	}