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
          <li><a href="/LAYANAN/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Jenis Pemeriksaan</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Jenis Pemeriksaan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahJenisPemeriksaan"> <i class="glyphicon glyphicon-plus"></i> Tambah Jenis Pemeriksaan</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Keterangan</th>
                  <th>Harga</th>
                  <th>Jenis Layanan</th>
                  <th style="width:200px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                 <th>ID</th>
                 <th>Nama</th>
                 <th>Keterangan</th>
                 <th>Harga</th>
                 <th>Jenis Layanan</th>
                 <th style="width:200px;">Aksi</th>
               </tr>
             </tfoot>
             <tbody>
               @foreach($data as $row)
               <tr>
                <td>{{$row->id_jenis_pemeriksaan}}</td>
                <td>{{$row->nama_jenis_pemeriksaan}}</td>
                <td>{{$row->keterangan}}</td>
                <td>{{$row->harga_pemeriksaan}}</td>
                <td>{{$row->jenis_layanan}}</td>
                <td>
                 <button type="button" data-toggle="modal" data-target="#editJenisPemeriksaan" onclick="editJP('{{$row->id_jenis_pemeriksaan}}')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                 <a href="{{url(Auth::user()->poli->prefix.'/detailJenisPemeriksaan/'.$row->id_jenis_pemeriksaan)}}"><button type="button" class="btn btn-success"><i class="fa fa-ellipsis-h"></i></button></a>
                 <a href="{{url(Auth::user()->poli->prefix.'/hapusJenisPemeriksaan')}}/{{$row->id_jenis_pemeriksaan}}"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
               </td>
             </tr>
             @endForeach
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

  function editJP(id){
    var view_url = "{{url(Auth::user()->poli->prefix.'/jsonJenisPemeriksaan')}}";
    $.ajax({
      url: view_url,
      type:"GET",
      data: {"id":id},
      success: function(result){
        result.forEach(function(r){
          // alert(r['id_kelas']);
          $('#id_pemeriksaan1').val(r.id_jenis_pemeriksaan);
          $('#nama_pemeriksaan1').val(r.nama_jenis_pemeriksaan);
          $('#ket1').val(r.keterangan);
          $('#harga1').val(r.harga_pemeriksaan);
        });
      }});
  }

  // function detailJP(id){
  //   var view_url = "{{url(Auth::user()->poli->prefix.'/detailJenisPemeriksaan')}}";
  //   $.ajax({
  //     url: view_url,
  //     type:"GET",
  //     data: {"id":id},
  //     success: function(result){
  //       $("#detail_JP").empty();
  //       result.forEach(function(r){
  //         $("#detail_JP").append("<tr><td>"+r['id_detail_jenis_pemeriksaan']+"</td><td>"+r['detail_pemeriksaan']+"</td><td>"+r['nilai_normal']+"</td><td><a href='{{url(Auth::user()->poli->prefix.'/hapusDetailJP')}}/"+r['id_detail_jenis_pemeriksaan']+"'><button type='button' onclick='return confirm('Hapus Data Ini ?')' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>"+'  '+"<button type='button' data-toggle='modal' data-target='#editDetailJenisPemeriksaan' onclick='setData("+r['id_detail_jenis_pemeriksaan']+");' class='btn btn-warning'><i class='fa fa-edit'></i></button></td></tr>");
  //       });
  //     }
  //   });
  // }

</script>


@extends('layanan.mod_tambahJenisPemeriksaan')
@extends('layanan.mod_editJenisPemeriksaan')
@extends('layanan.mod_tambahDetailPemeriksaan')
@extends('layanan.mod_viewDetailPemeriksaan')
@endsection
</body>
</html>
