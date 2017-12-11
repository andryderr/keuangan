

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

     <!-- Main content -->
     <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Pasien</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->


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
          </div><!-- /.box-body -->
        </div>
      </div>

      <!-- Detail harga -->
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Rujukan</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->

          <div class="box-body">

            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div>
              </div><!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                <tr>
                  <th>ID Rujukan</th>
                  <th>Nama Rujukan</th>
                  <th>Tanggal/Jam Rujukan</th>
                </tr>
                @foreach($data[0]->detail as $row)
                <tr>
                  <td>{{$row->id_detail_pendaftaran}}</td>
                  <td>{{$row->poli->nama_poli}}</td>
                  <th>{{$row->tgl_masuk}}</th>
                 </td>
               </tr>
               @endforeach
               <tr>
               </table>
             </div><!-- /.box-body -->
           </div><!-- /.box -->
         </div>
       </div><!-- /.box-body -->   
     </div>
   </div>


   <!-- Rujukan -->

   <!-- Tindakan Medis -->
   <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tindakan Medis</h3>
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
              <td>{{$r->tm->nama}}</td>
              <td>{{$r->harga_total}}</td>
           </tr>
           @endforeach
           @endforeach
           <tr>
           </table>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </div>
   </div> 
 </div>
</div>
   <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">OBAT</h3>
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
           <table class="table table-hover">
            <tr>
              <th>ID Resep</th>
              <th>Tanggal Resep</th>
              <th>Dokter</th>
              <th>Harga</th>
            </tr>
            @foreach($data[0]->resep as $row)
            <tr>
              <td>{{$row->id_resep}}</td>
              <td>{{$row->tgl_resep}}</td>
              <td>{{$row->dokter->nama}}</td>
              <td>{{$row->total}}</td>
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

<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Diagnosa</h3>
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
         <table class="table table-hover">
          <tr>
            <th>ID Diagnosa</th>
            <th>Nama Diagnosa</th>
          </tr>
          @foreach($data[0]->detail as $row)
          @foreach($row->det_diagnosa as $r)
          <tr>
            <td>{{$r->id_diagnosa}}</td>
            <td>{{$r->diagnosa->nama_diagnosa}}</td>
         </tr>
         @endforeach
         @endforeach
         <tr>
         </table>
       </div><!-- /.box-body -->
     </div><!-- /.box -->
   </div>
 </div>

</div>
</div>


</section>
</div>
</div>

</body>

@endsection