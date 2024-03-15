<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
   }
   public function index()
   {
      $this->_validation("admin");
      if ($this->form_validation->run() == false) {
         $data['title'] = 'Login';
         $this->load->view('templates/auth/header', $data);
         $this->load->view('auth/login');
         $this->load->view('templates/auth/footer');
      } else {
         $this->_login();
      }
   }

   private function _validation($role = null)
   {
      if ($role == "admin") {
         $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username harus diisi'
         ]);
      }
      $this->form_validation->set_rules('password', 'Password', 'trim|required', [
         'required' => 'Password harus diisi'
      ]);
   }

   private function _login()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $user = $this->db->get_where('users', ['username' => $username])->row_array();
      if ($user) {
         if (password_verify($password, $user['password'])) {
            $data = [
               'user_id' => $user['id'],
               'username' => $user['username']
            ];
            $this->session->set_userdata($data);
            $this->notification->notify_success('management/dashboard', 'Anda berhasil login');
         } else {
            $this->notification->notify_error('auth', 'Password yang anda masukkan salah');
         }
      } else {
         $this->notification->notify_error('auth', 'Username tidak terdaftar');
      }
   }

   public function logout()
   {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('role_id');
      $this->notification->notify_error('auth', 'Anda telah logout');
   }
}
