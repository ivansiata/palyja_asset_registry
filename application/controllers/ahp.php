<?php

class Ahp extends CI_Controller{

	function __construct(){
	parent::__construct();
		$this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
		$this->load->model('m_ahp');
		$this->load->library('form_validation', 'pagination');
		$this->load->helper(array('form', 'url', 'download'));

		if($this->session->userdata('status') != "login"){
			redirect("login/");
		}

		if($this->session->userdata('role') != "manager" && $this->session->userdata('role') != "admin"){
			redirect("login/logout");
		}

	}

	public function index(){
		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataNilai' => $this->m_ahp->get_dataNilai()->result(),
				'dataKriteria' => $this->m_ahp->get_dataKriteria()->result(),
				'dataAlternatif' => $this->m_ahp->get_dataAlternatif()->result(),
				'dataAlternatifHasil1' => $this->m_ahp->get_dataAlternatifCategory('ahp_data_subkriteria', 'C1')->result(),
				'dataAlternatifHasil2' => $this->m_ahp->get_dataAlternatifCategory('ahp_data_subkriteria', 'C2')->result(),
				'dataAlternatifHasil3' => $this->m_ahp->get_dataAlternatifCategory('ahp_data_subkriteria', 'C3')->result(),
				'dataAlternatifHasil4' => $this->m_ahp->get_dataAlternatifCategory('ahp_data_subkriteria', 'C4')->result(),
				'dataAlternatifHasil5' => $this->m_ahp->get_dataAlternatifCategory('ahp_data_subkriteria', 'C5')->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_ahp', $data);
		$this->load->view('v_footer');
	}

