@extends('new.attr.sidebar');

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
          <li><a href="/igd/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dokter</li>
        </ol>
      </section>

      <div class="container-fluid">
       <section class="content">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Aktivitas {{$dokter[0]->nama}}</h3>
            </div>
            <div class="box-body">
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <td>TindakanMedis</td>
                  <td>Biaya</td>
                  <td>Tanggal</td>
                  <td>ID Pasien</td>
                  <td>Nama Pasien</td>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <td>TindakanMedis</td>
                  <td>Biaya</td>
                  <td>Tanggal</td>
                  <td>ID Pasien</td>
                  <td>Nama Pasien</td>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $r)
                <tr>
                  <td>{{$r->det_tindakan->tm->nama}}</td>
                  <td>{{$r->harga}}</td>
                  <td>{{$r->det_tindakan->tanggal}}</td>
                  <td>{{$r->det_tindakan->det_pendaftaran->id_pendaftaran}}</td>
                  <td>{{$r->det_tindakan->det_pendaftaran->pendaftaran->pasien->nama}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection