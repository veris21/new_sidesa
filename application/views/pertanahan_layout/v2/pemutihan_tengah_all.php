<section class="content-header">
<h1>
  Master Pemutihan Koordinat Tanah
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Pemutihan Koordinat Tanah</li>
</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header">
                    <h5 class="box-title">Daftar List</h5>
                </div>
                <div class="box-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="koordinat_tengah_all">
                    <thead>
                    <tr valign="center" align="center" style="font-weight:bolder;">
                        <td>No. NIK</td>    
                        <td>Status Dokumen</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach ($list as $k) {
                         $verified = $k->verified;
                     ?>
                        <tr>
                            <td align='left'><?php echo $k->nik; ?></td>
                            <td align='center'> 
                            <?php   
                            $check = $this->datapenduduk_model->_get_data_nik($k->nik)->row_array();
                            if($check['no_nik'] == $k->nik){
                                $status_lengkap = ($verified == 1 ? 
                                "<button class='btn btn-sm btn-flat btn-success'>Data Lengkap</button> " : 
                                "<button class='btn btn-sm btn-flat btn-warning'>Belum Lengkap</button> ");
                                echo $status_lengkap;   
                            }else{
                                $statusDDK = "<button class='btn btn-sm btn-flat btn-danger'>Nik tidak Terdaftar</button> ";
                                echo $statusDDK;

                            }              
                                                     
                            ?>
                            </td>
                            <td align='center'>
                            
                            <button onclick="view_data_pemutihan_one(<?php echo $k->id;?>)" class='btn btn-xs btn-success'><i class='fa fa-eye'></i></button> 
                          
                            <?php if($check['no_nik'] != $k->nik){ ?>
                            <button onclick="edit_data_pemutihan_one(<?php echo $k->id;?>)" class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button> 
                            <?php } ?>
                            </td>

                        </tr>
                    <?php 
                }
             ?>
                    </tbody> 
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="box box-warning">
                <div class="box-header">
                    <h5 class="box-title">Kelengkapan Berkas</h5>
                </div>
                <div class="box-body">
                    <center id="loader" style="display:none;">
                        <img width="25%" class="img img-responsive" src="<?php echo base_url().'assets/';?>nyapu.gif" />
                    </center>
                    <div id="data-show" hidden>
                    <div class="row" id="peta">
                        <div class="col-md-12">
                            <div  style="height: 480px;" id="map-view"></div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row" id="kelengkapan">
                        <div class="col-md-6">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                            <tr><td>No Nik</td><td><b id="nik"></b></td></tr>
                            <tr><td>Nama Lengkap</td><td><b id="nama"></b></td></tr>
                            <tr><td>Alamat</td><td><b id="alamat"></b></td></tr>
                            <tr><td>Status Surat</td><td><b id="status"></b></td></tr>
                            <tr><td>Koordinat Tanah</td><td> <b id="view_titik_tengah"></b> </td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div id="tb">                            
                            </div>
                            <hr>
            <!--  -->
            <div id="input_patok_form" style="display:none;">
                <?php  echo form_open_multipart('', array('id'=>'input_data_patok','class'=>'form-horizontal'));?>
                    <div class="form">
                        <div class="form-group">
                        <label class="control-label col-sm-4" for="">ID Data Link</label>
                        <div class="col-sm-8" id="latitude">
                            <input type="text" name="data_link_id" class="form-control" >
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-4" for="">Latitude</label>
                        <div class="col-sm-8" id="latitude">
                            <input type="text" name="lat" class="form-control" >
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-4" for="">Longitude</label>
                        <div class="col-sm-8" id="longitude">
                            <input type="text" name="lng" class="form-control" >
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-4" for="">Batas Utara</label>
                        <div class="col-sm-8" id="utara">
                            <input type="text" name="utara" class="form-control" >
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-4" for="">Batas Selatan</label>
                        <div class="col-sm-8" id="selatan">
                            <input type="text" name="selatan" class="form-control" >
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-4" for="">Batas Timur</label>
                        <div class="col-sm-8" id="timur">
                            <input type="text" name="timur" class="form-control" >
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-4" for="">Batas Barat</label>
                        <div class="col-sm-8" id="barat">
                            <input type="text" name="barat" class="form-control" >
                        </div>
                        </div>
                        <!-- <div class="form-group">
                        <label class="control-label col-sm-4" for="">Foto Patok</label>
                        <div class="col-sm-8" id="foto_patok">
                            <input type="file" name="patok_update" class="form-control" >
                        </div>
                        </div> -->
                        <hr>
                        <div class="form-group">
                        <label class="control-label col-sm-4" for=""></label>
                        <div class="col-sm-8" id="button">
                            <button type="button" class="btn btn-primary" onclick="input_patok_pemutihan()">Update Patok <i class="fa fa-upload"></i></button>
                        </div>
                        </div>
                    </div>
                </form>
             </div>  
            <!--  -->
                            <hr>
                            <div id="data-link-input" hidden>
                            <button class="btn btn-warning btn-block" onclick="buka_push_form()">Push Data Link <i class="fa fa-input"></i></button>
                            </div>
                            <hr>
                            <div id="verifikasi-input" hidden>
                                <button class="btn btn-primary btn-block" onclick="verifikasi_pemutihan()">Input Ke Master Pemutihan <i class="fa fa-upload"></i></button>
                            </div>
                            <hr>
                            <div id="patok-input" hidden>
                                <button class="btn btn-success btn-block" onclick="buka_input_patok_form()">Input Data Patok Batas <i class="fa fa-input"></i></button>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row" id="warning" hidden>
                        <div class="col-md-12">
                            <div class="well">
                            <h3 style="text-align:center;font-weight:bolder;">NIK TIDAK DITEMUKAN SISTEM</h3>
                            <hr>
                            <p  style="text-align:justify;">
                            Data tidak ditemukan pada Data Induk Kependudukan Sistem. Koordinat Belum Memiliki Kelengkapan Data.
                            Silahkan Lengkapi Data dan Dokumen Pendukung Pertanahan lainnya</p>
                            </div>
                            
                            <center>
                                <button class="btn btn-warning" onclick="input_penduduk_baru()">
                                Lengkapi Data <i class="fa fa-upload"> </i> 
                                </button>
                            </center>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal Input Data Penduduk Baru -->
