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
</div>





<script>
var urlSex       = '<?php echo base_url(); ?>api/stream/penduduk/jenis_kelamin';
var urlPddk      = '<?php echo base_url(); ?>api/stream/penduduk/pendidikan';
var sexData       = [];
var pddkData      = [];

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

function showChartSex(sexData){
Highcharts.chart('jenisKelamin', {
                chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Grafik Kependudukan Berdasarkan Jenis Kelamin'
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



$.ajax({
      url: urlPddk,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        for (const i in data) {
            pddkData.push({"name":data[i]['pddk'],"y": parseFloat(data[i]['total']) });
        }
        console.log(pddkData);
        showChartpddk(pddkData);
    }
});

function showChartpddk(pddkData) {
    console.log(pddkData);
}

</script>