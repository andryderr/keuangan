<html>


@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper no-print">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
         Halaman Pemeriksaan
         <small>Control panel</small>
       </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Data Pasien</li>
        <li class="active">Pemeriksaan</li>
      </ol>
    </section>

    <div class="container-fluid">
     <section class="content">
      <div class="col-md-4 no-print">
        <!-- general form elements -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Data Pemeriksaan Pasien</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->


          <div class="box-body">

            <div class="form-group">
              <label>No/ID Pemeriksaan</label>
              <input type="text"  class="form-control" value="{{$data[0]->id_pendaftaran}}" readonly name="" id="">
            </div>

            <div class="form-group">
              <label>Nama Pasien</label>
              <input type="text"  class="form-control" value="{{$data[0]->pasien->nama}}" name="" id="" readonly>
            </div>

            <div class="form-group">
              <label>Nama Petugas</label>
              <input type="text"  class="form-control" placeholder="nama petugas" name="" id="" value="{{Auth::user()->name}}" readonly>
            </div>
          </div><!-- /.box-body -->
        </div>
      </div>

      <!-- Detail harga -->
      <!-- History resep -->
      <div class="col-md-8 no-print">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Riwayat Resep</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
           <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div>
              </div><!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                <tr>
                  <th>ID Resep</th>
                  <th>Tanggal Resep</th>
                  <th>Nomer Resep</th>
                  <th>ID Penj.</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
                @foreach($data[0]->resep as $row)
                <tr>
                  <td>{{$row->id_resep}}</td>
                  <td>{{$row->tanggal_resep}}</td>
                  <td id="nomerResep{{$row->id_resep}}">{{$row->id_resep}}</td>
                  @if($row->total == 0)
                  <td></td>
                  @else
                  <td>{{$row->penjualanBarang->id_penjualan_barang}}</td>
                  @endif
                  <td>{{number_format($row->total,0,".",".")}}</td>
                  @if($row->total > 0)
                  <td>
                    <a href="#"><button type="button" class="btn btn-success" data-toggle="collapse" data-target="#resep"><i class=" fa fa-heart-o"> Selesai</i></button></a>
                    <a data-toggle="tooltip" title="Retur Penjualan" href="#"><button type="button" data-toggle="modal" onclick="setIDpenjualan('{{$row->penjualanBarang->id_penjualan_barang}}')" data-target="#tambahReturPenjualan" class="btn btn-primary"><i class="fa fa-recycle"></i></button></a>
                  </td>
                  @else
                  <td>
                    <a data-toggle="tooltip" title="Penjualan Resep" href="{{url('/FARMASI/penjualanFarmasi')}}/{{$row->id_resep}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i></button></a>
                    <a data-toggle="tooltip" title="Lihat Resep" href="#"><button type="button" data-toggle="modal" data-target="#lihatResep" onclick="$('#resep_view').val('{{$row->resep}}');" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                  </td>
                  @endif
                </tr>
                @endForeach
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div> 
    </div>
  </div>
  <!-- retur resep dan alkes -->
  <div class="col-md-8 no-print">
    <!-- general form elements -->
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Retur Obat dan Alkes</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div><!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
           <table class="table table-hover">
            <tr>
              <th>ID Retur</th>
              <th>Tanggal Retur</th>
              <th>ID Penj.</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
            @foreach($data[0]->penjualan as $row)
            @foreach($row->returpen as $r)
            <tr>
              <td>{{$r->id_retur_pen}}</td>
              <td>{{$r->tanggal_retur}}</td>
              <td>{{$r->id_penjualan_barang}}</td>
              <td>{{number_format($r->netto,0,".",".")}}</td>
              <td>
                <a><button type="button" class="btn btn-success"><i></i>Retur Berhasil</button></a>
              </td>
            </tr>
            @endforeach
            @endForeach
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div> 
</div>
</div>

</section>
</div>
</div>
@extends('farmasi.mod_lihatResep')
@extends('farmasi.mod_tambahMasterReturPenjualan')