<div class="modal fade" id="modal_input_data_penduduk_baru" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Input Data Penduduk ke Sistem</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'input_data_penduduk_baru','class'=>'form-horizontal'));?>
      <div class="modal-body form">
      <!--  -->
      <div class="form-group">
      <label class="control-label col-sm-4" for="">Kabupaten</label>
            <div class="col-sm-8">
              <select name="provinsi" class="form-control select2" style="width:100%;" id="">
                <option value="">-- Pilih provinsi --</option>
                <?php 
                foreach ($provinsi as $provinsi) {
                  // echo "<option value='".$kabupaten->id."'>".$kabupaten->nama_kabupaten."</option>";
                  echo "<option value='".$provinsi->id."'>".$provinsi->name."</option>";
                }
                ?>
              </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Kabupaten</label>
            <div class="col-sm-8">
              <select name="kabupaten" class="form-control select2" style="width:100%;" id="">
                
              </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Kecamatan</label>
            <div class="col-sm-8"  id="kecamatan">
                <select name='kecamatan' class='form-control select2' style='width:100%'>
                </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Desa</label>
            <div class="col-sm-8" id="desa">
            <select name='desa' class='form-control select2' style='width:100%' >
            </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Dusun</label>
            <div class="col-sm-8" id="dsn">
            <input type="text" name="dusun" class="form-control" >
            <!-- <select name='dusun' class='form-control select2' style='width:100%' ></select>       -->
            </div>
      </div>

      <div class="form-group" >
      <label class="control-label col-sm-4" for="">RT</label>
            <div class="col-sm-8" id="rt">
            <input type="text" name="rt" class="form-control" >
                <!-- <select name='rt' class='form-control  select2' style='width:100%' ></select> -->
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Alamat</label>
              <div class="col-sm-8">
                  <input type="text" name="alamat" class="form-control" >
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">No. Kartu Keluarga</label>
              <div class="col-sm-8">
                  <input type="number" name="no_kk" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">No. NIK</label>
              <div class="col-sm-8">
                  <input type="number" name="no_nik" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Nama Lengkap</label>
              <div class="col-sm-8">
                  <input type="text" name="nama" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Jenis Kelamin</label>
            <div class="col-sm-8">
              <select name="jenis_kelamin" class="form-control" id="">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-4" for="">Tempat Lahir</label>
              <div class="col-sm-8">
                  <input type="text" name="tempat_lahir" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Tanggal Lahir</label>
              <div class="col-sm-8">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="tanggal_lahir" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Pekerjaan</label>
              <div class="col-sm-8">
              <select name="pekerjaan" class="form-control select2" style='width:100%'>
                <option value="">-- Pekerjaan --</option>
                <option value="Belum/ Tidak Bekerja">Belum/ Tidak Bekerja</option>
                <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                <option value="Pensiunan">Pensiunan</option>
                <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                <option value="Tentara Nasional Indonesia">Tentara Nasional Indonesia</option>
                <option value="Kepolisian RI">Kepolisian RI</option>
                <option value="Perdaganagn">Perdaganagn</option>
                <option value="Petani/Pekebun">Petani/Pekebun</option>
                <option value="Peternak">Peternak</option>
                <option value="Nelayan/Perikanan">Nelayan/Perikanan</option>
                <option value="Industri">Industri</option>
                <option value="Kontruksi/Tukang Bangunan">Kontruksi/Tukang Bangunan</option>
                <option value="Transportasi">Transportasi</option>
                <option value="Karyawan Swasta">Karyawan Swasta</option>
                <option value="Karyawan BUMN">Karyawan BUMN</option>
                <option value="Karyawan BUMD">Karyawan BUMD</option>
                <option value="Karyawan Honorer">Karyawan Honorer</option>
                <option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
                <option value="Buruh Tani/Perkebunan">Buruh Tani/Perkebunan</option>
                <option value="Buruh Nelayan/Perikanan">Buruh Nelayan/Perikanan</option>
                <option value="Buruh Peternakan">Buruh Peternakan</option>
                <option value="Pembantu Rumah Tangga">Pembantu Rumah Tangga</option>
                <option value="Tukang Cukur">Tukang Cukur</option>
                <option value="Tukang Listrik">Tukang Listrik</option>
                <option value="Tukang Batu">Tukang Batu</option>
                <option value="Tukang Kayu">Tukang Kayu</option>
                <option value="Tukang Sol Sepatu">Tukang Sol Sepatu</option>
                <option value="Tukang Las/Pandai Besi">Tukang Las/Pandai Besi</option>
                <option value="Tukang Jahit">Tukang Jahit</option>
                <option value="Penata Rambut">Penata Rambut</option>
                <option value="Penata Rias">Penata Rias</option>
                <option value="Penata Busana">Penata Busana</option>
                <option value="Mekanik">Mekanik</option>
                <option value="Tukang Gigi">Tukang Gigi</option>
                <option value="Seniman">Seniman</option>
                <option value="Tabib">Tabib</option>
                <option value="Paraji">Paraji</option>
                <option value="Perancang Busana">Perancang Busana</option>
                <option value="Penterjemah">Penterjemah</option>
                <option value="Imam Masjid">Imam Masjid</option>
                <option value="Pendeta">Pendeta</option>
                <option value="Pastur">Pastur</option>
                <option value="Wartawan">Wartawan</option>
                <option value="Ustadz/Mubaligh">Ustadz/Mubaligh</option>
                <option value="Juru Masak">Juru Masak</option>
                <option value="Promotor Acara">Promotor Acara</option>
                <option value="Anggota DPR-RI">Anggota DPR-RI</option>
                <option value="Anggota DPD">Anggota DPD</option>
                <option value="Anggota BPK">Anggota BPK</option>
                <option value="Presiden">Presiden</option>
                <option value="Wakil Presiden">Wakil Presiden</option>
                <option value="Anggota Mahkamah">Anggota Mahkamah</option>
                <option value="Konstitusi">Konstitusi</option>
                <option value="Anggota Kabinet/Kementrian">Anggota Kabinet/Kementrian</option>
                <option value="Duta Besar">Duta Besar</option>
                <option value="Gubernur">Gubernur</option>
                <option value="Wakil Gubernur">Wakil Gubernur</option>
                <option value="Bupati">Bupati</option>
                <option value="Wakil Bupati">Wakil Bupati</option>
                <option value="Walikota">Walikota</option>
                <option value="Wakil Walikota">Wakil Walikota</option>
                <option value="Anggota DPRD Prov/Kabupaten">Anggota DPRD Prov/Kabupaten</option>
                <option value="Dosen">Dosen</option>
                <option value="Guru">Guru</option>
                <option value="Pilot">Pilot</option>
                <option value="Pengacara">Pengacara</option>
                <option value="Notaris">Notaris</option>
                <option value="Arsitek">Arsitek</option>
                <option value="Akuntan">Akuntan</option>
                <option value="Konsultan">Konsultan</option>
                <option value="Dokter">Dokter</option>
                <option value="Bidan">Bidan</option>
                <option value="Perawat">Perawat</option>
                <option value="Apoteker">Apoteker</option>
                <option value="Psikiater/Psikolog">Psikiater/Psikolog</option>
                <option value="Penyiar Televisi">Penyiar Televisi</option>
                <option value="Penyiar Radio">Penyiar Radio</option>
                <option value="Pelaut">Pelaut</option>
                <option value="Peneliti">Peneliti</option>
                <option value="Pialang">Pialang</option>
                <option value="Paranormal">Paranormal</option>
                <option value="Pedagang">Pedagang</option>
                <option value="Perangkat Desa">Perangkat Desa</option>
                <option value="Kepala Desa">Kepala Desa</option>
                <option value="Biarawati">Biarawati</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Lainnya">Lainnya</option>
              </select>
               </div>
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-4" for="">Agama</label>
              <div class="col-sm-8">
                <select name="agama" class="form-control" id="">
                  <option value="">-- PIlih Agama --</option>
                  <option value="ISLAM">ISLAM</option>
                  <option value="KRISTEN">KRISTEN</option>
                  <option value="KATOLIK">KATOLIK</option>
                  <option value="BUDHA">BUDHA</option>
                  <option value="HINDU">HINDU</option>
                  <option value="KONGHUCU">KONGHUCU</option>
                </select>
               </div>
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-4" for="">Pendidikan Terakhir</label>
              <div class="col-sm-8">
                <select name="pddk_akhir" class="form-control" id="">
                  <option value="">-- Pendidikan Terakhir --</option>
                  <option value="TIDAK/BELUM SEKOLAH">TIDAK/BELUM SEKOLAH</option>
                  <option value="TIDAK TAMAT SD/SEDERAJAT">TIDAK TAMAT SD/SEDERAJAT</option>
                  <option value="TAMAT SD/SEDERAJAT">TAMAT SD/SEDERAJAT</option>
                  <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                  <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                  <option value="DIPLOMA I/II">DIPLOMA I/II</option>
                  <option value="AKADEMI/DIPLOMA III/S.Muda">AKADEMI/DIPLOMA III/S.Muda</option>
                  <option value="DIPLOMA IV/ STRATA I">DIPLOMA IV/ STRATA I</option>
                  <option value="STRATA II">STRATA II</option>
                  <option value="STRATA III">STRATA III</option>
                </select>
                </select>
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Status Perkawinan</label>
              <div class="col-sm-8">
                <select name="status" class="form-control" id="">
                  <option value="">-- Pilih Status Perkawinan --</option>
                  <option value="BELUM KAWIN">Belum Kawin</option>
                  <option value="KAWIN">Kawin</option>
                  <option value="DUDA">DUDA</option>
                  <option value="JANDA">JANDA</option>
                </select>
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Status Dalam Keluarga</label>
              <div class="col-sm-8">
                  <select name="shdk" class="form-control" id="">
                  <option value="">-- Pilih Status Dalam Rumah Tangga --</option>
                  <option value="KEPALA KELUARGA">KEPALA KELUARGA</option>
                  <option value="ISTRI">ISTRI</option>
                  <option value="ANAK">ANAK</option>
                  <option value="FAMILI LAIN">FAMILI LAIN</option>
                </select>
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Jumlah Anggota Keluarga</label>
              <div class="col-sm-8">
                  <input type="number" name="shdrt" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Nama Ayah</label>
              <div class="col-sm-8">
                  <input type="text" name="nama_ayah" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Nama Ibu</label>
              <div class="col-sm-8">
                  <input type="text" name="nama_ibu" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Scan FC KTP/KK</label>
        <div class="col-sm-8">
            <input type="file" name="ktp" class="form-control" id="">
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Memo / Catatan Input</label>
              <div class="col-sm-8">
                  <textarea name="keterangan" class="form-control" cols="8" rows="4"></textarea>
               </div>
      </div>
      <!--  -->
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="save_penduduk_baru()" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div> 
  </div> 
