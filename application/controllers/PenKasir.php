<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class PenKasir extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PenKasir_model');
  }

  public function index(){
    $data['content'] = $this->load->view('penjualan/kasirpenjualan', '', true);
    $data['modal'] = '';
    $data['css'] = '
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatables.css').'">
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
    </style>    
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/additional-js/penkasir.js?v=1.0') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.1') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/datatable.custom.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);    
  }
  public function generateid() {
    $year = date('Y');
    $month = date('m');
    $day = date('d');

    $data['lastID'] = $this->PenKasir_model->getLastKode($year, $month, $day);
    $lastID = isset($data['lastID'][0]['id_order']) ? $data['lastID'][0]['id_order'] : '';
    
    if (preg_match('/PO-(\d{4})$/', $lastID, $matches)) {
        $numericPart = $matches[1];
    } else {
        $numericPart = '0000';
    }
    $expectedPrefix = "$year/$month/$day";
    if (strpos($lastID, $expectedPrefix) !== 0) {
        $numericPart = '0000';
    }

    $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1);
    $idlog = $this->session->userdata('id_karyawan');
    $data['newID'] = $expectedPrefix .'/'. $idlog . '/' . 'PO-' . $incrementedNumericPart;
    $data['defID'] = $expectedPrefix .'/'. $idlog . '/' . 'PO-0001';

    $currentDate = date('Y/m/d');
    $data['currentDate'] = $currentDate;

    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }

}


/* End of file PenKasir.php */
/* Location: ./application/controllers/PenKasir.php */