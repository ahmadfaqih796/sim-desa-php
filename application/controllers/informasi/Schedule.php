<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule extends CI_Controller
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
         'title' => "Jadwal Wirid Akbar",
         'data' => $this->bm->get_all('schedule'),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('informasi/schedule/index');
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Jadwal Wirid Akbar",
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('informasi/schedule/add');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->add('schedule', $this->_payload());
         if ($result) {
            $this->notification->notify_success('informasi/schedule', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('informasi/schedule', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Jadwal Wirid Akbar",
         'data' => $this->bm->get_all('schedule'),
         'detail' => $this->bm->get_by_id('schedule', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('informasi/schedule/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('schedule', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('informasi/schedule', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('informasi/schedule', 'Gagal merubah data');
         }
      }
   }

   public function delete($id)
   {
      $result = $this->bm->delete('schedule', $id);
      if ($result) {
         $this->notification->notify_success('informasi/schedule', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('informasi/schedule', 'Gagal menghapus data');
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
