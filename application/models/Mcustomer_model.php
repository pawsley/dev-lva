<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcustomer_model extends CI_Model {
  public function getLastKode() {
    $this->db->select('id_cst');
    $this->db->from('tb_customer');
    $this->db->order_by('id_cst', 'desc');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result_array();
  }  
  public function createsbc($nk, $val) {
    $existingCategory = $this->db->where('nama_sbc', $nk)
                        ->get('tb_sbcustomer')
                        ->row();
    if (!$existingCategory) {
        $data = array(
            'nama_sbc' => $nk,
            'diskon' => $val
        );
        $this->db->insert('tb_sbcustomer', $data);
        return true; 
    } else {
        return false; 
    }
  }
  public function getdatasbc($searchTerm = null) {
    $this->db->select(['id_sbc', 'nama_sbc','diskon']);
    $this->db->from('tb_sbcustomer');

    if ($searchTerm) {
        $this->db->group_start();
        $this->db->like('nama_sbc', $searchTerm);
        $this->db->group_end();
    }

    $this->db->order_by('nama_sbc', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function updatesbc($id,$data){
    $this->db->where('id_sbc', $id);
    $this->db->update('tb_sbcustomer', $data);
  }
  public function deletesbc($id){
    $success = $this->db->delete('tb_sbcustomer', array("id_sbc" => $id));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
  }
  public function createcst($data) {
    $insert = $this->db->insert('tb_customer', $data);
    if ($insert) {
        return true; 
    } else {
        return false; 
    }
  }
  public function updatecst($id,$data){
    $this->db->where('id_cst', $id);
    $this->db->update('tb_customer', $data);
  }
  public function deletecst($id){
    // NB: wajib cek id digunakan di table relation
    $success = $this->db->delete('tb_customer', array("id_cst" => $id));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
  }  

}

/* End of file Mcustomer_model.php */
/* Location: ./application/models/Mcustomer_model.php */