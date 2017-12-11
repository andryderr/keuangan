

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
        <form method="post" action="{{url('FARMASI/tambahMasterPenjualan')}}">
          {{csrf_field()}}
          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Master Penjualan</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
               <div class="form-horizontal">
                <div class="box-body">

                  <div class="form-group">
                    <label for="tanggal_penjualan" class="col-sm-5 control-label">Tanggal Penjualan</label>
                    <div class="col-md-7">
                      @if($status == 1)
                      <input type="text"  class="form-control" placeholder="" readonly name="tgl_jual" id="tanggal_penjualan" value="{{$dataMaster[0]->tanggal_penjualan}}">
                      @else
                      <input type="text"  class="form-control" placeholder="" readonly name="tgl_jual" id="tanggal_penjualan" value="<?php 
                      date_default_timezone_set('Asia/Jakarta');
                      $tanggal = date('Y-m-d H:i:s');
                      echo "$tanggal"; 
                      ?>">  
                      @endif  
                    </div>
                  </div>

                  <div class="form-group">
                   <label for="nomer_entri" class="col-md-5 control-label">Nomer Entri</label>
                   <div class="col-md-7">
                    @if($status == 1)
                    <input type="text"  class="form-control" placeholder="" readonly name="" id="nomer_entri" value="{{$id_penjualan}}">
                    @else
                    <input type="text"  class="form-control" placeholder="" readonly name="" id="nomer_entri" value="">
                    @endIf
                  </div>
                </div>

                <div class="form-group">
                  <label  for="nama_pegawai" class="col-md-5 control-label">Nama Pegawai</label>
                  <div class="col-md-7">
                    <input type="text"  class="form-control" readonly name="" id="nama_pegawai" value="{{Auth::user()->name}}">
                  </div>
                </div>

                <div class="form-group">
                  <label  for="kat_pasien" class="col-md-5 control-label"> Customer</label>
                  <div class="col-md-7">
                    <input type="text"  class="form-control" readonly name="kat_pembeli" id="nama_pegawai" value="Umum">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-md-5 control-label"> Gudang</label>
                  <div class="col-md-7">
                    @if($status == 1)
                    <select class="form-control" id="" name="id_gudang_master" disabled="">
                      <option value="{{$dataMaster[0]->id_gudang}}">{{$dataMaster[0]->gudang->nama_gudang}}</option>
                      @else
                      <select class="form-control" id="" name="id_gudang_master" required>  
                        <option disabled selected value> -- select an option -- </option>
                        @foreach($gudang as $row)
                        <option value="{{$row->id_gudang}}">{{$row->nama_gudang}}</option>
                        @endForeach
                        @endif
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="kat_penjualan" class="col-md-5 control-label"> Kategori Penjualan</label>
                    <div class="col-md-7">
                      @if($status == 1)
                      <select class="form-control" name="kat_penjualan" id="kat_penjualan" onchange="resep1();" disabled="">
                        @if(!$dataMaster[0]->nomer_resep)
                        <option value="Non Resep">Non Resep</option>
                        @elseif($dataMaster[0]->nomer_resep)
                        <option value="Resep">Resep</option>
                        @endif
                        @else
                        <select class="form-control" name="kat_penjualan" id="kat_penjualan" onchange="resep1();">
                          <option disabled selected value="0"> -- select an option -- </option>
                          <option value="Non Resep">Non Resep</option>
                          <option value="Resep">Resep</option>
                          @endif
                        </select>
                      </div>
                    </div>
                    @if($status == 1)
                    @else
                    <button type="submit" class="btn btn-success btn-md pull-right">Simpan Master</button>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            @if($status == 1 && $dataMaster[0]->id_resep)
            <div class="box box-primary" id="resep">
              @else
              <div class="box box-primary collapse" id="resep">
                @endif
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
                      @if($status == 1)
                      <input type="text"  class="form-control" readonly name="nomer_resep" id="nomer_resep" value="{{$dataMaster[0]->id_resep}}">
                      @else
                      <input type="text" readonly class="form-control" placeholder="" name="nomer_resep" id="nomer_resep" value="">
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tanggal_resep" class="col-sm-5 control-label">Tanggal Resep</label>
                    <div class="col-md-7">
                      @if($status == 1)
                      <input type="text"  class="form-control" readonly name="tanggal_resep" id="tanggalwaktu" value="{{$dataMaster[0]->tanggal_resep}}">
                      @else
                      <input type="text"  class="form-control" required="" placeholder="Tanggal Resep" name="tanggal_resep" id="tanggalwaktu"> 
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama_dokter" class="col-md-5 control-label"> Nama Dokter</label>
                    <div class="col-md-7">
                      @if($status == 1 && $dataMaster[0]->id_resep)
                      <input type="text"  class="form-control" placeholder="Nama Dokter" value="{{$dataMaster[0]->resepluar->nama_dokter}}" name="nama_dokter" id="nama_dokter" readonly> 
                      @else
                      <input type="text"  class="form-control" placeholder="Nama Dokter" name="nama_dokter" id="nama_dokter"> 
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label  for="id_pendaf" class="col-md-5 control-label"> Nama Pasien</label>
                    <div class="col-md-7">
                      @if($status == 1 && $dataMaster[0]->id_resep)
                      <input type="text"  class="form-control" value="{{$dataMaster[0]->resepluar->nama_pasien}}" name="nama_pasien" id="nama_pasien" readonly>
                      @else
                      <input type="text"  class="form-control" placeholder="Nama Pasien" name="nama_pasien" id="nama_pasien">
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

        <form action="{{url('FARMASI/updateMasterPenjualan')}}" method="post">
          {{csrf_field()}}
          <div class="col-md-12">
            @if($status == 1)
            <div class="box box-primary" id="tabel1">
              <input type="hidden"  class="form-control" placeholder="" readonly name="id_penjualan_barang_master" id="nomer_entri" value="{{$id_penjualan}}">
              <input type="hidden"  class="form-control" placeholder="" readonly name="id_gudang1" id="nomer_entri" value="{{$dataMaster[0]->id_gudang}}">
              <input type="hidden"  class="form-control" placeholder="" readonly name="tgl_penjualan" id="nomer_entri" value="{{$dataMaster[0]->tanggal_penjualan}}">
              @else
              <div class="box box-primary collapse" id="tabel1">
                @endif
                <div class="box-header with-border">
                  <h3 class="box-title">Transaksi Penjualan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <a class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambahPenjualanObat"> <i class="glyphicon glyphicon-plus"></i> Tambah Item</a>
                  <br>
                  <div class="table-responsive">
                   <table id="" class="" width="100%">
                    <thead>
                      <tr class="bg-info" font-size: 13px;">
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
                        <th style="width:100px;">Aksi</th>
                      </tr>
                    </thead>
                    <?php $no=1; $subtot=0;?>
                    <tbody>
                      @if($status == 1)
                      @foreach($detailPenjualan as $dp)
                      <tr  style="font-size: 13px;">
                       <td>{{$no++}}</td>
                       <td>{{$dp->id_barang}}</td>
                       <td>{{$dp->barang->nama_barang}}</td>
                       <td>{{$dp->satuan}}</td>
                       <td>{{$dp->jumlah}}</td>
                       <td>{{$dp->harga}}</td>
                       <td>{{$dp->biaya_resep}}</td>
                       <td>{{$dp->biaya_racik}}</td>
                       <td>{{$dp->diskon_rp}}</td>
                       <td>{{$dp->diskon_rp1}}</td>
                       <td>{{$dp->diskon_rp2}}</td>
                       <td>{{$dp->sub_total}}</td>
                       <td>                                                 
                         <a href="{{url('FARMASI/hapusDetailPenjualan')}}/{{$dp->id_detail_penjualan}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" style="margin-bottom: 5px; margin-top: 5px;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></button></a>
                       </td>
                       <?php $subtot += $dp->sub_total; ?>
                     </tr>
                     @endforeach
                     @foreach($j_kecil as $jk)
                     <input type="hidden" name="id_bar[]" id="id_bar" value="{{$jk->id_bar}}">
                     <input type="hidden" name="j_kecil[]" id="j_kecil" value="{{$jk->jumlah}}">
                     @endForeach
                     <br>
                     @else
                     @endif
                   </tbody>
                   <tbody class="jumlahTagihan">
                    <tr class="bg-success">
                      <td colspan="10"></td>
                      <td><h3><strong>Total : </strong></h3></td>
                      <td colspan="2"><input type="text" style="font-size:25px; font-weight:bold; margin-top:11px; width:200px; border-width:0px; background-color:transparent;" readonly="" class="form-control pull-left" name="total_master" id="totaltampil">
                        <input type="hidden" readonly="" class="form-control pull-left" name="total_semua" value="{{$subtot}}" id="total">
                      </td>
                    </tr>
                  </tbody>
                </tbody>
              </table>
              <br>
              <button type="submit" class="btn btn-success pull-right">Selesai  <span class="fa fa-save"></span></button>

            </div>
          </div>
        </div>
      </div><!--end .card-body -->

    </form>

  </div>
