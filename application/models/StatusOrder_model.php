<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusOrder_model extends CI_Model {
    public function approveOrder($id) {
        $data = [
            'status' => 'Approve'
        ];
        $this->db->where('id_order', $id);
        return $this->db->update('tb_order', $data);
    }
    public function cancelOrder($id) {
        $data = [
            'status' => 'Batal'
        ];
        $this->db->where('id_order', $id);
        return $this->db->update('tb_order', $data);
    }
}

/* End of file StatusOrder_model.php */
/* Location: ./application/models/StatusOrder_model.php */