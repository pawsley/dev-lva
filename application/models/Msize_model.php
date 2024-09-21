<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msize_model extends CI_Model {
  public function addlog($data) {
    $insert = $this->db->insert('tb_sizechart', $data);
    return $insert; 
  }
}

/* End of file Msize_model.php */
/* Location: ./application/models/Msize_model.php */