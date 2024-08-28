<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemMaterial_model extends CI_Model {
  public function getLastKode($year, $month,$day) {
    $this->db->select('id_pembelian');
    $this->db->from('tb_pembelian');
    $this->db->like('id_pembelian', "$year/$month/$day", 'after');
    $this->db->order_by('id_pembelian', 'desc');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataSupplier($searchTerm = null) {
    $this->db->select(['id_supplier', 'nama_supplier','bank_acc','norek']);
    $this->db->from('tb_supplier');

    if ($searchTerm) {
        $this->db->group_start();
        $this->db->like('nama_supplier', $searchTerm);
        $this->db->group_end();
    }

    $this->db->order_by('nama_supplier', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataBankLVA($searchTerm = null) {
    $this->db->select(['id_bank', 'nama_bank','no_rek','nama_rek']);
    $this->db->from('tb_bank');

    if ($searchTerm) {
        $this->db->group_start();
        $this->db->like('nama_bank', $searchTerm);
        $this->db->or_like('no_rek', $searchTerm);
        $this->db->or_like('nama_rek', $searchTerm);
        $this->db->group_end();
    }

    $this->db->order_by('nama_bank', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }  
  public function createpmb($data) {
    $insert = $this->db->insert('tb_pembelian', $data);
    return $insert; 
  }
  public function createpmbdtl($data) {
    $insert = $this->db->insert('tb_pembelian_dtl', $data);
    return $insert;
  }
  public function statmastermtr($id) {
    $this->db->where('kode_material', $id);
    $this->db->set('status', '1');
    $success = $this->db->update('tb_material');
    
    if ($success) {
        return array(
            'status' => 'success',
            'message' => 'Material used'
        );
    } else {
        return array(
            'status' => 'failed',
            'message' => 'Gagal used'
        );
    }
  }
  public function deletepmb($id){
    // NB: wajib cek id digunakan di table relation
    $success = $this->db->delete('tb_pembelian', array("id_pembelian" => $id));
    $success2 = $this->db->delete('tb_pembelian_dtl', array("id_pembelian" => $id));
    if ($success && $success2) {
      $message = 'Transaksi berhasil dihapus';
    } else {
      $message = 'Transaksi gagal dihapus';
    }
    return array('success' => ($success && $success2), 'message' => $message);
  }
  public function approvedpmb($id) {
    $this->db->where('id_pembelian', $id);
    $this->db->set('status', 'Approved');
    $success = $this->db->update('tb_pembelian');
    
    if ($success) {
        return array(
            'status' => 'success',
            'message' => 'Transaksi approved'
        );
    } else {
        return array(
            'status' => 'failed',
            'message' => 'Gagal approve'
        );
    }
  }
  public function approvedgd($id) {
    $this->db->where('id_pembelian', $id);
    $this->db->set('status', 'Barang Diterima Gudang');
    $success = $this->db->update('tb_pembelian');
    
    if ($success) {
        return array(
            'status' => 'success',
            'message' => 'Transaksi Diterima Gudang'
        );
    } else {
        return array(
            'status' => 'failed',
            'message' => 'Gagal Diterima Gudang'
        );
    }
  }

}

/* End of file PemMaterial_model.php */
/* Location: ./application/models/PemMaterial_model.php */