

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

        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Master Penjualan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label for="tanggal_penjualan" class="col-sm-5 control-label">Tanggal Penjualan</label>
                  <div class="col-md-7">
                    <input type="text"  class="form-control" placeholder="" readonly name="tanggal_penjualan" id="tanggal_penjualan" value="{{$master[0]->tanggal_penjualan}}">
                    </div>
                </div>


                <div class="form-group">
                 <label for="nomer_entri" class="col-md-5 control-label">Nomer Entri</label>
                 <div class="col-md-7">
                  <input type="text"  class="form-control" placeholder="" readonly name="" id="nomer_entri" value="{{$master[0]->id_penjualan_barang}}">
                </div>
              </div>

              <div class="form-group">
                <label  for="nama_pegawai" class="col-md-5 control-label">Nama Pegawai</label>
                <div class="col-md-7">
                  <input type="text"  class="form-control" placeholder="" readonly name="" id="nama_pegawai" value="{{$master[0]->cust->nama_cust}}">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-5 control-label"> Kategori Penjualan</label>
                <div class="col-md-7">
                 <input type="text"  class="form-control" placeholder="" readonly name="" id="nama_pegawai" value="Resep">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="form-horizontal">
           <div class="form-group">
             <label for="nomer_resep" class="col-md-5 control-label">Nomer Resep</label>
             <div class="col-md-7">
              <input type="text"  readonly="" class="form-control" placeholder="" name="" id="nomer_resep" value="{{$master[0]->nomer_resep}}">
            </div>
          </div>

          <div class="form-group">
            <label for="tanggal_resep" class="col-sm-5 control-label">Tanggal Resep</label>
            <div class="col-md-7">
              <input type="text" readonly="" class="form-control" placeholder="" name="tanggal_resep" id="" value="{{$master[0]->tanggal_resep}}">  
            </div>
          </div>

          <div class="form-group">
            <label for="nama_dokter" class="col-md-5 control-label"> Nama Dokter</label>
            <div class="col-md-7">
              <input type="text" class="form-control" readonly="" value="{{$master[0]->dok->nama}}" name="">
            </div>
          </div>

          <div class="form-group">
            <label  for="id_pendaf" class="col-md-5 control-label">ID Pendaftaran</label>
            <div class="col-md-7">
              <input type="text" readonly="" class="form-control" placeholder="" name="" id="id_pendaf" value="Yofanda">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Transaksi Pembelian</h3>
        <div class="box-tools pull-right">
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
         <table id="" class="" width="100%">
          <thead>
            <tr class="bg-info" style="font-size: 11pt;">
              <th>No</th>
              <th>ID</th>
              <th>Bahan Baku</th>
              <th>Satuan</th>
              <th>Quantity</th>
              <th>Harga</th>
              <th>Biaya Racik</th>
              <th>Biaya Resep</th>
              <th>Diskon RP</th>
              <th>Diskon 1</th>
              <th>Diskon 2</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <?php $no=1;?>
           <tbody>
                    <?php $no=1; $subtot = 0;?>
                    @foreach($detail as $dp)
                    <tr style="font-size: 13px;">
                      <td>{{$no++}}</td>
                      <td>{{$dp->id_barang}}</td>
                      <td>{{$dp->nama_barang}}</td>
                      <td>{{$dp->satuan}}</td>
                      <td>{{$dp->jumlah}}</td>
                      <td>{{$dp->harga}}</td>
                      <td>{{$dp->biaya_racik}}</td>
                      <td>{{$dp->biaya_resep}}</td>
                      <td>{{$dp->diskon_rp}}</td>
                      <td>{{$dp->diskon_rp1}}</td>
                      <td>{{$dp->diskon_rp2}}</td>
                      <td>{{$dp->sub_total}}</td>
                    </tr>
                    @endforeach

                  </tbody>
       <tbody class="jumlahTagihan">
        <tr class="bg-success">
          <td colspan="10"></td>
          <td><h3><strong>Netto : </strong></h3></td>
           <td colspan="2"><input type="text" style="font-size:25px; font-weight:bold; margin-top:11px; width:200px; border-width:0px; background-color:transparent;" readonly="" class="form-control pull-left" value="{{$master[0]->netto}}" name="" id="total"></td>
        </tr>
      </tbody>
    </tbody>
  </table>
</div>
</div>
</div>
</div><!--end .card-body -->
</div>
</div>

@endsection
