<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = "member";

    public function __construct()
    {
        parent::__construct();
    }

    public function save_register($params)
    {
        $this->db->insert($this->table, $params);
        return $this->db->affected_rows();
    }

    public function cek_login($params)
    {
        return $this->db->get_where($this->table, $params)->row();
    }

    public function get_all_member()
    {
        return $this->db->where('level','user')->order_by('member_id','DESC')->get($this->table)->result();
    }
}