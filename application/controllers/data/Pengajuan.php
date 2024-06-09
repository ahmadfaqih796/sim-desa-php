<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
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
      $role = $this->session->userdata('role_id');
      $data = [
         'title' => "Pengajuan",
         'role' => $role,
      ];
      if ($role == 1) {
         $data['data'] = $this->pm->get_all_data('pengajuan');
      } elseif ($role == 2) {
         $data['data'] = $this->pm->get_all_data_by_penduduk('pengajuan', $this->session->userdata('user_id'));
      }
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('data/pengajuan/index');
      $this->load->view('templates/footer');
   }

   public function print($id, $sk = null)
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();
      $data = [
         'title' => 'Surat Pengantar',
         'no' => 1,
         'detail' => $this->pm->get_pengajuan_by_id($id),
         'desa' =>  $this->bm->get_by_id("desa", 1)
      ];
      function convertText($text)
      {
         // Ubah semua huruf menjadi huruf kecil
         $text = strtolower($text);
         // Hapus tanda kurung dan isinya
         $text = preg_replace('/\s*\([^)]*\)/', '', $text);
         // Ganti spasi dan tanda baca dengan underscore
         $text = preg_replace('/[\s\W]+/', '_', $text);
         // Trim underscore di awal dan akhir
         $text = trim($text, '_');
         return $text;
      }
      $surat = convertText($sk);
      if ($surat == 'surat_keterangan_tidak_mampu') {
         $html = $this->load->view('data/cetak/sk_tidak_mampu', $data, true);
         $mpdf->WriteHTML($html);
         $mpdf->Output('surat_pengantar_tidak_mampu.pdf', 'D');
      } else {
         $html = $this->load->view('data/pengajuan/print', $data, true);
         $mpdf->WriteHTML($html);
         $mpdf->Output('surat_pengantar.pdf', 'D');
      }
   }

   public function add()
   {
      $this->_validation();
      $data = [
         'title' => "Pengajuan",
         'data' => $this->bm->get_all('pengajuan'),
         'layanan' => $this->bm->get_all('surat'),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/pengajuan/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('pengajuan', $this->_payload());
         if ($result) {
            $this->notification->notify_success('data/pengajuan', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('data/pengajuan', 'Gagal menambahkan data');
         }
      }
   }

   public function edit_pengambilan($id, $id_penduduk)
   {
      $this->_validation("pengambilan");
      $data = [
         'title' => "Proses Pengajuan",
         'data' => $this->bm->get_all('pengajuan'),
         'user' => $this->pm->get_data_by_id($id_penduduk),
         'detail' => $this->bm->get_by_id('pengajuan', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('data/pengajuan/edit_pengambilan');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('pengajuan', $id, $this->_payload("pengambilan"));
         if ($result) {
            $this->notification->notify_success('data/pengajuan', 'Berhasil merubah data');
         } else {
            $this->notification->notify_error('data/pengajuan', 'Gagal merubah data');
         }
      }
   }

   public function edit_selesai($id)
   {
      $this->_validation("selesai");
      $data = [
         'title' => "Status Selesai",
         'data' => $this->bm->get_all('pengajuan'),
         'detail' => $this->bm->get_by_id('pengajuan', $id),
      ];
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('data/pengajuan/edit_selesai');
         $this->load->view('templates/footer');
      } else {
         $result = $this->bm->update('pengajuan', $id, $this->_payload("selesai"));
         if ($result) {
            $this->notification->notify_success('data/pengajuan', 'Berhasil merubah status selesai');
         } else {
            $this->notification->notify_error('data/pengajuan', 'Gagal merubah status selesai');
         }
      }
   }

   public function update_status($id)
   {
      $result = $this->bm->update('pengajuan', $id, $this->_payload("selesai"));
      if ($result) {
         $this->notification->notify_success('data/pengajuan', 'Berhasil merubah status selesai');
      } else {
         $this->notification->notify_error('data/pengajuan', 'Gagal merubah status selesai');
      }
   }
   public function delete($id)
   {
      // var_dump($id);
      $result = $this->bm->delete('pengajuan', $id);
      if ($result) {
         $this->notification->notify_success('data/pengajuan', 'Berhasil menghapus data');
      } else {
         $this->notification->notify_error('data/pengajuan', 'Gagal menghapus data');
      }
   }

   public function _payload($type = null)
   {
      $penduduk_id = htmlspecialchars($this->input->post('penduduk_id'));
      $tgl_pengajuan = htmlspecialchars($this->input->post('tgl_pengajuan'));
      $tgl_pengambilan = htmlspecialchars($this->input->post('tgl_pengambilan'));
      $tgl_selesai = htmlspecialchars($this->input->post('tgl_selesai'));
      $layanan = htmlspecialchars($this->input->post('layanan'));

      $currentDateTime = new DateTime();

      if ($type == 'pengambilan') {
         $payload = [
            'tgl_pengambilan' => $tgl_pengambilan,
            's_pengajuan' => 'Pengambilan',
         ];
         return $payload;
      }

      if ($type == 'selesai') {
         $config['upload_path'] = './assets/images/bukti/';
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['max_size'] = 1024;

         $this->load->library('upload', $config);

         if (!$this->upload->do_upload('bukti')) {
            $payload = [
               'tgl_selesai' => date("Y-m-d"),
               's_pengajuan' => 'Selesai',
            ];
            return $payload;
         } else {
            $data = $this->upload->data();
            $payload = [
               'tgl_selesai' => date("Y-m-d"),
               's_pengajuan' => 'Selesai',
               'bukti' => $data['file_name']
            ];
            return $payload;
         }
      }

      $currentDateTimeString = $currentDateTime->format('YmdHis');
      $uniqueDigits = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);
      $no_pengajuan = $currentDateTimeString . $uniqueDigits;
      $payload = [
         'no_pengajuan' => $no_pengajuan,
         'penduduk_id' => $penduduk_id,
         'tgl_pengajuan' => $tgl_pengajuan,
         's_pengajuan' => 'Pengajuan',
         'layanan' => $layanan
      ];
      return $payload;
   }

   public function _validation($type = null)
   {
      if ($type === null) {
         $this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required|trim', [
            'required' => 'Tanggal Pengajuan harus diisi',
         ]);
      }
      if ($type === 'pengambilan') {
         $this->form_validation->set_rules('tgl_pengambilan', 'Tgl Pengambilan', 'required|trim', [
            'required' => 'Tgl Pengambilan harus diisi',
         ]);
      }
      if ($type === 'selesai') {
         $this->form_validation->set_rules('tgl_selesai', 'Tgl Selesai', 'required|trim', [
            'required' => 'Tgl Selesai harus diisi',
         ]);
      }
   }
}
