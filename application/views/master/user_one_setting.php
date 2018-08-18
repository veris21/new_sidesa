<section class="content-header">
  <h1>
    Setting
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Setting <i class="fa fa-gear"></i></h3>
        </div>
        <div class="box-body">
           <div class="row">
               <div class="col-md-8">
                    <table width="100%" class="table table-striped table-responsive">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>: <?php echo $this->session->userdata('fullname');?></td>
                            </tr>
                            <tr>
                                <td>Desa</td>
                                <td>: <?php 
                                $des = $this->master_model->_get_desa_id($this->session->userdata('desa_id'))->row_array();
                                echo "Desa ".$des['nama_desa']." Kecamatan ".$des['nama_kecamatan']." Kabupaten ".$des['nama_kabupaten'] ;?></td>
                            </tr>
                            <tr>
                                <td>Keterangan Jabatan </td>
                                <td>: <?php echo $this->session->userdata('keterangan_jabatan');?></td>
                            </tr>
                            <tr>
                                <td>Kontak Aktif</td>
                                <td>: <?php echo $this->session->userdata('hp');?></td>
                            </tr>
                            <tr>
                                <td>Last Login</td>
                                <td>: <?php echo mdate("%d %M %Y - %H:%i %a", $this->session->userdata('last_login'));?></td>
                            </tr>
                            <tr>
                                <td>Setting</td>
                                <td>
                                    <button class="btn btn-warning" onclick="ganti_password_one(<?php echo $this->session->userdata('id');?>)">Ganti Password <i class="fa fa-lock"></i></button>
                                    <button class="btn btn-success" onclick="edit_user_one(<?php echo $this->session->userdata('id');?>)">Edit Profil <i class="fa fa-user"></i></button>
                                </td>
                            </tr>
                    </table>
               </div>
               <div class="col-md-4">
                    <div class="well">
                        <h3>Perhatian !!!</h3>
                        <hr>
                        <p>Halaman ini berfungsi untuk memperbaharui data pribadi pengguna terkait Nama Lengkap, dan Nomor HP yang akan digunakan serta password. lingdungi data diri anda demi kenyamanan Data, <i><b>Jangan Pernah memberikan Kode Otentifikasi yang diberikan Sistem Melalui SMS kepada siapapun, karena itu merupakan Otorisasi terringgi terhadap perubahan data pribadi pengguna didalam sistem SiDesa ID</b></i></p>
                    </div>
               </div>
           </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button onclick="reminder_open()" class=" btn btn-success">Buka Sistem Reminder (Pengingat) <i class="fa fa-clock-o"></i></button>
            </div>
        </div>
    </div>
    <div class="row" id="reminder" hidden>
      <div class="col-md-8">
          <div class="box box-warning" >
            <div class="box-header">
              <h3 class="box-title">History Sistem Pengingat Jadwal</h3>
            </div>
            <div class="box-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="list-reminder">
              <thead>
                <tr valign="center" align="center">
                  <td>Waktu Input</td>
                  <td>Keterangan</td>
                  <td>Waktu di ingatkan</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($reminder as $reminder) {
                // $timeFormat = "%d/%m/%Y";
              ?>
              <tr>
                <td align="center"><?php echo$reminder->timestamp_start; ?></td>
                <td align="center"><?php echo $reminder->pesan; ?></td>
                <td align="center"><?php echo$reminder->deadline; ?></td>
                <td align="center"><?php echo ($reminder->status == 1 ? '<button class="btn btn-success">Success</button>' : '<button class="btn btn-warning">On Process</button>'); ?></td>
              </tr>
              <?php  } ?>
              </tbody>            
                </table>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-primary">
          <?php 
          echo form_open('#', array('class'=>'form-horizontal', 'id'=>'form_reminder'));
          ?>
          <div class="box-header">
            <h3 class="box-title">
              Input Pengingat Jadwal
            </h3>
          </div>

          <div class="box-body form">          

            <div class="form-group">
            <label class="control-label col-md-3">Ingatkan tanggal</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="waktu_ingat" id="reminder_date" onchange="check_date()" required>
                </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3">Tentang</label>
              <div class="col-md-9">
                <textarea name="pesan" id="" cols="10" rows="4" class="form-control" id="pesan" required></textarea>
              </div>
            </div>        

            <div class="form-group">
            <label class="control-label col-md-3">Type Pengingat</label>
                <div class="col-md-9">
                  <select name="tipe_pengingat" class="form-control" id="tipe">
                  <option value="">-- Pilih Tipe Pengingat --</option>
                    <option value="1">Pemberitahuan</option>
                    <option value="2">Penting</option>
                    <option value="3">Segera</option>
                  </select>
                </div>
            </div> 
                  
          </div>

          <input type="hidden" name="dari" value="<?php echo $this->session->userdata('id'); ?>" />
          <input type="hidden" name="kepada" value="<?php echo $this->session->userdata('id'); ?>" />
          
          <div class="box-footer">
            <div class="pull-right">
                  <button type="reset" class="btn btn-danger">Reset <i class="fa fa-ban"> </i></button>
                  <button class="btn btn-warning" onclick="posting_reminder()">Posting <i class="fa fa-save"></i></button>
            </div> 
          </div>

          <?php echo 
          form_close();
          ?>
        </div>
        
      </div>
    </div>
