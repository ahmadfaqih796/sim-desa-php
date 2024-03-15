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
      // $this->_validation();
      // $data['title'] = 'Dusun';
      // $data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
      // $data['users'] = $this->km->get_dusun();
      // $data['posyandu'] = $this->pm->get_posyandu();
      $data = [
         'title' => "Dusun",
         'user' => $this->um->check_user($this->session->userdata('username')),
         'data' => $this->bm->get_dusun(),
      ];
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/dusun/index', $data);
         // $this->load->view('management/dusun/edit');
         $this->load->view('templates/footer', $data);
      } else {
         // $update = $this->input->post('updateData');
         // if ($update) {
         //    return $this->update();
         // } else {
         //    $this->notification->notify_error('management/dusun', 'Method initidak ditemukan');
         // }
      }
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
      $posyandu_id = htmlspecialchars($this->input->post('posyandu_id'));
      $nik = htmlspecialchars($this->input->post('nik'));
      $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir'));
      $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir'));
      $jabatan = htmlspecialchars($this->input->post('jabatan'));
      $alamat = htmlspecialchars($this->input->post('alamat'));
      $pendidikan_terakhir = htmlspecialchars($this->input->post('pendidikan_terakhir'));
      $telepon = htmlspecialchars($this->input->post('telepon'));

      $payload = [
         'nik' => $nik,
         'posyandu_id' => $posyandu_id,
         'tempat_lahir' => $tempat_lahir,
         'tanggal_lahir' => $tanggal_lahir,
         'jabatan' => $jabatan,
         'alamat' => $alamat,
         'pendidikan_terakhir' => $pendidikan_terakhir,
         'telepon' => $telepon
      ];

      return $payload;
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
