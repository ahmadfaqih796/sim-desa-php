<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desa extends CI_Controller
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
         'title' => "Desa",
         'data' =>  $this->bm->get_by_id("desa", 1),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('setting/desa/index');
      $this->load->view('templates/footer');
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Desa",
         'detail' =>  $this->bm->get_by_id("desa", 1)
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('setting/desa/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('desa', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('setting/desa', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('setting/desa', 'Gagal merubah data');
         }
      }
   }

   public function edit_image($id)
   {
      $result = $this->bm->update('desa', $id, $this->_payload_image());
      if ($result) {
         $this->notification->notify_success('setting/desa', 'Berhasil merubah data');
      } else {
         $this->notification->notify_error('setting/desa', 'Gagal merubah data');
      }
   }

   public function _payload()
   {
      $n_desa = htmlspecialchars($this->input->post('n_desa'));
      $n_kepala_desa = htmlspecialchars($this->input->post('n_kepala_desa'));
      $alamat = htmlspecialchars($this->input->post('alamat'));
      $payload = [
         'n_desa' => $n_desa,
         'n_kepala_desa' => $n_kepala_desa,
         'alamat' => $alamat
      ];
      return $payload;
   }

   public function _payload_image()
   {
      $config['upload_path'] = './assets/images/logos/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 1024;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambar')) {
         $this->notification->notify_error('setting/desa', 'Ukuran gambar terlalu besar atau gambar tidak valid');
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
      $this->form_validation->set_rules('n_desa', 'Nama Desa', 'required|trim', [
         'required' => 'Nama Desa harus diisi',
      ]);
   }
}
