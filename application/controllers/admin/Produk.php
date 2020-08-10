<?php

/**
 * Produk
 */
class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Template');
        $this->load->model('Produk_model', 'produk');
    }

    public function index()
    {
        $data_content['produk'] = $this->produk->get_all_produk();
        $config = array();
        $config["content_file"] = "admin/pages/produk/index";
        $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main_admin");
    }

    public function paket()
    {
        $data_content['paket'] = $this->produk->get_all_paket();
        $config = array();
        $config["content_file"] = "admin/pages/paket/index";
        // $config["paket"] = $data_content;
        $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main_admin");
    }

    public function save_paket()
    {
        // Save Produk
        $respons = $this->produk->save_paket();

        if ($respons !== TRUE) {
            $this->session->set_flashdata('msg', "Data paket : <b>$jenis_paket</b> gagal ditambahkan.");
        }

        $this->session->set_flashdata('msg', "Data paket : <b>$jenis_paket</b> berhasil ditambahkan.");
        redirect('admin/produk/paket');
    }

    public function save_produk()
    {
        // Save Produk
        $respons = $this->produk->save_produk();

        if ($respons !== TRUE) {
            $this->session->set_flashdata('msg', "Data produk gagal ditambahkan.");
        }

        $this->session->set_flashdata('msg', "Data produk berhasil ditambahkan.");
        redirect('admin/produk');
    }

    public function edit_produk($produk_id = null)
    {
        $where = array("produk_id" => $produk_id);
        $data_content = $this->produk->edit_produk($where);
        $config = array();
        $config["content_file"] = "admin/pages/produk/edit_produk";
        $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main_admin");
    }

    public function update_produk()
    {
        $produk_id = $this->input->post('produk_id');
        $jenis_produk = $this->input->post('jenis_produk');
        $deskripsi_produk = $this->input->post('deskripsi_produk');
        $harga_produk = $this->input->post('harga_produk');

        $where = array('produk_id' => $produk_id);
        $params = array(
            'jenis' => $jenis_produk,
            'deskripsi' => $deskripsi_produk,
            'harga' => $harga_produk
        );
        $update = $this->produk->update_produk($params, $where, $_FILES['foto_produk']['error']);
        if ($update > 0) {
            $this->session->set_flashdata('msg', "Data produk berhasil di Update.");
        } else {
            $this->session->set_flashdata('msg', "Data produk gagal di Update.");
        }
        redirect('admin/produk');
    }

    public function delete_produk($produk_id = null)
    {
        $delete = $this->produk->delete_produk(['produk_id' => $produk_id]);
        $this->session->set_flashdata('msg', "Data produk berhasil dihapus.");
        redirect('admin/produk');
    }

    public function delete_paket($paket_id)
    {
        $delete = $this->produk->delete_paket(['paket_id' => $paket_id]);
        $this->session->set_flashdata('msg', "Data produk berhasil dihapus.");
        redirect('admin/produk/paket');
    }

    public function edit_paket($paket_id = null)
    {
        $where = array('paket_id'=> $paket_id);
        $data_content = $this->produk->edit_paket($where);
        $config = array();
        $config["content_file"] = "admin/pages/paket/edit_paket";
        $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main_admin");
    }

    public function update_paket()
    {
        $paket_id = $this->input->post('paket_id');
        $jenis_paket = $this->input->post('jenis_paket');
        $deskripsi_paket = $this->input->post('deskripsi_paket');
        $harga_paket = $this->input->post('harga_paket');

        $params = array('nama' => $jenis_paket, 'deskripsi' => $deskripsi_paket, 'harga' => $harga_paket);
        $where = array('paket_id' => $paket_id);
        $update = $this->produk->update_paket($params, $where);

        if ($update > 0) {
            $this->session->set_flashdata('msg', "Data paket berhasil di Update.");
        } else {
            $this->session->set_flashdata('msg', "Data paket gagal di Update.");
        }
        redirect('admin/produk/paket');
    }
}