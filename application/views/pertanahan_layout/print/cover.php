<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cover</title>
	<!-- -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/print.css' ?>">
	<!-- -->
   
</head>
<body id="logo-back" style="border-style:double;
    background-image: url('<?php echo base_url().'assets/logo-beltim.png'; ?>');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 50% 50%;
    background-size: 25% 25%;
    opacity: 0.1;
    filter: alpha(opacity=10); 
     ">
<div id="cover">
  <table>
    <tr>
      <td align="center"  style="padding-bottom:0;margin-bottom:0;">
				<img src="<?php echo base_url().'assets/logo-beltim.png'; ?>" alt="Logo" width="80" >
			</td>
      <td colspan="7" align="center" class="header-surat"  style="padding-bottom:0;margin-bottom:0;">
        <h2 style="padding-bottom:0;margin-bottom:0;">
          PEMERINTAH KABUPATEN <?php echo strtoupper($data['nama_kabupaten']); ?> <br>
          KECAMATAN <?php echo strtoupper($data['nama_kecamatan']); ?><br>
          KANTOR KEPALA DESA <?php echo strtoupper($data['nama_desa']); ?>
        </h2>
				<p style="padding-bottom:0;margin-bottom:0;">Alamat Kantor: <?php echo $data['alamat_desa']; ?></p>
      </td>
    </tr>
		<tr>
			<td colspan="8"><hr style="padding-top:0;margin-top:0;padding-bottom:0;margin-bottom:0;"></td>
		</tr>

  </table>
  <table style="padding-top:200px;padding-bottom:200px;">
  </table>


  <table>
        <tr rowspan="8" valign="center">
            <td colspan="4"  align="center">
        <h2 style="padding-bottom:0;margin-bottom:0;"><u>SURAT KETERANGAN <?php echo $type = ($data['type']==1 ? 'TANAH' : 'REKOMENDASI'); ?> </u><br>
        Nomor :
        <i style="font-weight: lighter;font-family: Consolas, Monaco, Courier New, Courier, monospace;"> 
        <?php 
        // echo "181/".$data['id']."-".$type."/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);
        echo $data['id']."/".$typeSurat = ($data['type']==1 ? 'SKT' : 'REKOMENDASI')."/".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);
        ?>
        </i>
        </h2>
            </td>
        </tr>
</table> 
<table style="padding-top:220px;padding-bottom:200px;">
</table>
<table style="font-size: 14px; font-weight:bold; padding:8px;">
        <tr>
        <td valign="top"> Nama
        </td>      
        <td valign="top">:</td>
        <td colspan="6" valign="top">
            <?php echo $data['nama'];?>
        </td>          
        </tr>
        <tr>
        <td colspan="8"><br></td>
        </tr>
        <tr>
        <td valign="top"> Lokasi
        </td>   
        <td valign="top">:</td>   
        <td colspan="6" valign="top">
        <?php echo $data['lokasi'];?> <?php echo "Dusun ".$data['nama_dusun']." Desa ".$data['nama_desa']." Kecamatan ".$data['nama_kecamatan']." Kabupaten ".$data['nama_kabupaten'];?>
        </td>          
        </tr>
        <tr>
        <td colspan="7"><br></td>
        </tr>
        <tr>
            <td colspan="8">
                <hr style="padding-top:0;margin-top:0;padding-bottom:0;margin-bottom:0;">
                <hr style="padding-top:0;margin-top:0;padding-bottom:0;margin-bottom:0;">
            </td>
        </tr>
</table>
<table style="padding-top:24px;padding-bottom:14px;">
</table>
</div>
</body>
</html>