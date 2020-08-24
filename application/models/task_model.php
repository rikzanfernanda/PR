<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_model extends CI_Model
{
   public function read($id)
   {
      return $this->db->get_where('tasks', ['id_lists' => $id])->result_array();
   }

   public function create($id_lists)
   {
      $data = [
         'task_name' => $this->input->post('title'),
         'task_body' => $this->input->post('body'),
         'id_lists' => $id_lists,
         'due_date' => $this->input->post('due'). ' '. $this->input->post('time'),
      ];
      return $this->db->insert('tasks', $data);
   }

   public function delete($id)
   {
      return $this->db->delete('tasks', ['id_tasks' => $id]);
   }

   public function deleteAll($id)
   {
      return $this->db->delete('tasks', ['id_lists' => $id]);
   }

   public function update($id_lists)
   {
      $data = [
         'id_tasks' => $this->input->post('id_tasks'),
         'task_name' => $this->input->post('title'),
         'task_body' => $this->input->post('body'),
         'id_lists' => $id_lists,
         'due_date' => $this->input->post('due'). ' '. $this->input->post('time'),
      ];
      $this->db->where('id_tasks', $this->input->post('id_tasks'));
      return $this->db->update('tasks', $data);
   }
}