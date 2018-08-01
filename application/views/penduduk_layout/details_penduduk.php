<section class="content-header">
  <h1>
    Details Data Penduduk
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Penduduk</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header" style="text-align:center;">
                    <h1 class="box-title" >
                        Kartu Keluarga<br>
                        No. <b><?php echo $data['no_kk']; ?></b>
                    </h1>
                </div>

                <div class="box-body">
                    <table width="100%" class="table table-borderless">
                        <tr>
                        <td>NAMA</td>
                        <td>: <b><?php echo $data['nama']; ?></b></td>
                        <td>NIK</td>
                        <td>: <b><?php echo $data['no_nik']; ?></b></td>
                        </tr>

                                                <tr>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>: <b><?php echo $data['tempat_lahir']; ?>, <?php $tgl = explode("/", $data['tanggal_lahir']) ; echo $tgl[1]."-".$tgl[0]."-".$tgl[2]; ?></b></td>
                        <td>Alamat</td>
                        <td>: <b><?php echo $data['alamat']; ?></b></td>
                        </tr>


                        <tr>
                        <td>Jenis Kelamin</td>
                        <td>: <b><?php echo $data['jenis_kelamin']; ?></b></td>
                        <td>Status Perkawinan</td>
                        <td>: <b><?php echo $data['status']; ?></b></td>
                        </tr>


                        <tr>
                        <td>NAMA</td>
                        <td>: <b><?php echo $data['nama']; ?></b></td>
                        <td>NIK</td>
                        <td>: <b><?php echo $data['no_nik']; ?></b></td>
                        </tr>


                        <tr>
                        <td>NAMA</td>
                        <td>: <b><?php echo $data['nama']; ?></b></td>
                        <td>NIK</td>
                        <td>: <b><?php echo $data['no_nik']; ?></b></td>
                        </tr>


                        <tr>
                        <td>NAMA</td>
                        <td>: <b><?php echo $data['nama']; ?></b></td>
                        <td>NIK</td>
                        <td>: <b><?php echo $data['no_nik']; ?></b></td>
                        </tr>


                        <tr>
                        <td>NAMA</td>
                        <td>: <b><?php echo $data['nama']; ?></b></td>
                        <td>NIK</td>
                        <td>: <b><?php echo $data['no_nik']; ?></b></td>
                        </tr>


                        <tr>
                        <td>NAMA</td>
                        <td>: <b><?php echo $data['nama']; ?></b></td>
                        <td>NIK</td>
                        <td>: <b><?php echo $data['no_nik']; ?></b></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</section>