<script>
  function hasilNetto(){
    var total = document.getElementById("total").value;
    var diskonpersen = document.getElementById("diskonpersen").value;
    var diskonrp = document.getElementById("diskonrp").value;
    var ppnpersen = document.getElementById("ppnpersen").value;
    var ppnrp = document.getElementById("ppnrp").value;

    var diskonuang = total - (total*(diskonpersen/100)) - diskonrp; 
    var ppnpajak = parseFloat(diskonuang) - (parseFloat(diskonuang)*(ppnpersen/100)) - ppnrp;
    var netto = parseFloat(ppnpajak);
    document.getElementById("netto").value = netto;
  }
</script>
<script>
  function setSubtotal(){
    var subtotal = 0;
    if (document.getElementById("harga").checked) {
      var harga = document.getElementById("harga").value;
    }
    var quantity = document.getElementById("quantity").value;
    var diskon = document.getElementById("diskon").value;
    var biaya_resep = document.getElementById("biaya_resep").value;
    var biaya_racik = document.getElementById("biaya_racik").value;
    var totdiskon = (harga*quantity) - ((harga*quantity)*diskon/100);
    var subtotal = parseFloat(totdiskon) + parseFloat(biaya_racik) + parseFloat(biaya_resep);
    document.getElementById("subtotal").value = parseFloat(subtotal);
  }
</script>
<script>
  function setIDpenjualan($id){
    document.getElementById("no_entri_penjualan").value = $id;
  }
</script>
<script>
  function setPenjualan(){
    nopem = document.getElementById('no_entri_penjualan').value;
    url = "{{url('G/FARMASI/returObatPen')}}"+"/"+nopem;
    $.getJSON(url, function(result){
      console.log(result);
      if (result.length > 0) {
        $('#nama_customer').val(result[0]['kat_pembeli']);
        $('#tgl_penjualan').val(result[0]['tanggal_penjualan']);
        $('#id_penjualan').val(result[0]['id_penjualan_barang']); 
        $('#no_resep').val(result[0]['id_resep']); 
        $('#tgl_resep').val(result[0]['tanggal_resep']);
        $('#nama_dokter').val(result[0]['nama_dokter']); 
        $('#nama_pasien').val(result[0]['nama_pasien']); 
      }else{
        alert("Data Tidak Ditemukan");
        $('#id_cust').val('');
        $('#nama_customer').val('');
        $('#tgl_penjualan').val('');
        $('#id_penjualan').val('');
        $('#no_resep').val(''); 
        $('#tgl_resep').val('');
        $('#nama_dokter').val(''); 
        $('#nama_pasien').val(''); 
      }
    });
    url1 = "{{url('G/FARMASI/returObatPen1')}}"+"/"+nopem;
    nomor = 0;
    $.getJSON(url1,function(result){
      console.log(result);
      no = 0;
      subtotal = 0;
      $("#isiTablePenjualan").empty();
      result.forEach(function(r){
        no++;
        data = "";
        data = data+"<tr  style='font-size: 13px;'>";
        data = data+"<td>"+no+"</td>";
        data = data+"<td>"+r.id_barang+"</td>";
        data = data+"<td>"+r.nama_barang+"</td>";
        data = data+"<td>"+r.satuan+"</td>";
        data = data+"<td>"+r.jumlah+"</td>";
        data = data+"<td>"+r.harga+"</td>";
        data = data+"<td>"+r.biaya_racik+"</td>";
        data = data+"<td>"+r.biaya_resep+"</td>";
        data = data+"<td>"+r.diskon_rp+"</td>";
        data = data+"<td>"+r.diskon_rp1+"</td>";
        data = data+"<td>"+r.diskon_rp2+"</td>";
        data = data+"<td>"+r.sub_total+"</td>";
        subtotal += parseFloat(r.sub_total);
        $('#isiTablePenjualan').append(data);
      });
      document.getElementById("total").value = subtotal; 
    });
  }
</script>
@endsection

</body>
</html>