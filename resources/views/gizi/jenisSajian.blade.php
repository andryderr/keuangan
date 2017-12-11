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
          <li class="active">Jenis Sajian</li>
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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Jenis Sajian</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahJenisSajian"> <i class="glyphicon glyphicon-plus"></i> Tambah Jenis Sajian</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>ID Jenis Sajian</th>
                  <th>Nama Jenis Sajian</th>
                  <th>Keterangan</th>
                  <th style="width:150px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                 <th>ID Jenis Sajian</th>
                 <th>Nama Jenis Sajian</th>
                 <th>Keterangan</th>
                 <th style="width:150px;">Aksi</th>
               </tr>
             </tfoot>
             <tbody>
              <?php $id = 1; ?>
              @foreach($data as $row)
              <tr>
                <td>{{$row->id_jenis_barang}}</td>
                <td>{{$row->jenis_barang}}</td>
                <td>{{$row->kat_barang}}</td>
                <td>
                  <button type="button" data-toggle="modal" data-target="#pilihDistribusi" onclick="dataPasien('{{$row->id_jenis_barang}}')" class="btn btn-info"><i class="fa fa-opencart"></i></button>
                  <a href="{{url('GIZI/jenisSajian/Sajian')}}/{{$row->id_jenis_barang}}"><button type="button" class="btn btn-primary"><i class="fa fa-list-alt"></i></button></a>                          
                  <a href="#"><button type="button" data-toggle="modal" data-target="#editJenisSajian" onclick="setModal('{{$row->id_jenis_barang}}','{{$row->jenis_barang}}','{{$row->kat_barang}}');" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                  <a href="{{url('GIZI/hapusJenisSajian')}}/{{$row->id_jenis_barang}}"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
function setModal($id,$jenis_barang,$ket_barang){
  document.getElementById('idJenisBarang').value = $id;
  document.getElementById('namaJenisSajian').value = $jenis_barang;
  document.getElementById('kat_barang').value = $ket_barang;
};

function dataPasien(id) {
  var view_url = "{{url('G/dataPasienDistribusi')}}";
  // alert(id);
  $.ajax({
    url: view_url,
    type:"GET",
    data: {"id":id},
    success: function(result){
      $("#distribusi").empty();
      <?php 
      date_default_timezone_set('Asia/Jakarta');
      $tanggal = date('d-m-Y H:i:s'); ?>
      console.log(result['data']);
      option = "";
      result['jenis_sajian'].forEach(function(d){
        sajian = d.nama_barang;
        id_sajian = d.id_barang;
        option = option+"<option value='"+id_sajian+"'>"+sajian+"</option>";
      });
      result['data'].forEach(function(r){
        // alert(r.kategori_usia);
        $("#distribusi").append("<tr><td><input type='text' name='id_pendaftaran' id='' class='form-control' placeholder='"+r.id_pendaftaran+"' readonly=''></td><td>"+r.jenis_barang+"</td><td>"+r.tgl_rekomendasi+"</td><td><select class='form-control' name='' id='' style='width:150px;'><option>----</option>"+option+"</select></td><td>{{$tanggal}}</td><td><input type='checkbox' class='flat-red'></td></tr>");
      });   
    }
  });
};

</script>
@extends('gizi.mod_tambahJenisSajian')
@extends('gizi.mod_editJenisSajian')
@extends('gizi.mod_pilihDistribusiSajian')
@endsection
</body>
</html>
