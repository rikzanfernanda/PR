<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
   public function inputTugas($id_tasks)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $id_lists = $this->input->post('id_lists');
      $config['upload_path'] = './assets/images';
      $config['allowed_types'] = 'jpg|png|pdf|docx|doc|txt';
      $config['file_name'] = date('s') . '_' . $_FILES['file']['name'];
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('file')) {
         redirect('viewList/' . $id_lists);
      } else {
         $this->tugas_model->create($id_tasks, $config['file_name']);
         redirect('viewList/' . $id_lists);
      }
   }

   public function deleteTugas($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->tugas_model->delete();
      redirect('viewList/' . $id_lists);
   }

   public function nilaiTugas($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->tugas_model->nilai();
      redirect('viewList/' . $id_lists);
   }
}
