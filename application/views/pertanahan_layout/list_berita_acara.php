<section class="content-header">
  <h1>
    Data Berita Acara Pemeriksaan Pertanahan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Berita Acara</li>
  </ol>
</section>
<section class="content">
  <div class="box box-warning">
    <div class="box-body">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#berita_acara" data-toggle="tab">Berita Acara Pemeriksaan</a></li>
          <li><a href="#berita_acara_pemutihan" data-toggle="tab">Berita Acara Pemutihan</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="berita_acara">
            
    <table width="100%" class="table table-striped table-bordered table-hover" id="list_bap">
        <thead>
            <tr align="center">
                <th>Tanggal BAP</th>                
                <th>Nomor BAP</th>
                <th>Pemohon</th>
                <th>Pemeriksa</th>
                <th width="20">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr align="center">
                <th>Tanggal BAP</th>                
                <th>Nomor BAP</th>
                <th>Pemohon</th>
                <th>Pemeriksa</th>
                <th width"20">Action</th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
        foreach($bap_data as $data){
            $pemeriksa_1 = $this->auth_model->get_user_id($data->pemeriksa_1)->row_array();
            $pemeriksa_2 = $this->auth_model->get_user_id($data->pemeriksa_2)->row_array();
            $pemeriksa_3 = $this->auth_model->get_user_id($data->pemeriksa_3)->row_array();
            $pemeriksa_4 = $this->auth_model->get_user_id($data->pemeriksa_4)->row_array();
            $pemeriksa_5 = $this->auth_model->get_user_id($data->pemeriksa_5)->row_array();
            echo "<tr>";           
            echo "<td>".mdate("%d %M %Y",$data->time_input)."</td>";
            echo "<td>181/".$data->id."-BAP/KTD.".strtoupper($data->nama_desa)."/".romawi(mdate("%m",$data->time_input))."/".mdate("%Y",$data->time_input)."</td>";
            echo "<td>a/n. ".$data->nama." <br> Lokasi : ".$data->lokasi."<br> Luas : &plusmn; ".$data->luas." m<sup>2</sup></td>";
            echo "<td> Ketua Tim : <b>".$pemeriksa_1['fullname']."</b><br>
            Anggota : <b>".$pemeriksa_2['fullname']."</b>, 
            <b>".$pemeriksa_3['fullname']."</b>, 
            <b>".$pemeriksa_4['fullname']."</b>, 
            <b>".$pemeriksa_5['fullname']."</b>
            </td>";
            echo "<td align='center'>".anchor('berita_acara/view/'.$data->time_input, 'Details <i class="fa fa-eye"></i>' , array('class'=>'btn btn-success btn-xs btn-flat'))."</td>";
            echo "</tr>";
        }
            ?>
        </tbody>
    </table>
    <!-- ====== -->
    </div>
            <!-- ======= -->
    <div class="tab-pane" id="berita_acara_pemutihan">
    <table width="100%" class="table table-striped table-bordered table-hover" id="list_pemutihan">
        <thead>
            <tr align="center">
                <th>Tanggal Pemutihan</th>                
                <th>Nomor Berita Acara</th>
                <th>Pemohon</th>
                <th>Pemeriksa</th>
                <th width="20">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr align="center">
                <th>Tanggal Pemutihan</th>                
                <th>Nomor Berita Acara</th>
                <th>Pemohon</th>
                <th>Pemeriksa</th>
                <th width="20">Action</th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
        foreach ($list_pemutihan as $pemutihan) {        
        ?>
          <tr align='center'>
            <td><?php echo $pemutihan->tanggal_verifikasi; ?></td>
            <td><?php echo $pemutihan->id; ?></td>
            <td><?php echo $pemutihan->tanah_atas_nama; ?></td>
            <td><?php echo $pemutihan->verified_by; ?></td>
            <td><button class='btn btn-xs btn-success' > <i class="fa fa-eye"></i> </button></td>
          </tr>
          <?php } ?>
        </tbody>
        </table>
        
    </div>
        </div>
    </div>
    </div> 
  </div>
</section>