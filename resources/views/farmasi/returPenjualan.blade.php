<!DOCTYPE html>
<html>


<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Retur Penjualan</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
          @endforeach
        </div> <!-- end .flash-message -->
        
        <br>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Penjualan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

              <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahReturPenjualan" id=""> <i class="glyphicon glyphicon-plus"></i> Tambah Retur Penjualan</a>

              <br>
              <hr>
              <table id="returpenjualan" class="table table-striped table-bordered" cellspacing="0">
                <thead>
                  <tr class="bg-info">
                    <th>No</th>
                    <th>No Retur</th>
                    <th>No Faktur</th>
                    <th>Nama Cust.</th>
                    <th>Tgl Retur</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                    <th style="width:100px;">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>No</th>
                   <th>No Retur</th>
                   <th>No Faktur</th>
                   <th>Nama Cust.</th>
                   <th>Tgl Retur</th>
                   <th>Keterangan</th>
                   <th>Total</th>
                   <th style="width:100px;">Aksi</th>
                 </tr>
               </tfoot>
               <tbody>
                <?php $no = 1; ?>
                @foreach($data as $pen)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$pen->id_retur_pen}}</td>
                  <td>{{$pen->id_penjualan_barang}}</td>
                  <td>{{$pen->pen->kat_pembeli}}</td>
                  <td>{{$pen->tanggal_retur}}</td>
                  <td>{{$pen->keterangan}}</td>
                  <td>{{number_format($pen->netto,0,".",".")}}</td>
                  <td>                          
                   @if($pen->netto == null)         
                   <a href="{{url('/FARMASI/returPenjualan/detailReturPenjualan')}}/{{$pen->id_retur_pen}}" data-toggle="tooltip" title="Retur Penjualan"><button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button></a>
                   <a href="{{url('/FARMASI/hapusMasterReturPenjualan')}}/{{$pen->id_retur_pen}}" data-toggle="tooltip" title="Hapus Retur Penjualan" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                   @else
                   <a href="{{url('/FARMASI/returPenjualan/detailReturPenjualan')}}/{{$pen->id_retur_pen}}"><button type="button" class="btn btn-success">Transaksi Selesai</button></a>
                   @endif
                 </td>
               </tr>
               @endforeach
             </div>
           </tbody>
         </table>
       </div>
     </div>

   </div><!--end .card-body -->
 </div>
</div>
</div>
@extends('farmasi.mod_tambahMasterReturPenjualan')
<script>
  function setPenjualan(){
    nopem = document.getElementById('no_entri_penjualan').value;
    url = "{{url('G/FARMASI/returObatPen')}}"+"/"+nopem;
    $.getJSON(url, function(result){
      console.log(result);
      if (result.length > 0) {
        $('#nama_customer').val(result[0]['kat_pembeli']);
        $('#tgl_penjualan').val(result[0]['tanggal_penjualan']);
        $('#id_penjualan').val(result[0]['id_penjualan_barang']); 
        $('#no_resep').val(result[0]['id_resep']); 
        $('#tgl_resep').val(result[0]['tanggal_resep']);
        $('#nama_dokter').val(result[0]['nama_dokter']); 
        $('#nama_pasien').val(result[0]['nama_pasien']); 
      }else{
        alert("Data Tidak Ditemukan");
        $('#id_cust').val('');
        $('#nama_customer').val('');
        $('#tgl_penjualan').val('');
        $('#id_penjualan').val('');
        $('#no_resep').val(''); 
        $('#tgl_resep').val('');
        $('#nama_dokter').val(''); 
        $('#nama_pasien').val(''); 
      }
    });
    url1 = "{{url('G/FARMASI/returObatPen1')}}"+"/"+nopem;
    nomor = 0;
    $.getJSON(url1,function(result){
      console.log(result);
      no = 0;
      subtotal = 0;
      $("#isiTablePenjualan").empty();
      result.forEach(function(r){
        no++;
        data = "";
        data = data+"<tr  style='font-size: 13px;'>";
        data = data+"<td>"+no+"</td>";
        data = data+"<td>"+r.id_barang+"</td>";
        data = data+"<td>"+r.nama_barang+"</td>";
        data = data+"<td>"+r.satuan+"</td>";
        data = data+"<td>"+r.jumlah+"</td>";
        data = data+"<td>"+r.harga+"</td>";
        data = data+"<td>"+r.biaya_racik+"</td>";
        data = data+"<td>"+r.biaya_resep+"</td>";
        data = data+"<td>"+r.diskon_rp+"</td>";
        data = data+"<td>"+r.diskon_rp1+"</td>";
        data = data+"<td>"+r.diskon_rp2+"</td>";
        data = data+"<td>"+r.sub_total+"</td>";
        subtotal += parseFloat(r.sub_total);
        $('#isiTablePenjualan').append(data);
      });
      document.getElementById("total").value = subtotal; 
    });
  }
</script>
@endsection
</body>
</html>