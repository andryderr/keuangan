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
        <form class="" action="{{url('FARMASI/updateMasterPembelian')}}" method="post"> 
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
                  <input style="width:120px;" type="hidden" readonly="" class="form-control" value="{{$data[0]->id_supplier}}" name="id_supplier_BB" id="">
                  <input type="hidden" name="id_batch" value="">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:38px">Nama Supplier</span>
                  <input type="text" class="form-control" placeholder="{{$data[0]->sup->nama_supplier}}" readonly name="" id="">
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon">Tanggal Pembelian</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="tgl_pembelian" id="tgl_pembelian" 
                  value="{{$data[0]->tanggal_pembelian}}">  
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:48px">Nomer Entri</span>
                  <input type="number"  class="form-control" placeholder="" readonly name="id_pembelian_barang_master" id="" value="{{$data[0]->id_pembelian_barang}}">
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
                  <input type="number" class="form-control" placeholder="" readonly="" name="no_faktur" id="" value="{{$data[0]->no_faktur}}">
                </div>
                <div class="form-group">
                  <label>Tanggal Faktur</label>
                  <input type="text"  class="form-control" placeholder="{{$data[0]->tgl_faktur}}" readonly="" name="tanggal_faktur" id="tanggal">
                </div>
              </div>
            </div>
          </div>
          <br>

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
                 <table id="" class="" width="100%">
                  <thead>
                    <tr style="background:#E0E0E0; font-size: 12px;">
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
                    </tr>
                  </thead>
                  <?php $no=1; $subtot = 0;?>
                  <tbody>
                    <tbody>
                      @foreach($detailPembelian as $dp)
                      <tr style="font-size: 12px;">
                        <td>{{$no++}}</td>
                        <td>{{$dp->id_barang}}</td>
                        <td>{{$dp->barang->nama_barang}}</td>
                        <td>{{$dp->satuan}}</td>
                        <td>{{$dp->jumlah}}</td>
                        <td>{{$dp->harga}}</td>
                        <td>{{$dp->diskon_rp}}</td>
                        <td>{{$dp->diskon_rp1}}</td>
                        <td>{{$dp->diskon_rp2}}</td>
                        <td>{{number_format($dp->sub_total,0,".",".")}}</td>
                        <td>                                                 
                         <a href="{{url('GIZI/hapusDetailPembelian')}}/{{$dp->id_detail_pembelian}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" style="margin-bottom: 5px; margin-top: 5px;" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></a>
                       </td>
                       <?php $subtot += $dp->sub_total; ?>
                     </tr>
                     @endforeach
                     @foreach($j_kecil as $jk)
                     <input type="hidden" name="id_bar[]" id="id_bar" value="{{$jk->id_bar}}">
                     <input type="hidden" name="j_kecil[]" id="j_kecil" value="{{$jk->jumlah}}">
                     @endForeach
                   </tbody>
                   <tbody class="jumlahTagihan">
                    <tr class="bg-success">
                      <td colspan="8"></td>
                      <td><h3><strong>Total : </strong></h3></td>
                      <td colspan="2"><input type="text" style="font-size:25px; font-weight:bold; margin-top:11px; width:200px; border-width:0px; background-color:transparent;" readonly="" class="form-control" name="" id="totaltampil"></td>

                      <input type="hidden" readonly="" class="form-control pull-left" name="total_master" value="{{$subtot}}" id="total">
                    </tr>
                  </tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><!--end .card-body -->

      <div class="input-group">
        <input type="hidden"  class="form-control" placeholder="" readonly id="tgl_skrg" 
        value="<?php 
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        echo "$tanggal"; 
        ?>">  
      </div>

      <div class="col-md-5" style="font-size: 12px;">
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
              <input type="text" class="form-control" placeholder="%" name="dp_master" id="diskonpersen" onkeyup="hasilNetto();">
            </div>
            <div class="form-group col-md-4">
              <label>Discount (Rp)</label>
              <input type="text" class="form-control" placeholder="Rp" name="" id="diskonuang" readonly="">
              <input type="hidden" name="diskon_master" id="baru">
            </div>
            <div class="form-group col-md-5">
              <label>Discount Rp</label>
              <input type="text" class="form-control" placeholder"Rp" name="drp_master" id="diskonrp" onkeyup="hasilNetto();" onkeyup="inputTitikRupiah();">
            </div>

            <div class="form-group col-md-6">
              <label>PPN %</label>
              <input placeholder="%" type="text" class="form-control"  name="ppn_master" id="ppnpersen" onkeyup="hasilNetto();">
            </div>

            <div class="form-group col-md-6">
              <label>PPN Rp</label>
              <input type="text" readonly="" class="form-control"  name="ppnrp_master" id="ppnrp" onkeyup="hasilNetto();">
            </div>

            <div class="form-group col-md-12">
              <label><h4><strong>Netto</strong></h4></label>
              <input type="text" style="font-size:25px; font-weight:bold;" readonly="" value="0" class="form-control col-md-7" name="" id="nettotampil">

              <input type="hidden" readonly="" value="0" class="form-control col-md-7" name="netto_master" id="netto">
            </div>

            <br>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="box box-primary" id="checkout">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
           <div class="form-group">
            <label>Jenis Pembayaran</label>
            <select class="form-control" name="jenis_bayar_master" id="katPembelian" onchange="pembayaran1();">
              <option disabled selected value> -- select an option -- </option>
              <option value="Tunai">Tunai</option>
              <option value="Kredit">Kredit</option>
            </select>
          </div>

          <div class="form-group" id="top1" style="display: none;">
            <label>TOP</label>
            <input type="number" class="form-control" placeholder="" value="" name="top_master" id="top" onkeyup="jatuhTempoo();">
          </div>

          <div class="form-group" id="jatuhTempo" style="display: none;">
            <label>Tanggal Jatuh Tempo</label>
            <input type="text" readonly="" class="form-control" placeholder="" name="tanggal_jatuhtempo" id="jt">
          </div>

          <div class="form-group">
            <label>Kategori Pembelian</label>
            <select class="form-control" name="kategori_barang_master" id="">
              <option disabled selected value> -- select an option -- </option>
              <option value="Obat">Obat</option>
              <option value="Alat Medis">Alat Medis</option>
              <option value="Psikotropika">Psikotropika</option>
              <option value="Narkotika">Narkotika</option>
              <option value="Daftar G">Daftar G</option>
            </select>
          </div>

          <div class="form-group">
            <label>Gudang</label>
            <select class="form-control" name="id_gudang_master" id="">
              <option disabled selected value> -- select an option -- </option>
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
            <input type="text" onkeyup="hitungKembali();" onkeyup="inputTitikRupiah();" style="font-size:30px; font-weight:bold;" class="form-control col-md-5" name="jumlah_bayar_master" id="bayar" >
          </div>
          <div class="form-group col-md-12">
            <label>Kembali</label>
            <input type="text" style="font-size:25px; font-weight:bold;" readonly="" class="form-control col-md-5" name="" id="kembali">
          </div>
          <button type="submit" class="btn btn-success pull-right">
            Selesai <span class="fa fa-save"></span>
          </button>
        </div>
      </div>
    </div>
  </form>


