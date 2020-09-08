<div class="row">
   <div class="col-lg-3 col-md-3 col-sm-3 p-0">
      <div class="bg-white log shadow-sm">
         <?php if (!isset($this->session->userdata['status'])) : ?>
            <?php echo form_open('login'); ?>
            <div class="form-group">
               <label for="email">Username</label>
               <input type="text" class="form-control" id="email" placeholder="name@example.com" name="username">
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" placeholder="Your password" name="password">
            </div>

            <input type="submit" value="Masuk" name="submit" class="btn btn-primary">
            <?php echo form_close(); ?>
         <?php endif; ?>
         <?php if (isset($this->session->userdata['status'])) : ?>
            <div class="text-center">
               <h3><?php echo $user['username']; ?></h3>
               <small><?php echo $user['email']; ?></small><br>

               Status : <b><?php echo $this->session->userdata['status']; ?></b><br>

               <!-- token -->
               <?php if ($this->session->userdata['status'] == 'guru') : ?>
                  Token Anda : <b><?php echo $user['token']; ?></b><br>
               <?php endif; ?>

               <a href="" class="card-link" data-toggle="modal" data-target="#editProfil">edit profil</a><br>

               <a href="<?php echo base_url('logout') ?>" class="card-link">keluar</a>
            </div>
            <!-- Modal editProfil-->
            <div class="modal fade" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <?php echo form_open('update/' . $this->session->userdata['status']); ?>
                        <?php if ($this->session->userdata['status'] == 'guru') : ?>
                           <input type="text" name="id" value="<?= $user['id_guru']; ?>" style="display: none;">
                        <?php endif; ?>
                        <?php if ($this->session->userdata['status'] == 'murid') : ?>
                           <input type="text" name="id" value="<?= $user['id_murid']; ?>" style="display: none;">
                        <?php endif; ?>
                        <div class="form-group">
                           <label for="username">Username</label>
                           <input type="text" class="form-control" id="username" value="<?= $user['username']; ?>" name="username">
                        </div>
                        <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" id="email" value="<?= $user['email']; ?>" name="email">
                        </div>
                        <div class="form-group">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" id="password" value="<?= $user['password']; ?>" name="password">
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Save" name="submit" class="btn btn-primary">
                     </div>
                     <?php echo form_close(); ?>
                  </div>
               </div>
            </div>

         <?php endif; ?>
      </div>

      <?php if (isset($this->session->userdata['status'])) : ?>
         <?php if ($this->session->userdata['status'] == 'murid') : ?>
            <div class="bg-white shadow-sm mt-3">
               <table>
                  <tbody>
                     <tr>
                        <td>Nama guru</td>
                        <td>: <?= $guru['username']; ?></td>
                     </tr>
                     <tr>
                        <td>Email</td>
                        <td>: <?= $guru['email']; ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         <?php endif; ?>
         <!-- daftar murid -->
         <div class="card mt-3 shadow-sm">
            <div class="card-header">
               Daftar murid
               <div class="float-right">
                  jumlah murid : <?= count($murid); ?>
               </div>
            </div>
            <div class="murid">
               <div class="form-group mt-3 mx-2 mb-2">
                  <input type="text" class="form-control" placeholder="Cari..." id="keyword" onkeyup="search()">
               </div>
               <?php foreach ($murid as $m) : ?>
                  <div class="body">
                     <?= $m['username']; ?><br>
                     <small><?= $m['email']; ?></small>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      <?php endif; ?>
   </div>

   <div class="col-lg-9 col-md-9 col-sm-9">
      <?php if (!isset($this->session->userdata['status'])) : ?>
         <h1>Selamat datang di PR</h1>
         <p>PR ini adalah sebuah web yang akan membantu Anda dalam melaksanakan
            suatu pembelajaran melalui internet terlebih bagi Anda yang berstatus
            sebagai guru dan pelajar. Dengan PR ini akan sangat membantu dalam
            memanajemen tugas yang diberikan oleh seorang guru kepada murid.</p>
         <div class="fitur">
            Fitur-fitur yang ada didalam PR :
            <ol>
               <li class="mt-3">List</li>
               Lists atau semacam mata pelajaran yang didalamnya terdapat tugas-tugas. <br>
               <img src="./assets/images/f-1.png" class="img-fluid">
               <li class="mt-3">Tugas</li>
               Guru membuat tugas untuk murid dan murid mengumpulkan tugas kepada guru, dan guru dapat memberi nilai terhadap tugas yang dikumpulkan oleh murid.
               <img src="./assets/images/f-2.png" class="img-fluid">
               <img src="./assets/images/f-3.png" class="img-fluid">
               <li class="mt-3">Daftar murid</li>
               Guru dan murid bisa melihat siapa saja murid yang diajar oleh guru tersebut. <br>
               <img src="./assets/images/f-4.png" class="img-fluid">
               <li class="mt-3">Komentar</li>
               Fitur untuk berinteraksi antara guru dan murid atau sesama murid. <br>
               <img src="./assets/images/f-5.png" class="img-fluid">
            </ol>
         </div>
         Selamat mencoba :)

      <?php endif; ?>

      <?php if (isset($this->session->userdata['status'])) : ?>
         <?php if ($this->session->userdata['status'] == 'guru') : ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addList">
               Tambah List
            </button>
         <?php endif; ?>

         <!-- Modal add list-->
         <div class="modal fade" id="addList" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Tambah List</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <?php echo form_open('addList'); ?>
                     <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title">
                     </div>
                     <div class="form-group">
                        <label for="body">Keterangan</label>
                        <textarea name="body" id="body" rows="5" class="form-control"></textarea>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                     <input type="submit" value="Tambah" name="submit" class="btn btn-primary">
                  </div>
                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>

         <div class="row p-0">
            <?php foreach ($lists as $list) : ?>
               <div class="col-lg-3 col-md-6 list">
                  <div class="card mb-3 lists shadow-sm">
                     <div class="card-body">
                        <h5 class="card-title"><?php echo $list['list_name']; ?></h5>
                        <small class="card-subtitle mb-2 text-muted">dibuat pada : <?php echo $list['create_date']; ?></small>
                        <div class="teks">
                           <p class="card-text"><?php echo word_limiter($list['list_body'], 10); ?></p>
                        </div>

                        <div class="btn-group">
                           <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Tindakan
                           </button>
                           <div class="dropdown-menu">
                              <a href="<?php echo base_url('viewList/' . $list['id_lists']); ?>" class="dropdown-item">lihat list</a>
                              <?php if ($this->session->userdata['status'] == 'guru') : ?>
                                 <a href="" class="dropdown-item" data-toggle="modal" data-target="#<?php echo $list['id_lists'] ?>">edit</a>
                                 <a href="<?php echo base_url('deleteList/' . $list['id_lists']); ?>" class="dropdown-item" onclick="return confirm('Jika list dihapus maka semua data didalamnya juga terhapus');">hapus</a>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Modal edit list-->
               <div class="modal fade" id="<?php echo $list['id_lists'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Edit List</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <?php echo form_open('updateList/' . $list['id_lists']); ?>
                           <div class="form-group">
                              <label>Judul</label>
                              <input type="text" class="form-control" name="title" value="<?php echo $list['list_name'] ?>">
                           </div>
                           <div class="form-group">
                              <label>Keterangan</label>
                              <textarea name="body" rows="5" class="form-control"><?php echo $list['list_body'] ?></textarea>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                           <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
                        </div>
                        <?php echo form_close(); ?>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>

         <?php if (count($lists) == 0) : ?>
            <h5>Belum ada list</h5>
         <?php endif; ?>
      <?php endif; ?>

   </div>
</div>
<!-- 
<hr>
<pre>
<?php
print_r($guru);
?>
</pre>
<hr>
<hr>
<pre>
<?php
print_r($murid);
?>
</pre>
<hr>
<pre>
   lists:
<?php
print_r($lists);
?>
</pre>
<hr>
<pre>
<?php
print_r($user);
?>
</pre> -->