<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_model extends CI_Model
{
   public function read($id_lists = false, $id_guru = false)
   {
      if ($id_lists) {
         $this->db->where('id_lists', $id_lists);
         return $this->db->get('lists')->row_array();
      }
      if ($id_guru) {
         $this->db->where('id_guru', $id_guru);
         return $this->db->get('lists')->result_array();
      } else {
         return $this->db->get('lists')->result_array();
      }
   }

   public function create()
   {
      $data = [
         'list_name' => $this->input->post('title'),
         'list_body' => $this->input->post('body'),
         'id_guru' => $this->session->userdata['id_guru']
      ];
      return $this->db->insert('lists', $data);
   }

   public function update($id_lists)
   {
      $data = [
         'list_name' => $this->input->post('title'),
         'list_body' => $this->input->post('body'),
      ];
      $this->db->where('id_lists', $id_lists);
      return $this->db->update('lists', $data);
   }

   public function delete($id)
   {
      return $this->db->delete('lists', ['id_lists' => $id]);
   }
}
