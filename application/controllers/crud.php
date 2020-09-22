<?php

class Crud extends CI_Controller{

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
			);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_index', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function proses_ajaxHasilCategory($a){
		$lala = $this->m_data->get_hasilAHPCategory($a)->result();
		foreach ($lala as $key => $isi) {
			echo "<td>".number_format($isi->nilai,3,'.',',')."</td>";
		}
	}

	public function home(){
		$data = array(

		);
		

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_home', $data);
		$this->load->view('v_footer');
	}

	public function home2(){
		$data = array(
			'owner' => $_GET['owner']
		);
		

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_home2', $data);
		$this->load->view('v_footer');
	}

	public function view(){
		$owner = $_GET['owner'];
		$family = $_GET['family'];
		$keyfac = $_GET['keyfac'];

		if($keyfac == ""){
			$keyfacSql = "'%'";
		}else{
			$keyfacSql = "$keyfac";
		}

		$this->load->library('pagination');
		$this->load->library('table');
		$jumlah_data = $this->m_data->jumlah_data($owner, $family, $keyfacSql);
		$config['page_query_string'] = TRUE;
		$config['uri_protocol']= 'PATH_INFO';
		$config['base_url'] = base_url().'/crud/view?owner='.$owner.'&family='.$family.'&keyfac=';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
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
			'viewHome' => $this->m_data->get_dataView($config['per_page'],$from, $owner, $family, $keyfacSql)->result(),
			'jumlah' => $this->m_data->get_dataViewCount($config['per_page'],$from, $owner, $family, $keyfacSql)->result(),
		);
		
		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_view', $data);
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');
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

	public function updateProses(){
		$ai = $this->input->post('updateIDUp');

		$namaAsset = $this->input->post('namaasset2');

		$subfamily = $this->input->post('subfamilyasset');
		$newSubfamily = explode("|", $subfamily);
		$unitasset = $this->input->post('unitasset');
		$barcode = $this->input->post('barcode');
		$brand = $this->input->post('brand');
		$type = $this->input->post('type');
		$dimension = $this->input->post('dimension');
		$sernum = $this->input->post('serial');
		$status = $this->input->post('status');
		$purchDate = $this->input->post('purchDate');
		$instDate = $this->input->post('instDate');
		$usedby = $this->input->post('usedby');

		$mainlocation = $this->input->post('mainlocation');
		$newMainlocation = explode("|", $mainlocation);
		$sublocation = $this->input->post('sublocation');
		$newSublocation = explode("|", $sublocation);
		$unitlocation = $this->input->post('unitlocation');

		$nama = $this->input->post('namelist');
		$newName = explode("|", $nama);

		$dateofsurvey = $this->input->post('dateofsurvey');
		$surveyor = $this->input->post('surveyor');
		$score1 = $this->input->post('score1');
		$score2 = $this->input->post('score2');
		$score3 = $this->input->post('score3');
		$score4 = $this->input->post('score4');
		$score5 = $this->input->post('score5');
		$overallScore = $this->input->post('overallconditionscore');
		$remarks = $this->input->post('remarks');
		$notes = $this->input->post('note');

		$originalpamnumber = $this->input->post('originalpamnum');
		$pamassetname = $this->input->post('pamassetname');


		$photo = $this->input->post('berkas');
		$nama = $_FILES["berkas"]["name"];
		$ext = pathinfo($nama, PATHINFO_EXTENSION);
		$filename = glob(FCPATH.'/photo/*'.$ai.'.'.$ext);

		$files= glob(FCPATH.'/photo/*'.$ai.'.jpg');

		$config['file_name'] = $ai;
		$config['overwrite'] = FALSE;
		$config['upload_path'] = './photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 5000;
		$config['max_width'] = 5000;
		$config['max_height'] = 5000;

		if(count($files)>=0){
			$directory = FCPATH."/photo/";
			$filecount = count(glob($directory."*".$ai."*.jpg"));
			if($filecount == 0){
				$filecount = 1;
				$config['file_name'] = $ai.".jpg";
			}else{
				$config['file_name'] = $ai.$filecount.".jpg";
			}
			
			$datas = array(
				'nama' => $filename,
				'jumlah' => $filecount,
				);		
			
		}else{
			$datas = array(
				'nama' => "haha",
				'jumlah' => "hoho",
				);	
		
		}

		$this->load->library('upload', $config);

		if(! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());

			$data = array(
				'id_subfamilyasset' => (!empty($newSubfamily[1])) ? $newSubfamily[1] : NULL,
				'id_unitasset' => (!empty($unitasset)) ? $unitasset : NULL,
				'barcode' => 	$barcode,
				'id_dept' =>  (!empty($usedby)) ? $usedby : NULL,
				'brand' => $brand,
				'type' => $type,
				'dimension' => $dimension,
				'serial_numb' => $sernum,
				'photo' => NULL,
				'id_status' =>  (!empty($status)) ? $status : NULL,
				'purchasingdate' => $purchDate,
				'installdate' => $instDate,
			);
			$where = array('asset_id' => $ai);

		}else{
			$where = array('asset_id' => $ai);
			$check = $this->m_data->check_update("detailasset", $where)->row_Array();
			if($check['photo'] == NULL){
				$data= array('upload_data' => $this->upload->data());
				$data = array(
					'id_subfamilyasset' => (!empty($newSubfamily[1])) ? $newSubfamily[1] : NULL,
					'id_unitasset' => (!empty($unitasset)) ? $unitasset : NULL,
					'barcode' => 	$barcode,
					'id_dept' =>  (!empty($usedby)) ? $usedby : NULL,
					'brand' => $brand,
					'type' => $type,
					'dimension' => $dimension,
					'serial_numb' => $sernum,
					'photo' => $ai.".jpg",
					'id_status' =>  (!empty($status)) ? $status : NULL,
					'purchasingdate' => $purchDate,
					'installdate' => $instDate,
				);
			}else{
				$data= array('upload_data' => $this->upload->data());
				$data = array(
					'id_subfamilyasset' => (!empty($newSubfamily[1])) ? $newSubfamily[1] : NULL,
					'id_unitasset' => (!empty($unitasset)) ? $unitasset : NULL,
					'barcode' => 	$barcode,
					'id_dept' =>  (!empty($usedby)) ? $usedby : NULL,
					'brand' => $brand,
					'type' => $type,
					'dimension' => $dimension,
					'serial_numb' => $sernum,
					'id_status' =>  (!empty($status)) ? $status : NULL,
					'purchasingdate' => $purchDate,
					'installdate' => $instDate,
				);
			}
			
		}

		$dataC = array(
				'dateofsurvey' => $dateofsurvey,
				'surveyor' => $surveyor,
				'score1' => (!empty($score1)) ? $score1 : NULL,
				'score2' => (!empty($score2)) ? $score2 : NULL,
				'score3' => (!empty($score3)) ? $score3 : NULL,
				'score4' => (!empty($score4)) ? $score4 : NULL,
				'score5' => (!empty($score5)) ? $score5 : NULL,
				'score6' => (!empty($score6)) ? $score6 : NULL,
				'overallScore' => (!empty($overallScore)) ? $overallScore : NULL,
				'remarks' => $remarks,
				'notes' => $notes
			);

		$dataL = array(
			'id_mainlocation' => (!empty($newMainlocation[1])) ? $newMainlocation[1] : NULL,
			'id_sublocation' => (!empty($newSublocation[1])) ? $newSublocation[1] : NULL,
			'id_unitlocation' => (!empty($unitlocation)) ? $unitlocation : NULL
			);

		$dataU = array(
			'updateby' => $this->session->userdata("username"),
			);

		$dataP = array(
			'originalpamnumber' => (!empty($originalpamnumber)) ? $originalpamnumber : NULL,
			'pamassetname' => (!empty($pamassetname)) ? $pamassetname : NULL
			);

		$where = array(
			'asset_id' => $ai,
			);

		$locRef = $this->m_data->cekLocRef($newMainlocation[1]);
		$locRefRow = $locRef->row();

		$dataB = array(
			'nama' => $namaAsset." ".((!empty($locRefRow->mainlocation)) ? $locRefRow->mainlocation : NULL),
			);

		$this->m_data->update_datadetail($where, $data, 'detailasset');
		$this->m_data->update_datadetail($where, $dataL, 'location');
		$this->m_data->update_datadetail($where, $dataC, 'condition');
		$this->m_data->update_datadetail($where, $dataP, 'detailpam');
		$this->m_data->update_dataupdate($where, $dataU, 'update_record');

		
		$fam = $this->m_data->cekFamily($ai);
		
		$famrow = $fam->row();

		if($famrow->id_family == '7'){
			$this->m_data->update_datadetail($where, $dataB, 'building_assessment');
		}
