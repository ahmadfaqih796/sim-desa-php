<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
      $user_id = $this->session->userdata('user_id');
      $role = $this->session->userdata('role_id');
      $data = [
         'title' => "Profil",
         'data' => $this->pm->get_data_by_id($user_id),
      ];
      if ($role === 1) {
         $data['data'] = $this->bm->get_by_id("users", $user_id);
      }
      if ($role === 2) {
         $data['data'] = $this->pm->get_data_by_id($user_id);
      }
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      if ($role === 1) {
         $this->load->view('setting/profil/admin');
      }
      if ($role === 2) {
         $this->load->view('setting/profil/index');
      }
      $this->load->view('templates/footer');
   }

   public function edit($id)
   {
      $role = $this->session->userdata('role_id');
      if ($role === 1) {
         $result = $this->bm->update('users', $id, $this->_payload_image());
      }
      if ($role === 2) {
         $result = $this->bm->update('penduduk', $id, $this->_payload_image());
      }
      if ($result) {
         $this->notification->notify_success('setting/profil', 'Berhasil merubah data');
      } else {
         $this->notification->notify_error('setting/profil', 'Gagal merubah data');
      }
   }

   public function _payload_image()
   {
      $config['upload_path'] = './assets/images/profil/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 1024;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambar')) {
         $this->notification->notify_error('setting/profil', 'Ukuran gambar terlalu besar atau gambar tidak valid');
      } else {
         var_dump($this->upload->data());
         $data = $this->upload->data();
         $payload = [
            'photo' => $data['file_name']
         ];
         return $payload;
      }
   }

   public function _validation()
   {
      $this->form_validation->set_rules('n_dusun', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
   }
}