</div>


<div class="modal fade" id="push_data">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open_multipart('', array('id'=>'push_form','class'=>'form-horizontal'));?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">PUSH DATA</h4>
            </div>
            <div class="modal-body form">
                   <div id="dokumentasi" class="form-group">
                        <label  class="control-label col-sm-4" for="">ID PEMUTIHAN</label>
                        <div class="col-sm-8">
                           <input type="text" name="tanah_id" class="form-control" >                        
                        </div>                        
                    </div>
                    <div id="dokumentasi" class="form-group">
                        <label  class="control-label col-sm-4" for="">Dokumentasi Link</label>
                        <div class="col-sm-8">
                           <input type="text" name="dokumentasi" class="form-control" >                        
                        </div>                        
                    </div>
                   <div id="lat" class="form-group">
                        <label  class="control-label col-sm-4" for="">Latitude</label>
                        <div class="col-sm-8">
                           <input type="text" name="latitude" class="form-control" >                        
                        </div>                        
                    </div>
                    <div id="lng" class="form-group">
                        <label  class="control-label col-sm-4" for="">Longitude</label>
                        <div class="col-sm-8">
                           <input type="text" name="longitude" class="form-control" >                        
                        </div>                        
                    </div>


            </div>        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_push()">Push Data <i class="fa fa-upload"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="modal_pemutihan">
    <div class="modal-dialog">
        <?php echo form_open_multipart('#', array('id'=>'data_pemutihan'));
        ?>
        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Data Koordinat</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">ID Data Titik</label>
                    <input type="text" name="id" class="form-control" id="">
                </div>
                <div id="foto-patok" class="form-group">
                       <img src="" class=" col-sm-12 img img-rounded img-responsive" alt="FOTO Tempat">
                </div>
                <!-- <div class="form-group">
                    <label for="">Lampiran Foto Titik</label>
                    <input type="file" name="patok" class="form-control" id="">
                </div> -->
                <div class="form-group">
                    <label for="">No Induk Kependudukan</label>
                    <input type="text" name="nik" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Koordinat Latitude</label>
                    <input type="text" name="latitude" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Koordinat Longitude</label>
                    <input type="text" name="longitude" class="form-control" id="">
                </div>
                <input type="hidden" name="verified" value="">
                <input type="hidden" name="area" value="">
                <input type="hidden" name="status" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="simpan_edit_pemutihan()">Save changes</button>
            </div>
            <?php echo 
            form_close();
            ?>
        </div>
    </div>
