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
    // condiment    
    public function addsbcdm($kode, $nk) {
        $existingCategory = $this->db->where('nama_condiment', $nk)
                            ->get('tb_katalog_condiment')
                            ->row();
        if (!$existingCategory) {
            $data = array(
                'kode_condiment' => $kode,
                'nama_condiment' => $nk
            );
            $this->db->insert('tb_katalog_condiment', $data);
            return true; 
        } else {
            return false; 
        }
    }
    public function getsbcdm($kode,$searchTerm = null) {
        $this->db->select(['id_condiment', 'nama_condiment','kode_condiment']);
        $this->db->from('tb_katalog_condiment');
        $this->db->where('kode_condiment',$kode);
    
        if ($searchTerm) {
            $this->db->group_start();
            $this->db->like('nama_condiment', $searchTerm);
            $this->db->group_end();
        }
    
        $this->db->order_by('nama_condiment', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function updatesbcdm($id,$data){
        $this->db->where('id_condiment', $id);
        $this->db->update('tb_katalog_condiment', $data);
    }
    public function deletesbcdm($id){
        $success = $this->db->delete('tb_katalog_condiment', array("id_condiment" => $id));
        $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
        return array('success' => $success, 'message' => $message);
    }
    public function getsbsize($idk,$searchTerm = null) {
        $this->db->select(['id_katalog_dtl', 'tb_katalog.id_katalog', 'tb_katalog.nama_katalog','size','panjang','lebar','ukuran_ld','ukuran_pb']);
        $this->db->from('tb_katalog_dtl');
        $this->db->join('tb_katalog', 'tb_katalog.id_katalog = tb_katalog_dtl.id_katalog', 'inner');
        $this->db->where('tb_katalog_dtl.id_katalog', $idk);
    
        if ($searchTerm) {
            $this->db->group_start();
            $this->db->like('size', $searchTerm);
            $this->db->group_end();
        }
    
        $this->db->order_by('size', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }    
    public function getsbmtr($searchTerm = null) {
        $this->db->select(['kode_material', 'nama_material', 'kat_material','merk_material','warna_material','sat_material','img_material']);
        $this->db->from('tb_material');
    
        if ($searchTerm) {
            $this->db->group_start();
            $this->db->like('kode_material', $searchTerm);
            $this->db->or_like('nama_material', $searchTerm);
            $this->db->group_end();
        }
    
        $this->db->order_by('kode_material', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }    
}

/* End of file Mkatalog_model.php */
/* Location: ./application/models/Mkatalog_model.php */