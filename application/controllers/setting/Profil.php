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
      $data = [
         'title' => "Profil",
         'data' => $this->pm->get_data_by_id($user_id),
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('setting/profil/index');
      $this->load->view('templates/footer');
   }

   public function _validation()
   {
      $this->form_validation->set_rules('n_dusun', 'Nama', 'required|trim', [
         'required' => 'Nama harus diisi',
      ]);
   }
}