header("refresh:2; url=".$_SERVER['HTTP_REFERER']);
		echo "<div id='proses'><center style='position:fixed; top:40%; left:50%; transform: translate(-50%, -50%);'>
		<img src='".base_url()."gambar/palyja.png' style='
		position: absolute;
		margin-top: -120px;
		margin-left: -41%;
		width: 300px;
		z-index: -1;
		opacity: 0.2;'>
		<h2>Update Succeed!</h2><br>
		<a href='".$_SERVER['HTTP_REFERER']."'>Click here if the browser does not automaticly redirect you</a>
		</center></div>";
		
		 
	}

	public function search(){
		$owner = $_GET['owner'];
		$family = $_GET['family'];
		$keyfac = $_GET['keyfac'];
		$loc = $_GET['loc'];
		$text = $_GET['search'];
		$searchBy = $_GET['searchBy'];
		$column = $_GET['column'];

		if(isset($_GET['jenisStatus'])){
			$jenisStatus = $_GET['jenisStatus'];
		}

		if(isset($_GET['jenisCondition'])){
			$jenisCondition = $_GET['jenisCondition'];
		}

		if(isset($_GET['not'])){
			$notTrue = $_GET['not'];
		}

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
		if(isset($_GET['jenisStatus'])){
			$jumlah_dataSearch = $this->m_data->jumlah_dataSearchStatus($ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql, $jenisStatus);
		}
		if(isset($_GET['jenisCondition'])){
			$jumlah_dataSearch = $this->m_data->jumlah_dataSearchCondition($ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql, $jenisCondition);
		}
		if(isset($_GET['not'])){
			$jumlah_dataSearch = $this->m_data->jumlah_dataSearchNotTrue($ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql);
		}
		$config['page_query_string'] = TRUE;
		$config['uri_protocol']= 'PATH_INFO';
		$config['base_url'] = base_url().'/crud/search?owner='.$owner.'&family='.$family.'&keyfac='.$keyfac.'&loc='.$loc.'&column='.$column.'&searchBy='.$searchBy.'&search='.$text.'&submitSearch=Search';
		if(isset($_GET['jenisStatus'])){
			$config['base_url'] = base_url().'/crud/search?owner='.$owner.'&family='.$family.'&keyfac='.$keyfac.'&loc='.$loc.'&column='.$column.'&searchBy='.$searchBy.'&search='.$text.'&submitSearch=Search&jenisStatus='.$jenisStatus;
		}
		if(isset($_GET['jenisCondition'])){
			$config['base_url'] = base_url().'/crud/search?owner='.$owner.'&family='.$family.'&keyfac='.$keyfac.'&loc='.$loc.'&column='.$column.'&searchBy='.$searchBy.'&search='.$text.'&submitSearch=Search&jenisCondition='.$jenisCondition;
		}
		if(isset($_GET['not'])){
			$config['base_url'] = base_url().'/crud/search?owner='.$owner.'&family='.$family.'&keyfac='.$keyfac.'&loc='.$loc.'&column='.$column.'&searchBy='.$searchBy.'&search='.$text.'&submitSearch=Search&not=true';
		}


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

		if(isset($_GET['jenisStatus'])){
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
			'viewHome' => $this->m_data->get_dataSearchStatus($config['per_page'],$from, $ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql, $jenisStatus)->result(),
			'jumlah' => $this->m_data->get_dataSearchCountStatus($config['per_page'],$from, $ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql, $jenisStatus)->result(),
		);
		}

		if(isset($_GET['jenisCondition'])){
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
			'viewHome' => $this->m_data->get_dataSearchCondition($config['per_page'],$from, $ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql, $jenisCondition)->result(),
			'jumlah' => $this->m_data->get_dataSearchCountCondition($config['per_page'],$from, $ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql, $jenisCondition)->result(),
		);
		}

		if(isset($_GET['not'])){
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
			'viewHome' => $this->m_data->get_dataSearchNotTrue($config['per_page'],$from, $ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql)->result(),
			'jumlah' => $this->m_data->get_dataSearchCountNotTrue($config['per_page'],$from, $ownerSql, $familySql, $keyfacSql, $locSql, $searchBySql)->result(),
		);
		}

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_searchResult', $data);
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');
	}


	public function entry_data(){
		$data = array(
			'owner' => $this->m_data->owner()->result(),
			'keyfac' =>  $this->m_data->keyfacilities()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'assetname' =>  $this->m_data->assetname()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->ambil_dataU()->result(),
			'status' => $this->m_data->status()->result(),
			'funding' => $this->m_data->funding()->result(),
			'mainlocation' => $this->m_data->mainlocation()->result(),
			'sublocation' => $this->m_data->sublocation()->result(),
			'unitlocation' => $this->m_data->unitlocation()->result(),
			'document' => $this->m_data->document()->result(),

			);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_entrydata', $data);
		$this->load->view('v_footer');
	}

	public function entry_data_proses(){
		$po = $this->input->post('po');
		$podesc = $this->input->post('podesc');
		$podept = $this->input->post('podept');
		$popic = $this->input->post('popic');
		$month = $this->input->post('month');
		$year = $this->input->post('yearpicker');
		$capexopex = $this->input->post('capexopex');
		$keyfac = $this->input->post('keyfac');
		$docfol = $this->input->post('docfol');
		$type = $this->input->post('type');

		$capexopexid = explode("|", $capexopex);

		$data= array(
			'no_po' => $po,
			'deskripsi_po' => $podesc,
			'id_podepartment' => (!empty($podept)) ? $podept : NULL,
			'porequestor' => $popic,
			'id_keyfacility' => (!empty($keyfac)) ? $keyfac : NULL,
			'documentfoldernumber' => $docfol,
			'month' => $month,
			'year' => $year,
			'id_funding' => (!empty($capexopexid[1])) ? $capexopexid[1] : NULL,
			'type' => $type
		);

		$query = $this->m_data->input_refpo($data, 'ref_po');
	
		/*$datageneral= array(
			'id_deptpo' => $podept,
			'picpo' => $popic,
		);

		$id_general = $this->m_data->max_id()->row();

		$where = array('id_general' => $id_general->maxid);


			
		$this->m_data->update_datageneral($where, $datageneral, 'generalasset');*/

		redirect('crud/entry_data21/?po='.$po);
		
	}

	public function uploadcapexopex(){
		$fileName = time().$_FILES['file']['name'];

		$config['upload_path'] = FCPATH.'uploads/';
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv';
		$config['max_size'] = 10000;

		if(isset($_POST['submitExcel1'])){
			$funding = "CAPEX";
		}else if(isset($_POST['submitExcel2'])){
			$funding = "OPEX";
		}

		$this->db->db_debug = FALSE;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if(! $this->upload->do_upload('file'))
		$this->upload->display_errors();

		$media = $this->upload->data('file');
		$inputFileName = $this->upload->data('full_path');

		try{
			$inputFileType = IOFactory::identify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch(Exception $e){
			die('Error loading file "'.pathinfo($inputFileName, PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		$sheet = $objPHPExcel->setActiveSheetIndex(0);
		$highestRow = $sheet->getHighestRow('B');
		$highestColumn = $sheet->getHighestColumn();

		$counter = 0;
		for($row = 2; $row <= $highestRow; $row++){
			
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

			

			$dataExcel = array(
					"no_po"=> $rowData[0][0],
					"deskripsi_po"=> $rowData[0][1],
					"month" => $rowData[0][3],	
					"year" => $rowData[0][4],	
					"funding" => $funding,
					"department" => $rowData[0][2]			
				);

			if( strlen(trim($rowData[0][0])) < 6 || strlen(str_replace(' ','',$rowData[0][0])) > 6){
				$counter = $counter+1;
			}else{
				$this->m_data->input_capexopex($dataExcel, 'capexopex');	
			}

			

			
			

			/*$dataExcelGeneral = array(
					"id_deptpo" => $rowData[0][2],
					"picpo" => $rowData[0][3],
				);

			$id_general = $this->m_data->max_id()->row();
			$where = array('id_general' => $id_general->maxid);
			$this->m_data->update_datageneral($where, $dataExcelGeneral, 'generalasset');*/

			delete_files(FCPATH.'uploads/');
		}
		if($counter != 0){
		redirect('crud/capexopex/'."?imported=true&err=true");
		}else{
		redirect('crud/capexopex/'."?imported=true");
		}
	}

	public function uploadcapex(){
		$fileName = time().$_FILES['file']['name'];
		$this->db->db_debug = FALSE;

		$config['upload_path'] = FCPATH.'uploads/';
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv';
		$config['max_size'] = 10000;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if(! $this->upload->do_upload('file'))
		$this->upload->display_errors();

		$media = $this->upload->data('file');
		$inputFileName = $this->upload->data('full_path');

		try{
			$inputFileType = IOFactory::identify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch(Exception $e){
			die('Error loading file "'.pathinfo($inputFileName, PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		for($row = 13; $row <= $highestRow; $row++){
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

			$dataFunding = $rowData[0][6];
			$query2 = $this->db->query("SELECT id_funding FROM ref_funding WHERE funding = '$dataFunding'");
			foreach($query2->result() as $rowinput){
				$rowData[0][6] =  $rowinput->id_funding;
			}

			$dataDept = $rowData[0][2];
			$query2 = $this->db->query("SELECT id_dept FROM ref_dept WHERE workingunit = '$dataDept'");
			foreach($query2->result() as $rowinput){
				$rowData[0][2] =  $rowinput->id_dept;
			}

			$dataExcel = array(
					"no_po"=> $rowData[0][3],
					"deskripsi_po"=> $rowData[0][2],
					
				);

			$this->m_data->input_capexopex($dataExcel, 'capexopex');

			$this->db->db_debug = FALSE;
			

			/*$dataExcelGeneral = array(
					"id_deptpo" => $rowData[0][2],
					"picpo" => $rowData[0][3],
				);

			$id_general = $this->m_data->max_id()->row();
			$where = array('id_general' => $id_general->maxid);
			$this->m_data->update_datageneral($where, $dataExcelGeneral, 'generalasset');*/

			delete_files(FCPATH.'uploads/');
		}
		redirect('crud/entry_data21');
	}

	public function download(){
		force_download('assets/templateInputData.xlsx', NULL);
	}

	public function downloadDokumentasi(){
		force_download('assets/Dokumentasi.pdf', NULL);
	}

	public function entry_data2(){

		$data = array(

			'owner' => $this->m_data->owner()->result(),
			'keyfac' =>  $this->m_data->keyfacilities()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'assetname' =>  $this->m_data->assetname()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->ambil_dataU()->result(),
			'status' => $this->m_data->status()->result(),
			'funding' => $this->m_data->funding()->result(),
			'mainlocation' => $this->m_data->mainlocation()->result(),
			'sublocation' => $this->m_data->sublocation()->result(),
			'unitlocation' => $this->m_data->unitlocation()->result(),
			'document' => $this->m_data->document()->result(),
			'nomorpo' => $this->uri->segment(3),
			'listpo' => $this->m_data->no_po()->result(),
			);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_entrydata21', $data);
		$this->load->view('v_footer');
	}

	public function entry_data2_proses(){
		$po = $this->input->post('nomorpo');
		$owner = $this->input->post('owner');
		$family = $this->input->post('family');
		$keyfac = $this->input->post('keyfac');
		$name = $this->input->post('name');
		$quan = $this->input->post('quan');

		$familyNew= explode("|", $family);

		$data = array(
				'no_po' => $po,
				'id_owner' => 	$owner,
				'id_family' => $familyNew[1],
				'id_keyfacilities' => $keyfac,
				'id_assetname' => $name,
				'id_preassetid' => '',
				'jumlah' => $quan,
			);

		$where = array('no_po' => $po);
		$this->m_data->update_datageneral($where, $data, 'generalasset');

		redirect('crud/entry_data3');
	}

	public function entry_data21(){

		$data = array(
			'owner' => $this->m_data->owner()->result(),
			'keyfac' =>  $this->m_data->keyfacilities()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'assetname' =>  $this->m_data->assetname()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->ambil_dataU()->result(),
			'status' => $this->m_data->status()->result(),
			'funding' => $this->m_data->funding()->result(),
			'mainlocation' => $this->m_data->mainlocation()->result(),
			'sublocation' => $this->m_data->sublocation()->result(),
			'unitlocation' => $this->m_data->unitlocation()->result(),
			'document' => $this->m_data->document()->result(),
			'nomorpo' => $this->uri->segment(3),
			'listpo' => $this->m_data->no_po()->result(),
			);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_entrydata21', $data);
		$this->load->view('v_footer');
	}

	public function insertgeneral(){
		$nm = $this->input->post('name');
		$po = $this->input->post('pogeneral');
		$isinm = 0;
		$result = array();
		$count = 0;

		foreach ($nm as $key => $val) {
			$namacari = (!empty($_POST['name'][$key])) ? $_POST['name'][$key] : 0 ;
			$query = $this->db->query("SELECT * FROM generalasset WHERE no_po = $po AND id_assetname = $namacari");
			$count = $count + $query->num_rows();
			
				if($_POST['name'][$key] !=NULL){
					$family = $_POST['family'][$key];
					$familyNew= explode("|", $family);
					$result[] = array(
						"no_po" => $_POST['pogeneral'],
						"id_assetname" => $_POST['name'][$key],
						'id_owner' => 	$_POST['owner'][$key],
						'id_family' => $familyNew[1],
						'jumlah' => $_POST['quan'][$key],
					);
				}
			
		}

		if($count == 0){
			$this->m_data->input_datageneral($result, 'generalasset');
			redirect('crud/entry_data3/?po='.$po);
		}else{
			redirect('crud/entry_data21/?po='.$po.'&error=true');
		}
		

	}

	public function proses_ajax(){
		$po = $_REQUEST['po'];

		$detail =  $this->m_data->get_dept($po)->result();
		
		echo json_encode($detail);
	}

	public function entry_data3(){

		$session = $this->session->userdata("role");
		if($session =="admin"){
			$session = "%";
		}

		$data = array(
			'owner' => $this->m_data->owner()->result(),
			'keyfac' =>  $this->m_data->keyfacilities()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'assetname' =>  $this->m_data->assetname()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->unitasset()->result(),
			'status'  => $this->m_data->status()->result(),
			'funding' => $this->m_data->funding()->result(),
			'mainlocation' => $this->m_data->mainlocation()->result(),
			'sublocation' => $this->m_data->sublocation()->result(),
			'unitlocation' => $this->m_data->unitlocation()->result(),
			'document' => $this->m_data->document()->result(),
			'nomorpo' => $this->uri->segment(3),
			'listpo2' => $this->m_data->no_po2($session)->result(),
			'listname2' => $this->m_data->get_namedetail($session)->result(),
			'detailasset' => $this->m_data->get_detailasset()->result(),
			);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_entrydata3', $data);
		$this->load->view('v_footer');
	}

	public function proses_ajax2(){
		$po2 = $_REQUEST['po2'];
		$name2 = $_REQUEST['name2'];

		$nama =  $this->m_data->get_assetid($po2,$name2)->result();
		
		echo json_encode($nama);
	}

	public function updatedetail(){
		$ai = $this->input->post('assetid');
		$po = $this->input->post('pogeneral');
		$name = $this->input->post('namelist');
		$newpo = explode("|", $po);
		$isinm = 0;
		$result = array();
		
		$next = $this->input->post('next');

		foreach ($ai as $key => $val) {
			
			$result[] = array(
				"asset_id" => $_POST['assetid'][$key],
				"id_unitasset" => (!empty($_POST['unitasset'][$key])) ? $_POST['unitasset'][$key] : NULL,
				"barcode" => $_POST['barcode'][$key],
				"brand" => $_POST['brand'][$key],
				"type" => $_POST['type'][$key],
				"dimension" => $_POST['dimension'][$key],
				"serial_numb" => $_POST['sernum'][$key],
				"id_status" => (!empty($_POST['status'][$key])) ? $_POST['status'][$key] : NULL,
				"purchasingdate" => $_POST['purchdate'][$key],
				"installdate" => $_POST['instdate'][$key]
				);
			
		}

		$this->db->update_batch('detailasset', $result, 'asset_id');
		if($next == "next"){
			redirect('crud/document/?po='.$newpo[1].'&name='.$name);
		}else{
			redirect('crud/entry_data3/?po='.$newpo[1]);
		}

	}

	public function updatedetail2(){
		$ai = $this->input->post('assetid');
		$po = $this->input->post('pogeneral');
		$namaAsset = $this->input->post('namelist');
		$newpo = explode("|", $po);
		$assetidnext = $ai + 1;

		$subfamily = $this->input->post('subfamilyasset');
		$newSubfamily = explode("|", $subfamily);
		$unitasset = $this->input->post('unitasset');
		$barcode = $this->input->post('barcode');
		$brand = $this->input->post('brand');
		$type = $this->input->post('type');
		$dimension = $this->input->post('dimension');
		$sernum = $this->input->post('serial');
		$status = $this->input->post('status');
		$purchDate = $this->input->post('purchDate');
		$instDate = $this->input->post('instDate');
		$usedby = $this->input->post('usedby');
		$photo = $this->input->post('berkas');
		$nama = $_FILES["berkas"]["name"];
		$ext = pathinfo($nama, PATHINFO_EXTENSION);
		$filename = './photo/'.$ai;
		$mainlocation = $this->input->post('mainlocation');
		$mainlocationb = explode("|", $mainlocation);

		$sublocation = $this->input->post('sublocation');
		$sublocationb = explode("|", $sublocation);

		$unitlocation = $this->input->post('unitlocation');


		$config['file_name'] = $ai;
		$config['overwrite'] = FALSE;
		$config['upload_path'] = './photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 5000;
		$config['max_width'] = 5000;
		$config['max_height'] = 5000;

		if(file_exists($filename)){
			$directory = "photo/".$ai;
			$filecount = count(glob($directory . "*.*"));
			$config['file_name'] = $ai;
			$datas = array(
				'nama' => $filename,
				'jumlah' => $filecount,
				);		
		}else{
			$datas = array(
				'nama' => "haha",
				'jumlah' => "hoho",
				);	
		}
		$this->load->library('upload', $config);

		if(! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$data = array(
				'id_subfamilyasset' => (!empty($newSubfamily[1])) ? $newSubfamily[1] : NULL,
				'id_unitasset' => (!empty($unitasset)) ? $unitasset : NULL,
				'barcode' => 	$barcode,
				'id_dept' =>  (!empty($usedby)) ? $usedby : NULL,
				'brand' => $brand,
				'type' => $type,
				'dimension' => $dimension,
				'serial_numb' => $sernum,
				'photo' => NULL,
				'id_status' =>  (!empty($status)) ? $status : NULL,
				'purchasingdate' => $purchDate,
				'installdate' => $instDate,
			);
		$where = array('asset_id' => $ai);
			
		}else{
			$data= array('upload_data' => $this->upload->data());
			$data = array(
				'id_subfamilyasset' => (!empty($newSubfamily[1])) ? $newSubfamily[1] : NULL,
				'id_unitasset' => (!empty($unitasset)) ? $unitasset : NULL,
				'barcode' => 	$barcode,
				'id_dept' =>  (!empty($usedby)) ? $usedby : NULL,
				'brand' => $brand,
				'type' => $type,
				'dimension' => $dimension,
				'serial_numb' => $sernum,
				'photo' => $ai.".".$ext,
				'id_status' =>  (!empty($status)) ? $status : NULL,
				'purchasingdate' => $purchDate,
				'installdate' => $instDate,
			);
		$where = array(
			'asset_id' => $ai
			);
			
		}

		$dataL = array(
			'id_mainlocation' => (!empty($mainlocationb[1])) ? $mainlocationb[1] : NULL,
			'id_sublocation' => (!empty($sublocationb[1])) ? $sublocationb[1] : NULL,
			'id_unitlocation' => (!empty($unitlocation)) ? $unitlocation : NULL
			);


		$dataU = array(
			'updateby' => $this->session->userdata("username"),
			);

		$nameRef = $this->m_data->cekNameRef($namaAsset);
		$nameRefRow = $nameRef->row();

		$locRef = $this->m_data->cekLocRef($mainlocationb[1]);
		$locRefRow = $locRef->row();

		$dataB = array(
			'nama' => $nameRefRow->name." ".((!empty($locRefRow->mainlocation)) ? $locRefRow->mainlocation : NULL),
			);
		
		$this->m_data->update_datadetail($where, $data, 'detailasset');
		$this->m_data->update_datadetail($where, $dataL, 'location');
		$this->m_data->update_dataupdate($where, $dataU, 'update_record');

		$fam = $this->m_data->cekFamily($ai);
		
		$famrow = $fam->row();

		if($famrow->id_family == '7'){
			$this->m_data->update_datadetail($where, $dataB, 'building_assessment');
		}

		

		$dataSuccess= array(
			'nopo' => $newpo[1],
			'nama' => $namaAsset,
			'idnext' => $assetidnext,
			'id' => $ai

			);

		if(isset($_POST['save1'])){
			header("refresh:2; url=entry_data3/?po=".$newpo[1]."&name=".$namaAsset."&id=".$assetidnext);
			echo "<div id='proses'><center style='position:fixed; top:40%; left:50%; transform: translate(-50%, -50%);'>
			<img src='".base_url()."gambar/palyja.png' style='
			position: absolute;
			margin-top: -120px;
			margin-left: -41%;
			width: 300px;
			z-index: -1;
			opacity: 0.2;'>
			<h2>Asset Registration Completed!</h2><br>
			<a href='entry_data3/?po=".$newpo[1]."&name=".$namaAsset."&id=".$assetidnext."'>Click here if the browser does not automaticly redirect you</a>
			</center></div>";
		}else if(isset($_POST['save2'])){
			$this->load->view('v_updateSuccess', $dataSuccess);
		}

	}

	public function updateCompleted(){
		$this->load->view('v_updateSuccess');
	}


	public function capexopex(){
		if($this->session->userdata('role') != "admin"){
			redirect("dashboard/");
		}

		
			if(isset($_GET['imported'])){
				if(isset($_GET['err'])){
					$data = array(
						'info' => "true",
						'err'=>"true"
					);
				}else{
					$data = array(
						'info' => "true",
					);
				}
			}else{
				$data = array(
					'info' => ""
					);
			}
			
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_modalIndex');
		$this->load->view('v_capexopex', $data);
		$this->load->view('v_footer');
	}
		

	public function proses_ajax_po(){
		$po = $_REQUEST['po'];
		$desc = $this->m_data->get_desc($po)->result();
		echo json_encode($desc);
	}

	public function assessment(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment2(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment2', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer', $data);
	}

	public function assessment3(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment3', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment4(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment4', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment5(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment5', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment6(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment6', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment7(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment7', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment8(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment8', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment9(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment9', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment10(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment10', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment11(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment11', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function assessment12(){
		$assessmentId = $_GET['id'];
		$data = array(
				'detail' => $this->m_data->getdataAssessment($assessmentId)->result(),
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_assessment12', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}


	public function get_dataAssess(){
		$updateID = $_REQUEST['updateID'];
		$table = $_REQUEST['table'];
		$detail =  $this->m_data->getdataAssess($updateID, $table)->result();
		
		echo json_encode($detail);
	}



	public function updateSipil(){
		$assessID = $this->input->post('assessID');
		$pondasi = $this->input->post('pondasi');
		$penurunan = $this->input->post('penurunan');
		$sampon = $this->input->post('sampon');
		$kolom = $this->input->post('kolom');
		$samkol = $this->input->post('samkol');
		$balok = $this->input->post('balok');
		$samba = $this->input->post('samba');
		$pelat = $this->input->post('pelat');
		$brave = $this->input->post('brave');
		$brahor = $this->input->post('brahor');
		$rangmo = $this->input->post('rangmo');
		$dingge = $this->input->post('dingge');
		$lainlain = $this->input->post('lainlain');
		$samkola = $this->input->post('samkola');
		$rangka = $this->input->post('rangka');
		$gording = $this->input->post('gording');
		$konsam = $this->input->post('konsam');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'pondasi' => $pondasi,
				'penurunan' => $penurunan,
				'sambunganpondasikolom' => 	$sampon,
				'kolomtiangbearing' =>  $kolom,
				'sambungankolomatas' => $samkol,
				'balok' => $balok,
				'sambunganbalok' => $samba,
				'pelat' => $pelat,
				'bracingvertikal' => $brave,
				'bracinghorizontal' =>  $brahor,
				'rangkamomen' => $rangmo,
				'dindinggeser' => $dingge,
				'lainlain' => $lainlain,
				'sambungankolomatap' => $samkola,
				'rangka' => $rangka,
				'gording' => $gording,
				'koneksisambungan' => $konsam,
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentsipil_struktur');
		if(isset($save)){
			redirect('crud/assessment2?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}

	}

	public function updateSipil2(){
		$assessID = $this->input->post('assessID');
		$pasding = $this->input->post('pasding');
		$plester = $this->input->post('plester');
		$finding = $this->input->post('finding');
		$plin = $this->input->post('plin');
		$kujen = $this->input->post('kujen');
		$kajen = $this->input->post('kajen');
		$aksjen = $this->input->post('aksjen');
		$kupin = $this->input->post('kupin');
		$dapin = $this->input->post('dapin');
		$akspin = $this->input->post('akspin');
		$lantai = $this->input->post('lantai');
		$kanopi = $this->input->post('kanopi');
		$parapets = $this->input->post('parapets');
		$rangkapla = $this->input->post('rangkapla');
		$penutuppla = $this->input->post('penutuppla');
		$kronispla = $this->input->post('kronispla');
		$penutupat = $this->input->post('penutupat');
		$insulasiat = $this->input->post('insulasiat');
		$lisplankat = $this->input->post('lisplankat');
		$betonper = $this->input->post('betonper');
		$aspalper = $this->input->post('aspalper');
		$pavingper = $this->input->post('pavingper');
		$rangpart = $this->input->post('rangpart');
		$lispart = $this->input->post('lispart');
		$plinpart = $this->input->post('plinpart');
		$suntir = $this->input->post('suntir');
		$sunblind = $this->input->post('sunblind');
		$sticktir = $this->input->post('sticktir');
		$lainnya = $this->input->post('lainnya');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'pasangandinding' => $pasding,
				'plester' => $plester,
				'finishingdinding' => $finding,
				'plin' =>  $plin,
				'kusenjendela' => $kujen,
				'kacajendela' => $kajen,
				'aksesorisjendela' => $aksjen,
				'kusenpintu' => $kupin,
				'daunpintu' => $dapin,
				'aksesoris' =>  $akspin,
				'lantai' => $lantai,
				'kanopi' => $kanopi,
				'parapets' => $parapets,
				'rangkaplafon' => $rangkapla,
				'penutupplafon' => $penutuppla,
				'kronisplafon' => $kronispla,
				'penutupatap' => $penutupat,
				'insulasi' => $insulasiat,
				'lisplank' => $lisplankat,
				'beton' => $betonper,
				'aspal' => $aspalper,
				'pavingblock' => $pavingper,
				'rangkapartisi' => $rangpart,
				'lisatas' => $lispart,
				'plinpartisi' => $plinpart,
				'sunshade' => $suntir,
				'blind' => $sunblind,
				'sticker' => $sticktir,
				'lainnya' => $lainnya,

			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentarsitektur');

		if(isset($save)){
			redirect('crud/assessment3?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}
	}

	public function updateSipil3(){
		$assessID = $this->input->post('assessID');
		$generator = $this->input->post('generator');
		$elevator = $this->input->post('elevator');
		$eskalator = $this->input->post('eskalator');
		$pompaair = $this->input->post('pompaair');
		$lainlain = $this->input->post('lainlain');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'generator' => $generator,
				'elevator' => $elevator,
				'eskalator' => 	$eskalator,
				'pompaair' =>  $pompaair,
				'lainlainmekanikal' => $lainlain,
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentmekanikal');
		if(isset($save)){
			redirect('crud/assessment4?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}

	}

	public function updateSipil4(){
		$assessID = $this->input->post('assessID');
		$wirdima = $this->input->post('wirdima');
		$iema = $this->input->post('iema');
		$coprma = $this->input->post('coprma');
		$wircama = $this->input->post('wircama');
		$wirdisub = $this->input->post('wirdisub');
		$iesub = $this->input->post('iesub');
		$coprosub = $this->input->post('coprosub');
		$wircasub = $this->input->post('wircasub');
		$wirdiloc = $this->input->post('wirdiloc');
		$ieloc = $this->input->post('ieloc');
		$coproloc = $this->input->post('coproloc');
		$wircaloc = $this->input->post('wircaloc');
		$pejal = $this->input->post('pejal');
		$tdos = $this->input->post('tdos');
		$rakka = $this->input->post('rakka');
		$malis = $this->input->post('malis');
		$saklar = $this->input->post('saklar');
		$stopkon = $this->input->post('stopkon');
		$stopkonac = $this->input->post('stopkonac');
		$sisgro = $this->input->post('sisgro');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'wiringdiagrammain' => $wirdima,
				'identificationelectircalequipmentmain' => $iema,
				'coverprotectionmain' => $coprma,
				'wiringcabelmain' => $wircama,
				'wiringdiagramsub' => $wirdisub,
				'identificationelectircalequipmentsub' => $iesub,
				'coverprotectionsub' => $coprosub,
				'wiringcabelsub' => $wircasub,
				'wiringdiagramlocal' => $wirdiloc,
				'identificationelectircalequipmentlocal' => $ieloc,
				'coverprotectionlocal' => $coproloc,
				'wiringcabellocal' => $wircaloc,
				'pelindungjalurkabel' => $pejal,
				'tdos' => $tdos,
				'rakkabel' => $rakka,
				'materiallistrik' => $malis,
				'saklar' => $saklar,
				'stopkontak' => $stopkon,
				'stopkontakac' => $stopkonac,
				'sistemgrounding' => $sisgro,
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentelektrikal');
		if(isset($save)){
			redirect('crud/assessment5?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}
	}

	public function updateSipil5(){
		$assessID = $this->input->post('assessID');
		$debair = $this->input->post('debair');
		$piber = $this->input->post('piber');
		$pibek = $this->input->post('pibek');
		$pikot = $this->input->post('pikot');
		$tanat = $this->input->post('tanat');
		$tanbaw = $this->input->post('tanbaw');
		$konsam = $this->input->post('konsam');
		$ventpipe = $this->input->post('ventpipe');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'debitair' => $debair,
				'pipaairbersih' => $piber,
				'pipaairbekas' =>  $pibek,
				'pipaairkotor' => $pikot,
				'tankiatas' => $tanat,
				'tankibawah' => $tanbaw,
				'koneksisambunganpemipaan' => $konsam,
				'ventpipe' => 	$ventpipe
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentpemipaan');
		if(isset($save)){
			redirect('crud/assessment6?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}

	}

	public function updateSipil6(){
		$assessID = $this->input->post('assessID');
		$select1 = $this->input->post('select1');
		$select2 = $this->input->post('select2');
		$select3 = $this->input->post('select3');
		$select4 = $this->input->post('select4');
		$select5 = $this->input->post('select5');
		$select6 = $this->input->post('select6');
		$select7 = $this->input->post('select7');
		$select8 = $this->input->post('select8');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'pengolahanairlimbah' => $select1,
				'septictank' => $select2,
				'closet' =>  $select3,
				'urinal' => $select4,
				'wastafel' => $select5,
				'kitchensink' => $select6,
				'shower' => $select7,
				'valve' => 	$select8
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentsanitasi');
		if(isset($save)){
			redirect('crud/assessment7?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}

	}

	public function updateSipil7(){
		$assessID = $this->input->post('assessID');
		$select1 = $this->input->post('select1');
		$select2 = $this->input->post('select2');
		$select3 = $this->input->post('select3');
		$select4 = $this->input->post('select4');
		$select5 = $this->input->post('select5');
		$select6 = $this->input->post('select6');
		$select7 = $this->input->post('select7');
		$select8 = $this->input->post('select8');
		$select9 = $this->input->post('select9');
		$select10 = $this->input->post('select10');
		$select11 = $this->input->post('select11');
		$select12 = $this->input->post('select12');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'layout' => $select1,
				'porositastanah' => $select2,
				'sumurporos' =>  $select3,
				'saluranterbuka' => $select4,
				'saluranpengurasan' => $select5,
				'salurantertutup' => $select6,
				'kemiringansaluran' => $select7,
				'perangkaplemak' => $select8,
				'manhole' => $select9,
				'lubangtepi' => $select10,
				'pipavertikalatap' => $select11,
				'talangatap' => $select12,
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentdrainase');
		if(isset($save)){
			redirect('crud/assessment8?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}

	}

	public function updateSipil8(){
		$assessID = $this->input->post('assessID');
		$select1 = $this->input->post('select1');
		$select2 = $this->input->post('select2');
		$select3 = $this->input->post('select3');
		$select4 = $this->input->post('select4');
		$select5 = $this->input->post('select5');
		$select6 = $this->input->post('select6');
		$select7 = $this->input->post('select7');
		$select8 = $this->input->post('select8');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'unitindoor' => $select1,
				'unitoutdoor' => $select2,
				'piparefrigerant' =>  $select3,
				'pipadrainese' => $select4,
				'remotecontrol' => $select5,
				'kinerjasuhuruangan' => $select6,
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentac');
		if(isset($save)){
			redirect('crud/assessment9?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}

	}

	public function updateSipil9(){
		$assessID = $this->input->post('assessID');
		$select1 = $this->input->post('select1');
		$select2 = $this->input->post('select2');
		$select3 = $this->input->post('select3');
		$select4 = $this->input->post('select4');
		$select5 = $this->input->post('select5');
		$select6 = $this->input->post('select6');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'lightningrod' => $select1,
				'konduktor' => $select2,
				'koneksiatap' =>  $select3,
				'koneksidinding' => $select4,
				'groundrod' => $select5,
				'sumurinspeksi' => $select6,
			);



		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentproteksipetir');
		if(isset($save)){
			redirect('crud/assessment10?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}

	}

	public function updateSipil10(){
		$assessID = $this->input->post('assessID');
		$select1 = $this->input->post('select1');
		$select2 = $this->input->post('select2');
		$select3 = $this->input->post('select3');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');

		$data = array(
				'rumahlampu' => $select1,
				'lampu' => $select2,
				'pencahayaan' =>  $select3,
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentlampupenerangan');
		if(isset($save)){
			redirect('crud/assessment11?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}

	}

	public function updateSipil11(){
		$assessID = $this->input->post('assessID');
		$select1 = $this->input->post('select1');
		$select2 = $this->input->post('select2');
		$select3 = $this->input->post('select3');
		$select4 = $this->input->post('select4');
		$select5 = $this->input->post('select5');
		$select6 = $this->input->post('select6');
		$select7 = $this->input->post('select7');
		$select8 = $this->input->post('select8');
		$select9 = $this->input->post('select9');
		$select10 = $this->input->post('select10');
		$select11 = $this->input->post('select11');
		$select12 = $this->input->post('select12');
		$select13 = $this->input->post('select13');
		$select14 = $this->input->post('select14');
		$select15 = $this->input->post('select15');
		$select16 = $this->input->post('select16');
		$save = $this->input->post('save');
		$finish = $this->input->post('finish');


		$data = array(
				'asap' => $select1,
				'panas' => $select2,
				'panelalarm' =>  $select3,
				'fullstation' => $select4,
				'kabel' => $select5,
				'fireextinguisher' => $select6,
				'firehydrant' => $select7,
				'safetyplan' => $select8,
				'koridor' => $select9,
				'pintukeluar' => $select10,
				'titikberkumpul' => $select11,
				'assemblypoint' => $select12,
				'petunjukkeluar' => $select13,
				'lampudarurat' => $select14,
				'diagramevakuasi' => $select15,
				'peralatankeselamatan' => $select16,
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmentproteksikebakaran');
		if(isset($save)){
			redirect('crud/assessment12?id='.$assessID);
		}else if(isset($finish)){
			redirect('crud/assessmenthasil?id='.$assessID);
		}

	}

	public function updateSipil12(){
		$assessID = $this->input->post('assessID');
		$select1 = $this->input->post('select1');
		$select2 = $this->input->post('select2');
		$select3 = $this->input->post('select3');
		$select4 = $this->input->post('select4');
		$select5 = $this->input->post('select5');

		$data = array(
				'struktur' => $select1,
				'handrail' => $select2,
				'anaktangga' =>  $select3,
				'antislip' => $select4,
				'suduttangga' => $select5,
			);

		$where = array('asset_id' => $assessID);

		$this->m_data->update_sipil($where, $data, 'assessmenttangga');
		redirect('crud/assessmenthasil?id='.$assessID);

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
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');

	}

	public function assessmentHasil(){
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
		$this->load->view('v_assessmentHasil', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');

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
		$this->m_data->insert_dataupdate($dataU, 'update_record');
	}

	public function disposalProgress(){

		$data = array(
			'disposal' => $this->m_data->get_disposal()->result()
			);

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_disposalProgress', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_footer');
	}

	public function insertProgress(){
		$id = $this->input->post('progress');
		$assetid= $this->input->post('assetid');
		$tanggal= $this->input->post('tanggal');

		$result = array(
				"asset_id" => $assetid,
				"date" => $tanggal,
				"id_surplus" => $id,
			);

		$this->m_data->input_disposalprogress($result, 'surplus_progress');
		redirect('crud/home');
	}

	public function viewList(){
		$category = $_GET['category'];
		if($category == 1){
			$categorySql = "`sipil&struktur`";
		}else if($category == 2){
			$categorySql = "`arsitektur`";
		}else if($category == 3){
			$categorySql = "`mekanikal`";
		}else if($category == 4){
			$categorySql = "`elektrikal`";
		}else if($category == 5){
			$categorySql = "`sistempemipaan`";
		}

		$this->load->library('pagination');
		$this->load->library('table');
		$jumlah_data = $this->m_data->jumlah_dataViewList($categorySql);
		$config['page_query_string'] = TRUE;
		$config['uri_protocol']= 'PATH_INFO';
		$config['base_url'] = base_url().'/crud/viewList?category='.$category;
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
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
			'viewList' => $this->m_data->get_viewList($config['per_page'], $from, $categorySql)->result(),
			);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_viewList', $data);
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');

	}

	public function viewStatusList(){
		$category = $_GET['status'];
		if($category == 1){
			$categorySql = "Active";
		}else if($category == 2){
			$categorySql = "Idle";
		}else if($category == 3){
			$categorySql = "Surplus";
		}else if($category == 4){
			$categorySql = "Scrapped";
		}

		$this->load->library('pagination');
		$this->load->library('table');
		$jumlah_data = $this->m_data->jumlah_dataViewStatusList($category);
		$config['page_query_string'] = TRUE;
		$config['uri_protocol']= 'PATH_INFO';
		$config['base_url'] = base_url().'/crud/viewStatusList?status='.$category;
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
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
			'viewList' => $this->m_data->get_viewStatusList($config['per_page'], $from, $category)->result(),
			);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_viewStatusList', $data);
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');

	}

	public function viewConditionList(){
		$category = $_GET['condition'];

		$this->load->library('pagination');
		$this->load->library('table');
		$jumlah_data = $this->m_data->jumlah_dataViewConditionList($category);
		$config['page_query_string'] = TRUE;
		$config['uri_protocol']= 'PATH_INFO';
		$config['base_url'] = base_url().'/crud/viewConditionList?condition='.$category;
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
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
			'viewList' => $this->m_data->get_viewConditionList($config['per_page'], $from, $category)->result(),
			);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_viewConditionList', $data);
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');

	}

	public function viewNotCompleted(){
		$this->load->library('pagination');
		$this->load->library('table');
		$jumlah_data = $this->m_data->jumlah_dataViewNotCompletedList();
		$config['page_query_string'] = TRUE;
		$config['uri_protocol']= 'PATH_INFO';
		$config['base_url'] = base_url().'/crud/viewNotCompleted?not=true';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
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
			'viewList' => $this->m_data->get_ViewNotComplete($config['per_page'], $from)->result(),
			);

		

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_viewNotCompletedList', $data);
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');
	}

	public function viewCapexOpex(){
		$view = $_GET['view'];

		if($view == "1"){
			$jenis= "CAPEX";

			$this->load->library('pagination');
			$this->load->library('table');
			$jumlah_data = $this->m_data->jumlah_dataViewCapexOpexList($jenis);
			$config['page_query_string'] = TRUE;
			$config['uri_protocol']= 'PATH_INFO';
			$config['base_url'] = base_url().'/crud/viewCapexOpex?view=1';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 10;
			$config['uri_segment'] = 2;

		if(isset($_GET['start'])){
			$from = ($_GET['start']) ? $_GET['start'] : 0;
		}else{
			$from = 0;
		}
		$this->pagination->initialize($config);

			$data = array(
				'datapo' => $this->m_data->get_dataPOList($config['per_page'], $from, $jenis)->result()
			);
		}else if($view == "2"){
			$jenis= "OPEX";

			$this->load->library('pagination');
			$this->load->library('table');
			$jumlah_data = $this->m_data->jumlah_dataViewCapexOpexList($jenis);
			$config['page_query_string'] = TRUE;
			$config['uri_protocol']= 'PATH_INFO';
			$config['base_url'] = base_url().'/crud/viewCapexOpex?view=2';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 10;
			$config['uri_segment'] = 2;

			if(isset($_GET['start'])){
				$from = ($_GET['start']) ? $_GET['start'] : 0;
			}else{
				$from = 0;
			}
			$this->pagination->initialize($config);

				$data = array(
					'datapo' => $this->m_data->get_dataPOList($config['per_page'], $from, $jenis)->result()
				);
		}else{
			$jenis= "%";
			$this->load->library('pagination');
			$this->load->library('table');
			$jumlah_data = $this->m_data->jumlah_dataPOOutstanding($jenis);
			$config['page_query_string'] = TRUE;
			$config['uri_protocol']= 'PATH_INFO';
			$config['base_url'] = base_url().'/crud/viewCapexOpex?view=3';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 10;
			$config['uri_segment'] = 2;

			if(isset($_GET['start'])){
				$from = ($_GET['start']) ? $_GET['start'] : 0;
			}else{
				$from = 0;
			}
			$this->pagination->initialize($config);

				$data = array(
					'datapo' => $this->m_data->get_dataPOOutstanding($config['per_page'], $from, $jenis)->result()
				);
			}
			$this->load->view('v_header', $data);
			$this->load->view('v_sidebar', $data);
			$this->load->view('v_modalIndex', $data);
			$this->load->view('v_viewCapexOpexList', $data);
			$this->load->view('v_modal', $data);
			$this->load->view('v_footer');
	}

	public function searchCapexOpex(){
		$po = $_GET['search'];
		$dept = $_GET['dept'];

		if($po == ""){
			$poSql = "%";
		}else{
			$poSql = "$po";
		}

		if($dept == ""){
			$deptSql = "%";
		}else{
			$deptSql = "%$dept%";
		}

		if(isset($_GET['outstand'])){
			$data = array(
				'datapo' => $this->m_data->get_dataPOOutstandingSearch($poSql, $deptSql)->result()
			);
		}else{

		$data = array(
				'datapo' => $this->m_data->get_dataPOSearchList($poSql, $deptSql)->result()
			);
		}

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_viewCapexOpexList', $data);
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');
	}

	public function poList(){
		$po = $_GET['po'];
		$data = array(
				'datapo' => $this->m_data->get_detailPO($po)->result()
			);

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_modalIndex', $data);
		$this->load->view('v_poList', $data);
		$this->load->view('v_modal', $data);
		$this->load->view('v_footer');

	}















































	public function document(){

		$data = array(
			'owner' => $this->m_data->owner()->result(),
			'keyfac' =>  $this->m_data->keyfacilities()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'assetname' =>  $this->m_data->assetname()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->unitasset()->result(),
			'status'  => $this->m_data->status()->result(),
			'funding' => $this->m_data->funding()->result(),
			'mainlocation' => $this->m_data->mainlocation()->result(),
			'sublocation' => $this->m_data->sublocation()->result(),
			'unitlocation' => $this->m_data->unitlocation()->result(),
			'document' => $this->m_data->document()->result(),
			'nomorpo' => $this->uri->segment(3),
			'listpo2' => $this->m_data->no_po2()->result(),
			'listname2' => $this->m_data->get_namedetail()->result(),
			'detailasset' => $this->m_data->get_detailasset()->result(),
			);

		

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_document', $data);
	}

	public function proses_ajax3(){
		$podoc = $_REQUEST['podoc'];
		$namedoc = $_REQUEST['namedoc'];

		$iddoc =  $this->m_data->get_iddoc($podoc,$namedoc)->result();

		echo json_encode($iddoc);
	}

	public function document_proses(){
		//bingung
		$doc = $this->input->post('document');
		$podoc = $this->input->post('podoc');
		$newpodoc = explode("|", $podoc);
		$namedoc = $this->input->post('namedoc');

		$next = $this->input->post('next');

		$result = array();
		foreach ($doc as $key => $val) {
			$po = $_POST['podoc'];
			$poNew = explode("|", $po);
			$result[] = array(
				"nomor_po" => $poNew[1],
				"id_assetname" => $_POST['namedoc'],
				"id_namadoc" => $_POST['document'][$key],
				"id_PIC_doc" => $_POST['podept'][$key],
				"tahundoc" => $_POST['yearpicker'][$key]
			);
		}
		$this->m_data->input_datadocument($result, 'document2');

		if($next == "next"){
			redirect('crud/upload_photo/?po='.$newpodoc[1].'&name='.$namedoc);
		}else{
			redirect('crud/document/?po='.$newpodoc[1].'&name='.$namedoc);
		}
	}

	public function upload_photo(){
		$data = array(
			'owner' => $this->m_data->owner()->result(),
			'keyfac' =>  $this->m_data->keyfacilities()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'assetname' =>  $this->m_data->assetname()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->unitasset()->result(),
			'status'  => $this->m_data->status()->result(),
			'funding' => $this->m_data->funding()->result(),
			'mainlocation' => $this->m_data->mainlocation()->result(),
			'sublocation' => $this->m_data->sublocation()->result(),
			'unitlocation' => $this->m_data->unitlocation()->result(),
			'document' => $this->m_data->document()->result(),
			'assetid' => $this->uri->segment(5),
			'listpo2' => $this->m_data->no_po2()->result(),
			'listname2' => $this->m_data->get_namedetail()->result(),
			'detailasset' => $this->m_data->get_detailasset()->result(),
			);

		

		$this->load->view('v_header', $data);
		$this->load->view('v_sidebar', $data);
		$this->load->view('v_uploadPhoto', $data);
	
	}

	public function proses_ajax5(){
		$pophoto = $_REQUEST['pophoto'];
		$namephoto = $_REQUEST['namephoto'];

		$idphoto =  $this->m_data->get_assetidphoto($pophoto, $namephoto)->result();

		echo json_encode($idphoto);
	}

	public function proses_ajax6(){
		$pophoto = $_REQUEST['pophoto'];
		$namephoto = $_REQUEST['namephoto'];

		if($pophoto == "--"){
			$op = "IS NULL";
		}else{
			$op = "= '".$pophoto."'";
		}

		$detailphoto =  $this->m_data->get_assetdetailphoto($op, $namephoto)->result();

		echo json_encode($detailphoto);
	}

	public function proses_ajax61(){
		$pophoto = $_REQUEST['pophoto'];
		$session = $this->session->userdata("role");
		if($session =="admin"){
			$session = "%";
		}
		$detailphoto =  $this->m_data->get_countAssetName($pophoto, $session)->result();

		echo json_encode($detailphoto);
	}

	public function proses_ajax6address(){
		$mainloc = $_REQUEST['mainloc'];
		$getaddress = $this->m_data->get_address($mainloc)->result();

		echo json_encode($getaddress);

	}

	public function upload_action(){
		$namephoto = $_REQUEST['namephoto'];
		$pophoto = $_REQUEST['pophoto'];
		$newpophoto = explode("|", $pophoto);
		$assetid = $_REQUEST['idphoto'];
		$assetidnext = $assetid + 1;
		$filename = './photo/'.$assetid.'.jpg';
		$nama = $_FILES["berkas"]["name"];
		$ext = pathinfo($nama, PATHINFO_EXTENSION);

		$config['file_name'] = $assetid;
		$config['overwrite'] = FALSE;
		$config['upload_path'] = './photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 5000;
		$config['max_width'] = 5000;
		$config['max_height'] = 5000;

		if(file_exists($filename)){
			$directory = "photo/".$assetid;
			$filecount = count(glob($directory . "*.*"));
			$config['file_name'] = $assetid."-".$filecount;
			$datas = array(
				'nama' => $filename,
				'jumlah' => $filecount,
				);		
		}else{
			$datas = array(
				'nama' => "haha",
				'jumlah' => "hoho",
				);	
		}
		$this->load->library('upload', $config);



		$data = array(
				'photo' => $assetid.".".$ext,
			);

		$where = array('asset_id' => $assetid);
		$this->m_data->update_datadetail($where, $data, 'detailasset');


		if(! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_error', $error);
		}

		redirect('crud/upload_photo/?po='.$newpophoto[1]."&name=".$namephoto."&id=".$assetidnext);
		
	}



	public function add_data(){

		$data = array(
			'owner' => $this->m_data->owner()->result(),
			'keyfac' =>  $this->m_data->keyfacilities()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'assetname' =>  $this->m_data->assetname()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->ambil_dataU()->result(),
			'status' => $this->m_data->status()->result(),
			'funding' => $this->m_data->funding()->result(),
			'mainlocation' => $this->m_data->mainlocation()->result(),
			'sublocation' => $this->m_data->sublocation()->result(),
			'unitlocation' => $this->m_data->unitlocation()->result(),
			'document' => $this->m_data->document()->result(),

			);

		

		$this->load->view('v_header',$data);
		$this->load->view('v_sidebar',$data);
		$this->load->view('v_indexAdd',$data);

	}

	public function add_prose(){
		$this->form_validation->set_rules('po', 'PO Number', 'required|exact_length[6]|numeric');
		$this->form_validation->set_rules('owner', 'Owner', 'required');
		$this->form_validation->set_rules('family', 'Family', 'required');
		$this->form_validation->set_rules('keyfac', 'Key Facilities', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('pic', 'PIC', 'required');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == false){
			$data = array(
			'owner' => $this->m_data->owner()->result(),
			'keyfac' =>  $this->m_data->keyfacilities()->result(),
			'pic' =>  $this->m_data->pic()->result(),
			'family' => $this->m_data->ambil_dataF()->result(),
			'assetname' =>  $this->m_data->assetname()->result(),
			'subfamily' => $this->m_data->ambil_dataSF()->result(),
			'unitasset' => $this->m_data->ambil_dataU()->result(),
			'status' => $this->m_data->status()->result(),
			'funding' => $this->m_data->funding()->result(),
			'mainlocation' => $this->m_data->mainlocation()->result(),
			'sublocation' => $this->m_data->sublocation()->result(),
			'unitlocation' => $this->m_data->unitlocation()->result(),
			'document' => $this->m_data->document()->result(),

			);

			$this->load->view('v_header',$data);
			$this->load->view('v_sidebar',$data);
			$this->load->view('v_indexAdd');
		}else{
			$po = $this->input->post('po');
			$owner = $this->input->post('owner');
			$keyfac = $this->input->post('keyfac');
			$pic = $this->input->post('pic');
			$family = $this->input->post('family');
			$name = $this->input->post('name');

			$familyNew= explode("|", $family);

			$data = array(
					'id_general' => 'NULL',
					'no_po' => $po,
					'id_owner' => 	$owner,
					'id_family' => $familyNew[1],
					'id_keyfacilities' => $keyfac,
					'id_assetname' => $name,
					'id_dept' => $pic,
					'id_preassetid' => '',
					'jumlah' => '',
				);

			$this->m_data->input_datageneral($data, 'generalasset');

			$subfamily = $this->input->post('subfamily');
			$unitfamily = $this->input->post('unitfamily');
			$brand = $this->input->post('brand');
			$dimension = $this->input->post('dimension');
			$serialnum = $this->input->post('serialnum');
			$type = $this->input->post('type');
			$status = $this->input->post('status');
			$funding = $this->input->post('funding');
			$purchdate = $this->input->post('purchdate');
			$instdate = $this->input->post('instdate');
			$usedby = $this->input->post('usedby');
			$oripam = $this->input->post('oripam');
			$pamname = $this->input->post('pamname');
			$photo = $this->input->post('photo');

			$subfamilyNew = explode("|", $subfamily);
			$unitfamilyNew = explode("|", $unitfamily);

			if(isset($subfamily) && isset($unitfamily)){
				$idunitassetnew = $familyNew[1].$subfamilyNew[1].$unitfamilyNew[1];
			}else if(isset($subfamily)){
				$idunitassetnew = $familyNew[1].$subfamilyNew[1];
			}else{
				$idunitassetnew = NULL;
			}

			
			
			$dataDetail = array(
					'id_unitasset' => $idunitassetnew,
					'id_dept' => (!empty($usedby)) ? $usedby : NULL,
					'brand' => $brand,
					'type' => $type,
					'dimension' => $dimension,
					'serial_numb' => $serialnum,
					'photo' => $photo,
					'id_status' => (!empty($status)) ? $status : NULL,
					'purchasingdate' => $purchdate,
					'installdate' => $instdate,
					'id_funding' => (!empty($funding)) ? $funding : NULL,
					
				);

			$id_detail = $this->m_data->max_id()->row();

			$where = array('id_detailasset' => $id_detail->maxid);


			
			$this->m_data->update_datadetail($where, $dataDetail, 'detailasset');

			/////////////////////////////////////////////////////////////////////

			$po2 = $this->input->post('po2');
			$owner2 = $this->input->post('owner2');
			$keyfac2 = $this->input->post('keyfac2');
			$pic2 = $this->input->post('pic2');
			$family2 = $this->input->post('family2');
			$name2 = $this->input->post('name2');

			$familyNew2= explode("|", $family2);

			if(isset($po2)){

				$data2 = array(
						'id_general' => 'NULL',
						'no_po' => $po2,
						'id_owner' => 	$owner2,
						'id_family' => $familyNew2[1],
						'id_keyfacilities' => $keyfac2,
						'id_assetname' => $name2,
						'id_dept' => $pic2,
						'id_preassetid' => '',
						'jumlah' => '',
					);


				$subfamily2 = $this->input->post('subfamily2');
				$unitfamily2 = $this->input->post('unitfamily2');
				$brand2 = $this->input->post('brand2');
				$dimension2 = $this->input->post('dimension2');
				$serialnum2 = $this->input->post('serialnum2');
				$type2 = $this->input->post('type2');
				$status2 = $this->input->post('status2');
				$funding2 = $this->input->post('funding2');
				$purchdate2 = $this->input->post('purchdate2');
				$instdate2 = $this->input->post('instdate2');
				$usedby2 = $this->input->post('usedby2');
				$oripam2 = $this->input->post('oripam2');
				$pamname2 = $this->input->post('pamname2');
				$photo2 = $this->input->post('photo2');

				$subfamilyNew2 = explode("|", $subfamily2);
				$unitfamilyNew2 = explode("|", $unitfamily2);

				if(isset($subfamily2) && isset($unitfamily2)){
					$idunitassetnew2 = $familyNew2[1].$subfamilyNew2[1].$unitfamilyNew2[1];
				}else if(isset($subfamily2)){
					$idunitassetnew2 = $familyNew2[1].$subfamilyNew2[1];
				}else{
					$idunitassetnew2 = NULL;
				}

				$this->m_data->input_datageneral($data2, 'generalasset');
				
				$dataDetail2 = array(
						'id_unitasset' => $idunitassetnew2,
						'id_dept' => (!empty($usedby2)) ? $usedby2 : NULL,
						'brand' => $brand2,
						'type' => $type2,
						'dimension' => $dimension2,
						'serial_numb' => $serialnum2,
						'photo' => $photo2,
						'id_status' => (!empty($status2)) ? $status2 : NULL,
						'purchasingdate' => $purchdate2,
						'installdate' => $instdate2,
						'id_funding' => (!empty($funding2)) ? $funding2 : NULL,
						
					);

				$id_detail = $this->m_data->max_id()->row();

				$where = array('id_detailasset' => $id_detail->maxid);

				$this->m_data->input_datageneral($data2, 'generalasset');
				
				$this->m_data->update_datadetail($where, $dataDetail2, 'detailasset');
			}
			redirect('crud/');
		}

	}

	public function tes(){
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_tes');

	}

}




?>