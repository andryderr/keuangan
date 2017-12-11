@extends('attr.footer')
@extends('farmasi.head')
<link rel="stylesheet" href="{{url('../assets/cetak/pembelianBahanBaku.css')}}">

@extends('attr.header')

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

        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
          @endforeach
        </div>
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Master Retur Pembelian</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="{{url('FARMASI/returObat/updateMasterReturPembelian')}}">
                {{csrf_field()}}
                <div class="form-group col-md-6">

                  <label>No Retur</label>
                  <input type="number"  class="form-control" placeholder="" readonly="" name="id_retur" id="" value="{{$data[0]->id_retur}}">
                </div>
                <div class="form-group col-md-6">
                  <label>Tanggal Retur</label>
                  <input type="text"  class="form-control" placeholder="" readonly name="tgl_retur" id="tgl_retur" 
                  value="<?php 
                  date_default_timezone_set('Asia/Jakarta');
                  $tanggal = date('Y-m-d H:i:s');
                  echo "$tanggal"; 
                  ?>">
                </div>
                <div class="form-group col-md-12">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" readonly="" rowspan ="3">{{$data[0]->keterangan}}</textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Pembelian</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <!-- <label>ID Supplier</label> -->
                  <input type="hidden" style="width:120px;" readonly="" class="form-control" value="{{$data[0]->sup->id_supplier}}" name="id_supplier" id="id_supplier">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:38px">Nama Supplier</span>
                  <input type="text"  class="form-control" placeholder="" value="{{$data[0]->sup->nama_supplier}}" readonly name="" id="nama_supplier">
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon">Tanggal Pembelian</span>
                  <input type="text"  class="form-control" placeholder="" value="{{$data[0]->pem->tanggal_pembelian}}" readonly name="tgl_pembelian" id="tgl_pembelian">  
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:48px">Nomer Entri</span>
                  <input type="text"  class="form-control" placeholder="" value="{{$data[0]->pem->id_pembelian_barang}}" readonly name="id_pembelian" id="id_pembelian">
                </div>
                <br>

              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Data Pembelian</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                 <table id="" class="" width="100%">
                  <thead>
                    <tr class="bg-danger" font-size: 13px;">
                      <th>No</th>
                      <th>ID</th>
                      <th>Barang</th>
                      <th>Satuan</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Diskon RP</th>
                      <th>Diskon 1</th>
                      <th>Diskon 2</th>
                      <th>Subtotal</th>
                      <th style="width:100px;">Aksi</th>
                    </tr>
                  </thead>

                  <?php $no=1; $subtot = 0;?>
                  <tbody>
                    <tbody>
                      @foreach($data[0]->pem->detpem as $dp)
                      <tr style="font-size: 13px;">
                        <td>{{$no++}}</td>
                        <td>{{$dp->id_barang}}</td>
                        <td>{{$dp->barang->nama_barang}}</td>
                        <td>{{$dp->satuan}}</td>
                        <td>{{$dp->jumlah}}</td>
                        <td>{{$dp->harga}}</td>
                        <td>{{$dp->diskon_rp}}</td>
                        <td>{{$dp->diskon_rp1}}</td>
                        <td>{{$dp->diskon_rp2}}</td>
                        <td>{{$dp->sub_total}}</td>
                        <td>
                          @if($data[0]->netto == 0)                                             
                          <a id="tomboledit" onclick="setEditRetur('{{$dp->id_barang}}','{{$dp->barang->nama_barang}}','{{$dp->harga}}','{{$dp->satuan}}','{{$dp->jumlah}}','{{$dp->diskon_rp1}}','{{$dp->diskon_rp2}}','{{$dp->diskon_rp}}','{{$dp->sub_total}}','{{$dp->barang->stok}}');"><button type="button" data-toggle="modal" data-target="#tambahreturpembelian"; style="margin-bottom:5px; margin-top: 5px;" class="btn btn-primary btn-sm"><i class="fa fa-cart-arrow-down"></i></button></a>
                          @else
                          @endif
                        </td>
                        <?php $subtot += $dp->sub_total; 
                        ?>
                      </tr>
                      @endforeach

                    </tbody>
                    <tbody class="jumlahTagihan">
                      <tr class="bg-warning">
                        <td colspan="8"></td>
                        <td class="pull-right"><h4><strong>Total : </strong></h4></td>
                        <td colspan="2"><input type="text" style="font-size:17px; font-weight:bold; width:200px; border-width:0px; background-color:transparent;" readonly="" class="form-control pull-left" name="" id="totaltampil"></td>
                        <input type="hidden" readonly="" class="form-control pull-left" name="totalbeli" id="total">
                      </tr>
                    </tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!--end .card-body -->

        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data Retur Pembelian</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
               <table id="" class="" width="100%">
                <thead>
                  <tr class="bg-danger" font-size: 13px;">
                    <th>No</th>
                    <th>ID</th>
                    <th>Barang</th>
                    <th>Satuan</th>
                    <th>Qty Retur</th>
                    <th>Harga</th>
                    <th>Diskon RP</th>
                    <th>Diskon 1</th>
                    <th>Diskon 2</th>
                    <th>Subtotal</th>
                    <th style="width:100px;">Aksi</th>
                  </tr>
                </thead>

                <?php $no=1; $subtotretur = 0;?>
                <tbody>
                  <tbody>
                    @foreach($detail as $drp)
                    <tr style="font-size: 13px;">
                      <td>{{$no++}}</td>
                      <td >{{$drp->id_barang}}</td>
                      <td>{{$drp->barang->nama_barang}}</td>
                      <td>{{$drp->satuan}}</td>
                      <td>{{$drp->jumlah}}</td>
                      <td>{{$drp->harga}}</td>
                      <td>{{$drp->diskon_rp}}</td>
                      <td>{{$drp->diskon_rp1}}</td>
                      <td>{{$drp->diskon_rp2}}</td>
                      <td>{{$drp->sub_total}}</td>
                      <td>
                       @if($data[0]->netto == 0)
                       <a href="/FARMASI/hapusDetailRetur/{{$drp->id_detail_retur}}"><button type="button" onclick="return confirm('Hapus Data Ini ?');" style="margin-bottom:5px; margin-top: 5px;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                       @else
                       @endif
                     </td>
                     <?php $subtotretur += $drp->sub_total; ?>
                   </tr>
                   @endforeach
                   @foreach($barangsama as $jk)
                   <input type="hidden" name="id_bar[]" id="id_bar" value="{{$jk->id_bar}}">
                   <input type="hidden" name="j_kecil[]" id="j_kecil" value="{{$jk->jumlah}}">
                   @endForeach
                 </tbody>
                 <tbody class="jumlahTagihan">
                  <tr class="bg-success">
                    <td colspan="8"></td>
                    <td class="pull-right"><h3><strong>Total : </strong></h3></td>
                    <td colspan="2"><input type="text" style="font-size:25px; font-weight:bold; margin-top:11px; width:200px; border-width:0px; background-color:transparent;" readonly="" class="form-control pull-left" name="total_returtampil" id="totalreturtampil">
                      <input type="hidden" readonly="" class="form-control pull-left" name="total_retur" value="{{$subtotretur}}" id="totalretur">
                    </td>
                  </tr>
                </tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!--end .card-body -->

    <div class="col-md-5" style="font-size:10px">
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
            <input type="number" class="form-control" placeholder="%" name="" max="100" id="diskonpersen" onkeyup="hasilNetto();">
          </div>
          <div class="form-group col-md-4">
            <label>Discount (Rp)</label>
            <input type="number" class="form-control" placeholder="Rp" name="diskonrptampil" id="diskonuang" readonly="">
          </div>
          <div class="form-group col-md-5">
            <label>Discount Rp</label>
            <input type="text" class="form-control" placeholder"Rp" name="" id="diskonrp" onkeyup="hasilNetto();" onkeyup="inputTitikRupiah();">
          </div>

          <div class="form-group col-md-6">
            <label>PPN %</label>
            <input placeholder="%" type="number" class="form-control"  name="ppnpersen" id="ppnpersen" onkeyup="hasilNetto();">
          </div>

          <div class="form-group col-md-6">
            <label>PPN Rp</label>
            <input type="number" readonly="" class="form-control"  name="ppnrupiah" id="ppnrp" onkeyup="hasilNetto();">
          </div>

          <div class="form-group col-md-12">
            <label><h4><strong>Netto</strong></h4></label>
            <input type="text" style="font-size:30px; font-weight:bold;" readonly="" value="0" class="form-control col-md-7" name="netto" id="nettotampil">
          </div>

          <input type="hidden" readonly="" value="0" class="form-control col-md-7" name="netto" id="netto">

          <br>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
         <div class="form-group">
          <label>Kategori Pembayaran</label>
          <select required="" class="form-control" name="kat_bayar" id="katPembelian" onclick="pembayaran1();">
            <option>---- Pilih Opsi ----</option>
            <option value="Tunai">Tunai</option>
            <option value="Kredit">Kredit</option>
          </select>
        </div>

        <div class="form-group" id="top1">
          <label>TOP</label>
          <input type="number" class="form-control" placeholder="" name="top" id="top" onkeyUp="jatuhTempoo();">
        </div>

        <div class="form-group" id="jatuhTempo">
          <label>Tanggal Jatuh Tempo</label>
          <input type="text" readonly="" class="form-control" placeholder="" name="jatuhtempo" id="jt">
        </div>

        <div class="form-group">
          <label>Kategori Retur</label>
          <select class="form-control" name="kat_barang" id="">
            <option>----</option>
            <option value="Bahan Baku">Bahan Baku</option>
            <option value="Logistik">Logistik</option>
            <option value="Gizi">Gizi</option>
            <option value="Obat">Obat</option>
            <option value="Alat Medis">Alat Medis</option>
          </select>
        </div>

        <div class="form-group">
          <label>Gudang</label>
          <select class="form-control" name="pilihgudang" id="">
            <option>----</option>
            @foreach($dataGudang as $dg)
            <option value="{{$dg->id_gudang}}">{{$dg->nama_gudang}}</option>
            @endforeach
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
          <input type="text" required="" onkeyup="hitungKembali();" onkeyup="inputTitikRupiah();" style="font-size:30px; font-weight:bold;" class="form-control col-md-5" name="bayaruangmuka" id="bayar" >
        </div>
        <div class="form-group col-md-12" id="viewkembali">
          <label>Kembali</label>
          <input type="text" style="font-size:30px; font-weight:bold;" readonly="" class="form-control col-md-5"  name="" id="kembali">
        </div>
        <div class="form-group col-md-12" id="viewsisatagihan">
          <label>Sisa Tagihan</label>
          <input type="text" style="font-size:30px; font-weight:bold;" readonly="" class="form-control col-md-5"  name="sisatagihan" id="sisatagihan">
        </div>
        @if($data[0]->netto == 0)      
        <button type="submit" class="btn btn-success pull-right">
          Selesai <span class="fa fa-save"></span>
        </button>
        @else
        @endif
      </div>
    </div>
  </div>
