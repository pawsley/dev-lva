<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class Welcome extends Auth {
	public function index(){
		$data['content'] = $this->load->view('dashboard/index', '', true);
		$data['modal'] = '';
		$data['css'] = '';
		$data['js'] = '<script>var base_url = "' . base_url() . '";</script>
			<script src="' . base_url() . 'assets/js/counter/jquery.waypoints.min.js"></script>
			<script src="' . base_url() . 'assets/js/counter/jquery.counterup.min.js"></script>
			<script src="' . base_url() . 'assets/js/counter/counter-custom.js"></script>
			<script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
			<script src="' . base_url('assets/js/additional-js/id.js') . '"></script>
			<script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
			<script src="' . base_url() . 'assets/js/animation/wow/wow.min.js"></script>
			<script src="' . base_url('assets/js/additional-js/dashboard.js') . '"></script>
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
			<script>new WOW().init();</script>';
		$this->load->view('layout/base', $data);		
	}	
}
