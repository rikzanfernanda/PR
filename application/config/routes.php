<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['delKomentar/(:any)'] = 'Komentar/delKomentar/$1';
$route['addKomentar/(:any)'] = 'Komentar/addKomentar/$1';
$route['nilaiTugas/(:any)'] = 'Tugas/nilaiTugas/$1';
$route['deleteTugas/(:any)'] = 'Tugas/deleteTugas/$1';
$route['inputTugas/(:any)'] = 'Tugas/inputTugas/$1';
$route['addTask/(:any)'] = 'Task/addTask/$1';
$route['deleteAllTask/(:any)'] = 'Task/deleteAllTask/$1';
$route['updateTask/(:any)'] = 'Task/updateTask/$1';
$route['deleteTask/(:any)'] = 'Task/deleteTask/$1';
$route['viewList/(:any)'] = 'Task/view/$1';
$route['updateList/(:any)'] = 'Home/updateList/$1';
$route['deleteList/(:any)'] = 'Home/deleteList/$1';
$route['update/(:any)'] = 'User/update/$1';
$route['addList'] = 'Home/addList';
$route['logout'] = 'User/logout';
$route['login'] = 'User/login';
$route['register'] = 'User/register';
$route['default_controller'] = 'Home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