</div>




<div class="modal fade" id="verifikasi_pemutihan_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Verifikasi Data Pemutihan</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="verifikasi_pemutihan()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY&libraries=geometry"></script>
<script>
var baseUrl = '<?php echo base_url(); ?>';

var titik_tengah;
var view_titik_tengah;
var patok;
var id;
var nik;
var idRef;
var link;

var verified;
var is_pemutihan;
var bap_id = '';

var table;



function edit_data_pemutihan_one(id) {
  var url = baseUrl + 'pemutihan/one/' + id;
  event.preventDefault();
  swal({
    title: 'Apa Anda Ingin Data Titik Tengah Pemutihan?' + id,
    text: "Edit Data Titik Tengah",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Edit Data!'
  }, function isConfirm() {
    $('#data_pemutihan')[0].reset();
    $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        console.log(data);
        $('[name="id"').val(id);
        $('[name="nik"]').val(data.id);
        $('#foto-patok img').attr('src', '<?php echo base_url();?>assets/uploader/patok/' + data.dokumentasi);
        $('[name="nik"]').val(data.nik);
        $('[name="latitude"]').val(data.latitude);
        $('[name="longitude"]').val(data.longitude);
        $('[name="verified"]').val(data.verified);
        $('[name="area"]').val(data.area);
        $('[name="status"]').val(data.status);

        $('#modal_pemutihan').modal('show');
        $('.modal-title').text('Update Titik Pemutihan');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
      } 
    });
  });
}

