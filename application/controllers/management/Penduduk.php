<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
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
      $nama = htmlspecialchars($this->input->post('nama', true));
      $nik = htmlspecialchars($this->input->post('nik', true));
      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $dusun_id = htmlspecialchars($this->input->post('dusun_id', true));
      $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir', true));
      $tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true));
      $agama = htmlspecialchars($this->input->post('agama', true));
      $s_nikah = htmlspecialchars($this->input->post('s_nikah', true));
      $pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
      $pendidikan = htmlspecialchars($this->input->post('pendidikan', true));
      $kk = htmlspecialchars($this->input->post('kk', true));
      $payload = [
         'nama' => $nama,
         'nik' => $nik,
         'password' => $password,
         'dusun_id' => $dusun_id,
         'tempat_lahir' => $tempat_lahir,
         'tgl_lahir' => $tgl_lahir,
         'agama' => $agama,
         's_nikah' => $s_nikah,
         'pekerjaan' => $pekerjaan,
         'pendidikan' => $pendidikan,
         'kk' => $kk,
      ];
      return $payload;
   }

   public function _validation()
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
   }
}
