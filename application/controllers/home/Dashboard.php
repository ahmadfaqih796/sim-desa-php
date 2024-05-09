<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
   }

   public function index()
   {
      $role = $this->session->userdata('role_id');
      $data = [
         'title' => "dashboard",
         'berita' => $this->bm->get_all("berita"),
         'schedule' => $this->bm->get_all("schedule")
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      if ($role == 2) {
         $this->load->view('home/user');
      } else {
         $this->load->view('home/dashboard');
      }
      $this->load->view('templates/footer');
   }

   public function berita($id)
   {
      $role = $this->session->userdata('role_id');
      $data = [
         'title' => "dashboard",
         'berita' => $this->bm->get_all("berita"),
         'schedule' => $this->bm->get_all("schedule")
      ];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('home/user');
      $this->load->view('templates/footer');
   }
}
