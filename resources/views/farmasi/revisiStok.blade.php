
<!-- <link rel="stylesheet" href="{{url('../assets/cetak/pembelianBahanBaku.css')}}"> -->

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
              <h3 class="box-title">Revisi Stok</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">

              <form action="{{url('FARMASI/tambahMasterRevisi')}}" method="post">
                {{csrf_field()}}
                <div class="form-group col-md-12">
                  <label>Nama Gudang</label>
                  <select class="form-control" name="id_gudang" id="">
                    @if($status == 0)
                    <option>-----</option>
                    @foreach($dataGudang as $row)
                    <option value="{{$row->id_gudang}}">{{$row->nama_gudang}}</option>
                    @endForeach
                    @elseif($status == 1)
                    <option value="{{$dataRevisi[0]->id_gudang}}" readonly>{{$dataRevisi[0]->gudang->nama_gudang}}</option>
                    @endif
                  </select>
                </div>

                <div class="form-group col-md-12">
                  <label>No Entry</label>
                  @if($status == 0)
                  <input type="number"  class="form-control" placeholder="" readonly name="" id="">
                  @elseif($status == 1)
                  <input type="number"  class="form-control" value="{{$dataRevisi[0]->id_revisi}}" readonly name="" id="">
                  @endIf
                </div>

                <div class="form-group col-md-12">
                  <label>Tanggal Revisi</label>
                  @if($status == 0)
                  <input type="text"  class="form-control" placeholder="" name="tgl_revisi" id="tanggal" value="">  
                  @elseif($status == 1)
                  <input type="text"  class="form-control" readonly name="tgl_revisi" id="tanggal" value="{{$dataRevisi[0]->tgl_revisi}}">  
                  @endIf
                </div>

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
               <div class="form-group">
                 <label>Keterangan</label>
                 @if($status == 0)
                 <textarea rows="6" class="form-control"  name="keterangan" id="" placeholder="isi keterangan"></textarea>
                 @elseif($status == 1)
                 <textarea rows="6" class="form-control"  name="keterangan" id="" readonly placeholder="{{$dataRevisi[0]->keterangan}}"></textarea>
                 @endIf
               </div>

               @if($status == 0)
               <button class="btn btn-success pull-right" type="submit"><i class=""></i>Tambah Item</button>
               @elseif($status == 1)
               @endif

             </div>
           </div>
         </div>
       </form>



       <div class="col-md-12">
         <form method="post" action="{{url('FARMASI/updateMasterRevisi')}}">
           {{csrf_field()}}
           @if($status == 0)
           <div class="box box-primary collapse" id="tambahitem">
            @elseif($status == 1)
            <div class="box box-primary" id="tambahitem">
              @endif
              <div class="box-header with-border">
                <h3 class="box-title">Revisi Stok</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <a class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambahRevisiStok"> <i class="glyphicon glyphicon-plus"></i> Tambah Barang</a>
                <br>
                <br>
                <div class="table">
                 <table id="tablenopaging" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr style="background:#E0E0E0;">
                      <th>No</th>
                      <th>ID</th>
                      <th>Bahan Baku</th>
                      <th>Satuan</th>
                      <th>Qty Barang</th>
                      <th>Qty Revisi</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; ?>
                    @if($status == 1)
                    @foreach($detailRevisi as $row)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$row->barang->id_barang}}</td>
                      <td>{{$row->barang->nama_barang}}</td>
                      <td>{{$row->barang->satuan1}}</td>
                      <th>{{$row->barang->stok}}</th>
                      <td>{{$row->qty_revisi}}</td>
                      <td>{{$row->barang->harga}}</td>
                      <td>                                                 
                       <a href="{{url('FARMASI/hapusDetailRevisi')}}/{{$row->id_revisi}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></a>
                     </td>
                   </tr>
                   <input type="text" name="id_bar[]" id="id_bar" value="{{$row->barang->id_barang}}">
                   <input type="text" name="j_kecil[]" id="id_bar" value="{{$row->qty_revisi}}">
                   @endForeach
                   @else
                   @endif
                 </tbody>
               </table>
               @if($status == 1)
               <input type="hidden"  class="form-control" value="{{$dataRevisi[0]->id_revisi}}" readonly name="id_revisi" id="">
               <input type="hidden" name="id_gudang_master" value="{{$dataRevisi[0]->id_gudang}}">
               @endIf
               <button type="submit" class="btn btn-success pull-right">Selesai  <span class="fa fa-save"></span></button>
             </div>
           </div>
         </div>
       </div><!--end .card-body -->
     </form>
   </section>
 </div>
</div>
</div>

@extends('farmasi.mod_tambahItemRevisiStok')
<script>
  $(document).ready(function(){
    $("#itemRevisi").DataTable({
     processing: true,
     ajax: '{{ url("FARMASI/dataBarang") }}',

     columns: [
     { data: 'id_barang', name: 'id_barang' },
     { data: 'nama_barang', name: 'nama_barang' },
     { data: 'satuan1', name: 'satuan' },
     { data: 'harga', name: 'harga' }, 
     { data: 'stok', name: 'stok' }, 
     { data: 'aksi'}
     ]
   });
  });
  function setSubtotal(id){
    var subtotal = 0;
    var view_url = "{{url('G/dataBarang')}}"+"/"+id;
    $.getJSON(view_url,function(result){
         // console.log(result);
         result.forEach(function(r){
          harga = r['harga_jual1'];
          id = r['id_barang'];
          bahanbaku = r['nama_barang'];
          stk = r['stok'];
          document.getElementById("id_barang").value = id;
          document.getElementById("nama_barang").value = bahanbaku;
          document.getElementById("harga_barang").value = harga;
          document.getElementById("stok_barang").value = stk;
        });
       });
    
    $("#qty_revisi").attr("max", stk);

    var view_url = "{{url('G/dataSatuan')}}";
    $.ajax({
      url: view_url,
      type:"GET",
      data: {"id":id},
      success: function(result){
       $("#satuan_lain").empty();
       result.forEach(function(r){
        for (var i = 1; i <= 4; i++) {
          if (r["satuan"+i+""]) {
            $("#satuan_lain").append("<option value="+r["satuan"+i+""]+">"+r["satuan"+i+""]+"</option>");
          }
        }
        for (var i = 2; i <= 4; i++) {
          document.getElementById("satuan_turunan"+i+"").value = r["satuan_turunan"+i+""];
          document.getElementById("kapasitas"+i+"").value = r["kapasitas"+i+""];
        }
        for (var i = 1; i <= 4; i++) {
          document.getElementById("satuan1"+i).value = r["satuan"+i];
        }
      });
     }
   });
  }

  function subTot(){
    q = $("#qty_revisi").val();
    a = $("#satuan_lain").val();
    k = $("#satuan11").val();
    b = $("#satuan12").val();e = $("#kapasitas2").val();h = $("#satuan_turunan2").val();
    c = $("#satuan13").val();f = $("#kapasitas3").val();i = $("#satuan_turunan3").val();
    d = $("#satuan14").val();g = $("#kapasitas4").val();j = $("#satuan_turunan4").val();
    if (a == k) {
      tot = q;
    }else if (a == b) {
      tot = e*q;
    }else if (a == c) {
      if (i == k) {
        tot = q*f;
      }else{
        tot = q*e*f;
      }
    }else if (a == d) {
      if (j == k) {
        tot = g*q;
      }else if (j == c) {
        if (i == b) {
          tot = q*g*e*f;
        }else {
          tot = q*g*f;
        }
      }else{
        tot = q*g*e;
      }
    }
    document.getElementById("stok1").value = tot;
  }
</script>
@endsection
