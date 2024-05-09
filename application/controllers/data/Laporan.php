<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
   }

   public function index()
   {
      $data = [
         'title' => "Laporan",
         'total' => array(
            'penduduk' => $this->bm->get_count('penduduk'),
            'dusun' => $this->bm->get_count('dusun'),
            'pengajuan' => array(
               'proses' => $this->bm->get_count('pengajuan', 'Pengajuan'),
               'pengembalian' => $this->bm->get_count('pengajuan', 'Pengembalian'),
               'selesai' => $this->bm->get_count('pengajuan', 'Selesai'),
            ),
         )
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('data/laporan/index');
      $this->load->view('templates/footer');
   }
}
