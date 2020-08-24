<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar_model extends CI_Model
{
   public function read($id_lists)
   {
      $this->db->order_by('id_komentar', 'DESC');
      return $this->db->get_where('komentar', ['id_lists' => $id_lists])->result_array();
   }

   public function create($id_lists)
   {
      $data = [
         'id_lists' => $id_lists,
         'pengirim' => $this->input->post('pengirim'),
         'komen' => $this->input->post('komen'),
      ];
      return $this->db->insert('komentar', $data);
   }

   public function delete($id_lists)
   {
      $this->db->where('id_lists', $id_lists);
      return $this->db->delete('komentar');
   }
}