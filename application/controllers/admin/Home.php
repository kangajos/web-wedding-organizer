<?php 

/**
 * Home
 */ 
class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');		
		$this->load->model('Produk_model', 'produk');
	}

	public function index()
	{
		// $data_content['data'] = "ari";
    $config = array();
    $config["content_file"] = "admin/pages/home/index";
    // $config["content_data"] = $data_content;

    $this->template->initialize($config);
    $this->template->render("main_admin");
	}
}