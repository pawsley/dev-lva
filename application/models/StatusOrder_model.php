<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusOrder_model extends CI_Model {
    public function approveOrder($id) {
        $data = [
            'status' => 'Approve'
        ];
        $this->db->where('id_odtl', $id);
        return $this->db->update('tb_order_dtl', $data);
    }
    public function cancelOrder($id) {
        $data = [
            'status' => 'Batal'
        ];
        $this->db->where('id_odtl', $id);
        return $this->db->update('tb_order_dtl', $data);
    }
    public function bahanOrder($id) {
        $data = [
            'status' => 'Bahan'
        ];
        $this->db->where('id_odtl', $id);
        return $this->db->update('tb_order_dtl', $data);
    }
    public function produksiOrder($id) {
        $data = [
            'status' => 'Produksi'
        ];
        $this->db->where('id_odtl', $id);
        return $this->db->update('tb_order_dtl', $data);
    }
    public function qcOrder($id) {
        $data = [
            'status' => 'QC'
        ];
        $this->db->where('id_odtl', $id);
        return $this->db->update('tb_order_dtl', $data);
    }
    public function selesaiOrder($id) {
        $data = [
            'status' => 'Selesai'
        ];
        $this->db->where('id_odtl', $id);
        return $this->db->update('tb_order_dtl', $data);
    }
}

/* End of file StatusOrder_model.php */
/* Location: ./application/models/StatusOrder_model.php */