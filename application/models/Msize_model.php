<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msize_model extends CI_Model {
  public function addsize($data) {
    $this->db->insert('tb_sizechart', $data);
    return $this->db->insert_id();  // Return the inserted row ID
  }
  public function addsizedtl($data) {
    return $this->db->insert('tb_sizechart_dtl', $data);
  }
}

/* End of file Msize_model.php */
/* Location: ./application/models/Msize_model.php */