<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
  private $_table = "tb_karyawan";

  public function cek_login($where) {		
    $this->db->where($where);
    $this->db->where_in('status', [1]);
    return $this->db->get($this->_table);
  }
  public function getLastKode() {
    $this->db->select('id_karyawan');
    $this->db->from('tb_karyawan');
    $this->db->order_by('id_karyawan', 'desc');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function create($data){
    $this->db->insert('tb_karyawan',$data);
  }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */