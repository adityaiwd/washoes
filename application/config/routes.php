<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'dashboard_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

// Ada index
$route['login'] = 'login_controller';
$route['pemesanan'] = 'pemesanan_controller';
$route['admin'] = 'admin_controller';
$route['profile'] = 'user_controller';

// Login
$route['login'] = 'login_controller/do_login';
$route['die'] = 'dashboard_controller/do_logout';
$route['alogin'] = 'login_controller/do_alogin';
$route['adie'] = 'admin_controller/logout';

// Register
$route['register'] = 'login_controller/register';
$route['regis'] = 'login_controller/do_register';
$route['kelurahan/(:num)'] = 'login_controller/cek_kelurahan/$1';

// Checking
$route['list'] = 'pemesanan_controller/list';
$route['layanan'] = 'pemesanan_controller/loadLayanan';
$route['cekInvoice'] = 'pemesanan_controller/cekInvoice';
$route['do_pemesanan'] = 'pemesanan_controller/do_pemesanan';
$route['confirm/([0-9]+)'] = 'pemesanan_controller/confirmPemesanan/$1';
$route['pesanSekarang/([0-9]+)'] = 'pemesanan_controller/pesanSekarang/$1';

// User
$route['changepass'] = 'user_controller/changePassword';

// Admin
$route['administrator'] = 'login_controller/administrator';
$route['listpesanan/([0-9]{1,10})'] = 'admin_controller/getDataPesanan/$1';
$route['daerah'] = 'admin_controller/getDataDaerah';
$route['users'] = 'admin_controller/getDataUser';
$route['order'] = 'admin_controller/getDataOrder';
$route['editorder/([0-9]+)'] = 'admin_controller/editDataOrder/$1';
$route['delorder/([0-9]+)/([0-9]+)'] = 'admin_controller/deleteDataOrder/$1/$2';
$route['deluser/([0-9]+)'] = 'admin_controller/deleteDataUser/$1';
$route['doeditorder'] = 'admin_controller/do_editDataOrder';
