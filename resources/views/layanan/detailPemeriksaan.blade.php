<!DOCTYPE html>
<html>

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
          <li><a href="/RWINAP/dataKelas">Detail Pemeriksaan</a></li>
          <li class="active">Detail Pemeriksaan</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->

        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pemeriksaan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <a class="btn btn-success btn-md" onclick="pilihJP('{{$id}}')" data-toggle="modal" data-target="#tambahDetailJenisPemeriksaan"> <i class="glyphicon glyphicon-plus"></i>Tambah Detail</a>
             <br>
             <br>
             <table id="example" class="table table-striped table-bordered" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Detail Pemeriksaan</th>
                  <th>Nilai Normal</th>
                  <th width="150px";>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Detail Pemeriksaan</th>
                  <th>Nilai Normal</th>
                  <th width="150px";>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @if($data == null)
                @else
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id_detail_jenis_pemeriksaan}}</td>
                  <td>{{$row->detail_pemeriksaan}}</td>
                  <td>{{$row->nilai_normal}}</td>
                  <td>
                    <button type="button" data-toggle="modal" data-target="#editDetailJenisPemeriksaan" class="btn btn-warning" onclick="setData('{{$row->id_detail_jenis_pemeriksaan}}')"><i class="fa fa-edit"></i></button>
                    <a href="{{url(Auth::user()->poli->prefix.'/hapusDetailJP/'.$row->id_detail_jenis_pemeriksaan)}}"><button type="button" onclick="return confirm('Hapus Data Ini ?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
              <input type="hidden" name="read" id="read" value="{{url('RWINAP/readDataKamar')}}">
            </div>
          </div>

        </div><!--end .card-body -->
      </div>
    </div>
  </div>
  <script>
    function pilihJP(id){
      var view_url = "{{url(Auth::user()->poli->prefix.'/jsonJenisPemeriksaan')}}";
      $.ajax({
        url: view_url,
        type:"GET",
        data: {"id":id},
        success: function(result){
          result.forEach(function(r){
          // alert(r['id_kelas']);
          $('#id_jp1').val(r.id_jenis_pemeriksaan);
          $('#nm_pemeriksaan1').val(r.nama_jenis_pemeriksaan);
        });
        }});
    }

    function setData($id){
      $("#detailJenisPemeriksaan").modal('hide');
      var view_url = "{{url(Auth::user()->poli->prefix.'/dataDetailJenisPemeriksaan')}}"+"/"+$id;
      // alert(view_url);
      $.getJSON(view_url,function(result){
     // console.log(result);
     result.forEach(function(r){
      document.getElementById("id_detail_jenis_pemeriksaan").value = r['id_detail_jenis_pemeriksaan'];
      document.getElementById("detail_pemeriksaan").value = r['detail_pemeriksaan'];
      document.getElementById("nilai_normal").value = r['nilai_normal'];
    });
   });
    }
  </script>
  @extends('layanan.mod_tambahDetailPemeriksaan')
  @extends('layanan.mod_editDetailJenisPemeriksaan')
  @endsection
</body>
</html>

