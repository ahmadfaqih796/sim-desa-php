<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
   }

   public function get_users()
   {
      $this->db->select('users.*, roles.role');
      $this->db->from('users');
      $this->db->join('roles', 'users.role_id = roles.id', 'left');
      $query = $this->db->get();
      return $query->result_array();
   }

   public function get_user_by_id($user_id)
   {
      return $this->db->get_where('users', array('id' => $user_id))->row_array();
   }

   public function check_user($username)
   {
      return  $this->db->get_where('users', ['username' => $username])->row_array();
   }

   public function insert_user($data)
   {
      $user = $this->db->get_where('users', ['email' => $data['email']])->row_array();
      if ($user) {
         return $this->notification->notify_error('management/users', 'Email sudah terdaftar!');
      }
      $this->db->insert('users', $data);
      return $this->db->insert_id();
   }
}
