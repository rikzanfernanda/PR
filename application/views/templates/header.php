<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

   <!-- bootswatch -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/litera/bootstrap.min.css">

   <!-- my css -->
   <link rel="stylesheet" href="<?php echo base_url('assets/css/style6.css') ?>">

   <title>PR</title>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
      <div class="container">
         <a class="navbar-brand" href="<?php echo site_url(); ?>">PR</a>
         <div class="navbar-nav ">
            <a class="nav-item nav-link" href="<?php echo site_url(); ?>">Home</a>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
               <a class="nav-item nav-link" href="<?php echo site_url('register'); ?>">Registrasi</a>
            </div>
         </div>
      </div>
   </nav>

   <div class="row justify-content-center">
      <div class="col-md-6">
         <?php if ($this->session->flashdata('register')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?php echo $this->session->flashdata('register'); ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif; ?>

         <?php if ($this->session->flashdata('gagal_login')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <?php echo $this->session->flashdata('gagal_login'); ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif; ?>

      </div>
   </div>