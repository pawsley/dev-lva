<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class MasterSize extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Msize_model');
  }

  public function index()
  {
    $data['content'] = $this->load->view('master/mastersize', '', true);
    $data['modal'] = '';
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatables.css').'">
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
    <style>
      .select2-selection__rendered {
          line-height: 35px !important;
      }
      .select2-container .select2-selection--single {
          height: 38px !important;
          padding: 2px !important;
      }
      .select2-dropdown--below {
        margin-top:-2% !important;
      }
      .select2-selection__arrow {
          height: 37px !important;
      }
      .select2-container{
        margin-bottom :-2%;
      }
      table.dataTable input, 
      table.dataTable select {
        border: 1px solid #efefef;
        height: 24px !important;
      }
    </style>
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/additional-js/msize.js?v='.time().'') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v='.time().'') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/dataTables.rowsGroup.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/jszip.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/buttons.colVis.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/vfs_fonts.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.select.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/buttons.html5.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') . '"></script>
    <script src="' . base_url('assets/js/flat-pickr/flatpickr.js') . '"></script>
    <script src="' . base_url('assets/js/flat-pickr/custom-flatpickr.js') . '"></script>
    <script src="'.base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    ';
    $this->load->view('layout/base', $data);
  }

  public function createpost() {
    if ($this->input->is_ajax_request()) {
      $postData = json_decode($this->input->raw_input_stream, true);

      if (!$postData || !is_array($postData)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
        return;
      }
      $isSuccess = true;
      foreach ($postData as $sizeEntry) {
        $tipe = $sizeEntry['tipepost'];
        $tableData = $sizeEntry['tabledata'];
        $cekidsb = $this->db->get_where('tb_sizechart', ['id_sbkatalog' => $tipe])->row();
        if ($cekidsb) {
          foreach ($tableData as $detailEntry) {
            $detailData = [
                'id_sizechart' => $cekidsb->id, 
                'size' => $detailEntry['sizepost'],
                'detail_size' => $detailEntry['detailpost'],
                'val_size' => $detailEntry['valuepost']
            ];

            if (!$this->Msize_model->addsizedtl($detailData)) {
              $isSuccess = false;
              break;
            }
          }
        } else {
          $sizeData = [
            'id_sbkatalog' => $tipe
          ];

          $sizeId = $this->Msize_model->addsize($sizeData);

          if (!$sizeId) {
            $isSuccess = false;
            break;
          }

          foreach ($tableData as $detailEntry) {
            $detailData = [
                'id_sizechart' => $sizeId, 
                'size' => $detailEntry['sizepost'],
                'detail_size' => $detailEntry['detailpost'],
                'val_size' => $detailEntry['valuepost']
            ];

            if (!$this->Msize_model->addsizedtl($detailData)) {
              $isSuccess = false;
              break;
            }
          }
        }
      }

      if ($isSuccess) {
          echo json_encode(['status' => 'success', 'message' => 'Data saved successfully']);
      } else {
          echo json_encode(['status' => 'error', 'message' => 'Failed to save data']);
      }
    } else {
      show_404();
    }
  }
  public function deletepost($idsz, $iddtl) {
    if ($this->input->is_ajax_request()) {
      $result = $this->Msize_model->deletesizedtl($idsz, $iddtl);
      echo json_encode($result);
    }else{
      show_404();
    }
  }
	public function updatepost(){
		if ($this->input->is_ajax_request()) {
			
			$id = $this->input->post('eid');
			$data = [
					'id_sizechart' => $this->input->post('isize'),
					'size' => $this->input->post('size'),
					'detail_size' => $this->input->post('dsize'),
					'val_size' => $this->input->post('vsize'),
			];

			$this->Msize_model->updatesizedtl($id, $data);
			echo json_encode(['status' => 'success']);
		} else {
			show_404();
		}
	}
  public function tablesizechart()  {
    $this->load->library('datatables');
    $this->datatables->select('id_szdtl, id, nama, concat(nama, "(", ukuran, ")") as datasize, ukuran, detail_size, val_size');
    $this->datatables->from('vsizechart');
    return print_r($this->datatables->generate());
  }
}


/* End of file MasterSize.php */
/* Location: ./application/controllers/MasterSize.php */
