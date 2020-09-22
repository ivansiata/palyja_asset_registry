public function updatedetail2(){
		$ai = $this->input->post('assetid');
		$po = $this->input->post('pogeneral');
		$name = $this->input->post('namelist');
		$newpo = explode("|", $po);
		$assetidnext = $ai + 1;

		$unitasset = $this->input->post('unitasset');
		$barcode = $this->input->post('barcode');
		$brand = $this->input->post('brand');
		$type = $this->input->post('type');
		$dimension = $this->input->post('dimension');
		$sernum = $this->input->post('sernum');
		$status = $this->input->post('status');
		$purchDate = $this->input->post('purchDate');
		$instDate = $this->input->post('instDate');
		$usedby = $this->input->post('usedby');
		$photo = $this->input->post('berkas');
		$nama = $_FILES["berkas"]["name"];
		$ext = pathinfo($nama, PATHINFO_EXTENSION);
		$filename = './photo/'.$assetid;
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
			$config['file_name'] = $ai."-".$filecount;
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
		$where = array('asset_id' => $ai);
			
		}

		$dataL = array(
			'id_unitlocation' => (!empty($unitlocation)) ? $unitlocation : NULL
			);

		$this->m_data->update_datadetail($where, $data, 'detailasset');
		$this->m_data->update_datadetail($where, $dataL, 'location');

		redirect('crud/entry_data3/?po='.$newpo[1]."&name=".$name."&id=".$assetidnext);  

	}