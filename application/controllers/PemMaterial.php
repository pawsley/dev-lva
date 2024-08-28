<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemMaterial extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PemMaterial_model');
  }

  public function index(){
    $data['content'] = $this->load->view('pembelian/pembelianm', '', true);
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
    <script src="' . base_url('assets/js/additional-js/pmbmaterial.js?v=1.0') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.0') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
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
  public function generateid() {
    $year = date('Y');
    $month = date('m');
    $day = date('d');

    $data['lastID'] = $this->PemMaterial_model->getLastKode($year, $month, $day);
    $lastID = isset($data['lastID'][0]['id_pembelian']) ? $data['lastID'][0]['id_pembelian'] : '';
    
    if (preg_match('/IVPB-(\d{4})$/', $lastID, $matches)) {
        $numericPart = $matches[1];
    } else {
        $numericPart = '0000';
    }
    $expectedPrefix = "$year/$month/$day";
    if (strpos($lastID, $expectedPrefix) !== 0) {
        $numericPart = '0000';
    }

    $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1);
    $data['newID'] = $expectedPrefix . '/' . 'IVPB-' . $incrementedNumericPart;
    $data['defID'] = $expectedPrefix . '/' . 'IVPB-0001';

    $currentDate = date('Y/m/d');
    $data['currentDate'] = $currentDate;

    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }
  public function loadsupp(){
    $searchTerm = $this->input->get('q');
    $results = $this->PemMaterial_model->getDataSupplier($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }
  public function loadbanklva(){
    $searchTerm = $this->input->get('q');
    $results = $this->PemMaterial_model->getDataBankLVA($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }
  public function createdata(){
    if ($this->input->is_ajax_request()) {
      $data = [
          'id_pembelian' => $this->input->post('ivpb'),
          'datetime'     => $this->input->post('pmbtgl'),
          'tipe_pmb'     => $this->input->post('seltipe'),
          'id_bank'      => $this->input->post('bank_acc') ? $this->input->post('bank_acc') : 0,
          'id_supplier'  => $this->input->post('selsupp'),
          'grand_total'  => $this->input->post('grand_total')
      ];

      $table_data = json_decode($this->input->post('table_data'), true);

      if (!empty($data)) {
        $this->PemMaterial_model->createpmb($data);

        foreach ($table_data as $item) {
            $data_detail = [
                'id_pembelian'  => $data['id_pembelian'],
                'kode_material' => $item['kode'],
                'qty_pb_dtl'    => $item['qty'],
                'nominal_pb_dtl'=> $item['nominal'],
                'total_pb_dtl'  => $item['total']
            ];
            $this->PemMaterial_model->createpmbdtl($data_detail);
            $this->PemMaterial_model->statmastermtr($item['kode']);
        }

        echo json_encode(['status' => 'success']);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
      }
    } else {
      show_404();
    }
  }
  public function tablepmbmtr()  {
    $this->load->library('datatables');
    $this->datatables->select('id_pembelian, tgl_pmb, nama_supplier, bank_acc, norek, grand_total, tipe_pmb, 
    id_bank, nama_bank, no_rek, nama_rek,status');
    $this->datatables->from('vpmbmtr');
    $this->datatables->group_by('id_pembelian');
    return print_r($this->datatables->generate());
  }
  public function tablepmbdtl() {
    $inv = $this->input->post('invid');
    $this->load->library('datatables');
    $this->datatables->select('CONCAT(kode_material, "|", nama_material) as material, kode_material, nama_material, 
    CONCAT(kat_material, " ", merk_material, " " ,warna_material, " ",sat_material) as detail, kat_material, merk_material, warna_material, sat_material, 
    img_material, qty_pb_dtl, nominal_pb_dtl, total_pb_dtl');
    $this->datatables->from('vpmbmtr');
    $this->datatables->where('id_pembelian',$inv);
    return print_r($this->datatables->generate());
  }
  public function deletedata() {
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('invoice');
      $result = $this->PemMaterial_model->deletepmb($id);
      echo json_encode($result);
    }else{
      show_404();
    }
  }
  public function approvepmb() {
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('invoice');
      $result = $this->PemMaterial_model->approvedpmb($id);
      echo json_encode($result);
    }else{
      show_404();
    }
  }
  public function approvegd() {
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('invoice');
      $result = $this->PemMaterial_model->approvedgd($id);
      echo json_encode($result);
    }else{
      show_404();
    }
  }

}


/* End of file PemMaterial.php */
/* Location: ./application/controllers/PemMaterial.php */