	public function nilai(){
		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataNilai' => $this->m_ahp->get_dataNilai()->result(),
			);


		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_ahpNilai', $data);
		$this->load->view('v_footer');
	}

	public function nilaiUbah(){
		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataNilai' => $this->m_ahp->get_dataNilai()->result(),
			);


		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_ahpNilaiUbah', $data);
		$this->load->view('v_footer');
	}

	public function prosesAjaxdataUbahNilai(){
		$updateID = $_REQUEST['updateID'];

		$query = $this->m_ahp->get_dataUbahNilai($updateID)->result();
		echo json_encode($query);
	}

	public function kriteria(){
		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataKriteria' => $this->m_ahp->get_dataKriteria()->result(),
			);


		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_ahpKriteria', $data);
		$this->load->view('v_footer');
	}

	public function prosesAjaxdataUbahKriteria(){
		$updateID = $_REQUEST['updateID'];

		$query = $this->m_ahp->get_dataUbahKriteria($updateID)->result();
		echo json_encode($query);
	}

	public function alternatif(){
		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataAlternatif' => $this->m_ahp->get_dataAlternatif()->result(),
			);


		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_ahpAlternatif', $data);
		$this->load->view('v_footer');
	}

	public function prosesAjaxdataUbahAlternatif(){
		$updateID = $_REQUEST['updateID'];

		$query = $this->m_ahp->get_dataUbahAlternatif($updateID)->result();
		echo json_encode($query);
	}

	// kriteria

	public function analisa_kriteria(){
		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataNilai' => $this->m_ahp->get_dataNilai()->result(),
				'analisaKriteria' => $this->m_ahp->get_analisaKriteria()->result(),
			);


		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_analisaKriteria', $data);
		$this->load->view('v_footer');
	}

	public function proses_ajaxKriteria(){
		$kriteria =  $this->m_ahp->get_analisaKriteria()->result();
		
		echo json_encode($kriteria);
	}

	public function analisa_kriteria_tabel(){
		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataNilai' => $this->m_ahp->get_dataNilai()->result(),
				'dataKriteria' => $this->m_ahp->get_dataKriteria()->result(),
				'analisaKriteria' => $this->m_ahp->get_analisaKriteria()->result(),
				'myClass' =>  $this,
			);

		$result = array();

		if(isset($_POST['analyze'])){
			$ai = $_POST['akID'];
			foreach ($ai as $key => $val) {
				
				$result[] = array(
					"id" => $_POST['akID'][$key],
					"kriteria_pertama" => $_POST['C1'][$key],
					"nilai_analisa_kriteria" => $_POST['nilai'][$key],
					"kriteria_kedua" => $_POST['C2'][$key],
					);
				
			}

			$this->db->update_batch('ahp_analisa_kriteria', $result, 'id');

		}


		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_analisaKriteriaTabel', $data);
		$this->load->view('v_footer');
		
	}

	public function proses_ajaxAnalisaKriteria($a, $b){

		$kriteria =  $this->m_ahp->get_dataAnalisaKriteria($a,$b);
		$lol = $kriteria->result();
		
		echo number_format($lol[0]->nilai_analisa_kriteria, 3, '.', ',');
	}

	public function proses_ajaxJumlahKriteria($a){
		$jumlahKriteria =  $this->m_ahp->get_jumlahAnalisaKriteria($a);
		$lol = $jumlahKriteria->result();

		echo number_format($lol[0]->jumlah, 3, '.', ',');
	}

	public function proses_ajaxAnalisaKriteriaPerbandingan($a, $b, $c){

		$kriteria =  $this->m_ahp->get_dataAnalisaKriteria($a,$b);
		$lol = $kriteria->result();
		
		echo number_format($lol[0]->hasil_analisa_kriteria, 3, '.', ',');
	}

	public function proses_ajaxJumlahKriteriaPerbandingan($a){
		$jumlahKriteria =  $this->m_ahp->get_jumlahAnalisaKriteriaPerbandingan($a);
		$lol = $jumlahKriteria->result();

		echo number_format($lol[0]->jumlah, 3, '.', ',');
	}

	public function proses_ajaxJumlahKriteriaPerbandingan2($a){
		$jumlahKriteria =  $this->m_ahp->get_jumlahAnalisaKriteriaPerbandingan2($a);
		$lol = $jumlahKriteria->result();

		echo number_format($lol[0]->jumlah, 3, '.', ',');
	}

	public function proses_ajaxBobotKriteriaPerbandingan2($a){
		$jumlahKriteria =  $this->m_ahp->get_jumlahAnalisaKriteriaPerbandingan2($a);
		$count = $this->m_ahp->count_kriteria()->result();
		$lol = $jumlahKriteria->result();

		echo number_format($lol[0]->jumlah / $count[0]->jumlah, 3, '.', ',');
	}




	// alternatif

	public function analisa_alternatif(){
		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataNilai' => $this->m_ahp->get_dataNilai()->result(),
				'dataKriteria' => $this->m_ahp->get_dataKriteria()->result(),
			);


		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_analisaAlternatif', $data);
		$this->load->view('v_modalAlt', $data);
		$this->load->view('v_footer');
		
	}

	public function proses_ajaxAlternatif(){
		$kriteria = $_REQUEST['kriteria'];
		$alternatif =  $this->m_ahp->get_analisaAlternatif($kriteria)->result();
		
		echo json_encode($alternatif);
	}

	public function analisa_alternatif_tabel(){
		$kriteria = $_REQUEST['kriteria'];

		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataNilai' => $this->m_ahp->get_dataNilai()->result(),
				'dataKriteriaAlernatif' => $this->m_ahp->get_dataKriteriaAlternatif($kriteria)->result(),
				'analisaAlternatif' =>  $this->m_ahp->get_analisaAlternatif($kriteria)->result(),
				'dataAlternatif' => $this->m_ahp->get_dataAlternatif()->result(),
				'jumAltKri' => $this->m_ahp->get_jumAltKri($kriteria)->result(),
				'kriteria' => $kriteria,
				'myClass' =>  $this,
			);

		$result = array();

		if(isset($_POST['analyze'])){
			$ai = $_POST['akID'];
			foreach ($ai as $key => $val) {
				
				$result[] = array(
					"id" => $_POST['akID'][$key],
					"alternatif_pertama" => $_POST['A1'][$key],
					"nilai_analisa_alternatif" => $_POST['selectNilai'][$key],
					"alternatif_kedua" => $_POST['A2'][$key],
					);
				
			}

			$this->db->update_batch('ahp_analisa_alternatif', $result, 'id');

		}

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_analisaAlternatifTabel', $data);
		$this->load->view('v_footer');

	}

	public function proses_ajaxAnalisaAlternatif($a, $b){
		$kriteria = $_REQUEST['kriteria'];

		$alternatif =  $this->m_ahp->get_dataAnalisaAlternatif($a,$b, $kriteria);
		$lol = $alternatif->result();
		
		echo number_format($lol[0]->nilai_analisa_alternatif, 3, '.', ',');
	}

	public function proses_ajaxAnalisaAlternatifJumlah($a, $b, $c){
	
		$alternatif =  $this->m_ahp->get_analisaAlternatifJumlaha1($a, $c)->result();
		
		echo number_format($alternatif[0]->jumlah, 3, '.', ',');
	}

	public function proses_ajaxAnalisaAlternatifPrioritas($a, $b, $c){
		$alternatif =  $this->m_ahp->get_analisaAlternatifJumlaha1($a, $c)->result();
		$jumlahKri = $this->m_ahp->count_kriteria()->result();

		echo number_format($alternatif[0]->jumlah / $jumlahKri[0]->jumlah, 3, '.', ',');
	}

	public function proses_ajaxAnalisaAlternatifPrioSub($a, $b, $c){
		$alternatif =  $this->m_ahp->get_analisaAlternatifSkorPrio($a, $c)->result();
		$max = $this->m_ahp->get_max_skor($c)->result();

		echo number_format($alternatif[0]->average / $max[0]->maxim, 3, '.', ',');
	}

	public function proses_ajaxJumlahAlternatif($a){
		$kriteria = $_REQUEST['kriteria'];
		$jumlahAlternatif =  $this->m_ahp->get_jumlahAnalisaAlternatif($a, $kriteria);
		$lol = $jumlahAlternatif->result();

		echo number_format($lol[0]->jumlah, 3, '.', ',');
	}

	public function proses_ajaxAnalisaAlternatifPerbandingan($a, $b, $c){
		$kriteria = $_REQUEST['kriteria'];
		$sum = $this->m_ahp->get_jumlahAnalisaAlternatif($b, $c)->result();

		$perbandinganAlternatif =  $this->m_ahp->get_dataAnalisaAlternatif($a,$b,$kriteria );
		$lol = $perbandinganAlternatif->result();
		
		echo number_format($lol[0]->nilai_analisa_alternatif/$sum[0]->jumlah, 3, '.', ',');
	}

	public function proses_ajaxJumlahAlternatifPerbandingan($a){
		$kriteria = $_REQUEST['kriteria'];
		$jumlahAlternatif =  $this->m_ahp->get_jumlahAnalisaAlternatifPerbandingan($a, $kriteria);
		$lol = $jumlahAlternatif->result();

		echo number_format($lol[0]->jumlah, 3, '.', ',');
	}

	public function proses_ajaxAnalisaAlternatifSkorAvg($a){
		$avgAlternatif =  $this->m_ahp->get_AnalisaAlternatifSkor($a);
		$lol = $avgAlternatif->result();

		echo number_format($lol[0]->average, 3, '.', ',');
	}

	public function proses_ajaxJumlahSkorPerbandingan($a){
		$sumSkor =  $this->m_ahp->get_AnalisaAlternatifSumSkor($a);
		$lol = $sumSkor->result();

		echo number_format($lol[0]->jumlah, 3, '.', ',');
	}

	// rangking

	public function rangking(){
		$data = array(
				'hasilAkhir' => $this->m_ahp->get_AHP()->result(),
				'dataNilai' => $this->m_ahp->get_dataNilai()->result(),
				'dataKriteria' => $this->m_ahp->get_dataKriteria()->result(),
				'rowCount' => $this->m_ahp->get_dataKriteria()->num_rows(),
				'dataAlternatif' => $this->m_ahp->get_dataAlternatif()->result(),
				'analisaKriteria' => $this->m_ahp->get_analisaKriteria()->result(),
				'jumlahHasil' => $this->m_ahp->get_jumlahHasil()->result(),
				'myClass' =>  $this,
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_sidebarahp');
		$this->load->view('v_modalIndex');
		$this->load->view('v_rangking', $data);
		$this->load->view('v_footer');
	}

	public function proses_ajaxDataRangking($a){
		$dataRangking =  $this->m_ahp->get_tabelRangking($a);
		$lol = $dataRangking->result();

		foreach ($lol as $key => $value) {
			echo "<td>".$value->rata."</td>";
		}
		
	}

	public function proses_ajaxJumlahDataRangking($a){
		$dataRangking =  $this->m_ahp->get_jumlahTabelRangking($a);
		$lol = $dataRangking->result();

		echo number_format($lol[0]->rata, 7, '.', ',');
		
	}

	public function proses_ajaxDataPerangkingan($a){
		$dataRangking =  $this->m_ahp->get_tabelPerangkingan($a);
		$lol = $dataRangking->result();
		$data = array();

		foreach ($lol as $key => $value) {
			echo "<td>".$value->hasil_alt_kri."</td>";
		}
		
	}

	public function proses_ajaxJumlahDataPerangkingan($a){
		$dataRangking =  $this->m_ahp->get_jumlahTabelPerangkingan($a);
		$lol = $dataRangking->result();

		echo number_format($lol[0]->rata, 3, '.', ',');
		
	}

	public function proses_ajaxHasil($a){
		$dataRangking =  $this->m_ahp->get_hasil($a);
		$lol = $dataRangking->result();

		echo $lol[0]->rata;
		
	}

	// update

	public function update_nilai_proses(){
		$updateID = $this->input->post('updateIDUp');
		$jumNilai = $this->input->post('jum');
		$ket = $this->input->post('ket');


		$data = array(
				'jum_nilai' => $jumNilai,
				'ket_nilai' => $ket
			);
		$where = array('id_nilai' => $updateID);
		$this->m_ahp->update($where, $data, 'ahp_nilai');

		redirect('ahp/nilai');
	}

	public function update_kriteria_proses(){
		$updateID = $this->input->post('updateIDUp');
		$ket = $this->input->post('ket');


		$data = array(
				'nama_kriteria' => $ket
			);
		$where = array('id_kriteria' => $updateID);
		$this->m_ahp->update($where, $data, 'ahp_data_kriteria');

		redirect('ahp/kriteria');
	}

	public function update_alternatif_proses(){
		$updateID = $this->input->post('updateIDUp');
		$ket = $this->input->post('ket');


		$data = array(
				'nama_alternatif' => $ket
			);
		$where = array('id_alternatif' => $updateID);
		$this->m_ahp->update($where, $data, 'ahp_data_alternatif');

		redirect('ahp/alternatif');
	}

	public function update_table_analisaKriteria($a, $b, $c){
		$sum = $this->m_ahp->get_jumlahAnalisaKriteria($b)->result();
		$where = array(
			'id_kriteria' => $b
			);
		$jumlah = $this->db->get_where('ahp_data_kriteria',$where)->result();
		$whereUpdate = array(
			'kriteria_pertama' =>$a,
			'kriteria_kedua' => $b
			);
		$data = array(
			'hasil_analisa_kriteria' => 1/$sum[0]->jumlah,
			);
		$this->m_ahp->update($whereUpdate, $data, 'ahp_analisa_kriteria');
	}

	public function update_table_analisaKriteria2($a, $b, $c){
		$sum = $this->m_ahp->get_jumlahAnalisaKriteria($b)->result();
		$where = array(
			'kriteria_pertama' =>$a,
			'kriteria_kedua' => $b
			);
		$nilai = $this->db->get_where('ahp_analisa_kriteria',$where)->result();
		$whereUpdate = array(
			'kriteria_pertama' =>$a,
			'kriteria_kedua' => $b
			);
		$data = array(
			'hasil_analisa_kriteria' => $nilai[0]->nilai_analisa_kriteria/$sum[0]->jumlah,
			);
		$this->m_ahp->update($whereUpdate, $data, 'ahp_analisa_kriteria');
	}

	public function update_table_jumlahKriteria($a){

		$sum = $this->m_ahp->get_jumlahAnalisaKriteria2($a)->result();
		$whereUpdate = array(
			'id_kriteria' =>$a,
			);

		$data = array(
			'jumlah_kriteria' => $sum[0]->jumlah,
			);
		$this->m_ahp->update($whereUpdate, $data, 'ahp_data_kriteria');

	}

	public function update_table_bobotKriteria($a){

		$sum = $this->m_ahp->get_jumlahAnalisaKriteria2($a)->result();
		$count = $this->m_ahp->count_kriteria()->result();
		$whereUpdate = array(
			'id_kriteria' =>$a,
			);

		$data = array(
			'bobot_kriteria' => $sum[0]->jumlah / $count[0]->jumlah,
			);
		$this->m_ahp->update($whereUpdate, $data, 'ahp_data_kriteria');

	}

	public function update_table_jumlahAlternatif($a, $b){

		$sum = $this->m_ahp->get_jumlahAnalisaAlternatif($b, $a)->result();
		$whereUpdate = array(
			'id_kriteria' =>$a,
			'id_alternatif' => $b
			);

		$data = array(
			'jumlah_alt_kri' => $sum[0]->jumlah,
			);
		$this->m_ahp->update($whereUpdate, $data, 'ahp_jum_alt_kri');

	}

	public function update_table_analisaAlternatif($a, $b, $c){
		$sum = $this->m_ahp->get_jumlahAnalisaAlternatif($b, $c)->result();
		$where = array(
			'alternatif_pertama' =>$a,
			'alternatif_kedua' => $b,
			'id_kriteria' => $c
			);
		$nilai = $this->db->get_where('ahp_analisa_alternatif',$where)->result();
		$data = array(
			'hasil_analisa_alternatif' => $nilai[0]->nilai_analisa_alternatif / $sum[0]->jumlah,
			);
		$this->m_ahp->update($where, $data, 'ahp_analisa_alternatif');
	}

	public function update_table_skorAltKri($a, $b){
		$avgAlternatif =  $this->m_ahp->get_AnalisaAlternatifSkor($a)->result();
		$where = array(
			'id_alternatif' =>$a,
			'id_kriteria' =>$b,
			);
		$data = array(
			'skor_alt_kri' => $avgAlternatif[0]->average,
			);
		$this->m_ahp->update($where, $data, 'ahp_jum_alt_kri');
	}

	public function update_hasilAltKri($a, $b){
		$bobotKriteria =  $this->m_ahp->get_dataBobotKriteria($b)->result();
		$skor =  $this->m_ahp->get_tabelPerangkingan2($a, $b)->result();
		$where = array(
			'id_alternatif' =>$a,
			'id_kriteria'=> $b
			);
		$data = array(
			'hasil_alt_kri' => $skor[0]->skor_alt_kri * $bobotKriteria[0]->bobot_kriteria,
			);
		$this->m_ahp->update($where, $data, 'ahp_jum_alt_kri');
	}

	public function update_hasilAltKriJumlah($a){
		$jumlah = $this->m_ahp->get_hasil($a)->result();
		$where = array(
			'id_alternatif' =>$a,
			);
		$data = array(
			'hasil_akhir' => $jumlah[0]->rata,
			);
		$this->m_ahp->update($where, $data, 'ahp_data_alternatif');
	}

	public function update_jadiSatuAlternatif($a,$b, $c){
		$data = array(
			'nilai_analisa_alternatif' => 1,
		);
		$where = array(
			'alternatif_pertama' => $a,
			'alternatif_kedua' => $b,
			'id_kriteria' => $c
		);
		$this->m_ahp->update($where, $data, 'ahp_analisa_alternatif');
	}
	
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
		
	}

	public function update_table_subPrio($a,$b){
		$alternatif =  $this->m_ahp->get_analisaAlternatifSkorPrio($a, $b)->result();
		$max = $this->m_ahp->get_max_skor($b)->result();

		$data = array(
			'prioritas_subkriteria' => $alternatif[0]->average / $max[0]->maxim,
		);
		$where = array(
			'id_kriteria' =>$b,
			'nama_subkriteria' => $a,
		);
		$this->m_ahp->update($where, $data, 'ahp_data_subkriteria');
	}

	public function get_tabel_subPrio(){
		$kriteria = $_REQUEST['idkriteria'];
		$subPrio =  $this->m_ahp->get_dataSubkiteria($kriteria)->result();
		echo json_encode($subPrio);
	}

}