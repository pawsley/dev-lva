<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class MasterBarang extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mbarang_model');
    $this->load->model('Mkategori_model');
  }

  function gen() {
    $uniqueId = uniqid('', true); // Include more entropy
    $randomNumericPart = rand(1000, 9999); // Generate a random 4-digit number using rand()
    
    $data['newID'] = 'DHP-' . str_pad($randomNumericPart, 4, '0', STR_PAD_LEFT);

    return $data;
  }

  public function generateid(){
    $uniqueId = uniqid('', true); // Include more entropy
    $randomNumericPart = rand(1000, 9999); // Generate a random 4-digit number using rand()
    
    $data['newID'] = 'DHP-' . str_pad($randomNumericPart, 4, '0', STR_PAD_LEFT);
    
    $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($data));    
  }

  public function loadsupp(){
    $searchTerm = $this->input->get('q');
    $results = $this->Mbarang_model->getSupp($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }

  public function loadmerk(){
    $searchTerm = $this->input->get('q');
    $results = $this->Mbarang_model->getMerk($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }

  public function loadjenis(){
    $searchTerm = $this->input->get('q');
    $results = $this->Mbarang_model->getJenis($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }

  public function loadbrg(){
    $this->load->library('datatables');
    $this->datatables->select('id_brg,merk,jenis,nama_brg,status');
    $this->datatables->from('tb_barang');
    return print_r($this->datatables->generate());
  }

  public function index()
  {
    $data = $this->gen();
    $data['supplier'] = $this->Mbarang_model->getSupp();
    $data['content'] = $this->load->view('master/masterbarang', $data, true);
    $data['modal'] = $this->load->view('master/modal/m_barang','',true);
    $data['css'] = '
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/datatables.css') . '">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
    <style>
        .select2-selection__rendered {
            line-height: 35px !important;
        }
        .select2-container .select2-selection--single {
            height: 38px !important;
            padding: 2px !important;
        }
        .select2-dropdown--below {
          margin-top:-2%; !important;
        }
        .select2-selection__arrow {
            height: 37px !important;
        }
        .select2-container{
          margin-bottom :-6%;
        }
    </style>
    ';
    $data['js'] = '
    <script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/mbarang.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/datatable.custom.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);    
  }

  function createpost(){
    if ($this->input->is_ajax_request()) {
      $data = [
        'id_brg'      => $this->input->post('id_brg'),
        'merk'      => $this->input->post('merk'),
        'jenis'      => $this->input->post('jenis'),
        'nama_brg'      => $this->input->post('nama_brg'),
        'status'      => '1',
      ];
      
      $this->Mbarang_model->create($data);
      echo json_encode(['status' => 'success']);
    } else {
      redirect('master-barang');
    }
  }

  function addmerk(){
    if ($this->input->is_ajax_request()) {
      $kode = "MRK";
      $nk = $this->input->post('newmerk');

      // Check if nama_kategori already exists
      $inserted = $this->Mkategori_model->create($kode, $nk);

      if ($inserted) {
          echo json_encode(['status' => 'success']);
      } else {
          echo json_encode(['status' => 'exists']);
      }
    } else {
        redirect('master-barang');
    }
  }

  function addjenis(){
    if ($this->input->is_ajax_request()) {
      $kode = "JNS";
      $nk = $this->input->post('newjenis');

      $inserted = $this->Mkategori_model->create($kode, $nk);

      if ($inserted) {
          echo json_encode(['status' => 'success']);
      } else {
          echo json_encode(['status' => 'exists']);
      }
    } else {
        redirect('master-barang');
    }
  }

  public function deletepost($id) {
    $result = $this->Mbarang_model->delete($id);
    echo json_encode($result);
  }

  public function edit($id){
    $data['get_id']= $this->Mbarang_model->getWhere($id);
    echo json_encode($data);
  }

  function updatepost(){
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('e_id_brg');
      $data = [
        'merk'      => $this->input->post('e_merk'),
        'jenis'      => $this->input->post('e_jenis'),
        'nama_brg'      => $this->input->post('e_nama_brg'),
        'status'      => '1',
      ];
      
      $this->Mbarang_model->update($id, $data);
      echo json_encode(['status' => 'success']);
    } else {
      redirect('master-barang');
    }
  }

}


/* End of file MasterBarang.php */
/* Location: ./application/controllers/MasterBarang.php */