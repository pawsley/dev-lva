<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenKasir_model extends CI_Model {
  public function getLastKode($year, $month) {
		$this->db->select('id_order');
		$this->db->from('tb_order');
		$this->db->like('id_order', "$year$month");
		$this->db->order_by('id_order', 'DESC');
		$this->db->limit(1);
	
		$query = $this->db->get();
		$result = $query->row_array();
	
		return $result ? $result['no_produksi'] : null;
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
  public function getDataKatalog($searchTerm, $id) {
    $this->db->select('id_katalog,id_katalog_dtl,nama_katalog, nama as tipe, warna_katalog,img_katalog,size,harga_jual');
    $this->db->from('vkatalog');
    if ($searchTerm) {
      $this->db->group_start();
      $this->db->like('nama_katalog', $searchTerm);
      $this->db->or_like('nama', $searchTerm);
      $this->db->group_end();
    }
    if ($id !== null) {
      $this->db->where('id_katalog_dtl',$id);
    }
    $this->db->order_by('nama_katalog','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataAgen($searchTerm) {
    $this->db->select('tc.id_cst, tc.nama_cst, tc.wa_cst, tc.email_cst, ts.id_sbc, ts.diskon, tc.tipe_cst');
    $this->db->from('tb_customer tc');
    $this->db->join('tb_sbcustomer ts', 'tc.id_sbc = ts.id_sbc');
    if ($searchTerm) {
      $this->db->group_start();
      $this->db->like('nama_cst', $searchTerm);
      $this->db->group_end();
    }
    $this->db->order_by('nama_cst','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getDataTipeAgen($searchTerm) {
    $this->db->select('ts.id_sbc, ts.diskon, ts.nama_sbc');
    $this->db->from('tb_sbcustomer ts');
    if ($searchTerm) {
      $this->db->group_start();
      $this->db->like('nama_sbc', $searchTerm);
      $this->db->group_end();
    }
    $this->db->order_by('nama_sbc','asc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function addOrder($data){
    $insert = $this->db->insert('tb_order', $data);
    return $insert;    
  }
  public function addOrderDetail($data){
    $insert = $this->db->insert('tb_order_dtl', $data);
    return $insert;
  }
  // public function addOrder($data, $data2) {
  //   $this->db->trans_start();

  //   $this->db->insert('tb_order', $data);
  //   $id_order = $this->db->insert_id();

  //   foreach ($data2 as &$detail) {
  //       $detail['id_order'] = $id_order;
  //   }

  //   $this->db->insert_batch('tb_order_dtl', $data2);

  //   $this->db->trans_complete();

  //   return $this->db->trans_status();
  // }
}

/* End of file PenKasir_model.php */
/* Location: ./application/models/PenKasir_model.php */