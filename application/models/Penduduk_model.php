<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function get_all_penduduk()
   {
      $this->db->select('p.*, d.n_dusun');
      $this->db->from('penduduk p');
      $this->db->join('dusun d', 'p.dusun_id = d.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_all_data($table)
   {
      $this->db->select('t.*, p.*');
      $this->db->from($table . ' t');
      $this->db->join('penduduk p', 't.penduduk_id = p.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_by_id($table, $id)
   {
      return $this->db->get_where($table, ['id' => $id])->row_array();
   }
}
