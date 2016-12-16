<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KategoriBarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('view_kat_barang');
	}

	public function tambah()
	{

	}

	public function edit($id)
	{

	}

	public function hapus($id)
	{

	}
}

/* End of file KategoriBarang.php */
/* Location: ./application/controllers/KategoriBarang.php */