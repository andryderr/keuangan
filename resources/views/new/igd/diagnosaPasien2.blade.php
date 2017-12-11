@extends('new.attr.sidebar');

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
         Halaman Tindakan Medis dan Diagnosa Pasien
         <small>Control panel</small>
       </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pasien</li>
        <li class="active">Diagnosa</li>
      </ol>
    </section>

    <div class="container-fluid">
      <section class="content">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Pasien</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label>No/ID Transaksi</label>
                    <input type="text"  class="form-control" placeholder="" readonly name="idTransaksi" value="{{$data[0]->id_pendaftaran}}">
                  </div>
                  <div class="form-group">
                    <label>No/ID Rekam Medis</label>
                    <input type="text"  class="form-control" placeholder="" readonly name="idRekamMedis" value="{{$data[0]->no_rm}}">
                  </div>
                  <div class="form-group">
                    <label>Nama  Pasien</label>
                    <input type="text"  class="form-control" placeholder="" name="namaPasien" readonly value="{{$data[0]->pasien->nama}}">
                  </div>
                  <div class="form-group">
                    <label>Keluhan</label>
                    <textarea rows="3" class="form-control" placeholder="" name="namaPasien" readonly>{{$data[0]->diagnosa_masuk}}</textarea>
                  </div>
                  <br>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                 <h3 class="box-title">Tindakan Medis</h3>
                 <div class="box-tools pull-right">
                   <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                 </div>
               </div>
               <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box-body table-responsive no-padding">
                      <a class="btn btn-success btn-md" data-toggle="modal" data-target="#pilihTindakan"> <i class="glyphicon glyphicon-plus"></i> Tambah Tindakan Medis</a>
                      <table class="table table-hover">
                       <tr>
                         <th>ID Tindakan Medis</th>
                         <th>Poli</th>
                         <th>Nama Tindakan</th>
                         <th>Harga</th>
                         <th>Aksi</th>
                       </tr>
                       @foreach($data[0]->detail as $row)
                       @foreach($row->tindakanMedis as $r)
                       <tr>
                         <td>{{$r->id_detail_tindakan_medis}}</td>
                         <td>{{$row->poli->nama_poli}}</td>
                         <td>{{$r->tm->tindakanMedis->nama}}</td>
                         <td>{{$r->harga_total}}</td>
                         <td>
                          <a href="{{url(Auth::user()->poli->prefix.'/Pasien/DetailTindakanMedis/Hapus/')}}/{{$r->id_detail_tindakan_medis}}" onclick="return confirm('Apakah Anda Yakin?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                          <a href="{{url(Auth::user()->poli->prefix.'/Pasien/DetailTindakanMedis/Edit')}}/{{$r->id_detail_tindakan_medis}}"><button type="button" class="btn btn-warning"><i class="fa fa-gear"></i></button></a>
                        </td>
                      </tr>
                      @endforeach
                      @endforeach
                    </table>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div>
            </div> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title">Pemeriksaan</h3>
             <div class="box-tools pull-right">
               <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
             </div>
           </div>
           <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box-body table-responsive no-padding">
                  <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahPemeriksaan"> <i class="glyphicon glyphicon-plus"></i>Pemeriksaan</a>
                  <table class="table table-hover">
                   <thead>
                     <th>ID Pemeriksaan</th>
                     <th>Tanggal</th>
                     <th>Unit</th>
                     <th>Aksi</th>
                   </thead>
                   <tbody>
                    @foreach($data2 as $row)
                    <tr>
                      <td>{{$row->id_detail_pendaftaran}}</td>
                      <td>{{$row->tgl_masuk}}</td>
                      <td>{{$row->poli->nama_poli}}</td>
                      <td>
                        @if(isset($row->pemeriksaan[0]))
                        <a href="{{url(Auth::user()->poli->prefix.'/dataPasien/hasilPemeriksaan/')}}/{{$row->pemeriksaan[0]->id_pemeriksaan}}" target="_blank" class="btn btn-info"><i class="glyphicon glyphicon-list-alt"></i></a>
                        @endif
                        <a href="#"><button type="button" data-toggle="modal" data-target="#lihatMemo" onclick="$('#memo_view').val('{{$row->memo}}');" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="row">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
         <div class="box-header with-border">
           <h3 class="box-title">Data Rujukan</h3>
           <div class="box-tools pull-right">
             <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           </div>
         </div>
         <div class="box-body">
          <div class="col-xs-12">
            <div class="box-body table-responsive no-padding">
              <a href="#"><button type="button" data-toggle="modal" data-target="#tambahRUjukan" class="btn btn-primary"><i class="fa fa-ambulance"></i> Tambah Rujukan</button></a>
              <table class="table table-hover">
                <tr>
                 <th>ID Rujukan</th>
                 <th>Nama Rujukan</th>
                 <th>Tanggal/Jam Rujukan</th>
                 <th>Aksi</th>
               </tr>
               @foreach($rujukan as $row)
               <tr>
                 <td>{{$row->id_detail_pendaftaran}}</td>
                 <td>{{$row->poli->nama_poli}}</td>
                 <th>{{$row->tgl_masuk}}</th>
                 <td>
                  <a href="#"><button type="button" data-toggle="modal" data-target="#lihatMemo" onclick="$('#memo_view').val('{{$row->memo}}');" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">OBAT</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
         <div class="col-xs-12">
           <div class="box-body table-responsive no-padding">
            <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahObat"> <i class="glyphicon glyphicon-plus"></i> Tambah Resep Obat</a>
            <table class="table table-hover">
             <tr>
               <th>Nomer Resep</th>
               <th>Tanggal Resep</th>
               <th>Dokter</th>
               <th>Harga</th>
               <th>Aksi</th>
             </tr>
             @foreach($data[0]->resep as $row)
             <tr>
               <td>{{$row->id_resep}}</td>
               <td>{{$row->tanggal_resep}}</td>
               <td>{{$row->dokter->nama}}</td>
               <td>{{$row->total}}</td>
               <td>
                 <a href="#"><button type="button" data-toggle="modal" data-target="#lihatResep" onclick="$('#resep_view').val('{{$row->resep}}');" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
               </td>
             </tr>
             @endforeach
           </table>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </div>
   </div> 
 </div>
</div>
</div>
<div class="row">
 <div class="col-md-12">
   <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Diagnosa</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="box-body table-responsive no-padding">
            <a class="btn btn-success btn-md" data-toggle="modal" data-target="#pilihDiagnosa"> <i class="glyphicon glyphicon-plus"></i> Tambah Diagnosa</a>
            <table class="table table-hover">
             <tr>
               <th>ID Diagnosa</th>
               <th>Nama Diagnosa</th>
               <th>Aksi</th>
             </tr>
             @foreach($data[0]->detail as $row)
             @foreach($row->det_diagnosa as $r)
             <tr>
               <td>{{$r->id_diagnosa}}</td>
               <td>{{$r->diagnosa->nama_diagnosa}}</td>
               <td>
                <a href="{{url(Auth::user()->poli->prefix.'/DetailDiagnosa/hapus/')}}/{{$r->id_detail_diagnosa}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
              </td>
            </tr>
            @endforeach
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</body>
@extends('new.igd.mod_pilihTindakanMedis')
@extends('new.igd.mod_pilihDiagnosa')
@extends('new.igd.mod_lihatMemo')
@extends('new.igd.mod_lihatResep')
@extends('new.igd.mod_tambahRujukan')
@extends('new.igd.mod_pemeriksaan')
@extends('new.igd.mod_tambahResepObat')

@endsection