<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class MasterKatalog extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mkatalog_model');
  }
  // Menu Katalog LVA
  public function index(){
    $data['content'] = $this->load->view('katalog/lvakatalog', '', true);
    $data['modal'] = '';
    $data['css'] = '
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/owlcarousel.css') . '">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/range-slider.css') . '">
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
    <script src="' . base_url('assets/js/additional-js/mmaterial.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.1') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="'.base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/owlcarousel/owl.carousel.js') . '"></script>
    <script src="' . base_url('assets/js/range-slider/ion.rangeSlider.min.js') . '"></script>
    <script src="' . base_url('assets/js/range-slider/rangeslider-script.js') . '"></script>
    <script src="' . base_url('assets/js/touchspin/touchspin.js') . '"></script>
    <script src="' . base_url('assets/js/product-tab.js') . '"></script>
    <script src="' . base_url('assets/js/touchspin/input-groups.min.js') . '"></script>
    ';
    $this->load->view('layout/base', $data); 
  }
  // Menu Buat Katalog
  public function generateid() {
    $data['lastID'] = $this->Mkatalog_model->getLastID();
    $numericPart = isset($data['lastID'][0]['id_katalog']) ? preg_replace('/[^0-9]/', '', $data['lastID'][0]['id_katalog']) : '';
    $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1);
    $data['newID'] = 'SKU-' . $incrementedNumericPart;
    $data['defID'] = 'SKU-0001';
    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }
  public function getsb($kode){
    $searchTerm = $this->input->get('q');
    $results = $this->Mkatalog_model->getsb($kode,$searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }
  public function addsb(){
    if ($this->input->is_ajax_request()) {
      $kode = $this->input->post('kodekat');
      $nk = $this->input->post('namakat');

      $this->Mkatalog_model->addsb($kode, $nk);

      echo json_encode(['status' => 'success']);
    } else {
        redirect('master-material');
    }
  }
  public function deletesb($id) {
    $result = $this->Mkatalog_model->deletesb($id);
    echo json_encode($result);
  }
  public function updatesb(){
    if ($this->input->is_ajax_request()) {
      $json_data = $this->input->raw_input_stream;
      $dafData = json_decode($json_data, true);
      if (!empty($dafData)) {
          foreach ($dafData as $data) {
              $idr = $data['id'];
              $nmr = $data['name'];

              $this->Mkatalog_model->updatesb($idr, [
                  'nama' => $nmr
              ]);
          }
          echo json_encode(['status' => 'success']);
      } else {
          echo json_encode(['status' => 'error', 'message' => 'No data received']);
      }
    } else {
      redirect('katalog');
    }
  }  
  public function buatbaru(){
    $data['content'] = $this->load->view('katalog/buatkatalog', '', true);
    $data['modal'] = '';
    $data['css'] = '
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/custom.css') . '">';
    $data['js'] = '
    <script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/additional-js/mkatalog.js?v=1.3') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.1') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="' . base_url('assets/js/flat-pickr/flatpickr.js') . '"></script>
    <script src="' . base_url('assets/js/flat-pickr/custom-flatpickr.js') . '"></script>
    <script src="'.base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    ';
    $this->load->view('layout/base', $data); 
  }
  public function createdata(){
    if ($this->input->is_ajax_request()) {
      $this->load->library('upload');
      $loghj = str_replace(['.', ','], '', $this->input->post('loghj'));
      $data = [
          'id_katalog' => $this->input->post('sku'),
          'id_sizechart'      => $this->input->post('selkat'),
          'nama_katalog'     => $this->input->post('namakatalog'),
          'warna_katalog'  => $this->input->post('selwrn'),
          'harga_jual'  => (int)($loghj),
          'catatan'  => $this->input->post('notes')
      ];
      if (!empty($_FILES['img_katalog']['name'])) {
        $file_path = realpath(APPPATH . '../assets/lvaimages/katalog');
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = true;
        $config['file_name'] = $this->input->post('sku') . '_' .$_FILES['img_katalog']['name'];
        $config['max_size'] = 10048;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('img_katalog')) {
          $upload_data = $this->upload->data();
          $data['img_katalog'] = $upload_data['file_name'];
        } else {
          echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
          return;
        }
      }

      $this->Mkatalog_model->addlog($data);
      $table_data = json_decode($this->input->post('table_data'), true);

      if (!empty($table_data)) {

        foreach ($table_data as $item) {
            $data_detail = [
                'id_katalog'  => $item['id_katalog'],
                'size'    => $item['sizelog'],
            ];
            $this->Mkatalog_model->addlogdtl($data_detail);
        }

        echo json_encode(['status' => 'success']);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
      }
    } else {
      show_404();
    }
  }
  public function getdatatipe($kode) {
    $results = $this->Mkatalog_model->getDataTipe($kode);
    header('Content-Type: application/json');
    echo json_encode($results);
  }
  // List Katalog
  public function list(){
    $data['content'] = $this->load->view('katalog/listkatalog', '', true);
    $data['modal'] = '';
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatables.css').'">
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/custom.css') . '">';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/additional-js/mkatalog.js?v=1.3') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.1') . '"></script>
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
  public function tablekatalog()  {
    $this->load->library('datatables');
    $this->datatables->select('CONCAT(id_katalog, "|", nama_katalog) as katalog, CONCAT(nama, " ",warna_katalog, " ",size) as detail,
    id_katalog_dtl, id_katalog, nama_katalog, nama, warna_katalog, img_katalog, total_hpp_bahan,id_sizechart, size,harga_jual,status');
    $this->datatables->from('vkatalog');
    return print_r($this->datatables->generate());
  }
  public function tableaddmaterial($iddtl)  {
    $this->load->library('datatables');
    $search = $this->input->post('search');
    $this->datatables->select('kode_material, id_katalog_dtl, nama_material, CONCAT(tipe_material, " ", kat_material, " ", warna_material) as dtl_mtr, tipe_material, kat_material, warna_material, sat_material, harga_material, img_material');
    $this->datatables->from('vkatalog_bahan');
    if (!empty($search)) {
      $searchTerms = explode(' ', $search);
      $likeClauses = [];
      
      foreach ($searchTerms as $term) {
          $likeClauses[] = 'concat(nama_material, " ", tipe_material, " ", kat_material, " ", warna_material) LIKE \'%' . $this->db->escape_like_str($term) . '%\'';
      }

      $this->datatables->where(implode(' AND ', $likeClauses));
    }
    $this->datatables->where('id_katalog_dtl',$iddtl);
    return print_r($this->datatables->generate());
  }
  public function addmtr() {
    $materials = $this->input->post('materials');

    if (!empty($materials)) {
        $totalHarga = 0;

        foreach ($materials as $material) {
            $data = [
                'id_katalog_dtl' => $material['idtl'],
                'kode_material' => $material['kodem'],
                'qty_material' => $material['qty'],
                'hpp_bahan' => $material['tharga']
            ];

            $this->Mkatalog_model->addlogmtr($data);
            $totalHarga += $material['tharga'];
        }

        $idtl = $materials[0]['idtl'];
        $this->Mkatalog_model->updlogdtl($idtl, ['total_hpp_bahan' => $totalHarga]);

        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
  }
  // Menu Condiment Katalog
  public function condiments(){
    $data['content'] = $this->load->view('katalog/condiments', '', true);
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
    </style>
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/additional-js/mkatalog.js?v=1.3') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.1') . '"></script>
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
  public function getsbcdm($kode){
    $searchTerm = $this->input->get('q');
    $results = $this->Mkatalog_model->getsbcdm($kode,$searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }  
  public function addsbcdm(){
    if ($this->input->is_ajax_request()) {
      $kode = $this->input->post('kodekat');
      $nk = $this->input->post('namakat');

      $this->Mkatalog_model->addsbcdm($kode, $nk);

      echo json_encode(['status' => 'success']);
    } else {
      show_404();
    }
  }
  public function deletesbcdm($id) {
    $result = $this->Mkatalog_model->deletesbcdm($id);
    echo json_encode($result);
  }
  public function updatesbcdm(){
    if ($this->input->is_ajax_request()) {
      $json_data = $this->input->raw_input_stream;
      $dafData = json_decode($json_data, true);
      if (!empty($dafData)) {
          foreach ($dafData as $data) {
              $idr = $data['id'];
              $nmr = $data['name'];

              $this->Mkatalog_model->updatesbcdm($idr, [
                  'nama_condiment' => $nmr
              ]);
          }
          echo json_encode(['status' => 'success']);
      } else {
          echo json_encode(['status' => 'error', 'message' => 'No data received']);
      }
    } else {
      redirect('katalog');
    }
  }
  public function getsbsize($idk){
    $searchTerm = $this->input->get('q');
    $results = $this->Mkatalog_model->getsbsize($idk,$searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }  
  public function getdtlsize($idk,$sz){
    $results = $this->Mkatalog_model->getdtlsize($idk,$sz);
    header('Content-Type: application/json');
    echo json_encode($results);
  }  
  public function getsbmtr(){
    $searchTerm = $this->input->get('q');
    $results = $this->Mkatalog_model->getsbmtr($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }  
  public function tablecondiment($id)  {
    $this->load->library('datatables');
    $this->datatables->select('ukuran, nama_condiment, kode_material, nama_material, qty_required, sat_material');
    $this->datatables->from('vcondiment');
    $this->datatables->where('id_katalog',$id);
    return print_r($this->datatables->generate());
  }
  public function addcdm() {
    if ($this->input->is_ajax_request()) {
        $nmc = $this->input->post('selcondi');
        $idk = $this->input->post('idkat');
        $sz = $this->input->post('selsize');
        $mtr = $this->input->post('selmtr');
        $qty = $this->input->post('qty');

        // Use query binding to avoid SQL injection
        $this->db->where([
            'nama_condiment' => $nmc,
            'id_katalog' => $idk,
            'size' => $sz,
            'kode_material' => $mtr
        ]);
        $cekcdm = $this->db->get('tb_condiment')->row();

        if ($cekcdm) {
            $total_qty = $qty + $cekcdm->qty_required;
            $this->Mkatalog_model->updatecdm($cekcdm->id, $total_qty);
        } else {
            // Insert a new record
            $data = [
                'nama_condiment' => $nmc,
                'id_katalog' => $idk,
                'size' => $sz,
                'kode_material' => $mtr,
                'qty_required' => $qty
            ];
            $this->Mkatalog_model->addcdm($data);
        }

        echo json_encode(['status' => 'success']);
    } else {
        show_404();
    }
  }
  public function aktivasikatalog() {
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('idkat');
      $result = $this->Mkatalog_model->aktivasi($id);
      echo json_encode($result);
    }else{
      show_404();
    }
  }
}


/* End of file MasterKatalog.php */
/* Location: ./application/controllers/MasterKatalog.php */