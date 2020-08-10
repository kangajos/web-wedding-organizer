<?php

/**
 * Produk Model
 */
class Produk_model extends CI_Model
{
    public function get_all_produk_limit($limit = FALSE)
    {
        if ($limit) {
            $this->db->limit(9);
        }
        return $this->db->order_by('produk_id', 'desc')->get('produk')->result();
    }

    public function get_all_paket_limit($limit = FALSE)
    {
        if ($limit) {
            $this->db->limit(9);
        }
        return $this->db->order_by('paket_id', 'desc')->get('paket')->result();
    }

    public function save_paket()
    {
        $jenis_paket = $this->input->post('jenis_paket');
        $deskripsi_paket = $this->input->post('deskripsi_paket');
        $harga_paket = $this->input->post('harga_paket');

        $params = ['nama' => $jenis_paket, 'deskripsi' => $deskripsi_paket, 'harga' => $harga_paket];

        $this->db->insert('paket', $params);
        return $this->db->affected_rows();
    }

    public function save_produk()
    {
        $foto_extensi = end(explode('.', $_FILES['foto_produk']['name']));
        $foto_produk = $this->input->post('foto_produk');
        $foto_produk_baru = uniqid() . "." . $foto_extensi;

        $respons = $this->upload($foto_produk_baru);
        return $respons;
    }

    public function edit_produk($where = array())
    {
        return $this->db->get_where("produk", $where)->row();
    }

    public function update_produk($params = array(), $where = array(), $gambar)
    {
        if ($gambar === 4) {
            //update jika gambar kosong//
            $this->db->update('produk', $params, $where);
            return $this->db->affected_rows();
        } else {
            $file_name = end(explode('.', $_FILES['foto_produk']['name']));
            $file_name = uniqid().".".$file_name;
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['file_name'] = $file_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_produk')) {

            } else {
                $gambar = array('gambar' => $file_name);
                $params = array_merge($params, $gambar);
                $this->db->update('produk', $params, $where);
                return $this->db->affected_rows();
            }
        }
    }

    public function cek_transaksi()
    {

    }

    public function proses_transaksi($params)
    {
        try {
            $save = $this->db->insert('pemesanan', $params);

            if ($save === FALSE)
                return FALSE;

            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    public function get_all_paket($get_all = FALSE)
    {
        return $this->db->get('paket')->result();
    }

    public function get_all_produk($get_all = FALSE)
    {
        return $this->db->get('produk')->result();
    }

    public function get_produk_by_id($produk_id)
    {
        return $this->db->get_where('produk', ['produk_id' => $produk_id])->row();
    }

    public function get_paket_by_id($paket_id)
    {
        return $this->db->get_where('paket', ['paket_id' => $paket_id])->row();
    }

    public function upload($file_name)
    {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_produk')) {
            return false;
        } else {
            $jenis_produk = $this->input->post('jenis_produk');
            $deskripsi_produk = $this->input->post('deskripsi_produk');
            $harga_produk = $this->input->post('harga_produk');

            $params = ['jenis' => $jenis_produk, 'deskripsi' => $deskripsi_produk, 'harga' => $harga_produk,
                'gambar' => $file_name];

            $this->db->insert('produk', $params);
            return $this->db->affected_rows();
        }
    }

    public function delete_produk($params)
    {
        $this->db->delete('produk', $params);
    }

    public function edit_paket($where = array())
    {
        return $this->db->get_where("paket", $where)->row();
    }

    public function update_paket($params = array(), $where = array())
    {
        $this->db->update('paket', $params, $where);
        return $this->db->affected_rows();
    }

    public function delete_paket($params)
    {
        $this->db->delete('paket', $params);
    }

}