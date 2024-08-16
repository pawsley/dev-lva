<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmaterial_model extends CI_Model {
  public function getLastKode() {
    $this->db->select('kode_material');
    $this->db->from('tb_material');
    $this->db->order_by('kode_material', 'desc');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function addsbmat($kode, $nk) {
    $existingCategory = $this->db->where('nama', $nk)
                        ->get('tb_sbmaterial')
                        ->row();
    if (!$existingCategory) {
        $data = array(
            'kode' => $kode,
            'nama' => $nk
        );
        $this->db->insert('tb_sbmaterial', $data);
        return true; 
    } else {
        return false; 
    }
  }
  public function getDataKategori($kode,$searchTerm = null) {
    $this->db->select(['id', 'nama','kode']);
    $this->db->from('tb_sbmaterial');
    $this->db->where('kode',$kode);

    if ($searchTerm) {
        $this->db->group_start();
        $this->db->like('nama', $searchTerm);
        $this->db->group_end();
    }

    $this->db->order_by('nama', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function updatedaf($id,$data){
    $this->db->where('id', $id);
    $this->db->update('tb_sbmaterial', $data);
  }
  public function deletedaf($id){
    $success = $this->db->delete('tb_sbmaterial', array("id" => $id));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
  }
  public function create($data){
    $this->db->insert('tb_material',$data);
  }
  public function update($id, $data) {
    $this->db->where('kode_material', $id);
    $this->db->update('tb_material', $data);
  }
  public function delete($id){
    $success = $this->db->delete('tb_material', array("kode_material" => $id));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
  }

}

/* End of file Mmaterial_model.php */
/* Location: ./application/models/Mmaterial_model.php */