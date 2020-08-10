<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Template');
        $this->load->model("user_model", "user");
    }

    public function login()
    {
        if ($this->session->userdata('status') === true) 
        {
            redirect('Home');
        }
        // $data_content['data'] = "ari";
        $config = array();
        $config["content_file"] = "pages/auth/login";
        // $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main");
    }

    public function register()
    {
        // $data_content['data'] = "ari";
        $config = array();
        $config["content_file"] = "pages/auth/register";
        // $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main");
    }

    public function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // $hak_akses = $this->input->post('hak_akses');
        $params = array(
            'username' => $username,
            'password' => md5($password)
        );
        $result = $this->user->cek_login($params);
        // print_r($row1);die();
        if(count($result) == 1)
        {
            $data_session = array(
                'status' => true,
                'member_id' => $result->member_id,
                'username' => $result->username,
                'nama' => $result->nama,
                'level' => $result->level
            );
            $this->session->set_userdata($data_session);
            if ($result->level == 'admin') {
               redirect('admin');
            }
            // var_dump($data_session);die;
            redirect('Cart');
        }
        else
        {
            $this->session->set_flashdata('msg','username / password salah.');
            redirect('Auth/login');
        }
    }

    public function out()
    {
        $this->session->sess_destroy();
        redirect('Home');
    }

    public function save_register()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $keluarahan = $this->input->post('keluarahan');
        $kecamatan = $this->input->post('kecamatan');
        $kabupaten = $this->input->post('kabupaten');

        $params =
        [
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'email' => $username,
            'desa' => $keluarahan,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'status' => 1,
            'level' => 'user'
        ];
        $response = $this->user->save_register($params);
        if ($response != true) :
            $this->session->set_flashdata('msg', "Anda gagal mendaftar akun, silahkan cek kembali data yang anda masukkan.");    
            redirect('auth/register');
        else:
            $this->session->set_flashdata('msg', "Anda berhasil mendaftar akun, silahkan login untuk untuk menggunakan fitur lainya.");
            redirect('auth/login');
        endif;
    }
}