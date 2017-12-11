@extends('attr.footer')
@extends('gizi.head')
<link rel="stylesheet" href="{{url('../assets/cetak/pembelianBahanBaku.css')}}">

@extends('attr.header')

<!-- Left side column. contains the logo and sidebar -->
@extends('gizi.sidebar')

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
        <form class="" action="{{url('GIZI/BahanBaku/Pembelian/Tambah')}}" method="post"> 
          {{csrf_field()}}       
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Master Pembelian</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <!-- <label>ID Supplier</label> -->
                  <input style="width:120px;" type="hidden" readonly="" class="form-control" placeholder="" name="" id="">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:38px">Nama Supplier</span>
                  <div class="col-md-7">
                    <select name="id_supplier" id="id_supplier" class="form-control">
                      @if($status == 0)
                      @foreach($supplier as $sup)
                      <option value="{{$sup->id_supplier}}">{{$sup->nama_supplier}}</option>
                      @endforeach
                      @elseif($status == 2)
                      <option value="{{$data[0]->id_supplier}}">{{$data[0]->sup->nama_supplier}}</option>
                      @else
                      <option value="{{$data[0]->id_supplier}}">{{$data[0]->nama_supplier}}</option>
                      @endif
                    </select>
                  </div>
                  @if($status == 0)
                  <a href="" class="btn btn-primary btn-md" data-toggle = "modal" data-target = "#tambahSupplier"> <i class="glyphicon glyphicon-plus"></i> Supplier</a>
                  @endif
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon">Tanggal Pembelian</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="tgl_pembelian" id="tgl_pembelian" 
                  value="<?php 
                  if ($status == 2) {
                    echo $data[0]->tanggal_pembelian;
                  }else{
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d H:i:s');
                    echo "$tanggal"; 
                  }
                  ?>">  
                </div>
                <input class="hidden" type="hidden" name="kat_barang" id="kat_barang" value="Bahan Baku"></input>
                <br>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:48px">Nomer Entri</span>
                  <input type="number"  class="form-control" placeholder="" readonly name="" id="" value="PM121343">
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">

                <div class="form-group">
                  <label>No Faktur</label>
                  <input type="number" class="form-control" placeholder="" name="no_faktur" id="" @if($status == 2)value="{{$data[0]->no_faktur}}"@endif>
                </div>
                <div class="form-group">
                  <label>Tanggal Faktur</label>
                  <input type="text"  class="form-control" placeholder="" name="tanggal_faktur" id="tanggal">
                </div>
                @if($status != 2)
                <button type="submit" id="simpanAtas" class="btn btn-primary">ISI ITEM</button>
                @endif
              </div>
            </div>
          </div>
        </form>
        <br>
        @if($status == 2)
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Transaksi Pembelian</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahBahanBaku"> <i class="glyphicon glyphicon-plus"></i> Tambah Bahan Baru</a>
              <a class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambahBeli"> <i class="glyphicon glyphicon-plus"></i> Tambah Pembelian</a>
              <br>
              <br>
              <div class="table-responsive">
                <table>
               
                    <tr style="background:#E0E0E0;">
                      <th>No</th>
                      <th>ID</th>
                      <th>Bahan Baku</th>
                      <th>Satuan</th>
                      <th>Quantity</th>
                      <th>Harga</th>
                      <th>Diskon RP</th>
                      <th>Diskon 1</th>
                      <th>Diskon 2</th>
                      <th>Subtotal</th>
                      <th style="width:100px;">Aksi</th>
               
                  <?php $no=1;?>
                 
                      <tr>
                        <td>{{$no++}}</td>
                        <td>fa79</td>
                        <td>Beras</td>
                        <td>Kg</td>
                        <td>10</td>
                        <td>10000</td>
                        <td>1000</td>
                        <td>2%</td>
                        <td>3%</td>
                        <td>100000</td>
                        <td>                                                 
                         <a href="#" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></button></a>
                       </td>
                     </tr>
                     
                     <tr>
                      <td>{{$no++}}</td>
                      <td>fa79</td>
                      <td>Terong</td>
                      <td>Gr</td>
                      <td>10</td>
                      <td>10000</td>
                      <td>1000</td>
                      <td> </td>
                      <td> </td>
                      <td>100000</td>
                      <td>                                                 
                       <a href="#" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></button></a>
                     </td>
                   </tr>
                   <tr>
                    <td colspan="7"></td>
                    <td><h3>Total</h3></td>
                    <td colspan="2"><input type="text" style="font-size:25px; font-weight:bold; margin-top:18px; width:200px" readonly="" class="form-control" value="20000" name="" id="total"></td>
                  </tr>
                  <br>
                
              </table>
            </div>
          </div>
        </div>
      </div><!--end .card-body -->

      <div class="col-md-5">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="form-group col-md-3">
              <label>Discount %</label>
              <input type="number" class="form-control" placeholder="%" name="" id="diskonpersen" onkeyup="hasilNetto();">
            </div>
             <div class="form-group col-md-4">
              <label>Discount (Rp)</label>
              <input type="number" class="form-control" placeholder="Rp" name="" id="diskonuang" readonly="">
            </div>
            <div class="form-group col-md-5">
              <label>Discount Rp</label>
              <input type="number" class="form-control" placeholder"Rp" name="" id="diskonrp" onkeyup="hasilNetto();">
            </div>

            <div class="form-group col-md-6">
              <label>PPN %</label>
              <input placeholder="%" type="number" class="form-control"  name="" id="ppnpersen" onkeyup="hasilNetto();">
            </div>

            <div class="form-group col-md-6">
              <label>PPN Rp</label>
              <input type="number" readonly="" class="form-control"  name="" id="ppnrp" onkeyup="hasilNetto();">
            </div>

            <div class="form-group col-md-12">
              <label>Netto</label>
              <input type="number" style="font-size:30px; font-weight:bold;" readonly="" value="0" class="form-control col-md-7" name="" id="netto">
            </div>

            <br>
            <button type="button" class="btn btn-success pull-right" data-toggle="collapse" data-target="#checkout" id="tombolbeli">
              Checkout <span class="glyphicon glyphicon-play"></span>
            </button>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="box box-primary collapse" id="checkout">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
           <div class="form-group">
            <label>Kategori Pembelian</label>
            <select class="form-control" name="" id="katPembelian" onclick="pembayaran1();">
              <option value="tunai">Tunai</option>
              <option value="kredit">Kredit</option>
            </select>
          </div>

          <div class="form-group" id="top1">
            <label>TOP</label>
            <input type="number" class="form-control" placeholder="" name="" id="top" onkeyUp="jatuhTempo1();">
          </div>

          <div class="form-group" id="jatuhTempo">
            <label>Tanggal Jatuh Tempo</label>
            <input type="text" readonly="" class="form-control" placeholder="" name="" id="jatuhTempo">
          </div>

          <div class="form-group">
            <label>Kategori Pembelian</label>
            <select class="form-control" name="" id="">
              <option>----</option>
              <option value="Logistik">Logistik</option>
              <option value="Gizi">Gizi</option>
            </select>
          </div>

          <div class="form-group">
            <label>Gudang</label>
            <select class="form-control" name="" id="">
              <option>----</option>
              <option value="">Gudang 1</option>
              <option value="">Gudang 2</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="form-group col-md-12">
            <label>Bayar/Uang Muka</label>
            <input type="number" onkeyup="hitungKembali();" style="font-size:30px; font-weight:bold;" class="form-control col-md-5" name="" id="bayar" >
          </div>
          <div class="form-group col-md-12">
            <label>Kembali</label>
            <input type="number" style="font-size:30px; font-weight:bold;" readonly="" class="form-control col-md-5"  name="" id="kembali">
          </div>
          <button type="button" class="btn btn-success pull-right">
            Selesai <span class="fa fa-save"></span>
          </button>
        </div>
      </div>
    </div>
    @endif


  </div>
