<section class="content-header">
<h1>
  Master Data Koordinat Tanah
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Input Data Koordinat Tanah</li>
</ol>
</section>
<section class="content">
<div class="box box-info">
    <div class="box-header">
    <?php 
        switch ($this->session->userdata('jabatan')) {
        
        case 'ROOT':
        echo form_open_multipart('', array('id'=>'import'));
    ?>
    <div class="box-footer">
        <div class="form-group">
           <div class="btn btn-default btn-file">
            <i class="fa fa-paperclip"></i> Attachment .xls|.xlsx 
            <input id="import_xls" type="file" name="import_xls">
           </div>
        </div>
        <center id="loader-icon" style="display:none;">
            <img width="50%" class="img img-responsive" src="<?php echo base_url('assets/nyapu.gif');?>" />
        </center>
        <button type="submit" name="upload" class="btn btn-sm btn-flat btn-warning btn-block">Import Excel <i class="fa fa-excel-o"></i> </button>
      </div>
    <?php 
    echo form_close();
        break;
    default:
        ?> 
    <h3 class="box-title">Apa Anda ingin menginput Data Penduduk Baru ?</h3>       
    <button class="btn btn-sm btn-flat btn-success" onclick="input_koordinat_tengah()" >Iya, Input Data <i class="fa fa-plus"></i></button>
        <?php
        break;
        
    }
    ?>
    </div>
    <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="master_koordinat_tengah">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
            <td>Nama/ NIK</td>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>Dokumentasi</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
            <?php             
            // if($data!= '' || $data !=null){
            foreach ($data as $koor) {
            echo "<tr>";
            echo "<td>a/n. : ".$koor->nama." /No NIK.".$koor->nik."</td>";
            echo "<td>".$koor->latitude."</td>";
            echo "<td>".$koor->longitude."</td>";
            echo "<td align='center'><img width='70' class='img img-thumbnail img-rounded' src='".base_url().PATOK.$koor->dokumentasi."' /></td>";
            echo "<td></td>";
            echo "</tr>";
            } 
            // }else{
            //     echo "<tr>";
            //     echo "<td colspan='6' align='center'><h3>Data Yang Matching Kosong !!</h3></td>";
            //     echo "</tr>";
            // }
             ?>
        </tbody>
        </table>
    </div>
</div>

<hr>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Semua Koordinat Tersimpan</h3>
    </div>
    <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="master_koordinat_tengah_all">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
            <td>No. NIK</td>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>Dokumentasi</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
            <?php             
            // if($data!= '' || $data !=null){
            foreach ($dataAll as $data) {
            echo "<tr>";
            echo "<td>No NIK.".$data->nik."</td>";
            echo "<td>".$data->latitude."</td>";
            echo "<td>".$data->longitude."</td>";
            echo "<td align='center'><img width='70' class='img img-thumbnail img-rounded' src='".base_url().PATOK.$data->dokumentasi."' /></td>";
            echo "<td></td>";
            echo "</tr>";
            } 
            // }else{
            //     echo "<tr>";
            //     echo "<td colspan='6' align='center'><h3>Data Yang Matching Kosong !!</h3></td>";
            //     echo "</tr>";
            // }
             ?>
        </tbody>
        </table>
    </div>
</div>
</section>


