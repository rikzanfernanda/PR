<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas_model extends CI_Model
{
   public function read()
   {
      $this->db->from('tugas');
      $this->db->join('murid', 'tugas.id_murid = murid.id_murid', 'left');
      return $this->db->get()->result_array();
   }

   public function create($id_tasks, $file)
   {
      $data = [
         'id_murid' => $this->input->post('id_murid'),
         'id_tasks' => $id_tasks,
         'nama_tugas' => $this->input->post('nama_tugas'),
         'file' => $file,
      ];
      return $this->db->insert('tugas', $data);
   }

   public function delete()
   {
      $tugas = $this->db->get_where('tugas', ['id_tugas' => $this->input->post('id_tugas')])->row_array();
      if (file_exists('./assets/images/' . $tugas['file'])) {
         unlink('./assets/images/' . $tugas['file']);
      }

      return $this->db->delete('tugas', ['id_tugas' => $this->input->post('id_tugas')]);
   }

   public function nilai()
   {
      $id_tugas = $this->input->post('id_tugas');
      $data = [
         'nilai' => $this->input->post('nilai'),
         'note' => $this->input->post('note')
      ];
      $this->db->where('id_tugas' , $id_tugas);
      return $this->db->update('tugas', $data);
      
   }
}
