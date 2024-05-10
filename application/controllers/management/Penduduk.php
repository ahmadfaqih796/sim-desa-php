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
         'data' => $this->pm->get_all_penduduk(),
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
         'title' => "Penduduk",
         'data' => $this->bm->get_all('penduduk'),
         'dusun' => $this->bm->get_all('dusun'),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/penduduk/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('penduduk', $this->_payload("post"));
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
         'title' => "Penduduk",
         'data' => $this->bm->get_all('penduduk'),
         'dusun' => $this->bm->get_all('dusun'),
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

   public function _payload($type = null)
   {
      $fullname = htmlspecialchars($this->input->post('fullname'));
      $nik = htmlspecialchars($this->input->post('nik'));
      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $dusun_id = htmlspecialchars($this->input->post('dusun_id'));
      $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir'));
      $tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir'));
      $agama = htmlspecialchars($this->input->post('agama'));
      $s_nikah = htmlspecialchars($this->input->post('s_nikah'));
      $s_hubungan = htmlspecialchars($this->input->post('s_hubungan'));
      $pekerjaan = htmlspecialchars($this->input->post('pekerjaan'));
      $pendidikan = htmlspecialchars($this->input->post('pendidikan'));
      $kk = htmlspecialchars($this->input->post('kk'));
      $payload = [
         'fullname' => $fullname,
         'nik' => $nik,
         'dusun_id' => $dusun_id,
         'tempat_lahir' => $tempat_lahir,
         'tgl_lahir' => $tgl_lahir,
         'agama' => $agama,
         's_nikah' => $s_nikah,
         's_hubungan' => $s_hubungan,
         'pekerjaan' => $pekerjaan,
         'pendidikan' => $pendidikan,
         'kk' => $kk,
      ];
      if ($type == 'post') {
         $payload['password'] = $password;
      }
      return $payload;
   }

   public function _validation()
   {
      $this->form_validation->set_rules('fullname', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
      $this->form_validation->set_rules('nik', 'NIK', 'required|trim', [
         'required' => 'NIK harus diisi',
      ]);
      $this->form_validation->set_rules('dusun_id', 'Dusun', 'required|trim', [
         'required' => 'Dusun harus diisi',
      ]);
   }
}
