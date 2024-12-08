<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class MasterMaterial extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mmaterial_model');
  }
  function generateid(){
    $data['lastID'] = $this->Mmaterial_model->getLastKode();
    $numericPart = isset($data['lastID'][0]['kode_material']) ? preg_replace('/[^0-9]/', '', $data['lastID'][0]['kode_material']) : '';
    $incrementedNumericPart = sprintf('%04d', intval($numericPart) + 1);
    $data['newID'] = 'ELVM-' . $incrementedNumericPart;
    $data['defID'] = 'ELVM-0001';
    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }
  public function index(){
    $data['content'] = $this->load->view('master/mastermaterial', '', true);
    $data['modal'] = '';
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatables.css').'">
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/custom.css') . '">';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/additional-js/mmaterial.js?v='.time().' ') . '"></script>
    <script src="' . base_url('assets/js/additional-js/custom-scripts.js') . '"></script>
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
  public function loadkat($kode){
    $searchTerm = $this->input->get('q');
    $results = $this->Mmaterial_model->getDataKategori($kode,$searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }
  public function loadkatsize(){
    $searchTerm = $this->input->get('q');
    $results = $this->Mmaterial_model->getDataTipeSize($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }
  public function createsbmat(){
    if ($this->input->is_ajax_request()) {
      $kode = $this->input->post('kodekat');
      $nk = $this->input->post('namakat');

      $this->Mmaterial_model->addsbmat($kode, $nk);

      echo json_encode(['status' => 'success']);
    } else {
        redirect('master-material');
    }
  }
  public function deletedaf($id) {
    $result = $this->Mmaterial_model->deletedaf($id);
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

              $this->Mmaterial_model->updatedaf($idr, [
                  'nama' => $nmr
              ]);
          }
          echo json_encode(['status' => 'success']);
      } else {
          echo json_encode(['status' => 'error', 'message' => 'No data received']);
      }
    } else {
      redirect('master-material');
    }
  }
  public function compress_image($source_path, $destination_path, $quality) {
    $info = getimagesize($source_path);
    
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source_path);
        imagejpeg($image, $destination_path, $quality);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_path);
        imagepng($image, $destination_path, round(9 * $quality / 100));
    }
    
    imagedestroy($image);
  }
  private function resize_image($source_url, $destination_url, $max_width, $max_height) {
    // Get image dimensions
    list($width, $height, $type) = getimagesize($source_url);

    // Calculate aspect ratio
    $aspect_ratio = $width / $height;

    // Determine new dimensions to fit within max width and height
    if ($width > $max_width || $height > $max_height) {
        if ($width / $max_width > $height / $max_height) {
            $new_width = $max_width;
            $new_height = floor($max_width / $aspect_ratio);
        } else {
            $new_height = $max_height;
            $new_width = floor($max_height * $aspect_ratio);
        }
    } else {
        $new_width = $width;
        $new_height = $height;
    }

    // Create a new image resource with desired dimensions
    $image_p = imagecreatetruecolor($new_width, $new_height);

    // Handle transparency for PNG images if needed
    if ($type == IMAGETYPE_PNG) {
        imagealphablending($image_p, false);
        imagesavealpha($image_p, true);
        $transparent = imagecolorallocatealpha($image_p, 255, 255, 255, 127);
        imagefilledrectangle($image_p, 0, 0, $new_width, $new_height, $transparent);
    }

    // Create the resized image
    $image = imagecreatefromjpeg($source_url); // Assuming source is JPEG

    // Resize the image
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // Save the resized image
    imagejpeg($image_p, $destination_url, 100); // Adjust quality (100 is highest) for JPEG

    // Free up memory
    imagedestroy($image_p);
    imagedestroy($image);

    return $destination_url;
  }
  public function tablematerial()  {
    $this->load->library('datatables');
    $this->datatables->select('kode_material, nama, id_sizechart, nama_material, kat_material, warna_material, sat_material,  tipe_material, harga_material, img_material, status');
    $this->datatables->from('vmaterial');
    return print_r($this->datatables->generate());
  }
  public function createpost(){
    if ($this->input->is_ajax_request()) {
      $this->load->library('upload');
      $data = [
        'kode_material'      => $this->input->post('kode'),
        'nama_material'      => $this->input->post('nama'),
        'kat_material'      => $this->input->post('kat'),
        'tipe_material'      => $this->input->post('tipe'),
        'warna_material'      => $this->input->post('warna'),
        'sat_material'      => $this->input->post('sat'),
        'harga_material'      => $this->input->post('hrg'),
        'id_sizechart'      => $this->input->post('tipk')
      ];
      if (!empty($_FILES['img_material']['name'])) {
        $file_path = realpath(APPPATH . '../assets/lvaimages/material');
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = true;
        $config['file_name'] = $this->input->post('kode') . '_' .$_FILES['img_material']['name'];
        $config['max_size'] = 10048;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('img_material')) {
          $upload_data = $this->upload->data();
          $data['img_material'] = $upload_data['file_name'];
        } else {
          echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
          return;
        }
      }
      
      $this->Mmaterial_model->create($data);
      echo json_encode(['status' => 'success']);
    } else {
      redirect('master-material');
    }
  }
  public function deletepost() {
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('idm');
      $img = $this->input->post('img');
      $result = $this->Mmaterial_model->delete($id);
      $imagePath = './assets/lvaimages/material/';
      $fileName = $imagePath . $img;
      if (file_exists($fileName)) {
          unlink($fileName);
      }
      echo json_encode($result);
    }else{
      show_404();
    }
  }
  public function updatepost() {
    if ($this->input->is_ajax_request()) {
        $this->load->library('upload');
        $this->load->helper('file'); // Load file helper for unlinking files
        
        $id = $this->input->post('eidm');
        $oldImage = $this->input->post('oldimg'); // Get the old image URL
        $data = [
            'nama_material' => $this->input->post('enmm'),
            'kat_material' => $this->input->post('ekatm'),
            'warna_material' => $this->input->post('ewrnm'),
            'sat_material' => $this->input->post('esatm'),
            'img_material' => $oldImage // Default to old image
        ];

        // Check if a new file was uploaded
        if (!empty($_FILES['img_material']['name'])) {
            $file_path = realpath(APPPATH . '../assets/lvaimages/material');
            $config['upload_path'] = $file_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = true;
            $config['file_name'] = $id . '_' . $_FILES['img_material']['name'];
            $config['max_size'] = 10048;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_material')) {
                $upload_data = $this->upload->data();
                $newImage = $upload_data['file_name'];
                $data['img_material'] = $newImage; // Update with new image
                
                // Remove the old image file if it exists
                if ($oldImage!==$newImage) {
                  $oldImagePath = $file_path . '/' . $oldImage;
                  if ($oldImage && file_exists($oldImagePath)) {
                      unlink($oldImagePath);
                  }
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            }
        }

        // Update the database with the data
        $this->Mmaterial_model->update($id, $data);
        echo json_encode(['status' => 'success']);
    } else {
        redirect('master-material');
    }
  }
}


/* End of file MasterMaterial.php */
/* Location: ./application/controllers/MasterMaterial.php */