</div>
</div>

@extends('farmasi.mod_tambahBahanBaku')
@extends('farmasi.mod_tambahBeli')
@extends('farmasi.mod_tambahSupplier')
<script>
  function hitungKembali(){
    var netto = document.getElementById("netto").value;
    var bayar = document.getElementById("bayar").value;
    var bayarhitung = bayar.split(".").join(""); 
    var flobayarhitung = parseFloat(bayarhitung);
    var flonetto = parseFloat(netto);
    var hasil = flobayarhitung - flonetto;
    if (flobayarhitung < flonetto) {
      document.getElementById("kembali").value = 0;
    } else{
      document.getElementById("kembali").value = setTitikRupiah(hasil);
    }
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
    document.getElementById("jt").value = year+'-' + month + '-'+dt;
  }
</script>

<script>
  document.getElementById("diskonrp").value = 0;
  function hasilNetto(){
    var total = document.getElementById("total").value;
    var diskonpersen = document.getElementById("diskonpersen").value;
    var diskonrupiah = document.getElementById("diskonrp").value; 
    var diskonrp =  diskonrupiah.split(".").join("");
    var ppnpersen = document.getElementById("ppnpersen").value;

    var duang = (total*(diskonpersen/100));
    document.getElementById("diskonuang").value = duang;
    var diskonuang = total - (total*(diskonpersen/100)) - diskonrp;

  //baru
  var a = document.getElementById("diskonuang").value;
  var baru = parseFloat(a) + parseFloat(diskonrp);
  document.getElementById("baru").value = baru;
  //endofbaru

  var ppnpajak = parseFloat(diskonuang) + (parseFloat(diskonuang)*(ppnpersen/100));
  var netto = parseFloat(ppnpajak);
  document.getElementById("netto").value = Math.round(netto);
  document.getElementById("nettotampil").value = setTitikRupiah(netto);
  document.getElementById("ppnrp").value = Math.round((parseFloat(diskonuang)*(ppnpersen/100)));
}
</script>
<script>
  function pembayaran1()
  {
    if (document.getElementById("katPembelian").value == "Tunai") {
      document.getElementById("jatuhTempo").style.display='none';
      document.getElementById("top1").style.display='none';
      // document.getElementById("bayar").readOnly ='false';
    } else if (document.getElementById("katPembelian").value == "Kredit") {
      document.getElementById("jatuhTempo").style.display='block';
      document.getElementById("top1").style.display='block';
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
  $(document).ready(function(){
    var harga = 0;
    var idb = 0;
    var tot = 0;
    var har1 = 0;
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
          document.getElementById("bahanBaku").value = bahanbaku;
          document.getElementById("hargabahan").value = harga;
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
  var diskonpersen1 = document.getElementById("d1").value;
  var diskonpersen2 = document.getElementById("d2").value;
  var diskonrp = document.getElementById("drp").value;
  har1 = harga*tot;
  var totdiskonrp = (har1 - diskonrp);
  var hardis1 = ((totdiskonrp)*diskonpersen1/100);
  var totdiskonp1 = totdiskonrp - hardis1;
  var hardis2 = ((totdiskonp1)*diskonpersen2/100);
  var totdiskonp2 = totdiskonp1 - hardis2;

  var subtotal = parseFloat(totdiskonp2);
  document.getElementById("subtotal").value = Math.round(parseFloat(subtotal));
}
</script>

<script>
  function setSubtotalBB(){
     var bbharga = document.getElementById("bbharga").value;
    var marginpersen = document.getElementById("marginpersen").value;
    var hargajual = Math.round(parseFloat(bbharga) + parseFloat(bbharga*(marginpersen/100)));
    var marginjual = Math.round(hargajual - bbharga);
    document.getElementById("marginrp").value = parseFloat(marginjual);
    document.getElementById("bbhargajual").value = parseFloat(hargajual);
  }
  function setMargin(){
  var bbharga = document.getElementById("bbharga").value;
  var bbhargajual = document.getElementById("bbhargajual").value;
   var marginrp = Math.round(bbhargajual - bbharga);
  var marginpersen = Math.round((marginrp/bbharga) *100);

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
    $("#data_obat1").DataTable({
     processing: true,
     ajax: '{{ url("FARMASI/dataBarang") }}',

     columns: [
     { data: 'id_barang', name: 'id_barang' },
     { data: 'nama_barang', name: 'nama_barang' },
     { data: 'satuan1', name: 'satuan' },
     { data: 'harga', name: 'harga' }, 
     { data: 'harga_jual1', name: 'harga_jual1' }, 
     { data: 'aksi'}
     ]
   });
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
