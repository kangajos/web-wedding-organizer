<?php 
/**
 * 
 */
class Pemesanan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('Pemesanan_model', 'pemesanan');
	}

	public function index()
	{
		$data_content['produk'] = $this->pemesanan->get_pemesanan_produk();
		$data_content['paket'] = $this->pemesanan->get_pemesanan_paket();
    $config = array();
    $config["content_file"] = "admin/pages/pemesanan/index";
    $config["content_data"] = $data_content;

    $this->template->initialize($config);
    $this->template->render("main_admin");
  }
}