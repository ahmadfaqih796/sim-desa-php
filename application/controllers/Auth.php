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
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == false) {
         $data['title'] = 'Login';
         // $this->load->view('templates/auth_header', $data);
         // $this->load->view('auth/login');
         // $this->load->view('templates/auth_footer');
      } else {
         $this->_login();
      }
   }

   private function _login()
   {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->db->get_where('users', ['email' => $email])->row_array();
      // cek usernya ada
      if ($user) {
         // jika user aktif
         if ($user['is_active'] == 1) {
            // cek password
            if (password_verify($password, $user['password'])) {
               $data = [
                  'user_id' => $user['id'],
                  'email' => $user['email'],
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
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This email has not been activated! </div>');
            redirect('auth');
         }
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not registered! </div>');
         redirect('auth');
      }
   }

   public function logout()
   {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> You have been logged out! </div>');
      redirect('auth');
   }
}
