<?php
    $datauri =$this->uri->segment(3);
    switch ($datauri) {
        case 'Soal':
            $this->load->view('guru/_data_topik_soal_soal');
            break;
        case 'Jawaban':
            $this->load->view('guru/_data_topik_soal_jawaban');
            break;
        default:
            $this->load->view('guru/_data_topik_soal');
            break;
    }
?>