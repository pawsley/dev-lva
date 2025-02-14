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
    <script src="' . base_url('assets/js/additional-js/prodbaru.js?v='.time().' ') . '"></script>
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
    $lastID = $this->ProdOrder_model->getLastKode($year, $month) ?? '';

    // Extract numeric part using regex
    if (preg_match('/PR(\d{4})/', $lastID, $matches)) {
        $numericPart = $matches[1];
    } else {
        $numericPart = '0000';
    }

    if (!empty($lastID) && strpos($lastID, $expectedPrefix) === false) {
        $numericPart = '0000';
    }

    $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1);
    $idlog = $this->session->userdata('id_karyawan');

    $data['newID'] = "PR{$incrementedNumericPart}/{$expectedPrefix}/{$idlog}";
    $data['defID'] = "PR0001/{$expectedPrefix}/{$idlog}";

    $data['currentDate'] = date('Y/m');


    $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function generateiddl() {
    $year = date('Y');
    $month = date('m');

    $data['lastID'] = $this->ProdOrder_model->getLastKodeDtl($year, $month);
    $lastID = isset($data['lastID'][0]['no_produksi_dtl']) ? $data['lastID'][0]['no_produksi_dtl'] : '';
    
    if (preg_match('/DL(\d{4})$/', $lastID, $matches)) {
        $numericPart = $matches[1];
    } else {
        $numericPart = '0000';
    }
    $expectedPrefix = "$year$month";
    if (strpos($lastID, $expectedPrefix) !== 0) {
        $numericPart = '0000';
    }

    $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1);
    $data['newID'] = 'DL' . $incrementedNumericPart.'/'.$expectedPrefix;
    $data['defID'] = 'DL0001'.'/'.$expectedPrefix;

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
  public function createprod() {
    if ($this->input->is_ajax_request()) {
        // Collect production data
        $prodData = [
            'id_order' => $this->input->post('order_id'),
            'no_produksi' => $this->input->post('noprod'),
            'tgl_produksi' => $this->input->post('dateprod'),
            'tgl_produksi_selesai' => $this->input->post('dateprodfinish'),
            'jumlah_produksi' => $this->input->post('totalprod'),
            'keterangan' => $this->input->post('catatan')
        ];

        // Insert production data into the database
        $result = $this->ProdOrder_model->addProd($prodData);

        if ($result) {

          $insertId = $this->db->insert_id();
          $detailprd = json_decode($this->input->post('listprod'), true);
          
          if (!empty($detailprd)) {
            $parts = explode('/', $this->input->post('noprod'));
            $dlCounter = 1; // Global counter for no_produksi_dtl
        
            foreach ($detailprd as $item) {
              // Insert based on the quantity order (`qty`)
              for ($i = 0; $i < $item['qty']; $i++) { 
                $prdl = $parts[0] . '/DL' . $dlCounter; // Increment global counter
    
                $prodDetails = [
                    'no_produksi_dtl' => $prdl,
                    'id_produksi' => $insertId,
                    'id_odtl' => $item['id_odtl']
                ];
                $this->ProdOrder_model->addProdDtl($prodDetails);
    
                $dlCounter++; // Increment for next row
              }
            }
          }
          $this->ProdOrder_model->updPoId($this->input->post('order_id'));
          // Return success response
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

        // Output the JSON response
        echo json_encode($response);
    } else {
        // Return a 404 error if not an AJAX request
        show_404();
    }
  }
  public function menulistprod(){
    $data['content'] = $this->load->view('produksi/listproduksi', '', true);
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
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/custom.css') . '">
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/additional-js/prodbaru.js?v='.time().' ') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v='.time().' ') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
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
    ';
    $this->load->view('layout/base', $data);
  }
  public function menustok(){
    $data['content'] = $this->load->view('produksi/stok', '', true);
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
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/custom.css') . '">
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/additional-js/prodbaru.js?v='.time().' ') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v='.time().' ') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
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
    ';
    $this->load->view('layout/base', $data);
  }
  public function menufinishing(){
    $data['content'] = $this->load->view('produksi/finishing', '', true);
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
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/custom.css') . '">
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/additional-js/prodbaru.js?v='.time().' ') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v='.time().' ') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
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
    ';
    $this->load->view('layout/base', $data);
  }
  public function tableproduksi(){
    $this->load->library('datatables');
    $this->datatables->select('id_order,no_produksi,id,no_produksi_dtl,tgl_produksi,tgl_produksi_selesai, nama_katalog, img_katalog, detail_size, nama_cst, proses_produksi');
    $this->datatables->from('vprod');
    $this->datatables->where_in('proses_produksi',['Belum Ada Proses','Potong','Jahit']);
    return print_r($this->datatables->generate());
  }
  public function tablefinish(){
    $this->load->library('datatables');
    $this->datatables->select('id_order,no_produksi,id,no_produksi_dtl,tgl_produksi,tgl_produksi_selesai, nama_katalog, img_katalog, detail_size, nama_cst, proses_produksi');
    $this->datatables->from('vprod');
    $this->datatables->where_in('proses_produksi',['Jahit','Finishing','QC']);
    return print_r($this->datatables->generate());
  }
  public function tablestokpro(){
    $this->load->library('datatables');
    $this->datatables->select('id_order,no_produksi,id,no_produksi_dtl,tgl_produksi,tgl_produksi_selesai, nama_katalog, img_katalog, detail_size, nama_cst, proses_produksi');
    $this->datatables->from('vprod');
    $this->datatables->where_in('proses_produksi',['Finishing']);
    return print_r($this->datatables->generate());
  }
}


/* End of file ProdOrder.php */
/* Location: ./application/controllers/ProdOrder.php */
