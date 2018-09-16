<section class="content-header">
  <h1>
    Data History Akses System
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">HIstory Akses Sistem</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-warning">
                <div class="box-header">
                    List Akses System
                </div>
                <div class="box-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="list_history_system">
                    <thead>
                        <tr valign="center" align="center">
                            <td>UID Log</td>
                            <td>IP ADDRESS</td>
                            <td>Location</td>
                            <td>Timestamp</td>                       
                            
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key) {
                        ?>
                        <tr valign="center">
                            <td><?php echo $key->id; ?></td>    
                            <td ><?php echo $key->ip_address; ?></td>                        
                            <td>
                            <?php 
                            $ip = $key->ip_address;
                            // $details = file_get_contents("http://api.hostip.info/country.php?ip=".$ip);
                            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
                            // $details = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));
                            echo $details->city; 
                            // echo $details;
                            ?>
                            </td>
                            <td align="center"><?php echo mdate('%d %M %Y - %h:%i %a',$key->timestamp); ?></td>                        
                            <td width="120" align="center">
                                <button type="button" class="btn btn-xs btn-flat btn-warning" onclick="view_blob(<?php echo $key->ip_address; ?>)" ><i class="fa fa-eye"></i></button>
                            </td>                        
                        </tr>
                        <?php } ?>
                    </tbody>                    
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-warning"  >
                <div class="box-header">
                    <h5 class="box-title">Details Log</h5>
                </div>
                <div class="box-body">
                    <p id="blob"></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function view_blob(data) {
    // $.get('')
    $('#blob').text("IP : "+data);
}
</script>