<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
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
         'title' => "Penduduk",
         'data' => $this->bm->get_all('penduduk'),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('management/penduduk/index');
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Dusun",
         'data' => $this->bm->get_all('penduduk'),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/penduduk/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('penduduk', $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/penduduk', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('management/penduduk', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Dusun",
         'data' => $this->bm->get_all('penduduk'),
         'detail' => $this->bm->get_by_id('penduduk', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('management/penduduk/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('penduduk', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/penduduk', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('management/penduduk', 'Gagal merubah data');
         }
      }
   }

   public function delete($id)
   {
      $result = $this->bm->delete('penduduk', $id);
      if ($result) {
         $this->notification->notify_success('management/penduduk', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('management/penduduk', 'Gagal menghapus data');
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
