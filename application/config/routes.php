<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// auth
$route['login']='Login';
$route['logout']='Login/logout';
$route['cek-auth']='Login/aksi_login';
$route['registrasi']='Login/createpost';
// master agen
$route['master-agen']='MasterCustomer';
// master tipe agen
$route['master-tipe-agen']='MasterTipeAgen';
$route['master-tipe-agen/list-tipe-agen']='MasterTipeAgen/tabletpa';
$route['master-tipe-agen/update-data']='MasterTipeAgen/updatedata';
$route['master-tipe-agen/delete-data/(:any)'] = 'MasterTipeAgen/deletedaf/$1';
// master karyawan
$route['master-karyawan']='MasterKaryawan';
$route['master-karyawan/role-kar']='MasterKaryawan/loadrole';
$route['master-karyawan/simpan-data']='MasterKaryawan/createpost';
$route['master-karyawan/jsonkar']='MasterKaryawan/jsonkar';
$route['master-karyawan/edit/(:any)']='MasterKaryawan/edit/$1';
$route['master-karyawan/update-data']='MasterKaryawan/updatepost';
$route['master-karyawan/hapus'] = 'MasterKaryawan/deletepost';
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
// master material
$route['master-material']='MasterMaterial';
$route['master-material/newsb']='MasterMaterial/createsbmat';
$route['master-material/simpan-data']='MasterMaterial/createpost';
$route['master-material/list-material']='MasterMaterial/tablematerial';
$route['master-material/edit/(:any)']='MasterMaterial/edit/$1';
$route['master-material/update-data']='MasterMaterial/updatepost';
$route['master-material/hapus-data'] = 'MasterMaterial/deletepost';
// master produk
$route['master-produk']='MasterProduk';
$route['master-produk/simpan-data']='MasterProduk/createpost';
$route['master-produk/jsondis']='MasterProduk/jsondis';
$route['master-produk/edit/(:any)']='MasterProduk/edit/$1';
$route['master-produk/update-data']='MasterProduk/updatepost';
$route['master-produk/hapus/(:any)'] = 'MasterProduk/deletepost/$1';
// master size
$route['master-size']='MasterSize';
$route['master-size/add-data']='MasterSize/createpost';
$route['master-size/list-data']='MasterSize/tablesizechart';
$route['master-size/update-data']='MasterSize/updatepost';
$route['master-size/hapus/(:num)/(:num)'] = 'MasterSize/deletepost/$1/$2';
// $route['master-produk/simpan-data']='MasterProduk/createpost';
// $route['master-produk/jsondis']='MasterProduk/jsondis';
// $route['master-produk/edit/(:any)']='MasterProduk/edit/$1';
// $route['master-produk/update-data']='MasterProduk/updatepost';
// master katalog
$route['katalog/daftar']='MasterKatalog';
$route['katalog/buat-baru']='MasterKatalog/buatbaru';
$route['katalog/sku-id']='MasterKatalog/generateid';
$route['katalog/newsb']='MasterKatalog/addsb';
$route['katalog/updatesb']='MasterKatalog/updatesb';
$route['katalog/deletesb/(:num)']='MasterKatalog/deletesb/$1';
$route['katalog/dafsb/(:any)']='MasterKatalog/getsb/$1';
$route['katalog/add-katalog']='MasterKatalog/createdata';
// list katalog
$route['katalog/list']='MasterKatalog/list';
// katalog condiment
$route['katalog/condiments']='MasterKatalog/condiments';
$route['katalog/newcdm']='MasterKatalog/addsbcdm';
$route['katalog/dafcdm/(:any)']='MasterKatalog/getsbcdm/$1';
$route['katalog/dafsize/(:any)']='MasterKatalog/getsbsize/$1';
$route['katalog/sizedtl/(:any)/(:any)']='MasterKatalog/getdtlsize/$1/$2';
$route['katalog/dafmtr']='MasterKatalog/getsbmtr';
$route['katalog/updatesbcdm']='MasterKatalog/updatesbcdm';
$route['katalog/deletesbcdm/(:num)']='MasterKatalog/deletesbcdm/$1';
$route['katalog/list-katalog']='MasterKatalog/tablekatalog';
$route['katalog/aktivasi-katalog']='MasterKatalog/aktivasikatalog';
// master customer
$route['customer/buat-baru']='MasterCustomer/buatbaru';
$route['customer/newsb']='MasterCustomer/createsbmat';
$route['customer/daftar-customer']='MasterCustomer';
$route['customer/input-data']='MasterCustomer/createdata';
$route['customer/update-data']='MasterCustomer/updatedata';
$route['customer/delete-data/(:any)'] = 'MasterCustomer/deletedata/$1';
$route['customer/list-customer']='MasterCustomer/tablecst';
// Penjualan 
$route['penjualan/data-customer']='PenDataCustomer';
$route['penjualan/kasir']='PenKasir';
$route['penjualan/data-katalog']='PenKasir/loadkatalog';
$route['penjualan/pengiriman']='PenKirim';
$route['penjualan/riwayat']='PenRiwayat';
$route['penjualan/list-riwayat']='PenRiwayat/tableriwayat';
$route['penjualan/transaksi']='PenTrans';
// status order
$route['status-order']='StatusOrder';
$route['status-order/list']='StatusOrder/tablestatorder';
$route['status-order/detail']='StatusOrder/tabledetailorder';
// Pembelian 
$route['pembelian/pembelian-material']='PemMaterial';
$route['pembelian/input-data']='PemMaterial/createdata';
$route['pembelian/delete-data']='PemMaterial/deletedata';
$route['pembelian/approve-data']='PemMaterial/approvepmb';
$route['pembelian/terima-data']='PemMaterial/approvegd';
$route['pembelian/terima-data-lva']='PemMaterial/approvegdlva';
$route['pembelian/list-material']='PemMaterial/tablematerial';
$route['pembelian/list-pembelian']='PemMaterial/tablepmbmtr';
$route['pembelian/list-pembelian-detail']='PemMaterial/tablepmbdtl';
// Printing Material
$route['pembelian/print-material']='PriMaterial';
// Gudang
$route['gudang/lva']='Gudang/gudanglva';
$route['gudang/ldp']='Gudang/gudangldp';
// produksi
$route['produksi/produksi-baru']='ProdOrder';
$route['produksi/add-prod']='ProdOrder/createprod';
$route['produksi/get-data']='ProdOrder/loadpoid';
$route['produksi/list-produksi']='ProdOrder/menulistprod';
$route['produksi/finishing']='ProdOrder/menufinishing';
$route['produksi/stok']='ProdOrder/menustok';
$route['produksi/data-produksi']='ProdOrder/tableproduksi';
$route['produksi/dafsb']='ProdOrder/getsb';
$route['produksi/newsb']='ProdOrder/addsb';
// Tagihan
$route['tagihan/baru']='Tagihan';
$route['tagihan/list-tagihan']='Tagihan/menulist';
