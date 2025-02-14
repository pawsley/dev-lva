<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdOrder_model extends CI_Model {
	public function getLastKode($year, $month) {
		$this->db->select('no_produksi');
		$this->db->from('tb_produksi');
		$this->db->like('no_produksi', "$year$month");
		$this->db->order_by('no_produksi', 'DESC');
		$this->db->limit(1);
	
		$query = $this->db->get();
		$result = $query->row_array();
	
		return $result ? $result['no_produksi'] : null;
	}
	
    public function getLastKodeDtl($year, $month) {
        $this->db->select('no_produksi_dtl');
        $this->db->from('tb_produksi_dtl');
        $this->db->like('no_produksi_dtl', "$year$month");
        $this->db->order_by('no_produksi_dtl', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getPoId($searchTerm, $ido) {
        $this->db->select(['id_order', 'nama_cst','wa_cst','email_cst','status','tipe_cst']);
        $this->db->from('vorder');
        if ($searchTerm) {
            $this->db->group_start();
            $this->db->like('id_order', $searchTerm);
            $this->db->or_like('nama_cst', $searchTerm);
            $this->db->group_end();
        }
        if ($ido !== null) {
            $this->db->where('id_order',$ido);
        }
        $this->db->where_in('status',['Approve']);
        $this->db->group_by('id_order');
        $this->db->order_by('id_order', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getListDataPo($ido) {
        $this->db->select(['id_odtl','id_katalog','id_katalog_dtl', 'nama_katalog','img_katalog','qty_order','detail_size']);
        $this->db->from('vorder');
        if ($ido !== null) {
            $this->db->where('id_order',$ido);
        }
        $this->db->where_in('status',['Approve']);
        $this->db->order_by('id_katalog_dtl', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getListDataPoMaterial($idkdl) {
        $this->db->select(['id','tkm.id_katalog_dtl','tm.kode_material','tm.nama_material','tm.sat_material','qty_material']);
        $this->db->from('vorder vo');
        $this->db->join('tb_katalog_material tkm', 'tkm.id_katalog_dtl = vo.id_katalog_dtl');
        $this->db->join('tb_material tm', 'tkm.kode_material = tm.kode_material');
        if ($idkdl !== null) {
            $this->db->where('tkm.id_katalog_dtl',$idkdl);
        }
        $this->db->where_in('vo.status',['Approve']);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function addProd($data){
        $insert = $this->db->insert('tb_produksi', $data);
		if ($insert) {
			return true; 
		} else {
			return false; 
		}
		// $response = [
		// 	'status' => $insert ? 'success' : 'error',
		// 	'message' => $insert ? 'Berhasil' : 'Gagal',
		// ];
		
		// return json_encode($response); 
    }
    public function addProdDtl($data){
        $insert = $this->db->insert('tb_produksi_dtl', $data);
		if ($insert) {
			return true; 
		} else {
			return false; 
		}
		// $response = [
		// 	'status' => $insert ? 'success' : 'error',
		// 	'message' => $insert ? 'Berhasil' : 'Gagal',
		// ];
		
		// return json_encode($response); 
    }
    public function updPoId($id){
        $data = [
            'status' => 'Produksi'
        ];
        $this->db->where('id_order', $id);
        return $this->db->update('tb_order', $data);
    }
}

/* End of file ProdOrder_model.php */
/* Location: ./application/models/ProdOrder_model.php */
