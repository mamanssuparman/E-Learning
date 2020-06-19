<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route Admin
$route['admin/Tahun_pelajaran']             ='adminn/Tahun_pelajaran';   
$route['admin/Tahun_pelajaran/Simpan']      ='adminn/Tahun_pelajaran/Add';
$route['admin/Tahun_pelajaran/Hapus']       ='adminn/Tahun_pelajaran/Delete';

$route['admin/Kelas']                       ='adminn/Kelas';
$route['admin/Kelas/Simpan']                ='adminn/Kelas/Add';
$route['admin/Kelas/Perbaharui']            ='adminn/Kelas/Update';
$route['admin/Kelas/Hapus']                 ='adminn/Kelas/Delete';

$route['admin/Siswa']                       ='adminn/Siswa';
$route['admin/Siswa/Simpan']                ='adminn/Siswa/Add';
$route['admin/Siswa/Perbaharui']            ='adminn/Siswa/Update';
$route['admin/Siswa/Hapus']                 ='adminn/Siswa/Delete';

$route['admin/Mat_pel']                     ='adminn/Mat_pel';
$route['admin/Mat_pel/Simpan']              ='adminn/Mat_pel/Add';
$route['admin/Mat_pel/Perbaharui']          ='adminn/Mat_pel/Update';
$route['admin/Mat_pel/Updater/(:num)']      ='adminn/Mat_pel/Edit/$1';
$route['admin/Mat_pel/Hapus']               ='adminn/Mat_pel/Delete';

$route['admin/Materi/Simpan/(:num)']        ='adminn/Materi/Save/$1';
$route['admin/Materi/Add/(:num)']           ='adminn/Materi/Add/$1';
$route['admin/Materi/List_Materi/(:num)']   ='adminn/Materi/list_materi_mapel/$1';
$route['admin/Materi/Hapus/(:num)/(:num)']  ='adminn/Materi/Delete/$1/$2';

$route['admin/Guru']                        ='adminn/Guru';
$route['admin/Guru/Simpan']                 ='adminn/Guru/Add';
$route['admin/Guru/Perbaharui']             ='adminn/Guru/Edit';

$route['admin/List_mapel_guru']             ='adminn/List_mapel_guru';
$route['admin/List_mapel_guru/Simpan']      ='adminn/List_mapel_guru/Add';

$route['admin/List_materi']                 ='adminn/List_materi';
$route['admin/List_materi/Detil/(:num)']    ='adminn/List_materi/Detail/$1';
$route['admin/List_materi/Perbaharui']      ='adminn/List_materi/Update';
$route['admin/List_materi/Hapus']           ='adminn/List_materi/Delete';

$route['admin/Topik_soal']                  ='adminn/Topik_soal';
$route['admin/Topik_soal/Simpan']           ='adminn/Topik_soal/Add';
$route['admin/Topik_soal/Perbaharui']       ='adminn/Topik_soal/Update';
$route['admin/Topik_soal/Hapus']            ='adminn/Topik_soal/Delete';