<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
   public function index()
   {
      $data['lists'] = [];
      if (isset($this->session->userdata['status'])){
         if ($this->session->userdata['status'] == 'guru'){
            $id_guru = $this->session->userdata['id_guru'];
            $data['user'] = $this->user_model->user('guru', $id_guru);
         } elseif ($this->session->userdata['status'] == 'murid'){
            $id_murid = $this->session->userdata['id_murid'];
            $data['user'] = $this->user_model->user('murid', $id_murid);
         }
         $data['guru'] = $this->user_model->user('guru', $this->session->userdata['id_guru']);
         $data['lists'] = $this->list_model->read(false, $this->session->userdata['id_guru']);
         $data['murid'] = $this->user_model->read('murid', $this->session->userdata['id_guru']);
      }
      $this->load->view('templates/header', $data);
      $this->load->view('index');
      $this->load->view('templates/footer');
   }

   public function addList()
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->list_model->create();
      redirect();
   }

   public function deleteList($id)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->list_model->delete($id);
      redirect();
   }

   public function updateList($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->list_model->update($id_lists);
      redirect();
   }

}