</section>
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_setting_user" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">User Data</h3>
      </div>
      <div class="modal-body form">
        <?php echo form_open('#',array('class'=>'form-horizontal', 'id'=>'setting_user'));?>
          <input type="hidden" name="id" value="<?php echo $this->session->userdata('id');?>">
          <div class="form-body">

            <div class="form-group" id="set_uid">
              <label class="control-label col-md-3">User ID</label>
              <div class="col-md-9">
                <input type="text" name="uid" class="form-control">
              </div>
            </div>

            <div class="form-group" id="set_nama">
              <label class="control-label col-md-3">Nama Lengkap</label>
              <div class="col-md-9">              
                <input type="text" class="form-control" name="fullname">
              </div>
            </div>
            
            <div class="form-group" id="set_keterangan">
              <label class="control-label col-md-3">Keterangan Jabatan</label>
              <div class="col-md-9">              
                <input type="text" name="keterangan_jabatan" class="form-control" >
              </div>
            </div>

            <div class="form-group"  id="set_hp">
              <label class="control-label col-md-3">Kontak</label>
              <div class="col-md-9">              
                <input type="text" name="hp" class="form-control" >
              </div>
            </div>

            <div  id="password">

                <div class="form-group">
                  <label class="control-label col-md-3">Password Baru</label>
                  <div class="col-md-9">              
                    <input type="password" name="pass" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Ulangi Password</label>
                  <div class="col-md-9">              
                    <input type="password" name="passConfirm" class="form-control" onkeyup="validate_setting_pass()">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3">*</label>
                  <div class="col-md-9">              
                    <p id="notif"></p>
                  </div>
                </div>
            </div>

            <div class="form-group"  id="set_otp">
              <label class="control-label col-md-3">OTP (One Time Password)</label>
              <div class="col-md-9">              
                <input type="text" name="otp" class="form-control" >
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <div class="pull-right">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" id="btnSave" onclick="save_setting_one()" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
              </div>           
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

  <script>
  function reminder_open(){
    $('#reminder').show();
  }


  function check_date() {
    var date = $('[name="waktu_ingat"]').val();
    console.log(date);
  }

  function posting_reminder(){
    event.preventDefault();
    swal({
    title: 'Apa Anda ingin Menginput Reminder?',
    text: "Input Data Ke Sistem Reminder !",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Posting Reminder!'
    }, function isConfirm() {
        $.ajax({
          url : '<?php echo base_url('posting/reminder'); ?>',
          type: "POST",
          dataType: "JSON",
          data: $('#form_reminder').serialize(),
          success: function (data) {
            location.reload();
          }
        });
    });
   
  }
  </script>