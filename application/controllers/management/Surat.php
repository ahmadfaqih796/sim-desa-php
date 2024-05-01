<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
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
         'title' => "Surat",
         'data' => $this->bm->get_all('surat'),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('management/surat/index');
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Surat",
         'data' => $this->bm->get_all('surat'),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/surat/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('surat', $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/surat', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('management/surat', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Surat",
         'data' => $this->bm->get_all('surat'),
         'detail' => $this->bm->get_by_id('surat', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('management/surat/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('surat', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/surat', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('management/surat', 'Gagal merubah data');
         }
      }
   }

   public function delete($id)
   {
      $result = $this->bm->delete('surat', $id);
      if ($result) {
         $this->notification->notify_success('management/surat', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('management/surat', 'Gagal menghapus data');
      }
   }

   public function _payload()
   {
      $n_surat = htmlspecialchars($this->input->post('n_surat'));
      $payload = [
         'n_surat' => $n_surat,
      ];
      return $payload;
   }

   public function _validation()
   {
      $this->form_validation->set_rules('n_surat', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
   }
}
