<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkatalog_model extends CI_Model {
    public function getLastID() {
        $this->db->select('id_katalog');
        $this->db->from('tb_katalog');
        $this->db->order_by('id_katalog', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function addsb($kode, $nk) {
        $existingCategory = $this->db->where('nama', $nk)
                            ->get('tb_sbkatalog')
                            ->row();
        if (!$existingCategory) {
            $data = array(
                'kode' => $kode,
                'nama' => $nk
            );
            $this->db->insert('tb_sbkatalog', $data);
            return true; 
        } else {
            return false; 
        }
    }
    public function getsb($kode,$searchTerm = null) {
    $this->db->select(['id', 'nama','kode']);
    $this->db->from('tb_sbkatalog');
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
    public function updatesb($id,$data){
    $this->db->where('id', $id);
    $this->db->update('tb_sbkatalog', $data);
    }
    public function deletesb($id){
    $success = $this->db->delete('tb_sbkatalog', array("id" => $id));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
    }
    public function addlog($data) {
        $insert = $this->db->insert('tb_katalog', $data);
        return $insert; 
    }
    public function addlogdtl($data) {
        $insert = $this->db->insert('tb_katalog_dtl', $data);
        return $insert; 
    }
}

/* End of file Mkatalog_model.php */
/* Location: ./application/models/Mkatalog_model.php */