function simpan_edit_pemutihan(){
    $('#data_pemutihan').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '<?php echo base_url('pemutihan/update/titik_tengah'); ?>',
        type: "POST",
        data: formData,
        async: true,
        cache: true,
        contentType: false,
        enctype: 'multipart/form-data',
        processData: false,
        success: function (data) {
            console.log(data);
            swal('Selamat !', 'Berhasil Input Data Koordinat Ke Sistem!', 'success');
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal('Astaga', 'Ade Nok Salah Mudel e...!', 'error');
        }
    });
    
  });
}



function view_data_pemutihan_one(id) {
    // alert(id);
    // die;
    patok = [];
    event.preventDefault();
    $('#data-show').hide();
    $('#loader').show();    
    var url = "<?php echo base_url('pemutihan/one/');?>";
    $.ajax({
        'url' : url+id,
        'success' : function(x){
            console.log('DATA X :');
            console.log(x);
            $('#loader').hide();
            if (x != null) {
                titik_tengah = new google.maps.LatLng(parseFloat(x.latitude), parseFloat(x.longitude));
                view_titik_tengah = "( "+  x.latitude + ", " +x.longitude+" )";
                nik = x.nik;        
                verified = x.verified;        
                is_pemutihan = x.is_pemutihan;
                $("#view_titik_tengah").text(view_titik_tengah);
                // $("#nik").text(x.nik);
                // $("#nama").text(x.nama);
                // $("#alamat").text(x.alamat);
                // $("#status").text(x.status);
                $('[name="latitude"]').val(x.latitude);
                $('[name="longitude"]').val(x.longitude);
                $('[name="dokumentasi"]').val(x.dokumentasi);
                $('[name="tanah_id"]').val(bap_id);
                if(x.bap_id!=null){
                    bap_id = x.bap_id;
                }else{
                    bap_id = "P-"+x.id;
                }
                // console.log(bap_id);
                initialize();
                validasi_data(nik, bap_id);         
                $('#data-show').show();
            }
            // console.log(nik);
            
        }
    });
}

