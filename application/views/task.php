<div class="row">
   <div class="col-md-8 col-sm-8 bg-white shadow-sm">
      <!-- list review -->
      <div class="text-center">
         <h1><?= $lists['list_name'] ?></h1>
         <small>create at <?= $lists['create_date'] ?></small>
         <p><?= $lists['list_body'] ?></p>
      </div>

      <?php if ($this->session->userdata['status'] == 'guru') : ?>
         <div class="bg-light">
            <ul>
               <li>
                  <a href="" data-toggle="modal" data-target="#addtask" class="card-link">
                     Tambah tugas
                  </a>
               </li>
               <li>
                  <a href="<?= base_url('deleteAllTask/' . $id_lists) ?>" class="card-link" onclick="return confirm('Apakah Anda yakin?');">Hapus semua tugas</a>
               </li>
            </ul>
         </div>

         <!-- Modal addtask-->
         <div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Tambah Tugas</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <?php echo form_open('addTask/' . $id_lists); ?>
                     <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title">
                     </div>
                     <div class="form-group">
                        <label for="body">Keterangan</label>
                        <textarea name="body" id="editor1" rows="5" class="form-control"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="due">Batas waktu pengerjaan (tanggal)</label>
                        <input type="date" name="due" id="due" name="due" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="time">Waktu</label>
                        <input type="time" name="time" id="time" name="time" class="form-control">
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
      <?php endif; ?>

      <br>
      <?php if (count($tasks) == 0) : ?>
         <div class="text-center">
            <h5>Belum ada tugas</h5>
            <?php if ($this->session->userdata['status'] == 'guru') : ?>
               <a href="" data-toggle="modal" data-target="#addtask" class="card-link">
                  Tambah tugas
               </a>
            <?php endif; ?>
         </div>
      <?php endif; ?>

      <!-- tasks -->
      <?php foreach ($tasks as $task) : ?>
         <div class="row">
            <div class="col-md-10">
               <h3><?php echo $task['task_name']; ?></h3>
               <small>
                  dibuat pada <?php echo $task['create_date']; ?>,
               </small>
               <small class="text-danger">batas waktu sampai <?php echo $task['due_date']; ?></small><br>
               <div class="task-body">
                  <?php echo $task['task_body']; ?>
               </div>

               <!-- hasil tugas untuk guru-->
               <?php if ($this->session->userdata['status'] == 'guru') : ?>
                  <br>

                  <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Tugas Terkumpul</th>
                           <th>Tindakan</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($tugas as $tgs) : ?>
                           <?php if ($tgs['id_tasks'] == $task['id_tasks']) : ?>
                              <tr>
                                 <td><?= $no; ?></td>
                                 <td>
                                    <b><?php echo $tgs['nama_tugas']; ?></b><br>
                                    <small><small><?php echo $tgs['kirim_date']; ?></small></small><br>
                                    <small>Pengirim : <?php echo $tgs['username']; ?></small><br>
                                    <small>Nilai : <?php echo $tgs['nilai']; ?><br>Note : <?php echo $tgs['note']; ?></small>
                                 </td>
                                 <td>
                                    <div class="text-center">
                                       <a href="../assets/images/<?= $tgs['file']; ?>" class="btn btn-info btn-kecil" target="_blank">lihat</a>
                                    </div>
                                    <div class="text-center">
                                       <!-- tombol beri nilai -->
                                       <a href="" data-toggle="modal" data-target="#tugas<?= $tgs['id_tugas']; ?>" class="btn btn-secondary btn-kecil">
                                          beri nilai
                                       </a>
                                    </div>
                                    <!-- Modal beri nilai-->
                                    <div class="modal fade" id="tugas<?= $tgs['id_tugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><?= $tgs['nama_tugas']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <form action="<?= base_url('nilaiTugas/' . $id_lists); ?>" method="post">
                                                <div class="modal-body">
                                                   <input type="text" name="id_tugas" value="<?= $tgs['id_tugas']; ?>" style="display: none;">
                                                   <div class="form-group">
                                                      <label>Nilai</label>
                                                      <input type="text" name="nilai" class="form-control" value="<?= $tgs['nilai']; ?>">
                                                   </div>
                                                   <div class="form-group">
                                                      <label>Note</label>
                                                      <textarea name="note" class="form-control"><?= $tgs['note']; ?></textarea>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                   <input type="submit" value="kirim" class="btn btn-primary">
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="text-center">
                                       <!-- tombol hapus -->
                                       <form action="<?= base_url('deleteTugas/' . $id_lists); ?>" method="POST">
                                          <input type="text" name="id_tugas" value="<?= $tgs['id_tugas']; ?>" style="display: none;">
                                          <input type="submit" value="hapus" name="hapus" class="btn btn-danger btn-kecil">
                                       </form>
                                    </div>
                                 </td>
                              </tr>

                              <?php $no++; ?>
                           <?php endif; ?>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               <?php endif; ?>
               <!-- end hasil tugas -->

               <!-- hasil tugas untuk murid -->
               <?php if ($this->session->userdata['status'] == 'murid') : ?>
                  <i><small>File tugas Anda :</small></i>
                  <div class="row p-0">
                     <?php foreach ($tugas as $tgs) : ?>
                        <?php if ($tgs['id_tasks'] == $task['id_tasks'] && $tgs['id_murid'] == $this->session->userdata['id_murid']) : ?>
                           <div class="col-md-6 col-lg-3 kotak">
                              <div class="tugas shadow-sm">
                                 <b><?php echo $tgs['nama_tugas']; ?></b><br>
                                 <small><small>Tgl input : <?= $tgs['kirim_date']; ?></small></small><br>
                                 <small>Nilai : <?php echo $tgs['nilai']; ?><br>Note : <?php echo $tgs['note']; ?></small><br>
                                 <a href="../assets/images/<?= $tgs['file']; ?>" class="card-link" target="_blank">lihat</a>
                              </div>
                           </div>

                        <?php endif; ?>
                     <?php endforeach; ?>
                  </div>
               <?php endif; ?>
               <!-- end tugas untuk murid -->
            </div>

            <div class="col-md-2">
               <?php if ($this->session->userdata['status'] == 'guru') : ?>
                  <!-- edit -->
                  <!-- Button trigger modal -->
                  <a href="" data-toggle="modal" data-target="#<?= $task['id_tasks']; ?>" class="btn btn-secondary button">
                     Edit
                  </a>
                  <!-- Modal edit-->
                  <div class="modal fade" id="<?= $task['id_tasks']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit Tugas</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <?php echo form_open('updateTask/' . $id_lists); ?>
                              <div class="form-group">
                                 <label>Judul</label>
                                 <input type="text" class="form-control" name="title" value="<?= $task['task_name']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Keterangan</label>
                                 <textarea name="body" rows="5" class="form-control" id="editor1"><?= $task['task_body']; ?></textarea>
                              </div>
                              <div class="form-group">
                                 <label>Batas waktu pengerjaan (tanggal)</label>
                                 <input type="date" name="due" name="due" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Waktu</label>
                                 <input type="time" name="time" name="time" class="form-control">
                              </div>
                              <input type="text" name="id_tasks" value="<?= $task['id_tasks']; ?>" style="display: none;">
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
                           </div>
                           <?php echo form_close(); ?>
                        </div>
                     </div>
                  </div>

                  <!-- delete -->
                  <?php echo form_open('deleteTask/' . $id_lists); ?>
                  <input type="text" name="id_lists" value="<?php echo $task['id_tasks']; ?>" style="display: none;">
                  <input type="submit" value="Hapus" name="submit" class="btn btn-danger button" onclick="return confirm('Apakah Anda yakin?');">
                  <?php echo form_close(); ?>

               <?php endif; ?>

               <?php if ($this->session->userdata['status'] == 'murid') : ?>
                  <a href="" data-toggle="modal" data-target="#input<?= $task['id_tasks']; ?>" class="btn btn-primary button">
                     Kirim tugas
                  </a>

                  <!-- Modal input tugas-->
                  <div class="modal fade" id="input<?= $task['id_tasks']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle"><?= $task['task_name']; ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <?php echo form_open_multipart('inputTugas/' . $task['id_tasks']); ?>
                              <input type="text" name="id_murid" value="<?= $this->session->userdata['id_murid']; ?>" style="display: none;">
                              <input type="text" name="id_lists" value="<?= $id_lists; ?>" style="display: none;">
                              <div class="form-group">
                                 <label>Judul</label>
                                 <input type="text" class="form-control" name="nama_tugas">
                              </div>
                              <div class="form-group">
                                 <small>*Nama file tidak boleh mengandung spasi</small>
                                 <input type="file" name="file">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <input type="submit" value="Kirim" name="submit" class="btn btn-primary">
                           </div>
                           <?php echo form_close(); ?>
                        </div>
                     </div>
                  </div>
               <?php endif; ?>

            </div>

         </div>
         <hr>
      <?php endforeach; ?>
   </div>

   <!-- komentar -->
   <div class="col-md-4 col-sm-4">
      <div class="card shadow-sm">
         <div class="card-header">
            Komentar
            <?php if ($this->session->userdata['status'] == 'guru') : ?>
               <a href="<?php echo base_url('delKomentar/' . $id_lists); ?>" class="float-right card-link">bersihkan komentar</a>
            <?php endif; ?>
         </div>
         <div class="body">
            <form action="<?php echo base_url('addKomentar/' . $id_lists); ?>" method="post" class="mb-3">
               <input type="text" name="pengirim" value="<?= $this->session->userdata['username']; ?>" style="display: none;">
               <div class="form-group">
                  <input type="text" name="komen" placeholder="Komentar Anda" class="form-control">
               </div>
               <input type="submit" value="kirim" class="btn btn-primary">
            </form>
         </div>
         <div class="komentar">
            <?php foreach ($komentar as $komen) : ?>
               <div class="komen">
                  <div class="body">
                     <small><b><?php echo $komen['pengirim']; ?> :</b></small><br>
                     <?php echo $komen['komen']; ?><br>
                     <div class="text-right">
                        <small class="text-muted"><small><?php echo $komen['komen_date']; ?></small></small>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>

      </div>
   </div>
</div>