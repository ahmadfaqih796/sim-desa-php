<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dusun extends CI_Controller
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
         'title' => "Dusun",
         'user' => $this->um->check_user($this->session->userdata('username')),
         'data' => $this->bm->get_all('dusun'),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('management/dusun/index');
      $this->load->view('templates/footer');
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));

      $result = $this->km->update_kader($id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/dusun', 'Berhasil memperbarui kader');
      } else {
         $this->notification->notify_error('management/dusun', 'Gagal memperbarui kader');
      }
   }

   public function _payload()
   {
      $n_dusun = htmlspecialchars($this->input->post('n_dusun'));

      $payload = [
         'n_dusun' => $n_dusun,
      ];

      return $payload;
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Dusun",
         'user' => $this->um->check_user($this->session->userdata('username')),
         'data' => $this->bm->get_all('dusun'),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/dusun/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('dusun', $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/dusun', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('management/dusun', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id)
   {
      $this->_validation();
      $data = [
         'title' => "Dusun",
         'user' => $this->um->check_user($this->session->userdata('username')),
         'data' => $this->bm->get_all('dusun'),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/dusun/edit', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('dusun', $this->_payload());
         if ($result) {
            $this->notification->notify_success('management/dusun', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('management/dusun', 'Gagal menambahkan data');
         }
      }
   }

   public function _validation()
   {
      $this->form_validation->set_rules('n_dusun', 'Nama', 'required|trim');
   }
   // public function print()
   // {
   //    require_once FCPATH . 'vendor/autoload.php';
   //    $mpdf = new \Mpdf\Mpdf();

   //    $data['title'] = 'Data Kader';
   //    $data['no'] = 1;
   //    $data['users'] = $this->km->get_dusun();

   //    $html = $this->load->view('management/dusun/print', $data, true);

   //    $mpdf->WriteHTML($html);
   //    $mpdf->Output('data_kader.pdf', 'D');
   // }

   // private function _validation_kader()
   // {
   //    $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
   // }
}
