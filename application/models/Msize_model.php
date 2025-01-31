<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msize_model extends CI_Model {
  public function addsize($data) {
    $this->db->insert('tb_sizechart', $data);
    return $this->db->insert_id();
  }
  public function addsizedtl($data) {
    return $this->db->insert('tb_sizechart_dtl', $data);
  }
  public function deletesizedtl($idsz, $iddtl) {
    $cekid = $this->db->get_where('tb_sizechart_dtl', ['id_sizechart' => $idsz])->result();

    if (!empty($cekid)) {
      $this->db->delete('tb_sizechart_dtl', ['id_szdtl' => $iddtl]);
      return ['success' => true, 'message' => 'Data successfully deleted.'];
    } else {
      $this->db->delete('tb_sizechart_dtl', ['id_szdtl' => $iddtl]);
      $this->db->delete('tb_sizechart', ['id' => $idsz]);
      return ['success' => true, 'message' => 'All Data successfully deleted.'];
    }
  }
	public function updatesizedtl($iddtl, $data) {
		$this->db->where('id_szdtl', $iddtl);
    $this->db->update('tb_sizechart_dtl', $data);
	}
}

/* End of file Msize_model.php */
/* Location: ./application/models/Msize_model.php */
