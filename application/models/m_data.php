<?php
class M_data extends CI_Model{

	function input_refpo($data, $table){
		$query = $this->db->insert($table, $data);
		if(!$query){
			show_error("Your inserted PO number already registered on database!<br>Contact Admin for further information.", 500);
			exit;
		}
	}

	function input_capexopex($data, $table){
		$this->db->insert($table, $data);
	}

	function input_datageneral($datageneral, $table){
		$this->db->insert_batch($table, $datageneral);
	}

	function input_datadocument($datadocument, $table){
		$this->db->insert_batch($table, $datadocument);
	}

	function update_datadetail($where, $datadetail, $table){
		$this->db->where($where);
		$this->db->update($table, $datadetail);
	}

	function update_datageneral($where, $datageneral, $table1){
		$this->db->where($where);
		$this->db->update($table1, $datageneral);
	}

	function check_update($table, $where){
		return $this->db->get_where($table, $where);
	}

	function update_dataupdate($where, $dataupdate, $table){
		$this->db->where($where);
		$this->db->where("id = (SELECT * FROM (SELECT MAX(id) FROM update_record) t)");
		$this->db->update($table, $dataupdate);
	}

	function get_disposal(){
		return $this->db->query('SELECT * FROM ref_surplus');
	}

	function input_disposalprogress($data, $table){
		$this->db->insert($table, $data);
	}

	function insert_dataupdate($data, $table){
		$this->db->insert($table, $data);
	}


	//Entry data

	function no_po(){
		return $this->db->query('SELECT no_po FROM ref_po WHERE type = "new"');
	}

