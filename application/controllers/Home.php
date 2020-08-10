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

    public function index($value = FALSE)
    {
        $value = ($value == TRUE) ? $value : '';
        $data_content['produk'] = $this->produk->get_all_produk_limit($value);
        $data_content['paket'] = $this->produk->get_all_paket_limit($value);
        $config = array();
        $config["content_file"] = "pages/home/index";
        $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main");
    }

    public function pesan_produk($produk_id = '')
    {
        if ($this->session->userdata('status') !== TRUE) {
            $this->session->set_flashdata('msg', "Anda harus login terlebih dulu jika mau melakukan pemesana produk/paket.");
            redirect('auth/login');
        }

        $data_content['produk'] = $this->produk->get_produk_by_id($produk_id);
        $config = array();
        $config["content_file"] = "pages/home/pesan_produk";
        $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main");
    }

    public function pesan_paket($paket_id = '')
    {
        if ($this->session->userdata('status') !== TRUE) {
            $this->session->set_flashdata('msg', "Anda harus login terlebih dulu jika mau melakukan pemesana produk/paket.");
            redirect('auth/login');
        }

        $data_content['paket'] = $this->produk->get_paket_by_id($paket_id);
        $config = array();
        $config["content_file"] = "pages/home/pesan_paket";
        $config["content_data"] = $data_content;

        $this->template->initialize($config);
        $this->template->render("main");
    }

    public function proses_transaksi()
    {
        $input = $this->input->post();
        $jenis_pemesanan = $input["jenis_pemesanan"];
        $kode_pemesanan = ($jenis_pemesanan == 'produk') ? 'produk-' . rand(111, 999) : 'paket-' . rand(111, 999);
        $tanggal_pemesanan = date('Y-m-d');
        $tanggal_mulai = $input["tanggal_mulai"];
        $tanggal_selesai = $input["tanggal_selesai"];
        $jumla_sewa = $input["qty"];
        $produk_id = $input["produk_id"];
        $paket_id = $input["paket_id"];
        $member_id = $this->session->userdata('member_id');
        $status = "1";
        $pesan = $input["pesan"];

        $cek_transaksi = $this->db->query("SELECT * FROM pemesanan WHERE produk_id='$produk_id' AND (tanggal_mulai between '$tanggal_mulai' AND '$tanggal_selesai' OR tanggal_selesai between '$tanggal_mulai' AND '$tanggal_selesai') ")->result();

        if (!empty($cek_transaksi))
        {
            $this->session->set_flashdata('msg', "Mohon maaf pesanan Anda tidak dapat di proses, <br><br>Detail Pemesanan:<br> Nama Barang : $jenis_pemesanan<br>Tanggal Pemesanan : $tanggal_pemesanan<br>Tanggal Mulai : $tanggal_mulai<br>Tanggal Selesai : $tanggal_selesai<br><br><b>Dikarenakan barang tersebut sudah di pesan di antara tanggal tersebut, silahkan pesan di lain hari, <br>Terimakasih.</b>");
            redirect('Cart');
        }

        $params = array(
            'kode_pemesanan' => $kode_pemesanan,
            'tanggal_pemesanan' => $tanggal_pemesanan,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'jumlah_sewa' => $jumla_sewa,
            'produk_id' => $produk_id,
            'paket_id' => $paket_id,
            'member_id' => $member_id,
            'status' => $status,
            'pesan' => $pesan
        );
        $save = $this->produk->proses_transaksi($params);
        if ($save) {
            $this->session->set_flashdata('msg', "Pesanan Anda berhasil di kirim, silahkan cek berkala status pesanan Anda atau hubungi nomor yang telah di cantumkan di atas menu.");
            redirect('Cart');
        }
        $this->session->set_flashdata('msg', "Pesanan Anda gagal di kirim. Pastikan pengisian Anda sudah benar, jika ada kendala segera hubungi nomor yang tertera pada aplikasi ini");
        redirect('Cart');
    }
}