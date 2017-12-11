<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{url('../bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('../assets/font-awesome/css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{url('/assets/font-awesome/css/font-awesome.min.css')}}">
	<script src="{{url('/assets/js/jQuery-2.1.4.min.js')}}"></script>
	<script src="{{url('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>

	<table class="table table-striped table-bordered">
		<thead>
			<tr style="background:#E0E0E0;">
				<th>TANGGAL</th>
				<th>TRANSAKSI</th>
				<th>KETERANGAN</th>
				<th></th>
				<th>STATUS</th>
			</tr>
		</thead>
		<tfoot>
			<tr style="background:#E0E0E0;">
				<th>TANGGAL</th>
				<th>TRANSAKSI</th>
				<th>KETERANGAN</th>
				<th></th>
				<th>STATUS</th>
			</tr>
		</tfoot>
		<tbody id="tabel_posting">
			@foreach($data as $row)
			<tr>
				<td>{{$row->tgl_transaksi}}</td>
				<td>{{$row->nama_transaksi}}</td>
				<td>{{$row->nama_transaksi}} tanggal {{$row->tgl_transaksi}}</td>
				<td></td>
				<td>{{$row->status_posting}}</td>
			</tr>
			@endForeach
		</tbody>
	</table>
	{{$data->links()}}
	<script>
		function yesCetak(id){
			window.parent.$('#cetak').modal({
				show : 'true'
			});	
			window.parent.$('#cetakGelangku').attr('href',"{{url('CETAK/cetakGelang/')}}/"+id);
			window.parent.$('#cetakAntrianku').attr('href',"{{url('CETAK/cetakAntrian/')}}/"+id);
		}

		function setMyPendaf(id){
			window.parent.$('#editPendaftaran').modal({
				show : 'true'
			});
			window.parent.setIsi(id);
		}
		function dataPasien(){
			var view_url = "{{url('G/RWINAP/pasienRWinap')}}";
			$.getJSON(view_url,function(result){
				$("#pasienRWinap").empty();
				result.forEach(function(r){
					$("#pasienRWinap").append("<tr><td>"+r['id_detail_pendaftaran']+"</td><td>"+r['no_rm']+"</td><td>"+r['namapasien']+"</td><td>"+r['umur']+"</td><td>"+r['nama_kelas']+"</td><td>"+r['nama_ruang']+"</td><td>"+r['nama']+"</td></tr>");
				});
			});
		}
	</script>
</body>
</html>

