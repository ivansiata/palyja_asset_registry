<?php
class M_ahp extends CI_Model{

	function get_AHP(){
		return $this->db->query('SELECT * FROM ahp_data_alternatif');
	}

	function get_dataNilai(){
		return $this->db->query('SELECT * FROM ahp_nilai');
	}

	function get_dataUbahNilai($a){
		return $this->db->query("SELECT * FROM ahp_nilai WHERE id_nilai = '$a'");
	}

	function get_dataKriteria(){
		return $this->db->query('SELECT * FROM ahp_data_kriteria');
	}

	function count_kriteria(){
		return $this->db->query('SELECT count(id_kriteria) as jumlah FROM ahp_data_kriteria');
	}

	function get_dataBobotKriteria($a){
		return $this->db->query("SELECT * FROM ahp_data_kriteria WHERE id_kriteria = '$a'");
	}

	function get_dataUbahKriteria($a){
		return $this->db->query("SELECT * FROM ahp_data_kriteria WHERE id_kriteria = '$a'");
	}

	function get_dataAlternatif(){
		return $this->db->query('SELECT * FROM ahp_data_alternatif');
	}

	function get_dataUbahAlternatif($a){
		return $this->db->query("SELECT * FROM ahp_data_alternatif WHERE id_alternatif = '$a'");
	}