</div>
@extends('farmasi.mod_tambahPenjualanObat')
@extends('farmasi.mod_tambahCustomer')

<script>
  function resep1()
  {
    if (document.getElementById("kat_penjualan").value == "Non Resep") {
      document.getElementById("resep").style.display= 'none';
      // document.getElementById("bayar").readOnly ='false';
      $("#nomer_resep").attr("required", false);
      $("#tanggalwaktu").attr("required", false);
      $("#cari_dokter").attr("required", false);
      $("#cari_pasien").attr("required", false);
    } else if (document.getElementById("kat_penjualan").value == "Resep") {
      document.getElementById("resep").style.display='block';
      // document.getElementById("bayar").readOnly='false';
      $("#nomer_resep").attr("required", true);
      $("#tanggalwaktu").attr("required", true);
      $("#cari_dokter").attr("required", true);
      $("#cari_pasien").attr("required", true);
    }
  }  
</script>
<script type="text/javascript">
  $('#test').click(function() {
    alert("mouse");
  });
</script>

<script>
  $(document).ready(function(){
    var harga1 = 0;
    var harga3 = 0;
    var idb = 0;
    var tot = 0;
    var har1 = 0;
    var subtotal = 0;
    var id1 = 0;
    var stk = 0;
  });
  function setSubtotal(id){
    $("#btn_editBarang").prop('disabled', false);
    $("#btn_simpan").prop('disabled', false);
    var view_url = "{{url('G/dataBarang')}}"+"/"+id;
    $.getJSON(view_url,function(result){
         // console.log(result);
         result.forEach(function(r){
          id1 = id;
          harga1 = r['harga_jual1'];
          harga3 = r['harga_jual3'];
          idb = r['id_barang'];
          bahanbaku = r['nama_barang'];
          stk = r['stok'];
          document.getElementById("bahanBaku").value = bahanbaku;
          document.getElementById("hargabahan").value = harga1;
          document.getElementById("idBahan").value = idb;
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
    var qty = document.getElementById("quantity").value;
    if (parseFloat(qty) > stk) {
      alert("Quantity tidak boleh melebihi stok")
      document.getElementById("quantity").value = "";
    }

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
    if (document.getElementById("biaya_resep").value >= '1' || document.getElementById("biaya_racik").value >= '1' ) {
      document.getElementById("hargabahan").value = harga3;
    } else if (document.getElementById("biaya_resep").value == '0' || document.getElementById("biaya_racik").value == '0' ) {
      document.getElementById("hargabahan").value = harga1;
    }
    document.getElementById("strok1").value = tot;
    var harga = document.getElementById("hargabahan").value;
    var diskonpersen1 = document.getElementById("d1").value;
    var diskonpersen2 = document.getElementById("d2").value;
    var diskonrp = document.getElementById("drp").value;
    var biaya_resep = document.getElementById("biaya_resep").value;
    var biaya_racik = document.getElementById("biaya_racik").value;
    har1 = harga*tot;
    var totdiskonrp = (har1 - diskonrp);
    var hardis1 = ((totdiskonrp)*diskonpersen1/100);
    var totdiskonp1 = totdiskonrp - hardis1;
    var hardis2 = ((totdiskonp1)*diskonpersen2/100);
    var biayatambahan = parseFloat(biaya_racik) + parseFloat(biaya_resep);
    var totdiskonp2 = (totdiskonp1 - hardis2) + parseFloat(biayatambahan);

    var subtotal = parseFloat(totdiskonp2);
    document.getElementById("subtotal").value = Math.round(parseFloat(subtotal));
  }
</script>

<script>
  function setSubtotalBB(){
    var bbharga = document.getElementById("bbharga").value;
    var bbhargajual = document.getElementById("bbhargajual").value;
    var marginpersen = (bbhargajual - bbharga) /100;
    var marginrp = bbhargajual - bbharga;

    var mp = parseFloat(marginpersen);
    var mrp = parseFloat(marginrp);
    document.getElementById("marginrp").value = parseFloat(mrp);
    document.getElementById("marginpersen").value = parseFloat(mp+"%");
  }
  function getData(id){
    // alert("idKapasitas");
    $('#idKapasitas'+id).empty();
    data = "";
    for (var i = id; i > 0; i--) {
      data = data+"<option value='"+$('#satuan'+i).val()+"'>"+$('#satuan'+i).val()+"</option>"
    };
    $('#idKapasitas'+id).append(data);
  }

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
<script type="text/javascript">
  $(document).ready(function(){
    $("#totaltampil").val(setTitikRupiah("{{$subtot}}"));
    $("#nettotampil").val(setTitikRupiah("{{$subtot}}"));
    $("#netto").val(("{{$subtot}}"));
    $("#dataAja").DataTable({
     processing: true,
     ajax: '{{ url("FARMASI/dataBarang") }}',

     columns: [
     { data: 'id_barang', name: 'id_barang' },
     { data: 'nama_barang', name: 'nama_barang' },
     { data: 'satuan1', name: 'satuan' },
     { data: 'harga_jual1', name: 'harga_jual1' }, 
     { data: 'stok', name: 'stok' }, 
     { data: 'aksi'}
     ]
   });
  });
</script>


@endsection
