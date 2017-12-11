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
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
          @endforeach
        </div> <!-- end .flash-message -->
        <br>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Stok Awal Gudang</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="form-group col-md-4">
              <label>Gudang</label>
              <input type="text"  readonly="" class="form-control" placeholder="" value="{{$master[0]->gudang->nama_gudang}}" name="" id="">
            </div>

            <div class="form-group col-md-4">
              <label>No Akun</label>
              <input type="number"  class="form-control" placeholder="" readonly="" value="{{$master[0]->id_stokawal}}" name="id_stokawal" id="">
            </div>

            <div class="form-group col-md-4">
              <label>Tanggal Stok Awal</label>
              <input type="text"  class="form-control" placeholder="" readonly="" name="" id="" 
              value="{{$master[0]->tgl_stokawal}}">  
            </div>

          </div>


          <div class="box-body">
            <div class="col-md-12">
             @if($master[0]->total_stokawal == 0)   
             <form action="{{url('FARMASI/selesaiStokAwal')}}" method="post">
              <a style="margin-top:10px;" class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahStokAwal" id="tomboltambah"> <i class="glyphicon glyphicon-plus"></i> Tambah Stok</a>
              {{csrf_field()}}
              <input type="hidden"  class="form-control" placeholder="" readonly="" value="{{$master[0]->id_stokawal}}" name="id_stokawal" id="">
              <input type="hidden"  class="form-control" placeholder="" readonly="" name="total_stokawal" id="totalsimpan">
              <button type="submit" class="btn btn-primary btn-md" id="tomboltambah" style="margin-top: 10px;"> <i class="fa fa-save"></i> Selesai</a></button>
              <input type="hidden"  class="form-control" placeholder="" value="{{$master[0]->id_gudang}}" name="id_gudang1" id="">
              @else

              @endif

              <table id="tablenopaging" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr class="bg-info">
                    <th>No</th>
                    <th>ID</th>
                    <th>Barang</th>
                    <th>Satuan</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; $subtot = 0;?>
                  @foreach($detail as $dsa)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$dsa->id_barang}}</td>
                    <td>{{$dsa->nama_barang}}</td>
                    <td>{{$dsa->satuan}}</td>
                    <td>{{$dsa->qty_awal}}</td>
                    <td>{{$dsa->subtotal}}</td>
                    <td>      
                      @if($master[0]->total_stokawal == 0)                                          
                      <a href="/FARMASI/hapusDetailStokAwal/{{$dsa->id_detailstokawal}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></a>
                      @else

                      @endif
                    </td>
                    <?php $subtot += $dsa->subtotal; ?>
                  </tr>
                  @endforeach
                  @foreach($detail as $jk)
                  <input type="hidden" name="id_bar[]" id="id_bar" value="{{$jk->id_bar}}">
                  <input type="hidden" name="j_kecil[]" id="j_kecil" value="{{$jk->jumlah}}">
                  @endForeach
                </tbody>
                <tbody class="jumlahTagihan">
                  <tr>
                    <td colspan="4"></td>
                    <td class="bg-success pull-right"><h3><strong>Total : </strong></h3></td>
                    <td colspan="2" class="bg-success"><input type="text" style="font-size:25px; font-weight:bold; margin-top:17px; width:200px; border-width:0px; background-color:transparent;" readonly="" class="form-control pull-left" name="total_tampil" id="totaltampil">
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>

      </div><!--end .card-body -->
    </div>
  </div>
</div>

@extends('farmasi.mod_tambahStokAwal')
<script>
  $(document).ready(function(){
    var harga = 0;
    var idb = 0;
    var tot = 0;
    var har1 = 0;
    $("#dataObat").DataTable({
     processing: true,
     serverSide: true,
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
          harga = r['harga'];
          idb = r['id_barang'];
          bahanbaku = r['nama_barang'];
          stokbarang = r['stok'];
          document.getElementById("bahanBaku").value = bahanbaku;
          document.getElementById("hargabahan").value = harga;
          document.getElementById("idBahan").value = idb;
          document.getElementById("stokbarang").value = stokbarang;
        });
       });
    document.getElementById("quantity").value = '';

  // alert(document.getElementById("idBarang"+id).value);


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
  document.getElementById("stok1").value = tot;
  // var quantity = document.getElementById("quantity").value;
  // var diskonpersen1 = document.getElementById("d1").value;
  // var diskonpersen2 = document.getElementById("d2").value;
  // var diskonrp = document.getElementById("drp").value;
  // if (parseFloat(tot) > parseFloat(stokbarang)) {
  //   alert("stok awal melebihi stok barang yang tersedia")
  //   document.getElementById("tombolsimpan").disabled = true;   
  //   document.getElementById("jumlah_stokawal").value = 0;
  //   document.getElementById("subtotal").value = 0; 
  // }else{
  //   document.getElementById("tombolsimpan").disabled = false;   
  // }
  har1 = harga*tot;
  // var totdiskonrp = (har1 - diskonrp);
  // var hardis1 = ((totdiskonrp)*diskonpersen1/100);
  // var totdiskonp1 = totdiskonrp - hardis1;
  // var hardis2 = ((totdiskonp1)*diskonpersen2/100);
  // var totdiskonp2 = totdiskonp1 - hardis2;

  var subtotal = parseFloat(har1);
  document.getElementById("subtotal_tampil").value = setTitikRupiah(Math.round(parseFloat(subtotal)));
  document.getElementById("subtotal").value = Math.round(parseFloat(subtotal));
}
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#totaltampil").val(setTitikRupiah("{{$subtot}}"));
    $("#totalsimpan").val("{{$subtot}}");
  });
</script>
<script>
  function setTitikRupiah($rupiah){
    var bilangan = $rupiah;
    var reverse = bilangan.toString().split('').reverse().join(''),
    ribuan  = reverse.match(/\d{1,3}/g);
    ribuan  = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }
</script>
@endsection
