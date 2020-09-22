<?php

class Dashboard extends CI_Controller{

	function __construct(){
	parent::__construct();
		$this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
		$this->load->model('m_data');
		$this->load->library('form_validation', 'pagination');
		$this->load->helper(array('form', 'url', 'download'));

		if($this->session->userdata('status') != "login"){
			redirect("login/");
		}
	}

	public function index(){	
		$data = array( 
			'judul' => "Jquery & Bootstrap",
			'family' => $this->m_data->ambil_dataF()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->ambil_dataU()->result(),
			'countStatus' => $this->m_data->get_countStatus()->result(),
			'overallScore' => $this->m_data->get_overallScore()->result(),
			'outstandingDept' => $this->m_data->get_outstandingDept()->result(),
			'outstandingCount' => $this->m_data->get_outstandingCount()->result(),
			'totalAsset' => $this->m_data->get_totalAsset()->result(),
			'countStatusActive' => $this->m_data->get_countStatusActive()->result(),
			'countStatusOthers' => $this->m_data->get_countStatusOthers()->result(),
			'outstandingCountTotal' => $this->m_data->get_outstandingCountTotal()->result(),
			'capexopexTotal' => $this->m_data->get_capexopexTotal()->result(),
			'statusAsset' => $this->m_data->get_statusAsset()->result(),
			'countOutstanding' => $this->m_data->get_outstandingCount2()->result(),
			'tabelOutstanding' => $this->m_data->get_tabelOutstanding()->result(),
			'totalCapexData' => $this->m_data->get_totalCapexData()->result(),
			'user' => $this->session->userdata,
			'totalUser' => $this->m_data->get_totalUser()->result(),
			'notComplete' => $this->m_data->get_countNotComplete()->result(),
			'tabelRecent' => $this->m_data->get_recentUpdate()->result(),
			'percentSipil' => $this->m_data->get_percentSipil()->result(),
			'percentArsitek' => $this->m_data->get_percentArsitek()->result(),
			'percentMekanik' => $this->m_data->get_percentMekanik()->result(),
			'percentElektrik' => $this->m_data->get_percentElektrik()->result(),
			'percentPemipaan' => $this->m_data->get_percentPemipaan()->result(),
			'building'=> $this->m_data->get_assesstment()->result(),
			'hasilCriciality' => $this->m_data->get_hasilAHP()->result(),
			'myClass' =>  $this,
			'dashboard' => "true"
			);

		$this->load->view('v_header', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_index', $data);
		
	}

	public function assessmentSearch(){
		$assessID = $this->input->post('id');
		redirect('dashboard/assessmenthasil?id='.$assessID);
	}

	public function assessmentHasil(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
				'laporan' => $this->m_data->getLaporanAssess($assessmentId)->result(),
				'myClass' =>  $this,
				
				
			);

		$data2 = array(
				'detail' => "data not Found",
				'laporan' => "",
				'myClass' =>  "",
				
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		if(isset($data['detail'][0]->nama)){
		$this->load->view('v_assessmentHasilView', $data);
		}else{
			echo "<div style='position:absolute; top : 50%; left:50%'>Data Not Found</div>";
		}
		$this->load->view('v_modal2', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');

	}

	public function assessmentHasilView(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
				'laporan' => $this->m_data->getLaporanAssess($assessmentId)->result(),
				'myClass' =>  $this,
				'owner' => $this->m_data->owner()->result(),
				'keyfac' =>  $this->m_data->keyfacilities()->result(),
				'pic' =>  $this->m_data->pic()->result(),
				'family' => $this->m_data->ambil_dataF()->result(),
				'mainlocation' => $this->m_data->mainlocation()->result(),
				'sublocation' => $this->m_data->sublocation()->result(),
				'unitlocation' => $this->m_data->unitlocation()->result(),
				'status'  => $this->m_data->status()->result(),
				'pic' =>  $this->m_data->pic()->result(),
				'owner' => $this->m_data->owner()->result(),
				'family' => $this->m_data->ambil_dataF()->result(),
				'subfamily' => $this->m_data->ambil_dataSF()->result(),
				'unitasset' => $this->m_data->unitasset()->result(),
				'assetname' =>  $this->m_data->assetname()->result(),
		
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessmentHasilView', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_modal2', $data);
		$this->load->view('v_footer');

	}

	public function search(){
		$owner = $_GET['owner'];
		$family = $_GET['family'];
		$keyfac = $_GET['keyfac'];
		$loc = $_GET['loc'];
		$text = $_GET['search'];
		$searchBy = $_GET['searchBy'];
		$column = $_GET['column'];

		if($owner == ""){
			$ownerSql = "'%'";
		}else{
			$ownerSql = "$owner";
		}

		if($family == ""){
			$familySql = "'%'";
		}else{
			$familySql = "$family";
		}

		if($keyfac == ""){
			$keyfacSql = "'%'";
		}else{
			$keyfacSql = "$keyfac";
		}

		if($loc == ""){
			$locSql = "%";
		}else{
			$locSql = "$loc";
		}

		if($text != ""){
			if($searchBy == "like"){
				$searchBySql = "AND $column $searchBy '%$text%'";
			}else{
				$searchBySql = "AND $column $searchBy '$text'";
			}

		}else{
			$searchBySql = "";
		}


		$this->load->library('pagination');
		$this->load->library('table');
		$jumlah_dataSearch = $this->m_data->jumlah_dataSearch($ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql);
		$config['page_query_string'] = TRUE;
		$config['uri_protocol']= 'PATH_INFO';
		$config['base_url'] = base_url().'/dashboard/search?owner='.$owner.'&family='.$family.'&keyfac='.$keyfac.'&loc='.$loc.'&column='.$column.'&searchBy='.$searchBy.'&search='.$text.'&submitSearch=Search';
		$config['total_rows'] = $jumlah_dataSearch;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		if(isset($_GET['start'])){
			$from = ($_GET['start']) ? $_GET['start'] : 0;
		}else{
			$from = 0;
		}
		$this->pagination->initialize($config);
		
		$data = array(
			'owner' => $this->m_data->owner()->result(),
			'keyfac' =>  $this->m_data->keyfacilities()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'mainlocation' => $this->m_data->mainlocation()->result(),
			'sublocation' => $this->m_data->sublocation()->result(),
			'unitlocation' => $this->m_data->unitlocation()->result(),
			'status'  => $this->m_data->status()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'owner' => $this->m_data->owner()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->unitasset()->result(),
			'assetname' =>  $this->m_data->assetname()->result(),
			'viewHome' => $this->m_data->get_dataSearch($config['per_page'],$from, $ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql)->result(),
			'jumlah' => $this->m_data->get_dataSearchCount($config['per_page'],$from, $ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql)->result(),
		);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_searchResult', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_modal2', $data);
		$this->load->view('v_footer');
	}

