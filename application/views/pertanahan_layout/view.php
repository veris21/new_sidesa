<section class="content-header">
  <h1>
    Data Pertanahan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
  <div class="box box-warning">
    <div class="box-header">
      Masukkan <b>NIK</b> atau <b>Nama Lengkap </b>untuk mencari data keterangan tanah di database
    </div>
    <div class="box-body">
      <div class="form-group">
        <input type="text" class="form-control" name="cari_tanah_skt" id="cari_tanah_skt" onkeyup="cari_data_skt()" value="">
      </div>
    </div>
  </div>
  <center id="loader-icon" style="display:none;">
    <img width="50%" class="img img-responsive" src="<?php echo base_url('assets/nyapu.gif');?>" />
  </center>
  <div id="data_kosong" class="alert alert-danger" hidden>
    <h3 class="text-center"><i class="icon fa fa-ban"></i>Data Tidak Ditemukan !!</h3>
  </div>
  <div id="result_cari_data" class="box box-info" hidden>
    <div class="box-body">
      <table class="table table-bordered" id="details_nik">
        <tr>
          <td colspan="5" align="center">
            <h3 id="no_kk"></h3>
            <h4 id="no_nik"></h4>
          </td>
        </tr>
        <tr>
          <td align="right">Nama Lengkap</td>
          <td>: <b id="nama"></b><td>
          <td align="right">Pendidikan Terakhir</td>
          <td>: <b id="pddk_akhir"></b><td>
        </tr>
        <tr>
          <td align="right">TTL</td>
          <td>: <b id="ttl"></b><td>
          <td align="right">Status Dalam Keluarga</td>
          <td>: <b id="shdk"></b><td>
        </tr>
        <tr>
          <td align="right">Agama</td>
          <td>: <b id="agama"></b><td>
          <td align="right">Pekerjaan</td>
          <td>: <b id="pekerjaan"></b><td>
        </tr>
        <tr>
          <td align="right">Status Perkawinan</td>
          <td>: <b id="status"></b><td>
          <td align="right">Jumlah Anggota Keluarga</td>
          <td>: <b id="shdrt"></b><td>
        </tr>
        <tr>
          <td align="right">Alamat</td>
          <td>: <b id="alamat"></b><td>
          <td align="right">Dusun</td>
          <td>: <b id="dusun"></b><td>
        </tr>
        <tr>
          <td align="right">Desa</td>
          <td>: <b></b><td>
          <td align="right">RT</td>
          <td>: <b id="no_rt"></b><td>
        </tr>
      </table>
    </div>
  </div>

</section>
