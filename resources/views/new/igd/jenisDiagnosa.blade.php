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
              <h3 class="box-title">Data Jenis Diagnosa</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                @if(Auth::user()->poli->prefix == 'PERSONALIA')
                <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahDiagnosa"> <i class="glyphicon glyphicon-plus"></i> Tambah Jenis Diagnosa</a>
                @endif
                <div style="float:right; margin-right: 20px;">
                  <form action="">
                    <div class="col-md-12">
                      <div class="col-md-10 col-md-push-2">
                        @if(isset($_GET['page']))
                        <input type="hidden" name="page" id="search" value="{{$_GET['page']}}" class="form-control">
                        @endif
                        <input type="text" name="search" placeholder="cari disini.." id="search" class="form-control">
                      </div>
                      <div class="col-md-1">
                       <button type="submit" class="btn btn-primary">cari</button>
                     </div>
                   </div>
                   <br>
                   <br>
                 </form>
               </div>
             </div>
             <table id="" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>ID</th>
                  <th>Kode</th>
                  <th>Nama Diagnosa</th>
                  <th>Keterangan</th>
                  @if(Auth::user()->poli->prefix == 'PERSONALIA')

                  <th style="width:100px;">Action</th>
                  @endif

                </tr>
              </thead>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id_diagnosa}}</td>
                  <td>{{$row->kode}}</td>
                  <td>{{$row->nama_diagnosa}}</td>
                  <td>{{$row->keterangan}}</td>
                  @if(Auth::user()->poli->prefix == 'PERSONALIA')

                  <td>                          
                    <a href="#" data-toggle="tooltip" title="Edit Diagnosa"><button type="button" onclick="setEdit('{{$row->id_diagnosa}}','{{$row->kode}}','{{$row->nama_diagnosa}}','{{$row->keterangan}}');" data-toggle="modal" data-target="#editDiagnosa" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                    <a href="{{url(Auth::user()->poli->nama_poli.'/jenisDiagnosa/hapus')}}/{{$row->id_diagnosa}}" data-toggle="tooltip" title="Hapus Diagnosa"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </td>
                  @endif

                </tr>
              </div>
              @endforeach
            </tbody>
          </table>
          <div style="float:right;">
            @if(isset($_GET['search']))
            {{$data->appends(['search' => $_GET['search']])->links()}}
            @else
            {{$data->links()}}
            @endif
          </div>
        </div>
      </div>

    </div><!--end .card-body -->
  </div>
</div>
</div>
<script>
  function setEdit(a,b,c,d){
    $('#id_diagnosa_edit').val(a);
    $('#kode_diagnosa_edit').val(b);
    $('#nama_diagnosa_edit').val(c);
    $('#keterangan_edit').val(d);
  }
</script>

@endsection

</body>
</html>
@if(Auth::user()->poli->prefix == 'PERSONALIA')

@extends('new.igd.mod_tambahJenisDiagnosa')
@extends('new.igd.mod_editJenisDiagnosa')
@endif
