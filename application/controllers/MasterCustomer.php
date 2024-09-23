<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class MasterCustomer extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mcustomer_model');
  }

  public function index(){
    $data['content'] = $this->load->view('customer/daftarcustomer','', true);
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
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/mcustomer.js?v=1.1') . '"></script>
    <script src="' . base_url('assets/js/additional-js/rajaongkir.js') . '"></script>
    <script src="'.base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
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
    <script src="' . base_url('assets/js/datatable/datatable-extension/custom.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);    
  }
  public function buatbaru(){
    $data['content'] = $this->load->view('customer/buatbaru','', true);
    $data['modal'] = '';
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatables.css').'">
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
    <style>
    .input-group>.select2-container--default {
        width: auto !important;
        flex: 1 1 auto !important;
    }

    .input-group>.select2-container--default .select2-selection--single {
        height: 38px !important;
        line-height: inherit !important;
        padding: 0.5rem 1rem;
    }
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
    .input-group-append .btn {
        padding: 0.375rem 0.75rem;
    }
    </style>
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/mcustomer.js?v=1.0') . '"></script>
    <script src="' . base_url('assets/js/additional-js/rajaongkir.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="'.base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    ';
    $this->load->view('layout/base', $data);    
  }
  function generateid(){
    $data['lastID'] = $this->Mcustomer_model->getLastKode();
    $numericPart = isset($data['lastID'][0]['id_cst']) ? preg_replace('/[^0-9]/', '', $data['lastID'][0]['id_cst']) : '';
    $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1);
    $data['newID'] = 'ELVC-' . $incrementedNumericPart;
    $data['defID'] = 'ELVC-0001';
    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }  
  public function loadtipe(){
    $searchTerm = $this->input->get('q');
    $results = $this->Mcustomer_model->getdatasbc($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }
  public function createsbmat(){
    if ($this->input->is_ajax_request()) {
      $nk = $this->input->post('namakat');
      $val = $this->input->post('valdis');

      $this->Mcustomer_model->createsbc($nk,$val);

      echo json_encode(['status' => 'success']);
    } else {
      show_404();
    }
  }
  public function deletedaf($id) {
    $result = $this->Mcustomer_model->deletesbc($id);
    echo json_encode($result);
  }
  public function updatedaf(){
    if ($this->input->is_ajax_request()) {
      $json_data = $this->input->raw_input_stream;
      $dafData = json_decode($json_data, true);
      if (!empty($dafData)) {
          foreach ($dafData as $data) {
              $idr = $data['id'];
              $nmr = $data['name'];
              $dis = $data['dis'];

              $this->Mcustomer_model->updatesbc($idr, [
                  'nama_sbc' => $nmr,
                  'diskon' => $dis
              ]);
          }
          echo json_encode(['status' => 'success']);
      } else {
          echo json_encode(['status' => 'error', 'message' => 'No data received']);
      }
    } else {
      show_404();
    }
  }
  public function createdata(){
    if ($this->input->is_ajax_request()) {
      $data = [
        'id_cst'=>$this->input->post('idc'),
        'nama_cst'=>$this->input->post('nmc'),
        'wa_cst'=>$this->input->post('wac'),
        'email_cst'=>$this->input->post('emc'),
        'tipe_cst'=>$this->input->post('tpc'),
        'id_sbc'=>$this->input->post('idtpc'),
        'provinsi'=>$this->input->post('prov_name'),
        'kabupaten'=>$this->input->post('kab_name'),
        'kecataman'=>$this->input->post('kec_name'),
        'kode_pos'=>$this->input->post('kode_pos'),
        'alamat_cst'=>$this->input->post('alamat')
      ];

      $this->Mcustomer_model->createcst($data);

      echo json_encode(['status' => 'success']);
    } else {
      show_404();
    }
  }
  public function updatedata() {
    if ($this->input->is_ajax_request()) {
        $id = $this->input->post('eidc');

        $update_data = [
            'nama_cst' => $this->input->post('enmc'),
            'wa_cst' => $this->input->post('ewac'),
            'email_cst' => $this->input->post('emc'),
            'tipe_cst' => $this->input->post('etpc'),
            'id_sbc' => $this->input->post('eidtpc'),
            'provinsi' => $this->input->post('eprov_name'),
            'kabupaten' => $this->input->post('ekab_name'),
            'kecataman' => $this->input->post('ekec_name'),
            'kode_pos' => $this->input->post('ekode_pos'),
            'alamat_cst' => $this->input->post('ealamat'),
            'status' => $this->input->post('estatus'),
        ];
        $this->Mcustomer_model->updatecst($id, $update_data);

        // Step 5: Respond to the request with success status
        echo json_encode(['status' => 'success']);
    } else {
        show_404();
    }
  }
  public function deletedata($id) {
    $result = $this->Mcustomer_model->deletecst($id);
    echo json_encode($result);
  }  
  public function tablecst() {
    $this->load->library('datatables');
    $this->datatables->select('id_cst, nama_cst, wa_cst, email_cst, tipe_cst, provinsi, kabupaten, kecataman,kode_pos,alamat_cst,saldo_cst,status');
    $this->datatables->from('tb_customer');
    return print_r($this->datatables->generate());
  }
  // public function depocust(){
  //   $data['content'] = $this->load->view('customer/depocustomer','', true);
  //   $data['modal'] = '';
  //   $data['css'] = '
  //     <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatables.css').'">
  //     <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatable-extension.css').'">
  //     <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
  //     <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
  //     <style>
  //       .select2-selection__rendered {
  //           line-height: 35px !important;
  //       }
  //       .select2-container .select2-selection--single {
  //           height: 38px !important;
  //           padding: 2px !important;
  //       }
  //       .select2-dropdown--below {
  //         margin-top:-2% !important;
  //       }
  //       .select2-selection__arrow {
  //           height: 37px !important;
  //       }
  //       .select2-container{
  //         margin-bottom :-2%;
  //       }
  //     </style>
  //   ';
  //   $data['js'] = '
  //     <script>var base_url = "' . base_url() . '";</script>
  //     <script src="' . base_url('assets/js/additional-js/custom-scripts.js') . '"></script>
  //     <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
  //     <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
  //     <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
  //     <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/jszip.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/buttons.colVis.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/vfs_fonts.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.select.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/buttons.html5.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/custom.js') . '"></script>    
  //   ';
  //   $this->load->view('layout/base', $data);    
  // }
  // public function trancust(){
  //   $data['content'] = $this->load->view('customer/trancustomer','', true);
  //   $data['modal'] = '';
  //   $data['css'] = '
  //     <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatables.css').'">
  //     <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatable-extension.css').'">
  //   ';
  //   $data['js'] = '
  //     <script>var base_url = "' . base_url() . '";</script>
  //     <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/jszip.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/buttons.colVis.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/vfs_fonts.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.select.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/buttons.html5.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') . '"></script>
  //     <script src="' . base_url('assets/js/datatable/datatable-extension/custom.js') . '"></script>    
  //   ';
  //   $this->load->view('layout/base', $data); 
  // }

}


/* End of file MasterCustomer.php */
/* Location: ./application/controllers/MasterCustomer.php */