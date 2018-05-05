function filter_data(){
	console.log('di submit'+ $('[name="desa"]').val() + 'Lokasi ' + $('[name="lokasi"]').val() + 'Kategori Surat ' + $('[name="status"]').val() + 'NIK : '+ $('[name="nik"]').val());
}

function refresh(){
	location.reload();
}

function buka_dusun() {
	var desa = $('[name="desa"]').val();
	$.ajax({
		url: baseUrl + 'get/dusun/' + desa,
		type: "GET",
		dataType: "JSON",
		success: function (desa) {
			if (desa.status == true) {
				$('#cariDesa').hide();
				$('#dusun').show();
				$('[name="dusun"]').html(desa.hasil);
				console.log(desa.hasil);
			} else {
				console.log(desa);
			}
		}
	});	
	// $('#cariDesa').hide();
	// $('#dusun').show();

}

function buka_nik() {
	$('#cariDesa').hide();
	$('#cariDusun').hide();
	$('#nama_or_nik').show();
}

function cari_desa(){
	var desa = $('[name="desa"]').val();
	console.log("CARI DESA => " + desa);
}

function cari_dusun() {
	var desa = $('[name="desa"]').val();
	var dusun = $('[name="dusun"]').val();
	console.log("CARI DESA => "+desa+" DUSUN => " + dusun);
}


function cari_data() {
	var search = $('[name="nikData"]').val();
	if (search != '') {
		$('#btnCari').show();
	}
}

function cari_nik() {
	var desa = $('[name="desa"]').val();
	var dusun = $('[name="dusun"]').val();
	var search = $('[name="nikData"]').val();
	console.log("DESA => "+desa+" DUSUN => "+dusun+" NIK/Nama => "+search);
}