<!DOCTYPE html>
<html>
<!-- Left side column. contains the logo and sidebar -->
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
          <li class="active">Dashboard</li>
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
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Filter Pencarian</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <label> Searching </label>
                <div class="input-group col-md-4">                
                  <input type="search" data-table="table table-striped table-bordered" class="form-control" placeholder="" name="cari" id="rangetanggal" required="true">
                  <span class="input-group-btn">
                    <button type="button" onclick="search();" class="btn btn-primary">Cari</button>
                  </span> 
                </div>
              </div><!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Posting</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
            <iframe id="myFrame" src="{{url('KEUANGAN/tabel_posting')}}" style="border:0px;" width="100%" height="700px"></iframe>             
            </div>
          </div>
          <!--  -->
        </div><!--end .card-body -->

      </section>
    </div>
  </div>
</div>
<script>
  function search(){
    $('#myFrame').attr('src',"{{url(Auth::user()->poli->prefix.'/tabel_posting')}}?cari="+$('#rangetanggal').val());
  }
</script>
@endsection

</body>
</html>