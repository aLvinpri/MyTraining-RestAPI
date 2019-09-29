<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller {

	public function __construct()
	{
		parent::__construct()
		$this->load->model('Mahasiswa_model', 'mahasiswa');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if($id === null){
			$mahasiswa = $this->mahasiswa->getMahasiswa();
		}else{
			$mahasiswa = $this->mahasiswa->getMahasiswa($id);
		}

		if($mahasiswa){
			$this->response([
                    'status' => true,
                    'data' => $mahasiswa
                ], 200); // OK (200) being the HTTP response code
		}else{
			$this->response([
                    'status' => false,
                    'message' => 'Id Not Found'
                ], 404); // NOT_FOUND (404) being the HTTP response code
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id');
		if ($id === null){
			$this->response([
                    'status' => false,
                    'message' => 'Provide an id'
                ], 400); // BAD_REQUEST (400) being the HTTP response code	
		}else{
			if($this->mahasiswa->deleteMahasiswa($id) > 0){
				// delete process
				this->response([
                    'status' => true,
					'id' => $id,
                    'message' => 'Deleted'
                ], 204); // NO_CONTENT (204) being the HTTP response code
			}else{
				// delete not process
				$this->response([
                    'status' => false,
                    'message' => 'ID not Found'
                ], 400);
			}

		}
	}
}
