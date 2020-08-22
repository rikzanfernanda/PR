<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{
   public function view($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $data['komentar'] = $this->komentar_model->read($id_lists);
      $data['tugas'] = $this->tugas_model->read();
      $data['lists'] = $this->list_model->read($id_lists);
      $data['id_lists'] = $id_lists;
      $data['tasks'] = $this->task_model->read($id_lists);
      $this->load->view('templates/header', $data);
      $this->load->view('task');
      $this->load->view('templates/footer');
   }

   public function addTask($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->task_model->create($id_lists);
      redirect('viewList/' . $id_lists);
   }

   public function deleteTask($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $id_tasks = $this->input->post('id_lists');
      $this->task_model->delete($id_tasks);
      redirect('viewList/' . $id_lists);
   }

   public function updateTask($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->task_model->update($id_lists);
      redirect('viewList/' . $id_lists);
   }

   public function deleteAllTask($id_lists)
   {
      if (!isset($this->session->userdata['status'])){
         redirect();
      }
      $this->task_model->deleteAll($id_lists);
      redirect('viewList/' . $id_lists);
   }

}