</div>

@extends('gizi.mod_tambahBahanBaku')
@extends('gizi.mod_tambahBeli')
@extends('gizi.mod_tambahSupplier')
<script>
  function hitungKembali(){
    var netto = document.getElementById("netto").value;
    var bayar = document.getElementById("bayar").value;
    var hasil = bayar - netto;
    if (bayar == 0) {
      document.getElementById("kembali").value = 0;
    }else{
      document.getElementById("kembali").value = hasil;
    }
  }
</script>

<script>
  function hasilNetto(){
    var total = document.getElementById("total").value;
    var diskonpersen = document.getElementById("diskonpersen").value;
    var diskonrp = document.getElementById("diskonrp").value;
    var ppnpersen = document.getElementById("ppnpersen").value;

    var duang = (total*(diskonpersen/100));
    document.getElementById("diskonuang").value = duang;
    var diskonuang = total - (total*(diskonpersen/100)) - diskonrp; 
    var ppnpajak = parseFloat(diskonuang) + (parseFloat(diskonuang)*(ppnpersen/100));
    var netto = parseFloat(ppnpajak);
    document.getElementById("netto").value = netto;
    document.getElementById("ppnrp").value = (parseFloat(diskonuang)*(ppnpersen/100));
  }
</script>

<script>
  function setBayar(){
    var jumlah = document.getElementById("jumlahbayar").value;
    document.getElementById("bayar").value = jumlah;
  }
