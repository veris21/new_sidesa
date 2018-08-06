<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cover</title>
	<!-- -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/print.css' ?>">
	<!-- -->
   
</head>
<body id="logo-back">
<div id="container" class="cover">
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
  <table style="padding-top:250px ;margin-top:250px; padding-bottom:250px;margin-bottom:250px;">
  </table>


  <table>
        <tr rowspan="8" valign="center">
            <td colspan="4"  align="center">
        <h3 style="padding-bottom:0;margin-bottom:0;"><u>SURAT KETERANGAN <?php echo $type = ($data['type']==1 ? 'TANAH' : 'REKOMENDASI'); ?> </u><br>
        Nomor :<i style="font-weight: lighter;font-family: Consolas, Monaco, Courier New, Courier, monospace;"> <?php echo "181/".$data['id']."-".$type."/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);?></i></h3>
            </td>
        </tr>
</table> 
<table height="360px">
</table>

<table>
        <tr>
        <td> Nama
        </td>      
        <td colspan="7"> : 
            <?php echo $data['nama'];?>
        </td>          
        </tr>
        <tr>
        <td> Lokasi
        </td>      
        <td colspan="7"> : 
        <?php echo $data['lokasi'];?> <?php echo "Dusun ".$data['nama_dusun']." Desa ".$data['nama_desa']." Kecamatan ".$data['nama_kecamatan']." Kabupaten ".$data['nama_kabupaten'];?>
        </td>          
        </tr>

        <tr>
            <td colspan="8"><hr style="padding-top:0;margin-top:0;padding-bottom:0;margin-bottom:0;"></td>
        </tr>
</table>
</div>
</body>
</html>