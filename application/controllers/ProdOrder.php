<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class ProdOrder extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ProdOrder_model');
  }

  public function index(){
    $data['content'] = $this->load->view('produksi/produksibaru', '', true);
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
    <script src="' . base_url('assets/js/additional-js/prodbaru.js?v=1.0') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.2') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);    
  }

}


/* End of file ProdOrder.php */
/* Location: ./application/controllers/ProdOrder.php */