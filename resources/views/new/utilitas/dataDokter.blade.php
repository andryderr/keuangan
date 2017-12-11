<!DOCTYPE html>
<html>
@extends('new.attr.footer')
@extends('new.personalia.head')

@extends('new.attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('new.personalia.sidebar')

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
          <li><a href="/RWINAP/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dokter</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Dokter</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambah"> <i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID Dokter</th>
                  <th>Nama</th>
                  <th>SIP</th>
                  <th>Tanggal Berlaku</th>
                  <th>Tanggal Kadaluarsa</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID Dokter</th>
                  <th>Nama</th>
                  <th>SIP</th>
                  <th>Tanggal Berlaku</th>
                  <th>Tanggal Kadaluarsa</th>
                  <th>Sebagai</th>
                  <th style="width=100px;">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->dokter->id_dokter}}</td>
                  <td>{{$row->dokter->nama}}</td>
                  <td>{{$row->dokter->sip}}</td>
                  <td>{{$row->dokter->tgl_awal_sip}}</td>
                  <td>{{$row->dokter->tgl_akhir_sip}}</td>
                  <td>{{$row->dokter->job->nama_job}}</td>
                  <td>                          
                    <a href="{{url('PERSONALIA/Poli/Dokter/Hapus/')}}/{{$row->id_dokter_poli}}" onclick="return confirm('Hapus Data Ini ?');" ><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
<div class="modal fade" id="tambah" role="dialog">
 <div class="modal-dialog modal-md">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="background-color: #4db6ac;">
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
      </button>
      <h3 class="modal-title" style="color:white;">Form Tambah Dokter Poli</h3>
      <label>Isi Inputan Dibawah:</label>
    </div>
    <form action="{{url('PERSONALIA/Poli/Dokter/Tambah')}}" method="post" accept-charset="utf-8">
      {{csrf_field()}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Dokter</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <input type="hidden" class="hidden" name="id_poli" id="id_poli" value="{{$id}}">
        <div class="box-body">

          <div class="form-group">
            <label for="id_dokter">Pilih Dokter</label>
            <select name="id_dokter" id="id_dokter" class="form-control">
              @foreach($dokter as $row)
              @if($row->id_dokter != 0)
                <option value="{{$row->id_dokter}}">{{$row->nama}}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
      </div>                     

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
@endsection

</body>
</html>