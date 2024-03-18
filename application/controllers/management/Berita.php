<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
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
         'title' => "Berita",
         'data' => $this->bm->get_all('berita'),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('management/berita/index');
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Berita",
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/berita/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('berita', $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/berita', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('management/berita', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Berita",
         'data' => $this->bm->get_all('berita'),
         'detail' => $this->bm->get_by_id('berita', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('management/berita/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('berita', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/berita', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('management/berita', 'Gagal merubah data');
         }
      }
   }

   public function delete($id)
   {
      $result = $this->bm->delete('berita', $id);
      if ($result) {
         $this->notification->notify_success('management/berita', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('management/berita', 'Gagal menghapus data');
      }
   }

   public function _payload()
   {
      $judul = htmlspecialchars($this->input->post('judul'));
      $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));

      $config['upload_path'] = './assets/images/berita/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 1024;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambar')) {
         return $this->notification->notify_error('management/berita', 'Ukuran gambar terlalu besar atau gambar tidak valid');
      } else {
         $data = $this->upload->data();
         $payload = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'gambar' => $data['file_name']
         ];
         return $payload;
      }
   }

   public function _validation()
   {
      $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
         'required' => 'Judul harus diisi',
      ]);
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
         'required' => 'Deskripsi harus diisi',
      ]);
   }
}
