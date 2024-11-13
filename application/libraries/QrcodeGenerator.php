<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QrcodeGenerator {
    protected $ci;
    protected $config;

    public function __construct() {
        // Get CodeIgniter instance
        $this->ci =& get_instance();
        
        // Load the CI QR Code library
        $this->ci->load->library('ciqrcode');
        
        // Default configurations for QR code
        $this->config = [
            'cacheable' => true,
            'cachedir' => './assets/',
            'errorlog' => './assets/',
            'imagedir' => './assets/lvaimages/qrcode/',
            'quality' => true,
            'size' => '1024',
            'black' => [224, 255, 255],
            'white' => [70, 130, 180]
        ];

        $this->ci->ciqrcode->initialize($this->config);
    }

    public function generate($qrdata, $customDir = null) {
        // Set a custom directory if provided, otherwise use the default
        $directory = $customDir ? $customDir : $this->config['imagedir'];
        
        // Ensure the directory exists
        if (!is_dir(FCPATH . $directory)) {
            mkdir(FCPATH . $directory, 0755, true);
        }

        $qr = $qrdata . '.png'; // QR code file name

        // QR code parameters
        $params = [
            'data' => $qrdata,
            'level' => 'H',
            'size' => 10,
            'savename' => FCPATH . $directory . $qr
        ];

        // Generate the QR code
        $this->ci->ciqrcode->generate($params);
        return $directory . $qr; // Return the QR code path
    }
}