	public function proses_ajaxHasilCategory($a){
		$lala = $this->m_data->get_hasilAHPCategory($a)->result();
		foreach ($lala as $key => $isi) {
			echo "<td>".number_format($isi->nilai,3,'.',',')."</td>";
		}
	}

	public function proses_ajaxrefnilai($a){

		$refnilai =  $this->m_data->getRefNilaSipil($a)->result();
	
		echo $refnilai[0]->description;
	}

	public function proses_updateScoreBuilding($c, $id){

		if($c < 20){
			$nilai = 5;
		}else if($c >= 20 && $c <= 40){
			$nilai = 4;
		}else if($c >= 41 && $c <= 60){
			$nilai = 3;
		}else if($c >= 61 && $c <= 80){
			$nilai = 2;
		}else if($c >= 81 && $c <= 100){
			$nilai = 1;
		}

		$where = array(
			'asset_id' => $id,
			);

		$dataC = array(
				'score1' => $nilai,
				'overallscore' => $nilai
			);

		$dataU = array(
			'id'=>'',
			'asset_id' => $id,
			'updatedate' => date("Ymd"),
			'updateby' => $this->session->userdata("username"),
			);

		$this->m_data->update_datadetail($where, $dataC, 'condition');
	}

	public function get_dataView(){
		$updateID = $_REQUEST['updateID'];

		$detail =  $this->m_data->getdataUpdate($updateID)->result();
		
		echo json_encode($detail);
	}

	public function get_dataSurplusPro(){
		$updateID = $_REQUEST['updateID'];

		$detail =  $this->m_data->getSurplusProgress($updateID)->result();
		
		echo json_encode($detail);
	}


	public function countFiles(){
		$updateID = $_REQUEST['updateID'];
	    $filecount = count(glob(FCPATH."/photo/"."*".$updateID."*"));
	    echo $filecount;
	}

}
?>