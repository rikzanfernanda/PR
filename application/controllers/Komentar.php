<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller
{
   public function addKomentar($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->komentar_model->create($id_lists);
      redirect('viewList/' . $id_lists);
   }

   public function delKomentar($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->komentar_model->delete($id_lists);
      redirect('viewList/' . $id_lists);
   }
}