<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class Tagihan extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Tagihan_model');
    $this->load->library('zend');
  }

  public function index(){
    $data['content'] = $this->load->view('finance/tagihan', '', true);
    $data['modal'] = '';
    $data['css'] = '
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
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/custom.css') . '">
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/additional-js/tagihan.js?v='.time().' ') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.3') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);
  }
	public function generateid() {
    $year = date('Y');
    $month = date('m');
    $expectedPrefix = "$year$month";

    // Fetch last order number
    $lastID = $this->Tagihan_model->getLastKode($year, $month) ?? '';

    // Extract numeric part using regex
    if (preg_match('/INV(\d{4})/', $lastID, $matches)) {
        $numericPart = $matches[1];
    } else {
        $numericPart = '0000';
    }

    if (!empty($lastID) && strpos($lastID, $expectedPrefix) === false) {
        $numericPart = '0000';
    }

    $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1);
    $idlog = $this->session->userdata('id_karyawan');

    $data['newID'] = "INV{$incrementedNumericPart}/{$expectedPrefix}/{$idlog}";
    $data['defID'] = "INV0001/{$expectedPrefix}/{$idlog}";

    $data['currentDate'] = date('Y/m');


    $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}  
  public function menulist(){
    $data['content'] = $this->load->view('finance/listtagihan', '', true);
    $data['modal'] = '';
    $data['css'] = '
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
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/custom.css') . '">
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/additional-js/tagihan.js?v='.time().' ') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.3') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);
  }

}


/* End of file Tagihan.php */
/* Location: ./application/controllers/Tagihan.php */