<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
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
         'title' => "Pengaduan",
         'data' => $this->bm->get_all('pengaduan'),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('data/pengaduan/index');
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Pengaduan",
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('data/pengaduan/add');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->add('pengaduan', $this->_payload());
         if ($result) {
            $this->notification->notify_success('data/pengaduan', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('data/pengaduan', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Pengaduan",
         'data' => $this->bm->get_all('pengaduan'),
         'detail' => $this->bm->get_by_id('pengaduan', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('data/pengaduan/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('pengaduan', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('data/pengaduan', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('data/pengaduan', 'Gagal merubah data');
         }
      }
   }

   public function delete($id)
   {
      $result = $this->bm->delete('pengaduan', $id);
      if ($result) {
         $this->notification->notify_success('data/pengaduan', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('data/pengaduan', 'Gagal menghapus data');
      }
   }

   public function _payload()
   {
      $n_jadwal = htmlspecialchars($this->input->post('n_jadwal'));
      $lokasi = htmlspecialchars($this->input->post('lokasi'));
      $tanggal = htmlspecialchars($this->input->post('tanggal'));
      $pukul = htmlspecialchars($this->input->post('pukul'));
      $payload = [
         'n_jadwal' => $n_jadwal,
         'lokasi' => $lokasi,
         'tanggal' => $tanggal,
         'pukul' => $pukul,
      ];
      return $payload;
   }

   public function _validation()
   {
      $this->form_validation->set_rules('n_jadwal', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
   }
}
