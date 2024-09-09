<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default controller yang akan diarahkan ke QuizController
$route['default_controller'] = 'QuizController/index';

// Mengatur URL `kuis` untuk mengarah ke index di QuizController
$route['kuis'] = 'QuizController/index';

// Mengatur URL untuk memulai kuis tertentu, misal `kuis/start/1`
$route['kuis/start/(:num)'] = 'QuizController/start_quiz/$1';

// Mengatur URL untuk submit jawaban kuis
$route['kuis/submit'] = 'QuizController/submit_answers';

// Mengatur URL untuk menampilkan hasil kuis
$route['kuis/result/(:num)'] = 'QuizController/show_result/$1';

// Mengatur URL untuk menambahkan kuis
$route['kuis/add'] = 'QuizController/add_quiz';
$route['kuis/store'] = 'QuizController/store_quiz';


// Route 404 jika URL tidak ditemukan
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
