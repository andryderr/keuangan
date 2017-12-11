<!DOCTYPE html>
<html>
@extends('attr.footer')
@extends('rawatInap.head')

@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('rawatInap.sidebar')

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
          <li><a href="/RWINAP/dataKelas">Data Kelas</a></li>
          <li class="active">Data Kamar</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->

        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kamar</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahRuang"> <i class="glyphicon glyphicon-plus"></i>Tambah Kamar</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Kamar</th>
                  <th>Ruang</th>
                  <th>Kamar Kosong</th>
                  <th width="150px";>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nama Kamar</th>
                  <th>Ruang</th>
                  <th>Kamar Kosong</th>
                  <th width="150px";>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id_ruang}}</td>
                  <td>{{$row->nama_ruang}}</td>
                  <td>{{$row->nama_kelas}}</td>
                  <td>{{$row->jumlah}}</td>
                  <td>
                    <button type="button" data-toggle="modal" data-target="#tambahKamar" onclick="ubahRuang('{{$row -> id_ruang}}')" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    <button type="button" data-toggle="modal" data-target="#editRuang" onclick="ubahRuang('{{$row -> id_ruang}}')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                    <a href="#"><button id="{{$row->id_ruang}}" type="button" data-toggle="modal" data-target="#detailKamar" onclick="viewDataKamar('{{$row -> id_ruang}}')" class="btn btn-success"><i class="fa fa-ellipsis-h"></i></button></a>
                    <a href="{{url('RWINAP/dataRuang/hapusRuang')}}/{{$row->id_ruang}}"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </tr>
                  @endforeach
                </div>


              </tbody>
            </table>
            <input type="hidden" name="read" id="read" value="{{url('RWINAP/readDataKamar')}}">
          </div>
        </div>

      </div><!--end .card-body -->
    </div>
  </div>
</div>


<script type="text/javascript">
  function viewDataKamar(id)
  {
    var view_url = $("#read").val()+"/"+id;
    $.getJSON(view_url,function(result){
      console.log(result);
         // console.log(result);
         $("#kamar").empty();
         result.forEach(function(r){
        // alert(r['id_kamar']);
        if ((r['status']) == 0) {
          $status = "Kosong";
        } else if ((r['status']) == 1) {
          $status = "Terisi";
        } else {
          $status = "Sedang dalam Perbaikan";
        }
        $("#kamar").append("<tr><td>"+r['id_kamar']+"</td><td>"+r['nama']+"</td><td>"+r['nama_kelas']+"</td><td>"+$status+"</td><td>"+r['harga']+"</td><td><a href='{{url('RWINAP/kamar/hapus/')}}/"+r['id_kamar']+"'><button type='button' onclick='return confirm('Hapus Data Ini ?');' class='btn btn-danger'><i class='fa fa-trash'></i></button></a></td></tr>");
      });
       });
  }
</script>

<script type="text/javascript">
  function ubahRuang(id)
  {
    var view_url = "{{url('RWINAP/viewDataRuang')}}";
    $.ajax({
      url: view_url,
      type:"GET",
      data: {"id":id},
      success: function(result){
        result.forEach(function(r){
          // alert(r['id_kelas']);
          $('#edit_id').val(r.id_ruang);
          $('#id_kelas').val(r.id_kelas);
          $('#id_ruang').val(r.id_ruang);
          $('#nama_ruang').val(r.nama_ruang);
          $('#ruang_id').val(r.id_ruang);
          $('#tambah_id').val(r.id_ruang);
        });
      }});
  }
</script>

@endsection
@extends('rawatInap.mod_tambahRuang')
@extends('rawatInap.mod_detailKamar')
@extends('rawatInap.mod_tambahKamar')
@extends('rawatInap.mod_editRuang')
</body>
</html>

