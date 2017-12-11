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
        <div class="row">

                    <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>123</h3>
                <p>Permintaan Tagihan</p>
              </div>
              <div class="icon">
                <i class="fa fa-area-chart"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->


          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>123</h3>
                <p>Tagihan Terbayar</p>
              </div>
              <div class="icon">
                <i class="fa fa-check"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->

          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>123</h3>
                <p>Tagihan Belum Terbayar</p>
              </div>
              <div class="icon">
                <i class="fa fa-close"></i>
              </div>
              <a href="/RWINAP/dataKelas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          </div><!-- /.row -->

          </div>
        </section>
      </div>
    </div>
  </div>

@endsection

</body>
</html>