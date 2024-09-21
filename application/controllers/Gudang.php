<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class Gudang extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function gudangldp(){
    $data['content'] = $this->load->view('gudang/gdldp', '', true);
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
    <script src="' . base_url('assets/js/additional-js/gudang.js?v=1.1') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.1') . '"></script>
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
  public function gudanglva(){
    $data['content'] = $this->load->view('gudang/gdlva', '', true);
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
    <script src="' . base_url('assets/js/additional-js/gudang.js?v=1.1') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.1') . '"></script>
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
  public function tablegudanglva()  {
    $this->load->library('datatables');
    $this->datatables->select('kode_material,nama_material,stoklva');
    $this->datatables->from('vstokmtrlva');
    return print_r($this->datatables->generate());
  }  
  public function tablegudangldp()  {
    $this->load->library('datatables');
    $this->datatables->select('kode_material,nama_material,stoklva');
    $this->datatables->from('vstokmtrldp');
    return print_r($this->datatables->generate());
  }  

}


/* End of file Gudang.php */
/* Location: ./application/controllers/Gudang.php */