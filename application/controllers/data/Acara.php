<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acara extends CI_Controller
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
         'title' => "Acara",
         'role' => $role,
         'data' => $this->bm->get_all('acara'),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('data/acara/index');
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Acara",
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('data/acara/add');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->add('acara', $this->_payload());
         if ($result) {
            $this->notification->notify_success('data/acara', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('data/acara', 'Gagal menambahkan data');
         }
      }
   }

   public function tamu($id)
   {
      $this->_validation_tamu();
      $data = [
         'title' => "Tamu",
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('data/acara/add_tamu');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->add('tamu', $this->_payload_tamu($id));
         if ($result) {
            $this->notification->notify_success('data/acara', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('data/acara', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Acara",
         'data' => $this->bm->get_all('acara'),
         'detail' => $this->bm->get_by_id('acara', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('data/acara/edit');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('acara', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('data/acara', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('data/acara', 'Gagal merubah data');
         }
      }
   }

   public function update($id)
   {
      $result = $this->bm->update('acara', $id, ['status' => "acc"]);
      if ($result) {
         $this->notification->notify_success('data/acara', 'Berhasil ubah status');
      } else {
         $this->notification->notify_error('data/acara', 'Gagal ubah status');
      }
   }

   public function delete($id)
   {
      $result = $this->bm->delete('acara', $id);
      if ($result) {
         $this->notification->notify_success('data/acara', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('data/acara', 'Gagal menghapus data');
      }
   }

   public function _payload_tamu($acara_id = null)
   {
      $n_tamu = htmlspecialchars($this->input->post('n_tamu'));
      $payload = [
         'n_tamu' => $n_tamu,
         'acara_id' => $acara_id,
      ];
      return $payload;
   }

   public function _payload()
   {
      $n_acara = htmlspecialchars($this->input->post('n_acara'));
      $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
      $tanggal =  htmlspecialchars($this->input->post('tanggal'));
      $payload = [
         'n_acara' => $n_acara,
         'deskripsi' => $deskripsi,
         'tanggal' => $tanggal,
      ];
      return $payload;
   }

   public function _validation()
   {
      $this->form_validation->set_rules('n_acara', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
   }
   public function _validation_tamu()
   {
      $this->form_validation->set_rules('n_tamu', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
   }
}
