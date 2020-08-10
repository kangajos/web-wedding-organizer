<?php

/**
 * Chart pesanan
 */
class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Template');
        $this->load->model('Chart_model', 'cart');
    }

    public function index()
    {
        $member_id = $this->session->userdata('member_id');
        $data_content['produk'] = $this->cart->get_cart_produk_by_member($member_id);
        $data_content['paket'] = $this->cart->get_cart_paket_by_member($member_id);
        $config = array();
        $config["content_file"] = "pages/chart/index";
        $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main");
    }

    public function cancel($pemesanan_id)
    {

        $cancel = $this->cart->cancel($pemesanan_id);
        if ($cancel == true) {
            $msg = "Pesanan berhasil di batalkan";
        } else {
            $msg = "Pesanan gagal di batalkan, karena sistem sedang sibuk.<br>Cobalah beberapa saat lagi";
        }

        $this->session->set_flashdata('msg', $msg);
        redirect('Cart');
    }
}