<?php 

/**
 * User
 */
class Member extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('User_model', 'member');
	}

	public function index()
	{
		$data_content['member'] = $this->member->get_all_member();
    $config = array();
    $config["content_file"] = "admin/pages/member/index";
    $config["content_data"] = $data_content;

    $this->template->initialize($config);
    $this->template->render("main_admin");
	}
}