</form>
</div>
</div>

@extends('farmasi.mod_tambahItemReturPembelian')
<script>
  function hitungKembali(){
    var netto = document.getElementById("netto").value;
    var bayar = document.getElementById("bayar").value;
    var bayarhitung = bayar.split(".").join(""); 
    var flobayarhitung = parseFloat(bayarhitung);
    var flonetto = parseFloat(netto);
    var hasil = flobayarhitung - flonetto;
    document.getElementById("sisatagihan").value = setTitikRupiah(hasil);
    if (flobayarhitung < flonetto) {
      document.getElementById("kembali").value = 0;
    } else{
      document.getElementById("kembali").value = setTitikRupiah(hasil);
    }
  }
</script>

<script>
  function hasilNetto(){
    var total = document.getElementById("totalretur").value;
    var diskonpersen = document.getElementById("diskonpersen").value;
    var diskonrupiah = document.getElementById("diskonrp").value; 
    var diskonrp =  diskonrupiah.split(".").join("");
    var ppnpersen = document.getElementById("ppnpersen").value;

    var duang = Math.round(total*(diskonpersen/100));
    document.getElementById("diskonuang").value = duang;
    var diskonuang = Math.round(total - (total*(diskonpersen/100)) - diskonrp); 
    var ppnpajak = Math.round(parseFloat(diskonuang) + (parseFloat(diskonuang)*(ppnpersen/100)));
    var netto = parseFloat(ppnpajak);
    document.getElementById("netto").value = netto;
    document.getElementById("nettotampil").value = setTitikRupiah(netto);
    document.getElementById("ppnrp").value = Math.round((parseFloat(diskonuang)*(ppnpersen/100)));
  }
