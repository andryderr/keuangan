@extends('attr.footer')
@extends('gizi.head')
<link rel="stylesheet" href="{{url('../assets/cetak/pembelianBahanBaku.css')}}">

@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('gizi.sidebar')

@section('content')
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
        <li>Dashboard</li>
        <li>Jenis Sajian</li>
        <li>Sajian</li>
        <li>Pengolahan</li>
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
        <br>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Master Pengolahan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form action="{{url('GIZI/tambahMasterPengolahan')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <input type="hidden" readonly="" value="{{$data[0]->id_barang}}" class="form-control" placeholder="" name="id_barang" id="">
                </div>

                <div class="form-group">
                  <label>Barang Sajian</label>
                  <input type="text" readonly="" value="{{$data[0]->nama_barang}}" class="form-control" placeholder="" name="" id="">
                </div>

                <div class="form-group">
                  <label>Tgl Pengolahan</label>
                  <input type="text" readonly="" value="<?php $tanggal = date('Y-m-d H:i:s');  echo "$tanggal"?>" class="form-control" placeholder="" name="tgl_pengolahan" id="">
                </div>

                <div class="form-group">
                  <label>Jumlah Sajian</label>
                  <input type="number" class="form-control" value="{{$data2[0]->jumlah_sajian}}" name="jumlah_sajian" id="jumlah_sajian">
                </div> 
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Petugas</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">

                <div class="form-group">
                  <label>Pengguna</label>
                  <input type="text" readonly="" value="yofanda   " class="form-control" placeholder="" name="pengguna" id="">
                </div>

                <div class="form-group">
                  <label>Pegawai / Pekerja</label>
                  <select class="form-control" name="pegawai">
                    <option>{{}}</option>
                    <option>------</option>
                    <option value="1">budi</option>
                    <option value="1">andi</option>
                  </select>
                </div>

                <button type="submit" id="simpanAtas" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </form>

        <div class="col-md-12">
          <div class="box box-danger" id="pakaiBahan" >
            <div class="box-header with-border">
              <h3 class="box-title">Detail Pengolahan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form action>
                <a class="btn btn-primary btn-md" id="tambahBahan" data-toggle="modal" data-target="#tambahOlah"> <i class="glyphicon glyphicon-plus"></i> Tambah Bahan</a>
              </form>

              <table id="example" class="table table-hover table-bordered
              " cellspacing="0" width="100%">
              <thead>
                <tr id="header">
                  <th class="nh">No</th>
                  <th class="nh">Barang</th>
                  <th class="nh">Quantity</th>
                  <th class="nh">Harga</th>
                  <th class="nh" style="width:150px;">Subtotal</th>
                  <th class="nh" style="width:100px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; $a = 1;?>
                @foreach($dataBahanBaku as $rows)
                <tr>
                  <td>
                    <input type="hidden"  class="form-control" placeholder="huo1h2" name="" id="">
                    {{$no++}}
                  </td>
                  <td>{{$rows->barang->nama_barang}}</td>
                  <td>{{$rows->jumlah_barang_baku}}</td>
                  <td>{{$rows->harga_bahan_baku}}</td>
                  <td>{{$rows->subtotal}}</td>
                  <td>                                                 
                    <a href="{{url('/GIZI/jenisSajian/dataSajian/pengolahanSajian/hapusBahanPengolahan')}}/{{$rows->id_detail_pengolahan}}" id="a{{$a++}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></a>
                  </td>
                </tr>
                @endforeach
                <br>
                <tbody class="jumlahTagihan">
                  <tr>
                    <td colspan="3"></td>
                    <td id="total" style="font-size:20pt;">Total : </td>
                    <td>
                      <form action="{{url('/GIZI/jenisSajian/dataSajian/pengolahanSajian/simpanTotal')}}" method="post">
                      {{csrf_field()}}
                        <input type="text" readonly="" style="font-size:20pt; width:250px; font-weight:bold;" class="form-control" value="{{$total[0]->totalharga}}" placeholder="" name="total" id="">
                        <input type="hidden" readonly="" value="{{$data[0]->id_barang}}" class="form-control" placeholder="" name="id_barang" id="">
                        <input type="hidden" style="width:100px;" readonly="" value="{{$data2[0]->total}}" class="form-control" placeholder="" name="" id="totalDB">
                      </td>
                      <td>
                        <input type="hidden" class="form-control" value="{{$data2[0]->jumlah_sajian}}" name="u_stok_barang">
                        <input type="hidden" class="form-control" value="<?php $tanggal = date('Y-m-d H:i:s');  echo "$tanggal"?>" name="tanggal_pengolahan">
                        @if($dataBahanBaku->isEmpty())
                          <button type="button" id="warning" class="btn btn-warning">Data Kosong, Isi Data Terlebih Dahulu!</button>
                        @else
                          <button type="submit" id="kunci" onclick="fixBahan();" class="btn btn-success">SIMPAN DATA</button>
                        @endif
                      </td>
                    </form>
                  </tr>
                  <td>
                  </tbody>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="6"></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

        </div><!--end .card-body -->
      </div>
    </div>
  </div>
</div>

<script>
 $(document).ready(function(){
  jml = document.getElementById('jumlah_sajian').value;
  if (jml == 0) {
   document.getElementById('jumlah_sajian').readOnly = false;    
   document.getElementById('pakaiBahan').style.display = 'none';
 } else{
   document.getElementById('jumlah_sajian').readOnly = true;
 };
 total = document.getElementById('totalDB').value;
 if (total == 0 ) {
  document.getElementById('tambahBahan').style.display = 'block';
  for (var i = 1; i <= <?php echo json_encode($a); ?>; i++) {
    document.getElementById('a'+i).style.display = 'block';
  };
}else{
 document.getElementById('simpanAtas').style.display = 'none';
 document.getElementById('tambahBahan').style.display = 'none';
 document.getElementById('kunci').style.display = 'none'
 for (var i = 1; i <= <?php echo json_encode($a);?>; i++) {
  document.getElementById('a'+i).style.display = 'none';
};
};
});
</script>
@extends('gizi.mod_tambahBahanOlah')
@endsection

