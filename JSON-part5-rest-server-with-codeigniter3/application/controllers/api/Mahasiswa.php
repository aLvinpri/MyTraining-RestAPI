<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends CI_Controller
{

	use REST_Controller {
		REST_Controller::__construct as private __resTraitConstruct;
	}

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->__resTraitConstruct();
		$this->load->model('Mahasiswa_model', 'mahasiswa');

		// Configure limits on our controller methods
		// Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
		$this->methods['index_get']['limit'] = 10;
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id === null) {
			$mahasiswa = $this->mahasiswa->getMahasiswa();
		} else {
			$mahasiswa = $this->mahasiswa->getMahasiswa($id);
		}

		if ($mahasiswa) {
			$this->response([
				'status' => true,
				'data' => $mahasiswa
			], 200); // OK (200) being the HTTP response code
		} else {
			$this->response([
				'status' => false,
				'message' => 'Id Not Found'
			], 404); // NOT_FOUND (404) being the HTTP response code
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id');
		if ($id === null) {
			$this->response([
				'status' => false,
				'message' => 'Provide an id'
			], 400); // BAD_REQUEST (400) being the HTTP response code	
		} else {
			if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
				$this->set_response([
					'status' => true,
					'id' => $id,
					'message' => 'Deleted the resource'
				], 204); // NO_CONTENT (204) being the HTTP response code
			} else {
				// delete not process
				$this->response([
					'status' => false,
					'message' => 'ID not Found'
				], 400);
			}
		}
	}

	public function index_post()
	{
		$data = [
			'nrp' => $this->post('nrp'),
			'nama' => $this->post('nama'),
			'email' => $this->post('email'),
			'jurusan' => $this->post('jurusan'),
		];

		if ($this->mahasiswa->createMahasiswa($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'Added a resource'
			], 201); // CREATED (201) being the HTTP response code
		} else {
			// delete not process
			$this->response([
				'status' => false,
				'message' => 'Failed update a resource'
			], 400);
		}
	}

	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'nrp' => $this->put('nrp'),
			'nama' => $this->put('nama'),
			'email' => $this->put('email'),
			'jurusan' => $this->put('jurusan'),
		];

		if ($this->mahasiswa->updateMahasiswa($data, $id) > 0) {
			$this->response([
				'status' => true,
				'message' => 'Updated a resource'
			], 201); // CREATED (201) being the HTTP response code
		} else {
			// delete not process
			$this->response([
				'status' => false,
				'message' => 'Failed update a resource'
			], 400);
		}
	}
}
