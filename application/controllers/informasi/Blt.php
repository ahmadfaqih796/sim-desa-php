<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blt extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Penduduk_model', 'pm');
   }

   public function index()
   {
      $data = [
         'title' => "Penerimaan BLT",
         'data' => $this->bm->get_all('blt'),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('informasi/blt/index');
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Penerimaan BLT",
         'data' => $this->bm->get_all('dusun'),
         'penduduk' => $this->pm->get_blt(),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('informasi/blt/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('blt', $this->_payload());
         if ($result) {
            $this->notification->notify_success('informasi/blt', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('informasi/blt', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Penerimaan BLT",
         'data' => $this->bm->get_all('dusun'),
         'detail' => $this->bm->get_by_id('dusun', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('informasi/blt/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('dusun', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('informasi/blt', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('informasi/blt', 'Gagal merubah data');
         }
      }
   }

   public function delete($id)
   {
      $result = $this->bm->delete('blt', $id);
      if ($result) {
         $this->notification->notify_success('informasi/blt', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('informasi/blt', 'Gagal menghapus data');
      }
   }

   public function _payload()
   {
      // $penduduk_id = htmlspecialchars($this->input->post('penduduk_id'));
      $nik = htmlspecialchars($this->input->post('nik'));
      $n_blt = htmlspecialchars($this->input->post('n_blt'));
      $alamat = htmlspecialchars($this->input->post('alamat'));
      $batch = htmlspecialchars($this->input->post('batch'));
      $desa = htmlspecialchars($this->input->post('desa'));
      $kecamatan = htmlspecialchars($this->input->post('kecamatan'));
      $kabupaten = htmlspecialchars($this->input->post('kabupaten'));

      $payload = [
         'nik' => $nik,
         'n_blt' => $n_blt,
         'alamat' => $alamat,
         'batch' => $batch,
         'desa' => $desa,
         'kecamatan' => $kecamatan,
         'kabupaten' => $kabupaten,
      ];
      return $payload;
   }

   public function _validation()
   {
      $this->form_validation->set_rules('n_blt', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
   }
}
