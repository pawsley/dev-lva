<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenKasir_model extends CI_Model {
  public function getLastKode($year, $month,$day) {
    $this->db->select('id_order');
    $this->db->from('tb_order');
    $this->db->like('id_order', "$year/$month/$day", 'after');
    $this->db->order_by('id_order', 'desc');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getsbkat($searchTerm = null) {
    $this->db->select(['id_condiment', 'nama_condiment','kode_condiment']);
    $this->db->from('tb_katalog');

    if ($searchTerm) {
        $this->db->group_start();
        $this->db->like('nama_condiment', $searchTerm);
        $this->db->or_like('nama_condiment', $searchTerm);
        $this->db->group_end();
    }

    $this->db->order_by('nama_condiment', 'asc');
    $query = $this->db->get();
    return $query->result_array();
}  
}

/* End of file PenKasir_model.php */
/* Location: ./application/models/PenKasir_model.php */