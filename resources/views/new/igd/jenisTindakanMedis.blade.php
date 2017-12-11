<!DOCTYPE html>
<html>

<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar');

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
          @for($i = 0; $i <= count(Request::segments()); $i++)
          <li>
            <a href="{{url(''.Request::segment($i))}}">{{Request::segment($i)}}</a>
            @if($i < count(Request::segments()) & $i > 0)
            {!!'<i class="fa fa-angle-right"></i>'!!}
            @endif
          </li>
          @endfor
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Jenis Tindakan Medis</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <br>
              <div id="home" class="tab-pane fade in active">
                @if(Auth::user()->poli->prefix == 'PERSONALIA')
                <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahTindakanMedis"> <i class="glyphicon glyphicon-plus"></i> Tambah Jenis Tindakan Medis</a>
                @endif
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr style="background:#E0E0E0;">
                      <th>ID tindakan</th>
                      <th>Nama Tindakan Medis</th>
                      <th>Keterangan</th>
                      @if(Auth::user()->poli->prefix == 'PERSONALIA')
                      <th style="width=100px;">Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tfoot>
                    <tr style="background:#E0E0E0;">
                      <th>ID tindakan</th>
                      <th>Nama Tindakan Medis</th>
                      <th>Keterangan</th>
                      @if(Auth::user()->poli->prefix == 'PERSONALIA')
                      <th style="width=100px;">Action</th>
                      @endif
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>{{$row->id_tm_d_p}}</td>
                      <td>{{$row->nama}}</td>
                      <td>{{$row->keterangan}}</td>
                      @if(Auth::user()->poli->prefix == 'PERSONALIA')

                      <td>
                        <a href="{{url(Auth::user()->poli->prefix.'/Data/Kelas')}}/{{$row->id_tm_d_p}}" data-toggle="tooltip" title="Detail dan Setting Harga"><button type="button" class="btn btn-primary"><i class="fa fa-cube"></i></button></a>                     
                        <!-- <a href="{{url(Auth::user()->poli->prefix.'/detailTindakanMedis/')}}/{{$row->id_tm_d_p}}"><button type="button" class="btn btn-primary"><i class="fa fa-sticky-note-o"></i></button></a> -->
                        <a href="#" data-toggle="tooltip" title="Edit Tindakan Medis"><button type="button" data-toggle="modal" data-target="#editTindakanMedis" class="btn btn-warning" onclick="setEdit({{$row->id_tm_d_p}},'{{$row->nama}}','{{$row->keterangan}}');"><i class="fa fa-edit"></i></button></a>
                        <a href="{{url(Auth::user()->poli->prefix.'/jenisTindakanMedis/delete')}}/{{$row->id_tm_d_p}}" data-toggle="tooltip" title="Hapus Tindakan Medis" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!--end .card-body -->
      </div>
    </div>
  </div>

  @endsection

</body>
</html>
@if(Auth::user()->poli->prefix == 'PERSONALIA')
@extends('new.igd.mod_tambahJenisTindakanMedis')
@extends('new.igd.mod_editJenisTindakanMedis')
@endif
