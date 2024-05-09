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
         'data' => $this->pm->get_all_data('blt'),
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
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/dusun/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('dusun', $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/dusun', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('management/dusun', 'Gagal menambahkan data');
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
         $this->load->view('management/dusun/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('dusun', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/dusun', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('management/dusun', 'Gagal merubah data');
         }
      }
   }

   public function delete($id)
   {
      $result = $this->bm->delete('dusun', $id);
      if ($result) {
         $this->notification->notify_success('management/dusun', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('management/dusun', 'Gagal menghapus data');
      }
   }

   public function _payload()
   {
      $n_dusun = htmlspecialchars($this->input->post('n_dusun'));
      $payload = [
         'n_dusun' => $n_dusun,
      ];
      return $payload;
   }

   public function _validation()
   {
      $this->form_validation->set_rules('n_dusun', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
   }
}
