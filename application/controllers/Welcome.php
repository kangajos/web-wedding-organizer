<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

  public function __construct()
	{
		parent::__construct();
		redirect('Home');
		// $this->load->library('Template');
		// $this->load->model('Produk_model', 'produk');
	}

	public function index()
	{
		$data_content['produk'] = $this->produk->get_all_produk_limit(16);
    $config = array();
    $config["content_file"] = "pages/home/index";
    $config["content_data"] = $data_content;

    $this->load->view($config);
	}
}
