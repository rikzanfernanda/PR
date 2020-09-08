<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

   <!-- bootswatch -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/yeti/bootstrap.min.css">

   <!-- my css -->
   <link rel="stylesheet" href="<?php echo base_url('assets/css/style9.css') ?>">

   <title>Registrasi</title>
</head>

<body>
   <?php if ($this->session->flashdata('gagal_register')) : ?>
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <?php echo $this->session->flashdata('gagal_register'); ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         </div>
      </div>
   <?php endif; ?>
   <div class="register">
      <div class="row pb-3 pt-3">
         <div class="col-lg-6 col-md-6">
            <div class="form shadow">
               <a href="<?php echo base_url(); ?>" class="btn btn-primary">Kembali</a>
               <?php echo form_open('register'); ?>
               <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="John Doe" name="username">
                  <small class="text-danger"><?= form_error('username'); ?></small>
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                  <small class="text-danger"><?= form_error('email'); ?></small>
               </div>
               <div class="form-group">
                  <label for="password1">Password</label>
                  <input type="password" class="form-control" id="password1" placeholder="Password Anda" name="password1">
                  <small class="text-danger"><?= form_error('password1'); ?></small>
               </div>
               <div class="form-group">
                  <label for="password2">Confirm Password</label>
                  <input type="password" class="form-control" id="password2" placeholder="Konfirmasi Password" name="password2">
                  <small class="text-danger"><?= form_error('password2'); ?></small>
               </div>
               <div class="form-group">
                  <label for="role">Daftar sebagai</label><br>
                  <input type="radio" name="role" id="murid" checked value="murid">
                  <label for="murid">murid</label><br>
                  <input type="radio" name="role" id="guru" value="guru">
                  <label for="guru">guru</label>
               </div>
               <div class="form-group">
                  <label for="token">Token</label>
                  <input type="text" class="form-control" id="token" placeholder="isi jika anda sebagai murid" name="token">
                  <small>Token dari guru Anda</small>
               </div>
               <input type="submit" value="Kirim" name="submit" class="btn btn-primary">
               <?php echo form_close(); ?>
            </div>

         </div>

         <div class="col-lg-6 col-md-6">
            <h1>Selamat Mencoba</h1>

            <!-- carousel -->
            <div id="carouselExampleIndicators" class="carousel slide shadow-sm" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img class="d-block" src="<?= base_url('assets/images/c-1.jpg'); ?>" alt="First slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block" src="<?= base_url('assets/images/c-2.jpg'); ?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block" src="<?= base_url('assets/images/c-3.jpg'); ?>" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block" src="<?= base_url('assets/images/c-4.jpg'); ?>" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block" src="<?= base_url('assets/images/c-5.jpg'); ?>" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block" src="<?= base_url('assets/images/c-6.jpg'); ?>" alt="Third slide">
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>

         </div>

      </div>
   </div>