	function get_analisaKriteria(){
		return $this->db->query('SELECT ak.*, dk.nama_kriteria as nama1, dk2.nama_kriteria as nama2 FROM ahp_analisa_kriteria ak 
			LEFT JOIN ahp_data_kriteria dk ON dk.id_kriteria = ak.kriteria_pertama LEFT JOIN ahp_data_kriteria dk2 ON dk2.id_kriteria = ak.kriteria_kedua');
	}

	/*function get_dataAlternatifCategory($a){
		return $this->db->query("SELECT aas.*, da.nama_alternatif FROM $a aas JOIN ahp_data_alternatif da ON da.id_alternatif = aas.alternatif");
	}*/

	function get_dataAlternatifCategory($a, $b){
		return $this->db->query("SELECT aas.*, da.nama_alternatif FROM $a aas JOIN ahp_data_alternatif da ON da.id_alternatif = aas.nama_subkriteria
			WHERE id_kriteria = '$b' ORDER BY id_kriteria, nama_subkriteria");
	}

	function get_dataSubkiteria($a){
		return $this->db->query("SELECT * FROM ahp_data_subkriteria WHERE id_kriteria = '$a' ");
	}

	function get_dataAlternatifArsitektur(){
		return $this->db->query('SELECT aas.*, da.nama_alternatif FROM ahp_analisa_alternatif_arsitektur aas JOIN ahp_data_alternatif da ON da.id_alternatif = aas.alternatif');
	}

	function get_dataAnalisaKriteria($a, $b){
		return $this->db->query("SELECT * FROM ahp_analisa_kriteria WHERE kriteria_pertama = '$a' and kriteria_kedua = '$b' LIMIT 0,1");
	}

	function get_jumlahAnalisaKriteria($a){
		return $this->db->query("SELECT sum(nilai_analisa_kriteria) AS jumlah FROM ahp_analisa_kriteria WHERE kriteria_kedua = '$a' LIMIT 0,1");
	}

	function get_jumlahAnalisaKriteria2($a){
		return $this->db->query("SELECT sum(hasil_analisa_kriteria) AS jumlah FROM ahp_analisa_kriteria WHERE kriteria_pertama = '$a' LIMIT 0,1");
	}

	function get_jumlahAnalisaKriteriaPerbandingan($a){
		return $this->db->query("SELECT sum(hasil_analisa_kriteria) AS jumlah FROM ahp_analisa_kriteria WHERE kriteria_kedua = '$a' LIMIT 0,1");
	}

	function get_jumlahAnalisaKriteriaPerbandingan2($a){
		return $this->db->query("SELECT sum(hasil_analisa_kriteria) AS jumlah FROM ahp_analisa_kriteria WHERE kriteria_pertama = '$a' LIMIT 0,1");
	}

	function get_analisaAlternatif($a){
		return $this->db->query("SELECT aa.*, da.nama_alternatif as nama1, da2.nama_alternatif as nama2 FROM ahp_analisa_alternatif aa 
			LEFT JOIN ahp_data_alternatif da ON da.id_alternatif = aa.alternatif_pertama LEFT JOIN ahp_data_alternatif da2 ON da2.id_alternatif = aa.alternatif_kedua WHERE id_kriteria ='$a'");
	}

	function get_dataKriteriaAlternatif($a){
		return $this->db->query("SELECT * FROM ahp_data_kriteria WHERE id_kriteria= '$a' ");
	}

	function get_jumAltKri($a){
		return $this->db->query("SELECT * FROM ahp_jum_alt_kri WHERE id_kriteria= '$a' ");
	}

	function get_dataAnalisaAlternatif($a, $b, $c){
		return $this->db->query("SELECT * FROM ahp_analisa_alternatif WHERE alternatif_pertama = '$a' and alternatif_kedua = '$b' AND id_kriteria = '$c' LIMIT 0,1");
	}

	function get_jumlahAnalisaAlternatif($a, $b){
		return $this->db->query("SELECT sum(nilai_analisa_alternatif) AS jumlah FROM ahp_analisa_alternatif WHERE alternatif_kedua = '$a' AND id_kriteria = '$b' LIMIT 0,1");
	}

	function get_jumlahAnalisaAlternatifPerbandingan($a, $b){
		return $this->db->query("SELECT sum(hasil_analisa_alternatif) AS jumlah FROM ahp_analisa_alternatif WHERE alternatif_kedua = '$a' AND id_kriteria = 
			'$b' LIMIT 0,1");
	}

	function get_analisaAlternatifJumlaha1($a, $c){
		return $this->db->query("SELECT sum(hasil_analisa_alternatif) AS jumlah FROM ahp_analisa_alternatif WHERE alternatif_pertama = '$a' AND id_kriteria = 
			'$c' LIMIT 0,1");
	}

	function get_AnalisaAlternatifSkor($a){
		return $this->db->query("SELECT avg(hasil_analisa_alternatif) AS average FROM ahp_analisa_alternatif WHERE alternatif_pertama = '$a' LIMIT 0,1");
	}

	function get_AnalisaAlternatifSkorPrio($a, $b){
		return $this->db->query("SELECT avg(hasil_analisa_alternatif) AS average FROM ahp_analisa_alternatif WHERE alternatif_pertama = '$a' AND id_kriteria = '$b' LIMIT 0,1");
	}

	function get_max_skor($a){
		return $this->db->query("SELECT max(skor_avg) as maxim FROM ahp_jum_alt_kri WHERE id_kriteria = '$a'");
	}

	function get_AnalisaAlternatifSumSkor($a){
		return $this->db->query("SELECT sum(skor_alt_kri) AS jumlah FROM ahp_jum_alt_kri WHERE id_kriteria = '$a' LIMIT 0,1");
	}

	function get_tabelRangking($a){
		return $this->db->query("SELECT skor_alt_kri as rata FROM ahp_jum_alt_kri WHERE id_alternatif = '$a' ");
	}

	function get_jumlahTabelRangking($a){
		return $this->db->query("SELECT sum(skor_alt_kri) as rata FROM ahp_jum_alt_kri WHERE id_kriteria = '$a' ");
	}

	function get_tabelPerangkingan($a){
		return $this->db->query("SELECT ja.*, dk.bobot_kriteria, (ja.skor_alt_kri * dk.bobot_kriteria) AS hasil FROM ahp_jum_alt_kri ja LEFT JOIN ahp_data_kriteria dk ON dk.id_kriteria = ja.id_kriteria 
			WHERE ja.id_alternatif = '$a' ");
	}

	function get_tabelPerangkingan2($a, $b){
		return $this->db->query("SELECT * FROM ahp_jum_alt_kri WHERE id_alternatif = '$a' AND id_kriteria = '$b'");
	}

	function get_jumlahTabelPerangkingan($a){
		return $this->db->query("SELECT sum(hasil_alt_kri) as rata FROM ahp_jum_alt_kri WHERE id_kriteria = '$a' ");
	}

	function get_hasil($a){
		return $this->db->query("SELECT sum(hasil_alt_kri) as rata FROM ahp_jum_alt_kri WHERE id_alternatif = '$a' ");
	}

	function get_jumlahHasil(){
		return $this->db->query("SELECT sum(hasil_akhir) as jumlah FROM ahp_data_alternatif");
	}


	//update

	function update($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}


}