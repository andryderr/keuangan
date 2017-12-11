<!DOCTYPE html>
<html>
@extends('attr.footer')
@extends('gizi.head')

@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('gizi.sidebar')

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
          <li>Jenis Sajian</li>
          <li>Sajian</li>
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
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Sajian</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="form-group col-md-12 text-center">
                  <label for="nama_grup">Jenis Sajian</label>
                  <input style="width:200px; margin-right:auto; margin-left:auto;" type="text" readonly="" value="{{$jenis_barang[0]->jenis_barang}}" class="form-control text-center" placeholder="" name="nama_grup" id="">
                </div>
                <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
                 <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahJenisSajian"> <i class="glyphicon glyphicon-plus"></i> Tambah Data Sajian</a>
               </form>
               <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr style="background:#E0E0E0;">
                    <th>ID Sajian</th>
                    <th>Nama Sajian</th>
                    <th>Tgl Olah</th>
                    <th>HPP</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th style="width:100px;">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr style="background:#E0E0E0;">
                   <th>ID Sajian</th>
                   <th>Nama Sajian</th>
                   <th>Tgl Olah</th>
                   <th>HPP</th>
                   <th>Harga</th>
                   <th>Stok</th>
                   <th style="width:100px;">Aksi</th>
                 </tr>
               </tfoot>
               <tbody>
                 @foreach($data as $row)
                 <tr>
                  <td>{{$row->id_barang}}</td>
                  <td>{{$row->nama_barang}}</td>
                  <td>{{$row->tanggal_olah}}</td>
                  <td>{{round($row->harga)}}</td>
                  <td>{{$row->hpp}}</td>
                  <td>{{$row->stok}}</td>
                  <td>
                   <a href="{{url('GIZI/jenisSajian/dataSajian/pengolahanSajian')}}/{{$row->id_barang}}"><button type="button" class="btn btn-primary"><i class="fa fa-spinner"></i></button></a>                          
                   <a href="#"><button type="button" data-toggle="modal" data-target="#editSajian" onclick="setModal('{{$row->id_barang}}','{{$row->nama_barang}}');" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                   <a href="{{url('GIZI/hapusSajian')}}/{{$row->id_barang}}"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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

<script>
function setModal($id,$namaBarang){
  document.getElementById('id_barang').value = $id;
  document.getElementById('namaSajian').value = $namaBarang;
}
</script>
@extends('gizi.mod_tambahSajian')
@extends('gizi.mod_editSajian')
@endsection
</body>
</html>