</script>

<script>
  function setBayar(){
    var jumlah = document.getElementById("jumlahbayar").value;
    document.getElementById("bayar").value = jumlah;
  }
</script>

<script>
  function jatuhTempoo(){
    var top =  document.getElementById("top").value;

    Date.prototype.addDays = function(days) {
      var dat = new Date(this.valueOf());
      dat.setDate(dat.getDate() + days);
      return dat;
    }

    var dat = new Date();
    var tgl = parseFloat(top);
    tgljatuh = dat.addDays(tgl);
    
    date = new Date(tgljatuh);
    year = date.getFullYear();
    month = date.getMonth()+1;
    dt = date.getDate();

    if (dt < 10) {
      dt = '0' + dt;
    }
    if (month < 10) {
      month = '0' + month;
    }
    console.log(year+'-' + month + '-'+dt);
    document.getElementById("jt").value = year+'-' + month + '-'+dt;
  }
</script>

<script>
  function pembayaran1()
  {
    if (document.getElementById("katPembelian").value == "Kredit") {
      document.getElementById("jatuhTempo").style.display='block';
      document.getElementById("top1").style.display='block';
      document.getElementById("viewsisatagihan").style.display='block';
      document.getElementById("viewkembali").style.display='none';
      // document.getElementById("bayar").readOnly ='false';
    } else {
      document.getElementById("jatuhTempo").style.display='none';
      document.getElementById("top1").style.display='none';
      document.getElementById("viewsisatagihan").style.display='none';
      document.getElementById("viewkembali").style.display='block';
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
    q = $("#qtyretur").val();
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
    document.getElementById("stok").value = tot;
    var harga = document.getElementById("hargabahan").value;
    var stokbarang = document.getElementById("stokbarang").value;
    if (parseFloat(tot) > parseFloat(stokbarang)) {
      alert("retur barang melebihi stok barang !");  
      document.getElementById("tombolsimpan").disabled = true;
    }else{
      var quantityretur = document.getElementById("qtyretur").value;
      var diskonpersen1 = document.getElementById("d1").value;
      var diskonpersen2 = document.getElementById("d2").value;
      var diskonrp = document.getElementById("drp").value;
      har1 = harga*tot;
      var totdiskonrp = (har1 - diskonrp);
      var hardis1 = ((totdiskonrp)*diskonpersen1/100);
      var totdiskonp1 = totdiskonrp - hardis1;
      var hardis2 = ((totdiskonp1)*diskonpersen2/100);
      var totdiskonp2 = totdiskonp1 - hardis2;
      var subtotal = Math.round(parseFloat(totdiskonp2));
      document.getElementById("subtotal").value = setTitikRupiah(parseFloat(subtotal));
      document.getElementById("tombolsimpan").disabled = false;
    }
  }
</script>

<script>
  function setSubtotalBB(){
    var bbharga = document.getElementById("bbharga").value;
    var bbhargajual = document.getElementById("bbhargajual").value;

    var marginpersen = ((bbhargajual - bbharga)/bbharga)*100;
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


<script>
  function setEditRetur($id_barang, $nama_barang, $harga ,$satuan ,$quantity, $diskon1, $diskon2, $diskonrp, $subtotal,$stok){
    document.getElementById("idBahan").value = $id_barang;
    document.getElementById("bahanBaku").value = $nama_barang;
    document.getElementById("hargabahan").value = $harga;
    document.getElementById("stokbarang").value = $stok;
    document.getElementById("satuanbeli").value = $satuan;
    document.getElementById("quantity").value = $quantity;
    document.getElementById("d1").value = $diskon1;
    document.getElementById("d2").value = $diskon2;
    document.getElementById("drp").value = $diskonrp;
    document.getElementById("subtotal").value = setTitikRupiah($subtotal);

    var id = $id_barang;
    var view_url = "{{url('G/dataSatuan')}}";
    $.ajax({
      url: view_url,
      type:"GET",
      data: {"id": id},
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
    $("#totalreturtampil").val(setTitikRupiah("{{$subtotretur}}"));
    $("#totaltampil").val(setTitikRupiah("{{$subtot}}"));
    $("#total").val("{{$subtot}}");
    $("#nettotampil").val(setTitikRupiah("{{$subtotretur}}"));
    $("#netto").val(("{{$subtotretur}}"));
    // }
  });
</script>

<script type="text/javascript">

  /* Tanpa Rupiah */
  var tanpa_rupiah = document.getElementById('bayar');
  tanpa_rupiah.addEventListener('keyup', function(e)
  {
    tanpa_rupiah.value = formatRupiah(this.value);
  });

  var tanpa_rupiah1 = document.getElementById('diskonrp');
  tanpa_rupiah1.addEventListener('keyup', function(e)
  {
    tanpa_rupiah1.value = formatRupiah(this.value);
  });
  
  /* Fungsi */
  function formatRupiah(angka, prefix)
  {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa  = split[0].length % 3,
    rupiah  = split[0].substr(0, sisa),
    ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
    
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>

@endsection
