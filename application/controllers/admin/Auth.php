<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("user_model", "user");
    }

    public function login()
    {
        $data_content['data'] = "ari";
        $config = array();
        $config["content_file"] = "pages/home/index";
        $config["content_data"] = $data_content;

        $this->load->view('pages/auth/login');
    }

    public function login_post()
    {
        $this->current_data = $this->input->post();
        $params = array(
            'username' => 'user1'
        );
        echo json_encode($this->user->get_list($params));die;
        echo json_encode($this->current_data);
    }



    public function aksi_login()
    {
        $user = $this->input->post('username');
        $password = $this->input->post('password');
        $hak_akses = $this->input->post('hak_akses');
        $data = array(
            'username' => $user,
            'password' => md5($password)
        );
        $row1 = $this->db->get_where('user',$data)->row();
        // print_r($row1);die();
        if(!empty($row1))
        {
            $data_session = array(
                'id_user' => $row1->id,
                'nama' => $row1->username,
                'level' => $row1->id_level,
                'hak_akses' => $row1->hak_akses,
                'divisi' => $row1->divisi
            );
            $this->session->set_userdata($data_session);
            redirect('Halaman');
        }
        else
        {
            $this->session->set_flashdata('alert','<script>swal("Mohon Maaf!", "Username dan password yang anda masukkan salah", "error");</script>');
            redirect('Halaman');
        }
    }
}