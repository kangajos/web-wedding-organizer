<?php 
/**
 * Chart model
 */
class Chart_model extends CI_Model
{
	protected $table = "pemesanan";

	public function get_cart_produk_by_member($member_id)
	{
		return $this->db->get_where($this->table,['member_id' => $member_id, 'produk_id !='=> 0,'hapus'=>0])->result();
	}

	public function get_cart_paket_by_member($member_id)
	{
		return $this->db->get_where($this->table,['member_id' => $member_id, 'paket_id !=' => 0,'hapus'=>0])->result();
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