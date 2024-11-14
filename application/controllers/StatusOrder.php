<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class StatusOrder extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('StatusOrder_model');
  }

  public function index(){
    $data['content'] = $this->load->view('penjualan/statusorder', '', true);
    $data['modal'] = '';
    $data['css'] = '
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatables.css').'">
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
    <style>
    </style>
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/penstatusorder.js') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js?v=1.3') . '"></script>
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
    ';
    $this->load->view('layout/base', $data);   
  }
  public function tablestatorder() {
    $this->load->library('datatables');
    $this->datatables->select('id_order,nama_cst,tanggal_order,grand_total,status');
    $this->datatables->from('vorder');
    $this->datatables->group_by('id_order');
    return print_r($this->datatables->generate());
  }
  public function tabledetailorder() {
    $this->load->library('datatables');
    $ido = $this->input->post('ido');
    $this->datatables->select('id_katalog,id_katalog_dtl, nama_katalog,detail_size,qty_order,img_katalog');
    $this->datatables->from('vorder');
    if (!empty($ido)) {
      $this->datatables->where('id_order',$ido);
    }
    return print_r($this->datatables->generate());
  }
  public function approve() {
    if ($this->input->is_ajax_request()) {
        $id = $this->input->post('id');
        
        if (!empty($id)) {
            $result = $this->StatusOrder_model->approveOrder($id);
            
            if ($result) {
                $response = [
                    'status' => 'success',
                    'message' => 'Order approved successfully!'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to approve the order.'
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid order ID.'
            ];
        }
        echo json_encode($response);
    } else {
        show_404();
    }
  }
  public function cancel() {
    if ($this->input->is_ajax_request()) {
        $id = $this->input->post('id');
        
        if (!empty($id)) {
            $result = $this->StatusOrder_model->cancelOrder($id);
            
            if ($result) {
                $response = [
                    'status' => 'success',
                    'message' => 'Order cancel successfully!'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to cancel the order.'
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid order ID.'
            ];
        }
        echo json_encode($response);
    } else {
        show_404();
    }
  }
}


/* End of file StatusOrder.php */
/* Location: ./application/controllers/StatusOrder.php */