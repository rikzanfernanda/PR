<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function register()
   {
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|is_unique[guru.email]|is_unique[murid.email]');
      $this->form_validation->set_rules('password1', 'Password', 'required');
      $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password1]');
      if ($this->form_validation->run() == FALSE) {
         $this->load->view('register');
         $this->load->view('templates/footer');
      } else {
         $token = bin2hex(random_bytes(5));
         $cek = $this->user_model->register($token);
         if ($cek) {
            $this->session->set_flashdata('register', 'Register berhasil, silakan login');
            redirect();
         } else {
            $this->session->set_flashdata('gagal_register', 'Maaf, Token Anda salah');
            redirect('register');
         }
      }
   }

   public function login()
   {
      $submit = $this->input->post('submit');
      if (isset($submit)) {
         $cek = $this->user_model->login();
         if ($cek) {
            if (isset($cek->token)) {
               $userdata = [
                  'status' => 'guru',
                  'username' => $cek->username,
                  'email' => $cek->email,
                  'token' => $cek->token,
                  'id_guru' => $cek->id_guru
               ];
            } else {
               $userdata = [
                  'id_murid' => $cek->id_murid,
                  'status' => 'murid',
                  'username' => $cek->username,
                  'email' => $cek->email,
                  'id_guru' => $cek->id_guru
               ];
            }
            $this->session->set_userdata($userdata);
            redirect();
         } else {
            $this->session->set_flashdata('gagal_login', 'Terjadi kesalahan, coba masuk kembali atau registrasi ulang');
            redirect();
         }
      }
   }

   public function logout()
   {
      if (!isset($this->session->userdata['status'])) {
         redirect();
      }
      if ($this->session->userdata['status'] == 'guru') {
         $this->session->unset_userdata('status');
         $this->session->unset_userdata('username');
         $this->session->unset_userdata('email');
         $this->session->unset_userdata('token');
         $this->session->unset_userdata('id_guru');
      }
      $this->session->unset_userdata('status');
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('id_guru');
      $this->session->unset_userdata('id_murid');

      redirect();
   }

   public function update($status)
   {
      if (!isset($this->session->userdata['status'])) {
         redirect();
      }
      $this->user_model->update($status);
      redirect();
   }
}
