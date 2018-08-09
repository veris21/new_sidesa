<script type="text/javascript" src="<?php echo base_url().V2;?>js/jquery.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-6">        
            <div id="jenisKelamin" style="width:100%; height:400px;"></div>
        </div>
        <div class="col-md-6">        
            <div id="pendidikan" style="width:100%; height:400px;"></div>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12">
        <div id="pekerjaan" style="width:100%; height:400px;"></div>
        </div>
    </div>
</div>





<script>
var urlSex       = '<?php echo base_url(); ?>api/stream/penduduk/jenis_kelamin';
var urlPddk      = '<?php echo base_url(); ?>api/stream/penduduk/pendidikan';
var urlPekerjaan = '<?php echo base_url(); ?>api/stream/penduduk/pekerjaan';
var urlUmur      = '<?php echo base_url(); ?>api/stream/penduduk/kelompok_umur';

var sexData         = [];
var pddkData        = [];
var kelompokUmur    = [];
var pekerjaanData   = [];

$.ajax({
      url: urlSex,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        for (const i in data) {
            sexData.push({"name":data[i]['jenis_kelamin'],"y": parseFloat(data[i]['total']) });
        }
        console.log(sexData);
        showChartSex(sexData);
    }
});

$.ajax({
      url: urlPddk,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        for (const i in data) {
            pddkData.push({"name":data[i]['pddk_akhir'],"y": parseFloat(data[i]['total']) });
        }
        console.log(pddkData);
        showChartpddk(pddkData);
    }
});

$.ajax({
      url: urlPekerjaan,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        for (const i in data) {
            pekerjaanData.push({"name":data[i]['pekerjaan'],"y": parseFloat(data[i]['total']) });
        }
        console.log(pekerjaanData);
        showChartPekerjaan(pekerjaanData);
    }
});

function showChartPekerjaan(pekerjaanData) {
    Highcharts.chart('pekerjaan', {
                chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Penduduk berdasarkan Jenis Pekerjaan'
            },
            tooltip: {
                pointFormat: '<b> {point.y} orang ( {point.percentage:.1f}% )</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> <br>  {point.y} orang ( {point.percentage:.1f} % )',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Jenis Pekerjaan',
                colorByPoint: true,
                data: pekerjaanData                
            }]
        });
}


function showChartSex(sexData){
Highcharts.chart('jenisKelamin', {
                chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Penduduk berdasarkan Jenis Kelamin'
            },
            tooltip: {
                pointFormat: '<b> {point.y} orang ( {point.percentage:.1f}% )</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> <br>  {point.y} orang ( {point.percentage:.1f} % )',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Jenis Kelamin',
                colorByPoint: true,
                data: sexData                
            }]
        });
}


function showChartpddk(pddkData) {
    Highcharts.chart('pendidikan', {
                chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Penduduk berdasarkan Tingkat Pendidikan'
            },
            tooltip: {
                pointFormat: '<b> {point.y} orang ( {point.percentage:.1f}% )</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> <br>  {point.y} orang ( {point.percentage:.1f} % )',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Klasifikasi Pendidikan',
                colorByPoint: true,
                data: pddkData                
            }]
        });
}

</script>