function validasi_data(nik, bap_id){
    event.preventDefault();
    var url = '<?php echo base_url("pemutihan/validate_nik/") ?>';
    $("#nik").text('');
    $("#nama").text('');
    $("#alamat").text('');
    $("#status").text('');
    $.ajax({
        url: url+nik,
        success : function(y){
            console.log( "Validasi Data" );
            console.log(y);
            if(y!=''){                
                $("#kelengkapan").show();
                $("#warning").hide();
                $("#nik").text(y.nik);
                $("#nama").text(y.nama);
                $("#alamat").text(y.alamat);
                $("#status").text(y.status);
                // $('[name="latitude"]').val(y.latitude);
                // $('[name="longitude"]').val(y.longitude);
                // $('[name="dokumentasi"]').val(y.dokumentasi);
                // $('[name="tanah_id"]').val(bap_id);
                // if(is_pemutihan == 0 ){ 
                    idRef = bap_id;
                //     view_data_pemutihan_status(idRef);
                //     console.log("BAP id : " + idRef);
                //  }else{ 
                //      idRef = "P-"+y.id ;
                     view_data_pemutihan_status(idRef);
                //      console.log(idRef);
                //  }
            }else{            
                $("#nik").text('');
                $("#nama").text('');
                $("#alamat").text('');
                $("#status").text('');
                $("#kelengkapan").hide();
                $("#warning").show();
                
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {}        
    });
}

function view_data_pemutihan_status(idRef) {
    event.preventDefault();
    var url = "<?php echo base_url('get/status/pemutihan/');?>";    
    $.ajax({
        'url' : url+idRef,
        'success' : function(z){       
            // console.log(z);
            // console.log("BAP ID :" + bap_id);
            // console.log("PEMUTIHAN : " + is_pemutihan);
            if (z == null || z == '') {
                table = '<table width="100%" class="table table-striped table-bordered table-hover"><thead><tr><td>No.</td><td>Latitude</td><td>Longitude</td></tr></thead><tbody>';
                table += "<tr><td colspan='3' align='center'>Data Patok Belum Ada</td></tr>";
                table += '</tbody></table>';
                $("div#tb").html(table);
                $("#data-link-input").show();
                $("#patok-input").hide();
            }else{
                $("#data-link-input").hide();
                if(is_pemutihan == 0){
                    $("#patok-input").hide();                                   
                }else{
                    $("#patok-input").show();
                }
                if(verified == 0){                    
                    $("#verifikasi-input").show();
                }else{
                    $("#patok-input").hide();
                    $("#verifikasi-input").hide();
                }
                $('[name="data_link_id"]').val(z.id); 
                link = z.id;                
                datapatok(link);
                // console.log("LINK : " + link);
            }
        }
    });
}

function datapatok(link) {    
    event.preventDefault();
    var url = '<?php echo base_url("get/patok/pemutihan/"); ?>';
    $.ajax({
        url: url + link,
        success : function (data) {
            // console.log(data);
            if(data==null || data==''){
                table = '<table width="100%" class="table table-striped table-bordered table-hover"><thead><tr><td>No.</td><td>Latitude</td><td>Longitude</td><td>#</td></tr></thead><tbody>';
                table += "<tr><td colspan='4' align='center'>Data Patok Belum Ada</td></tr>";
                table += '</tbody></table>';
            }else{
                var no = 1;
                table = '<table width="100%" class="table table-striped table-bordered table-hover"><thead><tr align="center"><td>No.</td><td>Latitude</td><td>Longitude</td><td>#</td></tr></thead><tbody>';
               for (let i = 0; i < data.length; i++) {
                   const id = data[i]['id'];
                   const lat = data[i]['lat'];
                   const lng = data[i]['lng'];
                   patok.push(new google.maps.LatLng(parseFloat(lat),parseFloat(lng)));
                   table += "<tr align='center'><td>"+no+"</td><td>"+lat+"</td><td>"+lng+"</td><td><button class='btn btn-xs btn-danger' onclick='hapus_patok_pemutihan("+id+")'><i class='fa fa-trash'></i></td></tr>";                  
                   no++;
               }   
               table += '</tbody></table>';            
            initialize();            
            }
            $("div#tb").html(table);
        }
    });
}

function hapus_patok_pemutihan(id) {
    // alert('Hapus Patok' + id);
    event.preventDefault();
  swal({
    title: 'Apa Anda Ingin Menghapus Data Patok ?',
    text: "Hapus Data Patok Secara Permanen",
    type: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Hapus Patok!'
  }, function isConfirm() {
    $.ajax({
      url: baseUrl + 'delete/koordinat/' + id,
      type: "POST",
      success: function (data) {
        swal('Selamat !', 'Berhasil Menghapus Data Koordinat di Sistem!', 'success');
        datapatok(link);
        initialize();
        // console.log("LINK : "+link);
        // location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
      }

    });
  });
}

function buka_input_patok_form(){
    $("#patok-input").hide();
    $("#input_patok_form").show();
}


function buka_push_form()
{
   $('#push_data').modal('show');    
}

function save_push() {
    event.preventDefault();
    var url = "<?php echo base_url('push/pemutihan'); ?>";
    $.ajax({
        url:url,
        type: "POST",
        dataType: "JSON",
        data: $('#push_form').serialize(),
        success:function (params) {
            location.reload();
        }
    });
    
}


function verifikasi_pemutihan(){
    $("#verifikasi_pemutihan_modal").modal('show');  
}

function save_verifikasi_pemutihan(){
    alert("Simpan Data");
}


function input_patok_pemutihan() {
    // $('#input_data_patok').submit(function (evt) {    
    // evt.preventDefault();
    // var formData = new FormData($(this)[0]);
    var url = "<?php echo base_url('pemutihan/titik_koordinat'); ?>";
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: $('#input_data_patok').serialize(),
    //   data: formData,
    //   async: false,
    //   cache: false,
    //   contentType: false,
    //   enctype: 'multipart/form-data',
    //   processData: false,
      success: function (data) {    
        console.log(data.data.id_data_link);  
        initialize();   
        datapatok(data.data.id_data_link);
        swal('Selamat !', 'Berhasil Input Data Koordinat Ke Sistem!', 'success');
        $('[name="lat"]').val('');
        $('[name="lng"]').val('');
        $('[name="patok"]').val('');
        $('[name="utara"]').val('');
        $('[name="selatan"]').val('');
        $('[name="timur"]').val('');
        $('[name="barat"]').val('');
        // location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
      }
    });
//   });
}


function initialize() {
   var map = new google.maps.Map(document.getElementById('map-view'), {
    zoom: 18,
    center: titik_tengah,
    mapTypeId: 'terrain',
    mapTypeControl: true,
          mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
              position: google.maps.ControlPosition.TOP_CENTER
          },
          zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.LEFT_CENTER
          },
          scaleControl: true,
          streetViewControl: true,
          streetViewControlOptions: {
              position: google.maps.ControlPosition.LEFT_TOP
          },
          fullscreenControl: true
  });

    const mapIcon = 'https://si-desa.id/assets/house-icon.png';
    const marker = new google.maps.Marker({
            position: titik_tengah,
            icon: mapIcon,
            map: map
    });

    var polygon = new google.maps.Polygon({
        paths: patok,
        strokeColor:'#000000',
        strokeOpacity: 1,
        strokeWeight: 3,
        fillColor:'#DDD000',
        fillOpacity: 0.3,
    });
    polygon.setMap(map);
}
</script>