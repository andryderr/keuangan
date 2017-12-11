
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
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Pemindahan Barang</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <form method="post" action="{{url('FARMASI/tambahPemindahan')}}">
              {{csrf_field()}}
              <div class="box-body">
               <div class="form-group col-md-12">
                 <div class="form-group col-md-12">
                   <label>Nama Gudang Asal - Gudang Tujuan</label>
                   <div class="input-group">
                    @if($status == 1)
                    <select readonly class="form-control" name="gudangawal" id="">
                      <option value="{{$data[0]->gudangawal->id_gudang}}">{{$data[0]->gudangawal->nama_gudang}}</option>
                    </select>
                    @else
                    <select class="form-control" name="gudangawal" id="">
                     @foreach($gudang as $dg)
                     <option value="{{$dg->id_gudang}}">{{$dg->nama_gudang}}</option>
                     @endforeach
                   </select>
                   @endif
                   <span class="input-group-addon"> <strong>-</strong></span>  
                   @if($status == 1)
                   <select readonly class="form-control" name="gudangtujuan" id="">
                     <option value="{{$data[0]->gudangtujuan->id_gudang}}">{{$data[0]->gudangtujuan->nama_gudang}}</option>
                   </select>
                   @else            
                   <select class="form-control" name="gudangtujuan" id="">
                    @foreach($gudang as $dg)
                    <option value="{{$dg->id_gudang}}">{{$dg->nama_gudang}}</option>
                    @endforeach
                  </select>
                  @endif
                </div>
              </div>

              <div class="form-group col-md-12">
                <label>No Akun</label>
                @if($status == 1)
                <input type="number" readonly="" class="form-control" value="{{$data[0]->id_pemindahan}}" placeholder="" name="id_pemindahan" id="">
                @else
                <input type="number" readonly="" class="form-control" placeholder="" name="id_pemindahan" id="">
                @endif
              </div>

              <div class="form-group col-md-12">
                <label>Tanggal</label>
                @if($status == 1)
                <input type="text"  class="form-control" readonly="" value="{{$data[0]->tgl_pemindahan}}" placeholder="" name="" id="tanggal" value="">  
                @else
                <input type="text"  class="form-control" placeholder="" name="tgl_pemindahan" id="tanggal" value="">  
                @endif
              </div>

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
             @if($status == 1)
             <textarea rows="6" class="form-control"  name="ket_pemindahan" id="" readonly="" placeholder="isi keterangan">{{$data[0]->keterangan}}</textarea>
             @else
             <textarea rows="6" class="form-control"  name="ket_pemindahan" id="" placeholder="isi keterangan"></textarea>
             @endif
           </div>
           @if($status == 1)
           @else
           <button type="submit" class="btn btn-success pull-right"><i class=""></i>Tambah Item</button> 
           @endif
         </div>
       </form>
     </div>
   </div>



   <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Pemindahan Barang</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        @if($status == 1)
        @if($data[0]->total_pemindahan == 0)   
        <form action="{{url('FARMASI/selesaiPemindahan')}}" method="post">
          <a style="margin-top: 10px;" class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambahItemPindah"> <i class="glyphicon glyphicon-plus"></i> Tambah Barang</a>
          {{csrf_field()}}
          <input type="hidden"  class="form-control" placeholder="" readonly="" value="{{$data[0]->gudangtujuan->id_gudang}}" name="id_gudangtujuan" id="">
           <input type="hidden"  class="form-control" placeholder="" readonly="" value="{{$data[0]->gudangawal->id_gudang}}" name="id_gudangawal" id="">
          <input type="hidden"  class="form-control" placeholder="" readonly="" value="{{$data[0]->id_pemindahan}}" name="id_pemindahan" id="">
          <input type="hidden"  class="form-control" placeholder="" readonly="" name="total_pemindahan" id="totalsimpan">
          <button type="submit" class="btn btn-success btn-md" id="tomboltambah" style="margin-top: 10px;"> <i class="fa fa-save"></i> Selesai</a></button>
        
        @else

        @endif
        @else
        @endif
        <br>
        <br>
        <div class="table-responsive">
         <table id="" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
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
          @if($status == 1)
            @foreach($detail as $pbg)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$pbg->id_barang}}</td>
              <td>{{$pbg->barang->nama_barang}}</td>
              <td>{{$pbg->satuan}}</td>
              <td>{{$pbg->jumlah}}</td>
              <td>{{$pbg->subtotal}}</td>
              <td>      
                @if($data[0]->total_pemindahan == 0)                                          
                <a href="/FARMASI/hapusDetailPemindahan/{{$pbg->id_detail_pemindahan}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></a>
                @else

                @endif
              </td>
              <?php $subtot += $pbg->subtotal; ?>
            </tr>
            @endforeach
            @foreach($barangsama as $jk)
            <input type="text" name="id_bar[]" id="id_bar" value="{{$jk->id_bar}}">
            <input type="text" name="j_kecil[]" id="j_kecil" value="{{$jk->jumlah}}">
            @endForeach
          @else
          @endif
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
      </div>
    </div>
  </div>
</div><!--end .card-body -->
</form>
</section>
</div>
</div>
</div>

@extends('farmasi.mod_tambahPemindahan')
<script>
  $(document).ready(function(){
    var harga = 0;
    var idb = 0;
    var tot = 0;
    var har1 = 0;
  });
  function setSubtotal(id){
    var subtotal = 0;
    harga = document.getElementById("hrg1"+id).innerHTML;
    idb = document.getElementById("idBarang"+id).innerHTML;
    stokbarang = document.getElementById("stok1"+id).innerHTML;

  // alert(document.getElementById("idBarang"+id).value);

  bahanbaku = document.getElementById("nama_brg"+id).innerHTML;
  document.getElementById("bahanBaku").value = bahanbaku;
  document.getElementById("hargabahan").value = harga;
  document.getElementById("idBahan").value = idb;
  document.getElementById("stokbarang").value = stokbarang;
  document.getElementById("quantity").value = '';


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
  if (parseFloat(tot) > parseFloat(stokbarang)) {
    alert("stok awal melebihi stok barang yang tersedia")
    document.getElementById("tombolsimpan").disabled = true;
    document.getElementById("jumlah_stokawal").value = 0;
    document.getElementById("subtotal").value = 0;
  }else{
    har1 = harga*tot;
    document.getElementById("tombolsimpan").disabled = false;
  }
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
