<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
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
      $role = $this->session->userdata('role_id');
      $data = [
         'title' => "Pengaduan",
         'role' => $role,
      ];
      if ($role == 1) {
         $data['data'] = $this->pm->get_all_data('pengaduan');
      } elseif ($role == 2) {
         $data['data'] = $this->pm->get_all_data_by_penduduk('pengaduan', $this->session->userdata('user_id'));
      }
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

   public function update($id)
   {
      $result = $this->bm->update('pengaduan', $id, ['status' => "acc"]);
      if ($result) {
         $this->notification->notify_success('data/pengaduan', 'Berhasil ubah status');
      } else {
         $this->notification->notify_error('data/pengaduan', 'Gagal ubah status');
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
      $judul = htmlspecialchars($this->input->post('judul'));
      $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
      $status = htmlspecialchars($this->input->post('status'));
      $created_by = $this->session->userdata('fullname');
      $penduduk_id = $this->session->userdata('user_id');
      $payload = [
         'judul' => $judul,
         'deskripsi' => $deskripsi,
         // 'status' => $status,
         'created_by' => $created_by,
         'penduduk_id' => $penduduk_id
      ];
      return $payload;
   }

   public function _validation()
   {
      $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
         'required' => 'Judul harus diisi',
      ]);
   }
}
