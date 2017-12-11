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
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
           <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{$totkamar[0]->totalkamar}}</h3>
                <p>Total Kamar</p>
              </div>
              <div class="icon">
                <i class="fa fa-bed"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{$kamartersedia[0]->kamartersedia}}</h3>
                <p>Kamar Tersedia </p>
              </div>
              <div class="icon">
                <i class="ion ion-checkmark-circled"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{$kamarterpakai[0]->kamarterpakai}}</h3>
                <p>Kamar Terpakai</p>
              </div>
              <div class="icon">
                <i class="ion ion-close-circled"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          </div><!-- ./col -->
        </div><!-- /.row -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kelas</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahKelas"> <i class="glyphicon glyphicon-plus"></i>Tambah Kelas</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>ID</th>
                  <th>Kelas</th>
                  <th>Jumlah Kamar</th>
                  <th style="width=100px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                  <th>ID</th>
                  <th>Kelas</th>
                  <th>Jumlah Kamar</th>
                  <th style="width=100px;">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id_kelas}}</td>
                  <td>{{$row->nama_kelas}}</td>
                  <td>{{$row->jumlah}}</td>
                  <td>                          
                    <a href="{{url('RWINAP/dataKelas/dataKamar/')}}/{{$row->id_kelas}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-bed"></i></button></a>
                    <button type="button" id="" data-toggle="modal" data-target="#editKelas" class="btn btn-warning" onclick="ubahKelas('{{$row -> id_kelas}}')"><i class="fa fa-edit"></i></button>
                    <a href="{{url('RWINAP/dataKelas/hapusKelas')}}/{{$row->id_kelas}}"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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

@extends('rawatInap.mod_tambahKelas')
@extends('rawatInap.mod_editKelas')