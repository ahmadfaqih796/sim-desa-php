<?php

class Notification
{
   protected $CI;

   public function __construct()
   {
      $this->CI = &get_instance();
      $this->CI->load->library('session');
   }

   public function notify_success($url, $message)
   {
      $this->CI->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $message . '</div>');
      redirect($url);
   }

   public function notify_error($url, $message)
   {
      $this->CI->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $message . '</div>');
      redirect($url);
   }
}
