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
      $this->db->select('t.*, t.id as id_table, p.*, d.n_dusun');
      $this->db->from($table . ' t');
      $this->db->join('penduduk p', 't.penduduk_id = p.id', 'left');
      $this->db->join('dusun d', 'p.dusun_id = d.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_all_data_by_penduduk($table, $id)
   {
      $this->db->select('t.*, t.id as id_table ,p.*');
      $this->db->from($table . ' t');
      $this->db->join('penduduk p', 't.penduduk_id = p.id', 'left');
      $this->db->where('p.id', $id);
      return $this->db->get()->result_array();
   }

   public function get_data_by_id($id)
   {
      $this->db->select('p.*, d.n_dusun');
      $this->db->from('penduduk p');
      $this->db->join('dusun d', 'p.dusun_id = d.id', 'left');
      $this->db->where('p.id', $id);
      return $this->db->get()->row_array();
   }

   public function get_pengajuan_by_id($id)
   {
      $this->db->select('p.*, k.*, p.id as id_table, d.n_dusun');
      $this->db->from('pengajuan p');
      $this->db->join('penduduk k', 'p.penduduk_id = k.id', 'left');
      $this->db->join('dusun d', 'k.dusun_id = d.id', 'left');
      $this->db->where('p.id', $id);
      return $this->db->get()->row_array();
   }

   public function get_blt()
   {
      $this->db->select('p.*, b.id as id_table, d.n_dusun');
      $this->db->from('penduduk p');
      $this->db->join('blt b', 'b.penduduk_id = p.id', 'left');
      $this->db->join('dusun d', 'p.dusun_id = d.id', 'left');
      $this->db->where('b.penduduk_id IS NULL');
      return $this->db->get()->result_array();
   }
}
