<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
   public function register($token = false)
   {
      $role = $this->input->post('role');
      if ($role == 'guru') {
         $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password2')),
            'token' => $token,
         ];
         return $this->db->insert('guru', $data);
      } elseif ($role == 'murid') {
         $token = $this->input->post('token');
         $cek = $this->db->get_where('guru', ['token' => $token]);
         if ($cek->num_rows() == 1) {
            $result = $cek->row_array();
            $data = [
               'username' => $this->input->post('username'),
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password2')),
               'id_guru' => $result['id_guru'],
            ];
            return $this->db->insert('murid', $data);
         } else {
            return false;
         }
      }
   }

   public function login()
   {
      $data = [
         'username' => $this->input->post('username'),
         'password' => md5($this->input->post('password'))
      ];
      $guru = $this->db->get_where('guru', $data);
      $murid = $this->db->get_where('murid', $data);
      if ($guru->num_rows() == 1) {
         return $guru->row(0);
      } elseif ($murid->num_rows() == 1) {
         return $murid->row(0);
      } else {
         return false;
      }
   }

   public function user($status, $id)
   {
      if ($status == 'guru') {
         return $this->db->get_where('guru', ['id_guru' => $id])->row_array();
      } elseif ($status == 'murid') {
         return $this->db->get_where('murid', ['id_murid' => $id])->row_array();
      }
   }

   public function update($status)
   {
      $id = $this->input->post('id');
      $data = [
         'username' => $this->input->post('username'),
         'email' => $this->input->post('email'),
         'password' => md5($this->input->post('password')),
      ];
      if ($status == 'guru') {
         $this->db->where('id_guru', $id);
         return $this->db->update('guru', $data);
      } elseif ($status == 'murid') {
         $this->db->where('id_murid', $id);
         return $this->db->update('murid', $data);
      }
   }

   public function read($table, $id_guru)
   {
      $this->db->order_by('username', 'ASC');
      return $this->db->get_where($table, ['id_guru' => $id_guru])->result_array();
   }
}
