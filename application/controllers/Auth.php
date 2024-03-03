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
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == false) {
         $data['title'] = 'Login';
         $this->load->view('templates/auth/header', $data);
         $this->load->view('auth/login');
         $this->load->view('templates/auth/footer');
      } else {
         $this->_login();
      }
   }

   private function _login()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $user = $this->db->get_where('users', ['username' => $username])->row_array();
      // cek usernya ada
      if ($user) {
         // jika user aktif
         if ($user['is_active'] == 1) {
            // cek password
            if (password_verify($password, $user['password'])) {
               $data = [
                  'user_id' => $user['id'],
                  'username' => $user['username'],
                  'role_id' => $user['role_id']
               ];
               $this->session->set_userdata($data);
               if ($user['role_id'] == 1) {
                  redirect('dashboard');
               } elseif ($user['role_id'] == 2) {
                  redirect('dashboard');
               } elseif ($user['role_id'] == 3) {
                  redirect('user/home');
               } elseif ($user['role_id'] == 6) {
                  redirect('dashboard');
               } else {
                  $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> You are not allowed to access </div>');
                  redirect('auth');
               }
            } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
               redirect('auth');
            }
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This username has not been activated! </div>');
            redirect('auth');
         }
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username is not registered! </div>');
         redirect('auth');
      }
   }

   public function logout()
   {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> You have been logged out! </div>');
      redirect('auth');
   }
}
