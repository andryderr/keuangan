<!DOCTYPE html>
<html>
@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <div class="container-fluid">
       <section class="content">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih Kelas</h3>
              <a href="{{url(Auth::user()->poli->prefix.'/jenisTindakanMedis')}}"><button type="button" class="btn btn-success">Kembali</button></a>
              <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahKelasMedis"> <i class="glyphicon glyphicon-plus"></i>Tambah Kelas</a>
            </div>
            <div class="box-body">
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>ID</th>
                  <th>Ruang</th>
                  <th>Total Harga</th>
                  <th style="width=100px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                  <th>ID</th>
                  <th>Ruang</th>
                  <th>Total Harga</th>
                  <th style="width=100px;">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id_detail_medis_kelas}}</td>
                  <td>{{$row->kelas->nama_kelas}}</td>
                  <td>{{$row->harga_total}}</td>
                  <td>                          
                    <a href="{{url(Auth::user()->poli->prefix.'/Data/Kelas')}}/{{$id}}/{{$row->id_detail_medis_kelas}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-bed"></i></button></a>
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

@endsection

<script type="text/javascript">
  function ubahKelas(id)
  {
    var view_url = "{{url('RWINAP/viewDataKelas')}}";
    $.ajax({
      url: view_url,
      type:"GET",
      data: {"id":id},
      success: function(result){
        result.forEach(function(r){
          // alert(r['id_kelas']);
          $('#edit_id').val(r.id_kelas);
          $('#id_kelas').val(r.id_kelas);
          $('#nama_kelas').val(r.nama_kelas);
          $('#keterangan').val(r.keterangan);
        });
      }});
  }
</script>

</body>
</html>

@extends('new.igd.mod_tambahKelasMedis')
