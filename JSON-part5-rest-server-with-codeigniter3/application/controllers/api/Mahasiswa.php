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
		$mahasiswa = $this->mahasiswa->getMahasiswa();

		if($mahasiswa){

		}
	}
}
