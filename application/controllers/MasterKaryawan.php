<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class MasterKaryawan extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mkaryawan_model');
  }

  public function generateid() {
    $lastID = $this->Mkaryawan_model->getLastID();
    if (!empty($lastID)) {
        $numericPart = preg_replace('/[^0-9]/', '', $lastID); // Extract numeric part
        $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1); // Increment numeric part
        $newID = 'ELVE-' . $incrementedNumericPart;
    } else {
        $newID = 'ELVE-0001';
    }
    return $newID;
  }


  public function index()
  {
    $data['newID'] = $this->generateid();
    $data['content'] = $this->load->view('master/masterkaryawan', $data, true);
    $data['modal'] = $this->load->view('master/modal/m_editkar','',true);
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
    <script src="' . base_url('assets/js/additional-js/rajaongkir.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/mkaryawan.js') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/datatable.custom.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') . '"></script>
    <script src="' . base_url('assets/js/flat-pickr/flatpickr.js') . '"></script>
    <script src="' . base_url('assets/js/flat-pickr/custom-flatpickr.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js') . '"></script>
    <script src="'.base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    ';
    $this->load->view('layout/base', $data);    
  }
  public function createjabatan() {
    if ($this->input->is_ajax_request()) {
      $nj = $this->input->post('namajab');
      $data = [
        'nama_jab'      => $this->input->post('namajab'),
      ];
      $inserted = $this->Mkaryawan_model->tambahjabatan($nj,$data);
      if ($inserted) {
          echo json_encode(['status' => 'success']);
      } else {
          echo json_encode(['status' => 'exists']);
      }
    } else {
        redirect('master-karyawan');
    }
  }
  public function createrole() {
    if ($this->input->is_ajax_request()) {
      $nr = $this->input->post('namarole');
      $data = [
        'nama_role'      => $this->input->post('namarole'),
      ];
      $inserted = $this->Mkaryawan_model->tambahrole($nr,$data);
      if ($inserted) {
          echo json_encode(['status' => 'success']);
      } else {
          echo json_encode(['status' => 'exists']);
      }
    } else {
        redirect('master-karyawan');
    }    
  }
  public function loadjab(){
    $searchTerm = $this->input->get('q');
    $results = $this->Mkaryawan_model->getJabatan($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }
  public function loadrole(){
    $searchTerm = $this->input->get('q');
    $results = $this->Mkaryawan_model->getRole($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }    
  function edit($id){
    $data['get_id']= $this->Mkaryawan_model->getWhere($id);
    echo json_encode($data);
  }
  function createpost(){
    if ($this->input->is_ajax_request()) {
      $this->load->library('upload');
      $data = [
        'id_karyawan'      => $this->input->post('id_karyawan'),
        'nama_karyawan'      => $this->input->post('nama_karyawan'),
        'tanggal_lahir'      => $this->input->post('tanggal_lahir'),
        'jen_kel'      => $this->input->post('jen_kel'),
        'email'      => $this->input->post('email'),
        'password'      => $this->input->post('password'),
        'provinsi'      => $this->input->post('provinsi'),
        'kabupaten'      => $this->input->post('kabupaten'),
        'kecamatan'      => $this->input->post('kecamatan'),
        'kode_pos'      => $this->input->post('kode_pos'),
        'alamat'      => $this->input->post('alamat'),
        'no_wa'      => $this->input->post('no_wa'),
        'role_user'      => $this->input->post('role_user'),
        'tipe_gaji'      => $this->input->post('tipe_gaji'),
        'bank_acc'      => $this->input->post('bank_acc'),
        'norek'      => $this->input->post('norek'),
        'gaji'      => $this->input->post('gaji'),
        'status'      => '1'
      ];
      if (!empty($_FILES['file_cv']['name'])) {
        $file_path = realpath(APPPATH . '../assets/pdf/cvkaryawan');
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'pdf';
        $config['overwrite'] = true;
        $config['file_name'] = $this->input->post('id_karyawan') . '_' . $_FILES['file_cv']['name'];
        $config['max_size'] = 10048;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file_cv')) {
            $upload_data = $this->upload->data();
            $data['file_cv'] = $upload_data['file_name'];
        } else {
            echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
            return;
        }
      }
      $this->Mkaryawan_model->create($data);
      echo json_encode(['status' => 'success']);
    } else {
      redirect('master-karyawan');
    }
  }
  public function updatepost(){
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('eid');
      $fileupload = isset($_FILES['e_filecv']) ? $_FILES['e_filecv']['name'] : null;
      $data = [
        'nama_lengkap'     => $this->input->post('enama'),
        'tanggal_lahir'   => $this->input->post('etgl'),
        'jen_kel'   => $this->input->post('ejk'),
        'email'   => $this->input->post('email'),
        'password'   => $this->input->post('epassword'),
        'provinsi'    => $this->input->post('eprov'),
        'kabupaten'   => $this->input->post('ekot'),
        'kecamatan'   => $this->input->post('ekec'),
        'kode_pos'    => $this->input->post('ekode'),
        'alamat'      => $this->input->post('ealamat'),
        'no_wa'  => $this->input->post('ewa'),
        'file_cv'  => $this->input->post('efile'),
        'jabatan'  => $this->input->post('ejabatan'),
        'role_user'  => $this->input->post('erole'),
        'gaji'  => $this->input->post('egaji'),
        'status'      => $this->input->post('estatus'),
      ];

      $file_path = realpath(APPPATH . '../assets/dhdokumen/karyawan');
      $config['upload_path'] = $file_path;
      $config['allowed_types'] = 'pdf';
      $config['overwrite'] = true;
      $config['file_name'] = $fileupload;
      $config['max_size'] = 10048;
          
      $this->load->library('upload', $config);
          
      if (!empty($fileupload)) {
        if ($this->upload->do_upload('e_filecv')) {
            $data1 = $this->upload->data();
            $cv = $data1['file_name'];
            $data['file_cv'] = $cv; // Update the file_cv field with the new filename
        } else {
            $error = $this->upload->display_errors();
            echo "Upload failed: $error";
            return; // Stop execution if upload fails
        }
      } 
      $this->Mkaryawan_model->update($id, $data);
      echo json_encode(['status' => 'success']);
    } else {
      redirect('master-karyawan');
    }
  }
  public function deletepost() {
    if ($this->input->is_ajax_request()) {
      // Retrieve the ID from the request
      $id = $this->input->post('idk');

      $images = $this->Mkaryawan_model->getWhere($id);
      $result = $this->Mkaryawan_model->delete($id);

      $response = array();
      
      if ($result) {
          foreach ($images as $i) {
              if (!empty($i['file_cv'])) {
                  $filePath = realpath(APPPATH . '../assets/pdf/cvkaryawan/') . '/' . $i['file_cv'];
                  if (file_exists($filePath)) {
                      unlink($filePath);
                  }
              }
          }
          // Set the response for a successful delete
          $response['result'] = array('success' => true, 'message' => 'Data deleted successfully.');
      } else {
          // Set the response for a failed delete
          $response['result'] = array('success' => false, 'message' => 'Failed to delete data.');
      }

      echo json_encode($response);
    }
  }
  public function deleterole($id) {
    $result = $this->Mkaryawan_model->deleterole($id);
    echo json_encode($result);
  }
  public function updaterole(){
    if ($this->input->is_ajax_request()) {
      $json_data = $this->input->raw_input_stream;
      $rolesData = json_decode($json_data, true);
      if (!empty($rolesData)) {
          foreach ($rolesData as $data) {
              $idr = $data['id'];
              $nmr = $data['name'];

              $this->Mkaryawan_model->updaterole($idr, [
                  'nama_role' => $nmr
              ]);
          }
          echo json_encode(['status' => 'success']);
      } else {
          echo json_encode(['status' => 'error', 'message' => 'No data received']);
      }
    } else {
      redirect('master-karyawan');
    }
  }
  public function jsonkar(){
    $this->load->library('datatables');
    $this->datatables->select('id_karyawan, nama_karyawan, jen_kel, tanggal_lahir, email, password, provinsi, kabupaten, kecamatan,
    kode_pos, alamat, no_wa, file_cv, role_user, tipe_gaji, bank_acc, norek, gaji, status');
    $this->datatables->from('tb_karyawan');
    return print_r($this->datatables->generate());
  }

}


/* End of file MasterKaryawan.php */
/* Location: ./application/controllers/MasterKaryawan.php */