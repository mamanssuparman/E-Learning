<?php
    $datauri =$this->uri->segment(3);
    switch ($datauri) {
        case 'List_materi':
            $this->load->view('guru/_data_mat_pel_materi');
            break;
        case 'Detail':
            $this->load->view('guru/_data_mat_pel_detail');
            break;
        default:
            $this->load->view('guru/_data_mat_pel');
            break;
    }
?>