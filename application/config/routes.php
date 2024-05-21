<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// master karyawan
$route['master-karyawan']='MasterKaryawan';
$route['master-karyawan/simpan-data']='MasterKaryawan/createpost';
$route['master-karyawan/jsonkar']='MasterKaryawan/jsonkar';
$route['master-karyawan/edit/(:any)']='MasterKaryawan/edit/$1';
$route['master-karyawan/update-data']='MasterKaryawan/updatepost';
$route['master-karyawan/hapus/(:any)'] = 'MasterKaryawan/deletepost/$1';
// master supplier
$route['master-supplier']='MasterSupplier';
$route['master-supplier/simpan-data']='MasterSupplier/createpost';
$route['master-supplier/jsonsup']='MasterSupplier/jsonsup';
$route['master-supplier/edit/(:any)']='MasterSupplier/edit/$1';
$route['master-supplier/update-data']='MasterSupplier/updatepost';
$route['master-supplier/hapus/(:any)'] = 'MasterSupplier/deletepost/$1';
// master produk
$route['master-barang']='MasterBarang';
$route['master-barang/simpan-data']='MasterBarang/createpost';
$route['master-barang/update-data']='MasterBarang/updatepost';
$route['master-barang/loadbrg']='MasterBarang/loadbrg';
$route['master-barang/edit/(:any)'] = 'MasterBarang/edit/$1';
$route['master-barang/hapus/(:any)'] = 'MasterBarang/deletepost/$1';
// master bank
$route['master-bank']='MasterBank';
$route['master-bank/loadbank']='MasterBank/loadbank';
$route['master-bank/simpan-data']='MasterBank/createpost';
$route['master-bank/update-data']='MasterBank/updatepost';
$route['master-bank/hapus/(:num)'] = 'MasterBank/deletepost/$1';
$route['master-bank/edit/(:num)'] = 'MasterBank/edit/$1';
//master diskon
$route['master-diskon']='MasterDiskon';
$route['master-diskon/simpan-data']='MasterDiskon/createpost';
$route['master-diskon/jsondis']='MasterDiskon/jsondis';
$route['master-diskon/edit/(:any)']='MasterDiskon/edit/$1';
$route['master-diskon/update-data']='MasterDiskon/updatepost';
$route['master-diskon/hapus/(:any)'] = 'MasterDiskon/deletepost/$1';