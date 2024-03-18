<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
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
         'title' => "Pengajuan",
         'data' => $this->pm->get_all_data('pengajuan'),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('data/pengajuan/index');
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Pengajuan",
         'data' => $this->bm->get_all('pengajuan'),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/pengajuan/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('pengajuan', $this->_payload());
         if ($result) {
            $this->notification->notify_success('data/pengajuan', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('data/pengajuan', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Pengajuan",
         'data' => $this->bm->get_all('pengajuan'),
         'detail' => $this->bm->get_by_id('pengajuan', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('data/pengajuan/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('pengajuan', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('data/pengajuan', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('data/pengajuan', 'Gagal merubah data');
         }
      }
   }

   public function delete($id)
   {
      $result = $this->bm->delete('pengajuan', $id);
      if ($result) {
         $this->notification->notify_success('data/pengajuan', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('data/pengajuan', 'Gagal menghapus data');
      }
   }

   public function _payload()
   {
      $penduduk_id = htmlspecialchars($this->input->post('penduduk_id', true));
      $tgl_pengajuan = htmlspecialchars($this->input->post('tgl_pengajuan', true));
      $layanan = htmlspecialchars($this->input->post('layanan', true));

      $currentDateTime = new DateTime();
      $currentDateTimeString = $currentDateTime->format('YmdHis');
      $uniqueDigits = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);
      $no_pengajuan = $currentDateTimeString . $uniqueDigits;
      $payload = [
         'no_pengajuan' => $no_pengajuan,
         'penduduk_id' => $penduduk_id,
         'tgl_pengajuan' => $tgl_pengajuan,
         'layanan' => $layanan
      ];
      return $payload;
   }

   public function _validation()
   {
      $this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required|trim', [
         'required' => 'Tanggal Pengajuan harus diisi',
      ]);
   }
}
