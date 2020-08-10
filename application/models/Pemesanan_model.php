<?php 

/**
 * Pemesanan
 */
class Pemesanan_model extends CI_Model
{
	protected $table = "pemesanan";
	protected $table_member = "member";

	public function get_pemesanan_produk()
	{
		return $this->db->get_where($this->table, array('hapus'=>0, 'produk_id !=' => 0))->result();
	}

	public function get_pemesanan_paket()
	{
		return $this->db->get_where($this->table, array('hapus'=>0, 'paket_id !=' => 0))->result();
	}

	public function get_member($member_id)
	{
		return $this->db->get_where($this->table_member, array('member_id'=> $member_id))->row();
	}

	public function get_produk($id)
	{
		return $this->db->get_where('produk', $id)->row();
	}
	public function get_paket($id)
	{
		return $this->db->get_where('paket', $id)->row();
	}
	public function cancel($pemesanan_id)
	{
		$this->db->where( 'pemesanan_id', $pemesanan_id )->update( $this->table, array('hapus' => 1) );
		return $this->db->affected_rows();
	}
}