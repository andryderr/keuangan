<!DOCTYPE html>
<html>
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
        <br>
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
          @endforeach
        </div> <!-- end .flash-message -->
        <div class="col-md-12">
          <form method="post" action="{{url(Auth::user()->poli->prefix.'/updateMasterStokOpname/')}}">
            {{csrf_field()}}
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Master Stok Opname</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group col-md-6">
                    <label>No Stok Opname</label>
                    <input type="text" class="form-control" value="{{$data[0]->id_stok_opname}}" readonly name="id_stok_opname" id="tanggal">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Tanggal</label>
                    <input type="text" class="form-control" value="{{$data[0]->tgl_stok_opname}}" readonly name="tgl_stok_opname" id="tanggal">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Gudang</label>
                    <select class="form-control" name="id_gudang" id="id_gudang" disabled="true">
                      <option value="{{$data[0]->id_gudang}}">{{$data[0]->gudang->nama_gudang}}</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                   <label>Keterangan</label>
                   <textarea rows="3" class="form-control" readonly name="keterangan" id="keterangan">{{$data[0]->keterangan}}</textarea>
                 </div>
               </div>
             </div>
           </div>
           <br>

           <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Stok Opname</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <a class="btn btn-primary" data-toggle="modal" data-target="#tambahOpname" ><i class="fa fa-plus"></i> Tambah Data</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Selesai</button>
                <br>
                <br>
                <table id="example" class="table table-striped col-md-12"  style="font-size: 12px;">
                  <thead>
                    <tr class="bg-info">
                      <th>No</th>
                      <th>ID</th>
                      <th style="width:200px;">Barang</th>
                      <th>Satuan</th>
                      <th>Stok Awal</th>
                      <th>Stok Koreksi</th>
                      <th>Stok Akhir</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; ?>
                    @foreach($dataDetail as $row)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$row->id_detail_stok_opname}}</td>
                      <td>{{$row->barang->nama_barang}}</td>
                      <td>{{$row->barang->satuan1}}</td>
                      <td>{{$row->stok_awal}}</td>
                      <td>{{$row->stok_opname-$row->stok_awal}}</td>
                      <td>{{$row->stok_opname}}</td>
                      <td><a href="{{url(Auth::user()->poli->prefix.'/hapusDetailStokOpname/'.$row->id_detail_stok_opname)}}" class="btn btn-danger btn-sm" style="margin-bottom: 5px;"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endForeach
                  </tbody>
                </table>
                <!-- </div> -->
              </div>
            </div>
          </form>
        </div><!--end .card-body -->
      </section>
    </div>
  </div>



  @extends('farmasi.mod_tambahStokOpname')
  <script>
    function setItem(){
      $('#tombolpilih').click(function() {
        $('#PilihItemKartuStok').modal('hide');
        var nama = document.getElementById("namaitem").innerHTML;
        document.getElementById("nama_barang").value = nama;
      });
    }
  </script>
  <script>
    function setStokKoreksi(){
     var nama = document.getElementById("namaBarang").innerHTML;
     document.getElementById("barang").value = nama;      
     var stokawal = document.getElementById("stokAwal").value;
     var stokakhir = document.getElementById("stokAkhir").value;

     var stokkoreksi = stokawal - stokakhir;
     document.getElementById("stokKoreksi").value = stokkoreksi;
   }

   $(document).ready(function(){
     $("#data_obat").DataTable({
       processing: true,
       serverSide:true,
       ajax: '{{ url("FARMASI/dataBarang") }}',

       columns: [
       { data: 'id_barang', name: 'id_barang' },
       { data: 'nama_barang', name: 'nama_barang' },
       { data: 'satuan1', name: 'satuan' },
       { data: 'harga', name: 'harga' }, 
       { data: 'stok', name: 'stok'},
       { data: 'aksi'}
       ]
     });
   });

   function setSubtotal(id){
    var subtotal = 0;
    $("#btn_editBarang").prop('disabled', false);
    $("#btn_simpan").prop('disabled', false);
    var view_url = "{{url('G/dataBarang')}}"+"/"+id;
    $.getJSON(view_url,function(result){
         // console.log(result);
         result.forEach(function(r){
          harga = r['harga'];
          idb = r['id_barang'];
          bahanbaku = r['nama_barang'];
          stokAwal = r['stok'];
          document.getElementById("bahanBaku").value = bahanbaku;
          document.getElementById("hargabahan").value = harga;
          document.getElementById("idBahan").value = idb;
          document.getElementById("stok_awal").value = stokAwal;
        });
       });

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
    q = $("#quantity").val();
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
    document.getElementById("jk1").value = tot+"";
  }
</script>
@endsection

</body>
</html>