</script>

<script>
  function jatuhTempo1(){
    var top =  document.getElementById("top").value;
    var someDate = new Date();
    var numberOfDaysToAdd = top;
    var tgljatuh = someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
    document.getElementById('jatuhTempo').value = tgljatuh;
  }

  function pembayaran1()
  {
    if (document.getElementById("katPembelian").value == "kredit") {
      document.getElementById("jatuhTempo").style.display='block';
      document.getElementById("top1").style.display='block';
      // document.getElementById("bayar").readOnly ='false';
    } else {
      document.getElementById("jatuhTempo").style.display='none';
      document.getElementById("top1").style.display='none';
      // document.getElementById("bayar").readOnly='false';
    }
  }
</script>
<script type="text/javascript">
  $('#test').click(function() {
    alert("mouse");
  });
</script>
<script>

  function setSubtotal(){
    var subtotal = 0;
    // if (document.getElementById("radio").checked) {
    //   var harga = document.getElementById("harga").value;
    // }
    var harga = document.getElementById("harga").value;
    var quantity = document.getElementById("quantity").value;
    var idb = document.getElementById("idBh").value;

    var diskonpersen1 = document.getElementById("d1").value;
    var diskonpersen2 = document.getElementById("d2").value;
    var diskonrp = document.getElementById("drp").value;
    // set nama bahan
    bahanbaku = document.getElementById("isibahanbaku").value;
    document.getElementById("bahanBaku").value = bahanbaku;
    document.getElementById("hargabahan").value = harga;
    document.getElementById("idBahan").value = idb;


    var totdiskonrp = ((harga*quantity) - diskonrp);
    var hardis1 = ((totdiskonrp)*diskonpersen1/100);
    var totdiskonp1 = totdiskonrp - hardis1;
    var hardis2 = ((totdiskonp1)*diskonpersen2/100);
    var totdiskonp2 = totdiskonp1 - hardis2;
    // alert(totdiskonrp);

    var subtotal = parseFloat(totdiskonp2);
    document.getElementById("subtotal").value = parseFloat(subtotal);
  }
</script>

<script>
  function setSubtotalBB(){
    var bbharga = document.getElementById("bbharga").value;
    var bbhargajual = document.getElementById("bbhargajual").value;
    // var bbquantity = document.getElementById("bbquantity").value;

    // var bbdiskonpersen1 = document.getElementById("bbd1").value;
    // var bbdiskonpersen2 = document.getElementById("bbd2").value;
    // var bbdiskonrp = document.getElementById("bbdrp").value;

    // var bbhardis1 = ((bbharga*bbquantity)*bbdiskonpersen1/100);
    // var bbhardis2 = ((bbharga*bbquantity)*bbdiskonpersen2/100);
    // var bbtotdiskonrp = ((bbharga*bbquantity) - bbdiskonrp) - (bbhardis1 + bbhardis2);
      // var bbtotdiskonrp = ((bbharga*bbquantity) - bbdiskonrp) - (bbhardis1 + bbhardis2);
      var marginpersen = (bbhargajual - bbharga) /100;
      var marginrp = bbhargajual - bbharga;
    // alert(totdiskonrp);

    var mp = parseFloat(marginpersen);
    var mrp = parseFloat(marginrp);
    // alert(marginpersen);
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
@endsection
