<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route Admin
$route['admin/Profile/index/(:any)']              ='adminn/Profile/index/$2';
$route['admin/Profile/Update/(:any)']       ='adminn/Profile/Update/$2';
$route['Logout1']                           ='Login_guru/Log_out';

$route['admin']                             ='adminn/Dashboard';
$route['admin/Dashboard']                   ='adminn/Dashboard';

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
$route['admin/Topik_soal/Perbaharui/(:any)']='adminn/Topik_soal/Update/$2';
$route['admin/Topik_soal/Hapus/(:any)']     ='adminn/Topik_soal/Delete/$2';
$route['admin'] = 'adminn';

$route['admin/Soal/index/(:num)/(:any)']    ='adminn/Soal/index/$1/$2';
$route['admin/Soal/Simpan/(:any)']          ='adminn/Soal/Add/$2';
$route['admin/Soal/Perbaharui/(:num)/(:any)']='adminn/Soal/Update/$1/$2';
$route['admin/Soal/Hapus/(:any)']           ='adminn/Soal/Delete/$2';
$route['admin/Soal/Update_list/(:any)/(:num)']     ='adminn/Soal/Update_list/$2/$1';
$route['admin/Soal/Delete_list/(:any)/(:num)']      ='adminn/Soal/Delete_list/$2/$1';

$route['admin/jawaban/index/(:num)/(:any)']         ='adminn/jawaban/index/$1/$2';
$route['admin/jawaban/Simpan/(:any)']               ='adminn/jawaban/Add/$2';
$route['admin/jawaban/Perbaharui/(:num)/(:any)']    ='adminn/jawaban/Update/$1/$2';
$route['admin/jawaban/Hapus/(:any)/(:any)']                ='adminn/jawaban/Delete/$2/$2';

$route['admin/Lihat_soal/index/(:num)/(:any)']     ='adminn/Lihat_soal/index/$1/$2';

$route['admin/Quiz']                                ='adminn/Quiz';
$route['admin/Quiz/Simpan']                         ='adminn/Quiz/Add';
$route['admin/Daftar_quiz']                         ='adminn/Daftar_quiz';
$route['admin/Quiz/Perbaharui/(:num)/(:any)']       ='adminn/Quiz/Edit/$1/$2';
$route['admin/Quiz/Update/(:any)/(:num)']           ='adminn/Quiz/Update/$2/$1';

$route['admin/Import/Siswa']                        ='adminn/Import';
$route['admin/Import/Import_siswa']                 ='adminn/Import/Import_siswa/';
$route['admin/Import_guru/Guru']                    ='adminn/Import_guru';
$route['admin/Daftar_quiz/Hapus/(:any)']            ='adminn/Daftar_quiz/Delete/$2';
$route['admin/Import_guru/Import_data']             ='adminn/Import_guru/Import_data';


$route['guru']                                      ='guru/welcome';

$route['siswa'] = 'user/welcome';
$route['diskusi'] = 'user/diskusi';
$route['materi'] = 'user/materi';
$route['materi/view/(:any)'] = 'user/materi/view/$1';
$route['profil'] = 'user/profile';
$route['quiz'] = 'user/quiz';
$route['quiz/soal/(:any)/(:num)'] = 'user/quiz/soal/$1/$2';