	function no_po2($session){
		return $this->db->query("SELECT DISTINCT rp.no_po FROM generalasset g JOIN ref_po rp ON rp.no_po = g.no_po JOIN sequence s ON s.id_general = g.id_general
			JOIN detailasset d ON d.asset_id = s.asset_id
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family
			WHERE rp.type = 'new' AND rf.family LIKE '$session' AND (d.purchasingdate = '0000-00-00' OR d.purchasingdate IS NULL)");
	}

	function get_dept($po){
		return $this->db->query("SELECT d.workingunit, p.porequestor FROM ref_po as p JOIN ref_dept AS d 
			ON p.id_podepartment = d.id_dept WHERE p.no_po = '$po' ");
	}

	function get_desc($po){
		return $this->db->query("SELECT * FROM capexopex WHERE no_po = '$po' ");
	}

	function get_detailasset(){
		return $this->db->query("SELECT * FROM detailasset");
	}

	function get_namedetail($session){
		return $this->db->query("SELECT DISTINCT a.name, a.id_assetname, g.no_po FROM ref_assetname AS a JOIN generalasset AS g ON a.id_assetname = g.id_assetname
								JOIN sequence AS s ON s.id_general = g.id_general JOIN detailasset AS d ON d.asset_id = s.asset_id 
								LEFT JOIN ref_familyasset rf on rf.id_familyasset = g.id_family
								JOIN ref_po rp ON g.no_po = rp.no_po WHERE rp.type = 'new' AND rf.family LIKE '$session' AND (purchasingdate = '0000-00-00' OR purchasingdate IS NULL)");
	}

	function get_assetid($po2, $name2){
		return $this->db->query("SELECT * FROM detailasset as d JOIN sequence AS s ON d.asset_id = s.asset_id JOIN generalasset AS g ON s.id_general = g.id_general 
			WHERE no_po = '$po2' AND id_assetname = '$name2'");
	}

	function get_assetidphoto($pophoto, $namephoto){
		return $this->db->query("SELECT * FROM detailasset as d JOIN sequence AS s ON d.asset_id = s.asset_id JOIN generalasset AS g ON s.id_general = g.id_general
			WHERE no_po = '$pophoto' AND id_assetname = '$namephoto'");
	}

	function get_countAssetName($op, $session){
		return $this->db->query("SELECT count(DISTINCT(g.id_assetname)) as jumlah FROM detailasset as d JOIN sequence AS s ON d.asset_id = s.asset_id 
			JOIN generalasset AS g ON s.id_general = g.id_general
			LEFT JOIN ref_familyasset rf on rf.id_familyasset = g.id_family
			WHERE no_po = '$op' AND rf.family LIKE '$session' AND (purchasingdate = '0000-00-00' OR purchasingdate IS NULL)");
	}

	function get_assetdetailphoto($op, $namephoto){
		return $this->db->query("SELECT * FROM detailasset as d JOIN sequence AS s ON d.asset_id = s.asset_id JOIN generalasset AS g ON s.id_general = g.id_general
			LEFT JOIN ref_dept AS rd ON d.id_dept = rd.id_dept LEFT JOIN ref_unitasset AS ru ON d.id_unitasset = ru.id_unitasset LEFT JOIN ref_status AS rs 
			ON d.id_status = rs.id_status LEFT JOIN ref_familyasset AS rf ON g.id_family = rf.id_familyasset
			WHERE no_po $op AND id_assetname = '$namephoto' AND (purchasingdate = '0000-00-00' OR purchasingdate IS NULL)");
	}

	function get_assetidDocument($poNew2, $name){
		return $this->db->query("SELECT * FROM document AS d JOIN sequence AS s ON d.asset_id = s.asset_id JOIN generalasset AS g ON s.id_general = g.id_general
								WHERE g.no_po = '$poNew2' AND g.id_assetname = '$name'");
	}

	function get_address($mainloc){
		return $this->db->query("SELECT * FROM mainlocation AS ml JOIN ref_address ra ON ra.id_address = ml.id_address WHERE ml.id_mainlocation = '$mainloc'");
	}

	//Dashboard

	function get_countStatus(){
		return $this->db->query("SELECT rs.id_status, rs.status, COUNT(d.id_status) AS jumlah FROM ref_status AS rs 
			LEFT OUTER JOIN detailasset AS d ON d.id_status = rs.id_status GROUP BY rs.status ORDER BY RS.id_status");
	}

	function get_countStatusActive(){
		return $this->db->query("SELECT rs.id_status, rs.status, COUNT(d.id_status) AS jumlah FROM ref_status AS rs 
			LEFT OUTER JOIN detailasset AS d ON d.id_status = rs.id_status WHERE rs.id_status = 1");
	}

	function get_countStatusOthers(){
		return $this->db->query("SELECT rs.id_status, rs.status, COUNT(d.id_status) AS jumlah FROM ref_status  AS rs 
			LEFT OUTER JOIN detailasset AS d  ON d.id_status = rs.id_status GROUP BY rs.status HAVING rs.id_status != 1
			ORDER BY RS.id_status");
	}

	function get_overallScore(){
		return $this->db->query("SELECT rc.id_condition, rc.condition, COUNT(c.asset_id) AS jumlah FROM `condition` c RIGHT OUTER JOIN ref_condition rc 
			ON rc.id_condition = c.overallscore 
			GROUP BY rc.`condition` ORDER BY rc.id_condition");
	}

	function get_statusAsset(){
		return $this->db->query("SELECT rs.id_status, rs.status, COUNT(d.asset_id) AS jumlah FROM detailasset d RIGHT OUTER JOIN ref_status rs 
			ON rs.id_status = d.id_status GROUP BY rs.status ORDER BY rs.id_status");
	}

	function get_totalAsset(){
		return $this->db->query("SELECT COUNT(asset_id) AS total FROM `sequence`");
	}

	function get_outstandingDept(){
		return $this->db->query('SELECT DISTINCT(department) FROM capexopex AS c WHERE NOT EXISTS (SELECT no_po FROM ref_po AS rp WHERE rp.no_po = c.no_po) 
			ORDER BY department');
	}

	function get_outstandingCount(){
		return $this->db->query('SELECT COUNT(c.no_po) AS jumlah, c.department FROM capexopex AS c WHERE NOT EXISTS (SELECT no_po FROM ref_po AS rp WHERE rp.no_po = c.no_po)
		 GROUP BY department ORDER BY department');
	}

	function get_outstandingCountTotal(){
		return $this->db->query('SELECT COUNT(c.no_po) as jumlah FROM capexopex AS c WHERE NOT EXISTS (SELECT no_po FROM ref_po AS rp WHERE rp.no_po = c.no_po)');
	}

	function get_capexopexTotal(){
		return $this->db->query('SELECT COUNT(no_po) as jumlah FROM capexopex');
	}

	function get_outstandingCount2(){
		return $this->db->query("SELECT COUNT(*) total, (SELECT count(*) FROM capexopex AS c LEFT JOIN ref_po rp ON rp.no_po = c.no_po WHERE rp.no_po IS NULL ) 
			outstanding FROM capexopex");
	}

	function get_tabelOutstanding(){
		return $this->db->query("SELECT c.department, COUNT(*) jumlah FROM capexopex c LEFT JOIN ref_po rp ON rp.no_po = c.no_po WHERE rp.no_po IS NULL GROUP BY department");
	}

	function get_totalCapexData(){
		return $this->db->query("SELECT COUNT(no_po) AS total FROM `capexopex`");
	}

	function get_totalUser(){
		return $this->db->query("SELECT COUNT(id) AS total FROM `user`");
	}

	function get_countNotComplete(){
		return $this->db->query("SELECT COUNT(d.asset_id) AS total from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN location AS l ON l.asset_id = s.asset_id
    		LEFT JOIN `condition` c ON c.asset_id = s.asset_id 
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status
			LEFT JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
			WHERE d.id_subfamilyasset IS NULL
			OR d.id_unitasset IS NULL
			OR d.barcode IS NULL
			OR d.id_dept IS NULL
			OR d.brand IS NULL
			OR d.type IS NULL
			OR d.dimension IS NULL
			OR d.serial_numb IS NULL
			OR d.id_status IS NULL
			OR d.purchasingdate IS NULL
			OR d.installdate IS NULL
			OR c.id_condition IS NULL
			OR c.dateofsurvey IS NULL
			OR c.surveyor IS NULL
			OR c.overallscore IS NULL
			OR c.remarks IS NULL
			OR l.id_mainlocation IS NULL
			OR l.id_sublocation IS NULL
			OR l.id_unitlocation IS NULL");
		}

	function get_recentUpdate(){
		return $this->db->query("SELECT u.*, ra.name FROM update_record u JOIN sequence s ON s.asset_id =  u.asset_id
			JOIN generalasset g ON g.id_general = s.id_general 
			LEFT JOIN ref_assetname ra ON ra.id_assetname = g.id_assetname
			WHERE YEAR(updatedate) = YEAR(CURRENT_DATE) AND MONTH(updatedate) = MONTH(CURRENT_DATE)
			ORDER BY updatedate DESC, id DESC");
	}

	function get_percentSipil(){
		return $this->db->query("SELECT cast(AVG(score) as decimal(6,0)) AS average FROM assessmentsipil_struktur WHERE score != 0");
	}

	function get_percentArsitek(){
		return $this->db->query("SELECT cast(AVG(score) as decimal(6,0)) AS average FROM assessmentarsitektur WHERE score != 0");
	}

	function get_percentMekanik(){
		return $this->db->query("SELECT cast(AVG(score) as decimal(6,0)) AS average FROM assessmentmekanikal WHERE score != 0");
	}

	function get_percentElektrik(){
		return $this->db->query("SELECT cast(AVG(score) as decimal(6,0)) AS average FROM assessmentelektrikal WHERE score != 0");
	}
	function get_percentPemipaan(){
		return $this->db->query("SELECT cast(AVG(score) as decimal(6,0)) AS average FROM assessmentpemipaan WHERE score != 0");
	}

	//View

	function getdataUpdate($updateID){
		return $this->db->query("SELECT d.*, g.*,rd.*, c.*, ru.*,l.*, ml.mainlocation, ml.id_group AS grupM, sl.sublocation, sl.id_group AS grupS, 
			ul.unitlocation, rf.family, ra.name, dp.originalpamnumber, dp.pamassetname, ro.address AS address1, rad.address AS address2, rp.no_po, row.owner
			FROM detailasset as d JOIN sequence AS s ON d.asset_id = s.asset_id JOIN generalasset AS g ON s.id_general = g.id_general
			LEFT JOIN ref_po rp ON rp.no_po = g.no_po
			LEFT JOIN ref_dept AS rd ON d.id_dept = rd.id_dept LEFT JOIN `condition` AS c ON c.asset_id = s.asset_id LEFT JOIN ref_unitasset AS ru ON d.id_unitasset = ru.id_unitasset
			JOIN location AS l ON l.asset_id = d.asset_id LEFT JOIN ref_status AS rs 
			ON d.id_status = rs.id_status LEFT JOIN ref_familyasset AS rf ON g.id_family = rf.id_familyasset
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation 
			LEFT JOIN sublocation AS sl ON sl.id_sublocation = l.id_sublocation
			LEFT JOIN unitlocation AS ul ON ul.id_unitlocation = l.id_unitlocation
			LEFT JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN detailpam AS dp ON dp.asset_id = s.asset_id
			LEFT JOIN ref_obj_id AS ro ON ro.objectid = l.objectid
			LEFT JOIN ref_address rad ON rad.id_address = ml.id_address
			LEFT JOIN ref_owner row ON row.id = g.id_owner
			WHERE d.asset_id = '$updateID'");
	}

	function getSurplusProgress($updateID){
		return $this->db->query("SELECT s.asset_id, sp.`date`, rs.status FROM sequence s LEFT JOIN surplus_progress sp ON sp.asset_id = s.asset_id 
			LEFT JOIN ref_surplus rs ON rs.id_surplus = sp.id_surplus WHERE s.asset_id = '$updateID' ");
	}

	function max_id(){
		return $this->db->query('SELECT max(id_general) AS maxid FROM generalasset');
	}

	function get_iddoc($podoc, $namedoc){
		return $this->db->query("SELECT id_namadoc FROM document2 WHERE nomor_po = '$podoc' AND id_assetname = '$namedoc'");
	}
	
	function get_dataView($jumlahPage, $from, $owner, $family){
		return $this->db->query("SELECT * from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN location AS l ON l.asset_id = s.asset_id
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status
			LEFT JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
		  WHERE g.id_owner = '$owner' AND g.id_family = '$family' AND d.purchasingdate IS NOT NULL ORDER BY s.asset_id LIMIT $from, $jumlahPage ");
	}

	function get_dataViewCount($jumlahPage, $from, $owner, $family){
		return $this->db->query("SELECT COUNT(d.asset_id) AS jumlah from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN location AS l ON l.asset_id = s.asset_id
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status
			LEFT JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
		  WHERE g.id_owner = '$owner' AND g.id_family = '$family' AND d.purchasingdate IS NOT NULL");
	}

	function get_dataSearch($jumlahPage, $from, $owner, $family, $keyfac, $loc, $searchBy){
		return $this->db->query("SELECT d.*, rf.family, ru.unitasset, rs.status, rd.workingunit, ra.name, ml.mainlocation from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id RIGHT JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN location AS l ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status LEFT JOIN ref_dept rd ON rd.id_dept = d.id_dept
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
		  WHERE ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac 
		  AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy
		  ORDER BY s.asset_id
		  LIMIT $from, $jumlahPage ");
	}

	function get_dataSearchCount($jumlahPage, $from, $owner, $family, $keyfac, $loc, $searchBy){
		return $this->db->query("SELECT COUNT(d.asset_id) AS jumlah from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id RIGHT JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN location AS l ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status LEFT JOIN ref_dept rd ON rd.id_dept = d.id_dept
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
		  WHERE ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac 
		  AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy");
	}

	function get_dataSearchStatus($jumlahPage, $from, $owner, $family, $keyfac, $loc, $searchBy, $jenis){
		return $this->db->query("SELECT d.*, rf.family, ru.unitasset, rs.status, rd.workingunit, ra.name, ml.mainlocation from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id RIGHT JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN location AS l ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status LEFT JOIN ref_dept rd ON rd.id_dept = d.id_dept
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
		  WHERE d.id_status LIKE '$jenis' AND ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac 
		  AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy
		  ORDER BY s.asset_id
		  LIMIT $from, $jumlahPage ");
	}

	function get_dataSearchCondition($jumlahPage, $from, $owner, $family, $keyfac, $loc, $searchBy, $jenis){
		return $this->db->query("SELECT d.*, rf.family, ru.unitasset, rs.status, rd.workingunit, ra.name, ml.mainlocation from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id RIGHT JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN `condition` AS c ON c.asset_id = s.asset_id
			LEFT JOIN location AS l ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status LEFT JOIN ref_dept rd ON rd.id_dept = d.id_dept
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
		  WHERE c.overallscore LIKE '$jenis' AND ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac 
		  AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy
		  ORDER BY s.asset_id
		  LIMIT $from, $jumlahPage ");
	}

	function get_dataSearchCountStatus($jumlahPage, $from, $owner, $family, $keyfac, $loc, $searchBy, $jenis){
		return $this->db->query("SELECT COUNT(d.asset_id) AS jumlah from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id RIGHT JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN location AS l ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status LEFT JOIN ref_dept rd ON rd.id_dept = d.id_dept
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
		  WHERE d.id_status LIKE '$jenis' AND ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac 
		  AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy");
	}

	function get_dataSearchCountCondition($jumlahPage, $from, $owner, $family, $keyfac, $loc, $searchBy, $jenis){
		return $this->db->query("SELECT COUNT(d.asset_id) AS jumlah from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id RIGHT JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN `condition` AS c ON c.asset_id = s.asset_id
			LEFT JOIN location AS l ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status LEFT JOIN ref_dept rd ON rd.id_dept = d.id_dept
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
		  WHERE c.overallscore LIKE '$jenis' AND ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac 
		  AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy");
	}

	function get_dataSearchNotTrue($jumlahPage, $from, $owner, $family, $keyfac, $loc, $searchBy){
		return $this->db->query("SELECT *, s.asset_id as asset_id from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN ref_po rp ON rp.no_po = g.no_po
			LEFT JOIN location AS l ON l.asset_id = s.asset_id
    		LEFT JOIN `condition` c ON c.asset_id = s.asset_id 
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status
			LEFT JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
			WHERE (d.id_subfamilyasset IS NULL
			OR d.id_unitasset IS NULL
			OR d.barcode IS NULL
			OR d.id_dept IS NULL
			OR d.brand IS NULL
			OR d.type IS NULL
			OR d.dimension IS NULL
			OR d.serial_numb IS NULL
			OR d.id_status IS NULL
			OR d.purchasingdate IS NULL
			OR d.installdate IS NULL
			OR c.id_condition IS NULL
			OR c.dateofsurvey IS NULL
			OR c.surveyor IS NULL
			OR c.overallscore IS NULL
			OR c.remarks IS NULL
			OR l.id_mainlocation IS NULL
			OR l.id_sublocation IS NULL
			OR l.id_unitlocation IS NULL)
			AND ifnull(g.id_owner,0) LIKE $owner  AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac 
			AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy
			ORDER BY s.asset_id
		 	LIMIT $from, $jumlahPage");
	}

	function get_dataSearchCountNotTrue($jumlahPage, $from, $owner, $family, $keyfac, $loc, $searchBy){
		return $this->db->query("SELECT count(s.asset_id) as jumlah from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN ref_po rp ON rp.no_po = g.no_po
			LEFT JOIN location AS l ON l.asset_id = s.asset_id
    		LEFT JOIN `condition` c ON c.asset_id = s.asset_id 
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status
			LEFT JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
			WHERE (d.id_subfamilyasset IS NULL
			OR d.id_unitasset IS NULL
			OR d.barcode IS NULL
			OR d.id_dept IS NULL
			OR d.brand IS NULL
			OR d.type IS NULL
			OR d.dimension IS NULL
			OR d.serial_numb IS NULL
			OR d.id_status IS NULL
			OR d.purchasingdate IS NULL
			OR d.installdate IS NULL
			OR c.id_condition IS NULL
			OR c.dateofsurvey IS NULL
			OR c.surveyor IS NULL
			OR c.overallscore IS NULL
			OR c.remarks IS NULL
			OR l.id_mainlocation IS NULL
			OR l.id_sublocation IS NULL
			OR l.id_unitlocation IS NULL)
			AND ifnull(g.id_owner,0) LIKE $owner  AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac 
			AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy");
	}

	function jumlah_data($owner, $family, $keyfac){
		return $this->db->query("SELECT d.* from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po
		  WHERE ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac")->num_rows();
	}

	function jumlah_dataSearch($owner, $family, $keyfac, $loc, $searchBy){
		return $this->db->query("SELECT d.* from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			JOIN location as L ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
		  WHERE ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac
		  AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy ")->num_rows();
	}

	function jumlah_dataSearchStatus($owner, $family, $keyfac, $loc, $searchBy, $jenis){
		return $this->db->query("SELECT d.* from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			JOIN location as L ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
		  WHERE d.id_status LIKE '$jenis' AND ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac
		  AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy ")->num_rows();
	}

	function jumlah_dataSearchCondition($owner, $family, $keyfac, $loc, $searchBy, $jenis){
		return $this->db->query("SELECT d.* from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			JOIN location as L ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN `condition` AS c ON c.asset_id = s.asset_id
		  WHERE c.overallscore LIKE '$jenis' AND ifnull(g.id_owner,0) LIKE $owner AND d.purchasingdate IS NOT NULL AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac
		  AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy ")->num_rows();
	}

	function jumlah_dataSearchNotTrue($owner, $family, $keyfac, $loc, $searchBy){
		return $this->db->query("SELECT d.* from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			JOIN location as l ON l.asset_id = s.asset_id LEFT JOIN ref_po AS rp ON rp.no_po = g.no_po JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN `condition` AS c ON c.asset_id = s.asset_id
		 	WHERE (d.id_subfamilyasset IS NULL
			OR d.id_unitasset IS NULL
			OR d.barcode IS NULL
			OR d.id_dept IS NULL
			OR d.brand IS NULL
			OR d.type IS NULL
			OR d.dimension IS NULL
			OR d.serial_numb IS NULL
			OR d.id_status IS NULL
			OR d.purchasingdate IS NULL
			OR d.installdate IS NULL
			OR c.id_condition IS NULL
			OR c.dateofsurvey IS NULL
			OR c.surveyor IS NULL
			OR c.overallscore IS NULL
			OR c.remarks IS NULL
			OR l.id_mainlocation IS NULL
			OR l.id_sublocation IS NULL
			OR l.id_unitlocation IS NULL)
			AND ifnull(g.id_owner,0) LIKE $owner AND  ifnull(g.id_family,0) LIKE $family AND ifnull(rp.id_keyfacility,0) LIKE $keyfac 
			AND ifnull(substr(l.id_mainlocation, 1,2),0) LIKE '$loc' $searchBy")->num_rows();
	}

	



	//others

	function ambil_dataF(){
		return $this->db->query('SELECT * FROM ref_familyasset');
	}

	function ambil_dataSF(){
		return $this->db->query('SELECT id_subfamilyasset, rs.id_familyasset, subfamily, family FROM ref_subfamilyasset AS rs 
									JOIN ref_familyasset AS rf ON rf.id_familyasset = rs.id_familyasset ');
	}

	function ambil_dataU(){
		return $this->db->query('SELECT id_unitasset, ru.id_subfamilyasset, unitasset, rs.subfamily FROM ref_unitasset AS ru
									JOIN ref_subfamilyasset AS rs ON rs.id_subfamilyasset = ru.id_subfamilyasset');
	}

	function unitasset(){
		return $this->db->query('SELECT * from ref_unitasset');
	}

	function owner(){
		return $this->db->query('SELECT * FROM ref_owner');
	}

	function keyfacilities(){
		return $this->db->query('SELECT * FROM ref_keyfacilities');
	}

	function pic(){
		return $this->db->query('SELECT * FROM ref_dept');
	}

	function family(){
		return $this->db->query('SELECT * FROM ref_familyasset');
	}

	function assetname(){
		return $this->db->query('SELECT * FROM ref_assetname');
	}

	function status(){
		return $this->db->query('SELECT * FROM ref_status');
	}

	function funding(){
		return $this->db->query('SELECT * FROM ref_funding');
	}

	function mainlocation(){
		return $this->db->query('SELECT * FROM mainlocation');
	}

	function sublocation(){
		return $this->db->query('SELECT ml.id_mainlocation,sb.id_sublocation, sb.id_group, sublocation FROM sublocation AS sb 
			JOIN mainlocation AS ml 
			 ON ml.id_group = sb.id_group');
	}

	function unitlocation(){
		return $this->db->query('SELECT id_unitlocation, ul.id_sublocation, unitlocation, sublocation FROM unitlocation AS ul 
			JOIN sublocation AS sl 
			 ON sl.id_sublocation = ul.id_sublocation ORDER BY unitlocation ASC');
	}

	function document(){
		return $this->db->query('SELECT * FROM ref_document');
	}

	//assessment
	function get_assesstment(){
		return $this->db->query("SELECT * FROM building_assessment ");
	}
	
	function get_hasilAHP(){
		return $this->db->query("SELECT ah.id_building, ba.nama, ba.asset_id, sum(nilai) AS total FROM `ahp_data_hasil2` ah 
			JOIN building_assessment ba
		 	ON ba.id = ah.id_building 
		 	GROUP BY id_building
		 	ORDER BY total DESC");
	}

	function get_hasilAHPCategory($a){
		return $this->db->query("SELECT ak.nama_kriteria, ah.nilai FROM ahp_data_hasil2 ah 
			JOIN ahp_data_kriteria ak ON ah.id_kriteria = ak.id_kriteria WHERE id_building = '$a'");
	}

	function getdataAssessment($assessmentID){
		return $this->db->query("SELECT d.*, g.*, ba.nama
			FROM detailasset as d JOIN sequence AS s ON d.asset_id = s.asset_id JOIN generalasset AS g ON s.id_general = g.id_general
			JOIN building_assessment AS ba ON ba.asset_id = d.asset_id 
			WHERE d.asset_id = '$assessmentID'");
	}

	function update_sipil($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function getdataAssess($updateID, $table){
		return $this->db->query("SELECT * FROM $table
			WHERE asset_id = '$updateID'");
	}

	function getdataAssess2($updateID){
		return $this->db->query("SELECT * FROM assessmentarsitektur
			WHERE asset_id = '$updateID'");
	}

	function getLaporanAssess($id){
		return $this->db->query("SELECT *,
			a.total as total1, 
			b.total as total2, 
			c.total as total3, 
			d.total as total4, 
			e.total as total5,
			f.total as total6, 
			g.total as total7, 
			h.total as total8, 
			i.total as total9, 
			j.total as total10,
			k.total as total11, 
			l.total as total12,
			a.jumlahKategori as kategori1, 
			b.jumlahKategori as kategori2, 
			c.jumlahKategori as kategori3, 
			d.jumlahKategori as kategori4, 
			e.jumlahKategori as kategori5,
			f.jumlahKategori as kategori6, 
			g.jumlahKategori as kategori7, 
			h.jumlahKategori as kategori8, 
			i.jumlahKategori as kategori9, 
			j.jumlahKategori as kategori10,
			k.jumlahKategori as kategori11, 
			l.jumlahKategori as kategori12

			FROM assessmentsipil_struktur a 
			JOIN assessmentarsitektur b 
			ON a.asset_id = b.asset_id 
			JOIN assessmentmekanikal c 
			ON a.asset_id = c.asset_id 
			JOIN assessmentelektrikal d 
			ON a.asset_id = d.asset_id 
			JOIN assessmentpemipaan e 
			ON a.asset_id = e.asset_id 
			JOIN assessmentsanitasi f 
			ON a.asset_id = f.asset_id 
			JOIN assessmentdrainase g 
			ON a.asset_id = g.asset_id 
			JOIN assessmentac h 
			ON a.asset_id = h.asset_id 
			JOIN assessmentproteksipetir i 
			ON a.asset_id = i.asset_id 
			JOIN assessmentlampupenerangan j 
			ON a.asset_id = j.asset_id 
			JOIN assessmentproteksikebakaran k 
			ON a.asset_id = k.asset_id 
			JOIN assessmenttangga l 
			ON a.asset_id = l.asset_id 

			WHERE a.asset_id = '$id'");
		}

	function getRefNilaSipil($a){
		return $this->db->query("SELECT * FROM ref_nilaiAssessment WHERE id = '$a'");
	}

	function cekFamily($a){
		return $this->db->query("SELECT g.id_family FROM sequence s JOIN generalasset g ON 
			g.id_general = s.id_general WHERE s.asset_id = '$a'");
	}

	function cekNameRef($a){
		return $this->db->query("SELECT name FROM ref_assetname WHERE id_assetname = '$a'");
	}

	function cekLocRef($a){
		return $this->db->query("SELECT mainlocation FROM mainlocation WHERE id_mainlocation = '$a'");
	}

	function get_viewList($jumlahPage, $from, $a){
		return $this->db->query("SELECT *, `sipil&struktur` AS sipil from building_assessment WHERE $a < 3 AND $a > 0 LIMIT $from, $jumlahPage");
	}

	function jumlah_dataViewList($a){
		return $this->db->query("SELECT *, `sipil&struktur` AS sipil from building_assessment WHERE $a < 3 AND $a > 0")->num_rows();
	}

	function get_viewStatusList($jumlahPage, $from, $a){
		return $this->db->query("SELECT d.asset_id, name, `status` from detailasset d JOIN sequence s ON s.asset_id = d.asset_id 
			JOIN generalasset g ON g.id_general = s.id_general 
			JOIN ref_assetname ra ON ra.id_assetname = g.id_assetname
			JOIN ref_status rs ON rs.id_status = d.id_status
			 WHERE d.id_status = $a LIMIT $from, $jumlahPage");
	}

	function jumlah_dataViewStatusList($a){
		return $this->db->query("SELECT d.asset_id, name, `status` from detailasset d JOIN sequence s ON s.asset_id = d.asset_id 
			JOIN generalasset g ON g.id_general = s.id_general 
			JOIN ref_assetname ra ON ra.id_assetname = g.id_assetname
			JOIN ref_status rs ON rs.id_status = d.id_status
			 WHERE d.id_status = $a")->num_rows();
	}

	function get_viewConditionList($jumlahPage, $from, $a){
		return $this->db->query("SELECT d.asset_id, ra.name, rc.condition as con from detailasset d JOIN sequence s ON s.asset_id = d.asset_id 
			JOIN generalasset g ON g.id_general = s.id_general 
			JOIN ref_assetname ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN `condition` c ON c.asset_id = s.asset_id
			LEFT JOIN ref_condition rc ON rc.id_condition = c.overallscore
			 WHERE c.overallscore = $a LIMIT $from, $jumlahPage");
	}

	function jumlah_dataViewConditionList($a){
		return $this->db->query("SELECT d.asset_id, ra.name, rc.condition as con from detailasset d JOIN sequence s ON s.asset_id = d.asset_id 
			JOIN generalasset g ON g.id_general = s.id_general 
			JOIN ref_assetname ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN `condition` c ON c.asset_id = s.asset_id
			LEFT JOIN ref_condition rc ON rc.id_condition = c.overallscore
			 WHERE c.overallscore = $a")->num_rows();
	}

	function get_ViewNotComplete($a, $from){
		return $this->db->query("SELECT *, s.asset_id as ai from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN location AS l ON l.asset_id = s.asset_id
    		LEFT JOIN `condition` c ON c.asset_id = s.asset_id 
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status
			LEFT JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
			WHERE d.id_subfamilyasset IS NULL
			OR d.id_unitasset IS NULL
			OR d.barcode IS NULL
			OR d.id_dept IS NULL
			OR d.brand IS NULL
			OR d.type IS NULL
			OR d.dimension IS NULL
			OR d.serial_numb IS NULL
			OR d.id_status IS NULL
			OR d.purchasingdate IS NULL
			OR d.installdate IS NULL
			OR c.id_condition IS NULL
			OR c.dateofsurvey IS NULL
			OR c.surveyor IS NULL
			OR c.overallscore IS NULL
			OR c.remarks IS NULL
			OR l.id_mainlocation IS NULL
			OR l.id_sublocation IS NULL
			OR l.id_unitlocation IS NULL ORDER BY s.asset_id LIMIT $from, $a");
		}

		function jumlah_dataViewNotCompletedList(){
		return $this->db->query("SELECT *, s.asset_id as ai from detailasset AS d JOIN sequence AS s ON s.asset_id = d.asset_id JOIN generalasset AS g ON g.id_general = s.id_general
			LEFT JOIN location AS l ON l.asset_id = s.asset_id
    		LEFT JOIN `condition` c ON c.asset_id = s.asset_id 
			LEFT JOIN ref_familyasset rf ON rf.id_familyasset = g.id_family LEFT JOIN ref_unitasset AS ru ON ru.id_unitasset = d.id_unitasset
			LEFT JOIN ref_status AS rs ON rs.id_status = d.id_status
			LEFT JOIN ref_assetname AS ra ON ra.id_assetname = g.id_assetname
			LEFT JOIN mainlocation AS ml ON ml.id_mainlocation = l.id_mainlocation
			WHERE d.id_subfamilyasset IS NULL
			OR d.id_unitasset IS NULL
			OR d.barcode IS NULL
			OR d.id_dept IS NULL
			OR d.brand IS NULL
			OR d.type IS NULL
			OR d.dimension IS NULL
			OR d.serial_numb IS NULL
			OR d.id_status IS NULL
			OR d.purchasingdate IS NULL
			OR d.installdate IS NULL
			OR c.id_condition IS NULL
			OR c.dateofsurvey IS NULL
			OR c.surveyor IS NULL
			OR c.overallscore IS NULL
			OR c.remarks IS NULL
			OR l.id_mainlocation IS NULL
			OR l.id_sublocation IS NULL
			OR l.id_unitlocation IS NULL")->num_rows();
	}

	function get_dataPOList($jumlahPage, $from, $a){
		return $this->db->query("SELECT * FROM capexopex WHERE funding LIKE '$a' ORDER BY year DESC LIMIT $from, $jumlahPage");
	}

	function jumlah_dataViewCapexOpexList($a){
		return $this->db->query("SELECT * FROM capexopex WHERE funding LIKE '$a'")->num_rows();
	}

	function get_dataPOSearchList($a, $b){
		return $this->db->query("SELECT * FROM capexopex WHERE no_po LIKE '$a' AND department LIKE '$b'");
	}

	function get_dataPOOutstanding($jumlahPage, $from, $a){
		return $this->db->query("SELECT c.* FROM capexopex AS c WHERE NOT EXISTS (SELECT no_po FROM ref_po AS rp WHERE rp.no_po = c.no_po) ORDER BY year DESC LIMIT $from, $jumlahPage");
	}

	function jumlah_dataPOOutstanding($a){
		return $this->db->query("SELECT c.* FROM capexopex AS c WHERE NOT EXISTS (SELECT no_po FROM ref_po AS rp WHERE rp.no_po = c.no_po)")->num_rows();
	}

	function get_dataPOOutstandingSearch($a, $b){
		return $this->db->query("SELECT c.* FROM capexopex AS c WHERE NOT EXISTS (SELECT no_po FROM ref_po AS rp WHERE rp.no_po = c.no_po) AND no_po LIKE '$a' AND department LIKE '$b' ORDER BY year DESC");
	}
	
	function get_detailPO($a){
		return $this->db->query("SELECT rp.*, s.asset_id, ra.name, rd.workingunit, rk.facilities_name, rf.funding FROM ref_po rp
			JOIN generalasset g ON g.no_po = rp.no_po JOIN sequence s ON s.id_general = g.id_general
			LEFT JOIN ref_dept rd ON rp.id_podepartment = rd.id_dept 
			LEFT JOIN ref_keyfacilities rk ON rk.id = rp.id_keyfacility LEFT JOIN ref_funding rf ON rf.id_funding = rp.id_funding
			LEFT JOIN ref_assetname ra ON ra.id_assetname = g.id_assetname
			WHERE rp.no_po = '$a'");
	}

}

?>