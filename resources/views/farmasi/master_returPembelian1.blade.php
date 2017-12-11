<!DOCTYPE html>
<html>
@extends('attr.footer')
@extends('farmasi.head')


@extends('attr.header')

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
          <li class="">Dashboard</li>
          <li class="active">Master Retur Pembelian</li>
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
              <h3 class="box-title">Data Master Retur Pembelian</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
              <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahReturPembelian" id=""> <i class="glyphicon glyphicon-plus"></i> Tambah Retur Pembelian</a>
              <br>
              <br>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>No</th>
                  <th>No Entri</th>
                  <th>No Retur</th>
                  <th style="width:150px;"">Supplier</th>
                  <th style="width:150px;">Tanggal</th>
                  <th>Keterangan</th>
                  <th>Total</th>
                  <th style="width:100px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                 <th>No</th>
                 <th>No Entri</th>
                 <th>No Retur</th>
                 <th style="width:150px;">Supplier</th>
                 <th style="width:150px;">Tanggal</th>
                 <th>Keterangan</th>
                 <th>Total</th>
                 <th style="width:100px;">Aksi</th>
               </tr>
             </tfoot>
             <tbody>
              <?php $no = 1; ?>
              @foreach($master as $m)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$m->id_pembelian_barang}}</td>
                <td>{{$m->id_retur}}</td>
                <td>{{$m->sup->nama_supplier}}</td>
                <td>{{$m->tanggal_retur}}</td>
                <td>{{$m->keterangan}}</td>
                <td>{{$m->netto}}</td>
                <td>                                       
                  @if($m->netto == null)         
                  <a href="{{url('/FARMASI/returObat')}}/{{$m->id_retur}}"><button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button></a>
                  <a href="/FARMASI/hapusMasterReturPembelian/{{$m->id_retur}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  @else
                  <a href="{{url('/FARMASI/returObat/')}}/{{$m->id_retur}}"><button type="button" class="btn btn-success">Transaksi Selesai</button></a>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div><!--end .card-body -->
  </div>
</div>
</div>
@extends('farmasi.mod_tambahMasterReturPembelian')
<script>
  function setPembelian(){
    nopem = document.getElementById('no_entri_pembelian').value;
    url = "{{url('G/FARMASI/returObat')}}"+"/"+nopem;
    $.getJSON(url, function(result){
      console.log(result);
      if (result.length > 0) {
        $('#id_supplier').val(result[0]['id_supplier']);
        $('#nama_supplier').val(result[0]['nama_supplier']);
        $('#tgl_pembelian').val(result[0]['tanggal_pembelian']);
        $('#id_pembelian').val(result[0]['id_pembelian_barang']); 
      }else{
        alert("Data Tidak Ditemukan");
        $('#id_supplier').val('');
        $('#nama_supplier').val('');
        $('#tgl_pembelian').val('');
        $('#id_pembelian').val('');
      }
    });
    url1 = "{{url('G/FARMASI/returObat1')}}"+"/"+nopem;
    nomor = 0;
    $.getJSON(url1,function(result){
      console.log(result);
      no = 0;
      subtotal = 0;
      $("#isiTablePembelian").empty();
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
        data = data+"<td>"+r.diskon_rp+"</td>";
        data = data+"<td>"+r.diskon_rp1+"</td>";
        data = data+"<td>"+r.diskon_rp2+"</td>";
        data = data+"<td>"+r.sub_total+"</td>";
        subtotal += parseFloat(r.sub_total);
        $('#isiTablePembelian').append(data);
      });
      document.getElementById("total").value = subtotal; 
    });
  }
</script>
@endsection
</body>
</html>
