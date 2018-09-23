<div class="container"  style="paliing:8px;">
<!--  -->
<?php if ($data != null || $data !='') { ?>
<!--  -->
<div class="row">        
        <div class="col-md-12">
            <h1 class="text-center">                       
                <button class="btn-lg btn-success btn-block">Data Surat Tanah Valid <i class="fa fa-check"></i></button>
            </h1>
        </div>
</div>
<div class="row" style="color:black;">        
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    Detail Pemilik Surat
                </div>
                <div class="box-body">
                    <b>Nama </b>
                    <li><?php echo $data['nama'];?></li>
                    <br>
                    <b>N I K </b>
                    <li><?php echo $data['no_nik'];?></li>
                    <br>
                    <b>Alamat Pemilik </b>
                    <li><?php echo $data['alamat'];?></li>
                    <br>
                    <b>Lokasi Tanah </b>
                    <li><?php echo $data['lokasi'].", Dusun ".$data['nama_dusun'].", Desa ".$data['nama_desa'].", Kecamatan ".$data['nama_kecamatan'];?></li>
                    <br>
                    <b>Status Surat </b>
                    <li>Surat Keterangan <?php echo $type = ($data['type']==1?'Tanah':'Rekomendasi');?></li>
                    <br>
                    <b>Nomor Surat </b>
                    <li><b><?php echo "181/".$data['id']."-".$type."/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);?></b></li>
                    <br>
                    <b>Tanggal Surat </b>
                    <li><b><?php echo mdate("%d",$data['time'])." ".bulan(mdate("%m",$data['time']))." ".mdate("%Y",$data['time']);?></b></li>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    Layout Tanah
                </div>
                <div class="box-body">
                    <!-- <div style="height:480px" id="map-canvas"></div> -->
                    <img width="100%" src="<?php echo base_url().POLYGON.$data['peta'];?>" alt="CANVAS PETA" class="img img-rounded">
                </div>
                <div class="box-footer">
                <h5>Lokasi Koordinat Tanah <?php echo " Lat : ".$koordinat['lat'] ." Lng :  ". $koordinat['lng']; ?></h5>
                <h5>Patok Tanah </h5>
                <?php
                    $no = 1;
                    foreach($patok->result() as $titik){
                    echo "<ol>".$no." Lat : ".$titik->lat." Lng : ".$titik->lng;
                    ?>
                    <a target="__blank" href='https://www.google.com/maps/search/?api=1&query=
                    <?php 
                    echo $titik->lat.",".$titik->lng;
                    ?>' class="btn btn-sm btn-flat btn-warning pull-right"><i class="fa fa-eye"></i></a>
                    <?php
                    echo " </ol><hr> ";
                    $no++;
                    }
                 ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div id="googleMap" style="width:100%;height:800px;"></div>
                </div>
                <div class="box-footer">
                <!-- <button class="btn btn-primary" onClick="tunjukkanPeta(<?php echo $koordinat['lat'].','.$koordinat['lng'] ?>)">Tampilkan Data Peta dan Lokasi</button> -->
                <a target="__blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $koordinat['lat'].','.$koordinat['lng']; ?>" class="btn btn-primary">Tampilkan Data Peta dan Lokasi</a>
                </div>
            </div>
        </div>
</div>
<!--  -->
<?php }else{ ?>
<!--  -->
<div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body">
                    <h1 class="text-center">                       
                        <button class="btn-lg btn-danger btn-block">Data Anda Tidak Ditemukan di Sistem ! <i class="fa fa-ban"></i></button>
                    </h1> 
                </div>
                <div class="box-footer">
                    <a href="<?php echo base_url('public');?>"> Lihat Lebih Banyak Terkait Tanah !!!</a>
                </div>
            </div>
        </div>
</div>
<!--  -->
<?php } ?>
<!--  -->
</div>