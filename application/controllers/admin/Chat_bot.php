<?php 

/**
 * Chat Bot
 */
class Chat_bot extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('Chat_bot_model', 'chat');
	}

	public function index()
	{
		$data_content['chat_bot'] = $this->chat->get_all_chat_bot();
		$data_content['title'] = "Chat Bot";
    $config = array();
    $config["content_file"] = "admin/pages/chat_bot/index";
    $config["content_data"] = $data_content;

    $this->template->initialize($config);
    $this->template->render("main_admin");
	}

	public function add()
	{
		$response = $this->chat->add();
		if ($response == true) :
			$this->session->set_flashdata('msg', "Chat Bot berhasil ditambahkan");
		else:
			$this->session->set_flashdata('msg', "Chat Bot gagal ditambahkan, mungkin pertanyaan yang yang Anda masukkan sudah tersedia.");
		endif;

		redirect('admin/Chat_bot');
	}

	public function edit($chat_bot_id)
	{
		$data_content['result'] = $this->chat->edit($chat_bot_id);
		$data_content['title']	= "Edit - Chat Bot";
		$config = array();
    $config["content_file"] = "admin/pages/chat_bot/edit";
    $config["content_data"] = $data_content;

    $this->template->initialize($config);
    $this->template->render("main_admin");	
	}

	public function save_edit()
	{
		$response = $this->chat->save_edit();
		if ($response == true) :
			$this->session->set_flashdata('msg', "Chat Bot berhasil diedit.");
		else:
			$this->session->set_flashdata('msg', "Chat Bot gagal diedit, Silahkan refresh ulang halaman ini dengan (Ctrl + F5).");
		endif;

		redirect('admin/Chat_bot');
	}

	public function delete($chat_bot_id)
	{
		$response = $this->chat->delete($chat_bot_id);
		if ($response == true) :
			$this->session->set_flashdata('msg', "Chat Bot berhasil dihapus.");
		else:
			$this->session->set_flashdata('msg', "Chat Bot gagal dihapus, Silahkan refresh ulang halaman ini dengan (Ctrl + F5).");
		endif;

		redirect('admin/Chat_bot');
	}

	public function chat()
	{
		$chat = $this->input->post('chat');
		$response = $this->chat->chat($chat);
		echo json_encode($response);
	}
}