<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {
	public function getLastKode($year, $month) {
		$this->db->select('no_invoice');
		$this->db->from('tb_invoice');
		$this->db->like('no_invoice', "$year$month");
		$this->db->order_by('no_invoice', 'DESC');
		$this->db->limit(1);
	
		$query = $this->db->get();
		$result = $query->row_array();
	
		return $result ? $result['no_invoice'] : null;
	}
}

/* End of file Tagihan_model.php */
/* Location: ./application/models/Tagihan_model.php */