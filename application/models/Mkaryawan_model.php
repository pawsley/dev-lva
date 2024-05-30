<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mkaryawan_model extends CI_Model {


  public function __construct()
  {
    parent::__construct();
  }

  public function tambahjabatan($nj,$data) {
    $exist = $this->db->where('nama_jab', $nj)
                        ->get('tb_jabatan')
                        ->row();
    if (!$exist) {
        $this->db->insert('tb_jabatan',$data);
        return true; 
    } else {
        return false; 
    }
  }
  public function tambahrole($nr,$data) {
    $exist = $this->db->where('nama_role', $nr)
                        ->get('tb_role')
                        ->row();
    if (!$exist) {
        $this->db->insert('tb_role',$data);
        return true; 
    } else {
        return false; 
    }    
  }
  public function getJabatan($searchTerm = null) {
    $this->db->select(['id_jab', 'nama_jab']);
    $this->db->from('tb_jabatan');

    if ($searchTerm) {
        $this->db->group_start();
        $this->db->like('nama_jab', $searchTerm);
        $this->db->group_end();
    }

    $this->db->order_by('id_jab', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getRole($searchTerm = null) {
    $this->db->select(['id_role','nama_role']);
    $this->db->from('tb_role');
    if ($searchTerm) {
      $this->db->group_start();
      $this->db->like('nama_role', $searchTerm);
      $this->db->group_end();
    }
    $this->db->order_by('nama_role', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function create($data)
  {
    $this->db->insert('tb_karyawan',$data);
  }

  public function delete($id)
  {
    $success = $this->db->delete('tb_karyawan', array("id_karyawan" => $id));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
  }
  public function deleterole($id)
  {
    $success = $this->db->delete('tb_role', array("id_role" => $id));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
  }

  public function update($id,$data){
    $this->db->where('id_karyawan', $id);
    $this->db->update('tb_karyawan', $data);
  }
  public function updaterole($id,$data){
    $this->db->where('id_role', $id);
    $this->db->update('tb_role', $data);
  }

  public function getWhere($id)
  {   
    $query = $this->db->get_where('tb_karyawan', array('id_karyawan' => $id));
    return $query->result_array();
  }

  public function getLastID() {
    $this->db->select('id_karyawan');
    $this->db->from('tb_karyawan');
    $this->db->where('status', '1');
    $this->db->order_by('id_karyawan', 'desc');
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->row(); // Get single row
    return $result ? $result->id_karyawan : null; // Return single value or null if no result
  }

}

/* End of file Mkaryawan_model.php */
/* Location: ./application/models/Mkaryawan_model.php */