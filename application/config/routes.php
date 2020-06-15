<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['success_payment'] = 'Admission_controller/SuccessPaymentRegistration';
$route['success_payment_hook'] = 'Admission_controller/SuccessPaymentRegistration_hook';
$route['login'] = 'Login/login_form';
$route['reset_password'] = 'Login/user_verification_get';
$route['admin'] = 'Navigation/dashboard';
$route['admin/(:any)'] = 'Navigation/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
