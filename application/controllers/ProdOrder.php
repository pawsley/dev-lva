<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class ProdOrder extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ProdOrder_model');
    $this->load->library('zend');
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
    <script src="' . base_url('assets/js/additional-js/prodbaru.js?v=1.1') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.3') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);    
  }
  public function generateid() {
    $year = date('Y');
    $month = date('m');

    $data['lastID'] = $this->ProdOrder_model->getLastKode($year, $month);
    $lastID = isset($data['lastID'][0]['no_produksi']) ? $data['lastID'][0]['no_produksi'] : '';
    
    if (preg_match('/PR-(\d{4})$/', $lastID, $matches)) {
        $numericPart = $matches[1];
    } else {
        $numericPart = '0000';
    }
    $expectedPrefix = "$year$month";
    if (strpos($lastID, $expectedPrefix) !== 0) {
        $numericPart = '0000';
    }

    $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1);
    $idlog = $this->session->userdata('id_karyawan');
    $data['newID'] = $expectedPrefix . $idlog . 'PR-' . $incrementedNumericPart;
    $data['defID'] = $expectedPrefix . $idlog . 'PR-0001';

    $currentDate = date('Y/m');
    $data['currentDate'] = $currentDate;

    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }
  public function loadpoid() {
    $searchTerm = $this->input->get('q', TRUE);
    $ido = $this->input->post('ido', TRUE);
    $results = $this->ProdOrder_model->getPoId($searchTerm, $ido);
    if ($results) {
      foreach ($results as &$datacst) {
        $datacst['list_data_po'] = $this->ProdOrder_model->getListDataPo($datacst['id_order']);
        if (!empty($datacst['list_data_po'])) {
          foreach ($datacst['list_data_po'] as &$datamtrl) {
              // Fetch list_material for each item in list_data_po
              $datamtrl['list_material'] = $this->ProdOrder_model->getListDataPoMaterial($datamtrl['id_katalog_dtl']);
          }
        } else {
            $datacst['list_data_po'] = [];
        }
      }
    } else {
      $results = ['error' => 'No data found'];
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($results));
  }
  public function barcode($sp){
    $this->zend->load('Zend/Barcode');
    $imageResource = Zend_Barcode::factory('code128','image', array('text'=>$sp), array())->draw();
    $imageName = $sp.'.jpg';
      if ($_SERVER['SERVER_NAME'] == 'localhost') {
        $imagePath = './assets/lvaimages/produksi/';
      } else if($_SERVER['SERVER_NAME'] == 'live.akira.id'){
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/dev-lva/assets/lvaimages/produksi/';
      } else {
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/lvaimages/produksi/';
      }
    imagejpeg($imageResource, $imagePath.$imageName);
  }
  public function createprod(){
    if ($this->input->is_ajax_request()) {
      $orderData = [
        'id_order' => $this->input->post('order_id'),
        'no_produksi' => $this->input->post('selcst'),
        'tgl_produksi' => $this->session->userdata('id_karyawan'),
        'tgl_produksi_selesai' => $this->input->post('orderdate'),
        'catatan_order' => $this->input->post('catatan'),
        'presentase_diskon' => $this->input->post('predis'),
        'nominal_diskon' => $this->input->post('nomdis'),
        'sub_total' => $this->input->post('sub'),
        'grand_total'=> $this->input->post('grand')
      ];
      $result = $this->PenKasir_model->addOrder($orderData);
      if ($result) {
        $table_data = json_decode($this->input->post('table_data'), true);
        foreach ($table_data as $item) {
          $orderDetails = [
              'id_order' => $this->input->post('order_id'),
              'id_katalog' => $item['id_katalog'],
              'id_katalog_dtl' => $item['id_katalog_dtl'],
              'detail_size' => $item['detail_size'],
              'qty_order' => $item['qty_order'],
              'harga_jual_order' => $item['harga_jual_order'],
          ];
          $this->PenKasir_model->addOrderDetail($orderDetails);
        }

        $qrdata = str_replace('/', '_', $this->input->post('order_id'));
        $customDir = './assets/lvaimages/qrcode_order/';
        $this->qrcodegenerator->generate($qrdata, $customDir);

        $response = [
            'status' => 'success',
            'message' => 'Berhasil dibuat.'
        ];
      } else {
        $response = [
            'status' => 'error',
            'message' => 'Gagal dibuat.'
        ];
      }
      echo json_encode($response);
    } else {
      show_404();
    }
  }

}


/* End of file ProdOrder.php */
/* Location: ./application/controllers/ProdOrder.php */