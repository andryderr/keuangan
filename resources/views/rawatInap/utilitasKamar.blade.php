@extends('new.attr.sidebar')
@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
         Halaman Utilitas Kamar
         <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pasien</li>
        <li class="active">Utilitas Kamar</li>
        </ol>
      </section>
      <div class="container-fluid">
        <section class="content">
          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Detail Pasien</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-md-4">
                    <label>No/ID Pendaftaran</label>
                    <input type="text"  class="form-control" placeholder="{{$data[0]->pendaftaran->id_pendaftaran}}" readonly name="id_pendaftaran" id="id_pendaftaran">
                  </div>
                  <div class="form-grou col-md-4">
                    <label>No/ID Rekam Medis</label>
                    <input type="text"  class="form-control" placeholder="{{$data[0]->pendaftaran->no_rm}}" readonly name="no_rm" id="no_rm">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Nama  Pasien</label>
                    <input type="text"  class="form-control" placeholder="{{$data[0]->pendaftaran->pasien->nama}}" name="nama" id="nama" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label>Nama Kamar</label>
                    <input type="text"  class="form-control" placeholder="{{$data[0]->det_kamar[count($data[0]->det_kamar)-1]->kamar->nama}}" name="id_kamar" id="id_kamar" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Tanggal Masuk</label>
                    <input type="text"  class="form-control" placeholder="{{$data[0]->det_kamar[count($data[0]->det_kamar)-1]->tanggal_masuk}}" name="tanggal_masuk" id="tanggal_masuk" readonly>
                  </div>
                </div>
                <br>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Kamar</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">
                <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                    </div>
                  </div><!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                   <button type="button" class="btn btn-success btn-md" id="" data-toggle="modal" data-target="#pindahKamar" style="margin-bottom:10px;"> <i class="glyphicon glyphicon-plus"></i> Pindah Kamar</button>
                    <table class="table table-hover">
                      <tr>
                        <th>ID Kamar</th>
                        <th>Nama Kamar</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Status</th>
                      </tr>
                      @foreach($data[0]->det_kamar as $row)
                      <tr>
                        <td>{{$row->id_kamar}}</td>
                        <td>{{$row->kamar->nama}}</td>
                        <td>{{$row->tanggal_masuk}}</td>
                        <td>{{$row->tanggal_keluar}}</td>
                        <td>
                          @if($row->detail_status == 'aktif')
                          <a href="#"><button type="button" class="btn btn-primary"  style="width:80px">Aktif</button></a>
                          @elseif($row->detail_status == 'pindah')
                          <a href="#"><button type="button" class="btn btn-warning" style="width:80px">Pindah</button></a>
                          @else
                          <a href="#"><button type="button" class="btn btn-danger"  style="width:80px">Keluar</button></a>
                        </td>
                        @endif
                      </tr>
                      @endForeach
                    </table>
                  </div>
                </div>
                </div>
              </div> 
            </div>
          </div>
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Rekomendasi Gizi</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                      </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                      <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
                       <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahGizi"> <i class="glyphicon glyphicon-plus"></i> Tambah Rekomendasi Gizi</a>
                     </form>
                     <table class="table table-hover">
                      <tr>
                        <th>ID</th>
                        <th>Makanan</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                      @foreach($data[0]->det_gizi as $row)
                      <tr>
                        <td>{{$row->id_rekomendasi}}</td>
                        <td>{{$row->jenis_barang->jenis_barang}}</td>
                        <td>{{$row->tgl_rekomendasi}}</td>
                        <td>{{$row->memo}}</td>
                        <td><a href="{{url('RWINAP/Pasien/Gizi/Hapus/')}}/{{$row->id_rekomendasi}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
                      </tr>
                      @endforeach
                      <tr>
                      </table>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>
              </div> 
            </div>
          </div>
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Daftar Alat/Obat Kamar</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box"><div class="box-header"></div></div>
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Tanggal Digunakan</th>
                          <th>Tanggal Kembali</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                        <tr>
                          <td>mk23</td>
                          <td>Handuk</td>
                          <td>12/01/2017 08.29</td>
                          <td></td>
                          <td>Digunakan</td>
                          <td>
                           <a href="#"><button type="button" data-toggle="modal" data-target="#barangKembali" class="btn btn-primary"  style="width:100px">Digunakan</button></a>
                         </td>
                       </tr>
                       <tr>
                         <td>mk23</td>
                         <td>Kateter</td>
                         <td>12/01/2017 08.29</td>
                         <td>12/01/2017 08.29</td>
                         <td>Kembali</td>
                         <td><a href="#"><button type="button" class="btn btn-danger"  style="width:100px">Kembali</button></a></td>
                       </tr>
                     </table>
                   </div>
                 </div>
               </div>
             </div> 
           </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@extends('rawatInap.mod_tambahGizi')
@extends('rawatInap.mod_pindahKamar')
@extends('rawatInap.mod_kembaliBarang')
@endsection
</body>