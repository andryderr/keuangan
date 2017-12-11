 <div class="modal fade" id="tambahPenjualanObat" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Penjualan Obat</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pembelian Obat</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <form action="{{url('FARMASI/tambahPenjualan')}}" method="post">
            {{csrf_field()}}
            <div class="table-responsive">
             <table id="dataAja" class="table datatable table-striped table-bordered">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th style="width:70px;">ID</th>
                  <th>Nama Bahan</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
          <?php $jum = 0; ?>
          @if($status == 1)
          <input type="hidden" name="id_penjualan" value="{{$id_penjualan}}">
          @endif
          <input type="hidden" name="satuan_turunan2" id="satuan_turunan2">
          <input type="hidden" name="satuan_turunan3" id="satuan_turunan3">
          <input type="hidden" name="satuan_turunan4" id="satuan_turunan4">
          <input type="hidden" name="kapasitas2" id="kapasitas2">
          <input type="hidden" name="kapasitas3" id="kapasitas3">
          <input type="hidden" name="kapasitas4" id="kapasitas4">
          <input type="hidden" name="satuan11" id="satuan11">
          <input type="hidden" name="satuan22" id="satuan12">
          <input type="hidden" name="satuan33" id="satuan13">
          <input type="hidden" name="satuan44" id="satuan14">


          <div class="form-group">
            <input type="hidden" class="form-control" readonly="" placeholder="" name="id_barang_penjualan" id="idBahan">
          </div>

          <input type="hidden" name="jumlah_kecil" id="strok1">

          <div class="form-group col-md-4">
            <label>Bahan Baku</label>
            <input type="text" class="form-control" readonly="" placeholder="" name="" id="bahanBaku">
          </div>

          <div class="form-group col-md-3">
            <label>Harga</label>
            <input type="number"  readonly="" class="form-control" placeholder="" value="0" name="harga_penjualan" id="hargabahan" onkeyup="setSubtotal($id);">
          </div>

          <div class="form-group col-md-2">
            <label>Quantity</label>
            <input type="text" class="form-control" placeholder="" name="jumlah_penjualan" id="quantity" required onkeyup="subTot();">
          </div>

          <div class="form-group col-md-3">
            <label>Satuan</label>
            <select style="width:90px" class="form-control" name="satuan_penjualan" id="satuan_lain" onchange="subTot();">
            </select>
          </div>


          <div class="form-group col-md-4">
            <label>Diskon (Rp)</label>
            <input type="text" class="form-control" placeholder="" name="diskonrp_penjualan" id="drp" onkeyup="subTot();">
          </div>

          <div class="form-group col-md-4">
            <label>Diskon 1 (%)</label>
            <input type="text" class="form-control" placeholder="" name="diskon1_penjualan" id="d1" placeholder="%" onkeyup="subTot();">
          </div>

          <div class="form-group col-md-4">
            <label>Diskon 2 (%)</label>
            <input type="text"  class="form-control" placeholder="" name="diskon2_penjualan" id="d2" placeholder="%" onkeyup="subTot();">
          </div>

          <div class="form-group col-md-6">
            <label>Biaya Resep</label>
            @if($status == 1 && !$dataMaster[0]->nomer_resep)
            <input type="number" class="form-control" readonly name="biaya_resep" value="0" id="biaya_resep" onkeyup="subTot();">
            @else
            <input type="number" class="form-control" name="biaya_resep" value="0" id="biaya_resep" onkeyup="subTot();">
            @endif
          </div>

          <div class="form-group col-md-6">
            <label>Biaya Racik</label>
            <input type="number" class="form-control" name="biaya_racik" value="0" id="biaya_racik" onkeyup="subTot();">
          </div>

          <div class="form-group">
            <label>Subtotal</label>
            <input type="number"  class="form-control" placeholder="" name="subtotal_penjualan" readonly="" id="subtotal">
          </div>
        </div>
      </div><!-- /.box-body -->                      

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning" disabled id="btn_editBarang" data-toggle="modal" data-target="#editBarang" onclick="setBarang();" >Edit Barang</button>
        <button type="submit" id="btn_simpan" disabled class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>

@extends('farmasi.mod_editBarang')

<script>
  function setBarang() {
    $("#tambahPenjualanObat").modal('hide');
    id = $("#idBahan").val();
    
    url = "{{url('G/setBarang')}}"+"/"+id;
    $.getJSON(url, function(result){
      console.log(result);
      if (result.length > 0) {
        $('#id_barang').val(result[0]['id_barang']);
        $('#nama_barang').val(result[0]['nama_barang']);
        $('#kat_barang').val(result[0]['kat_barang']);
        $('#id_jenis_barang1').val(result[0]['id_jenis_barang']);
        $('#stok_minimal').val(result[0]['stok_minimal']);
        $('#satuan1').val(result[0]['satuan1']);
        $('#satuan2').val(result[0]['satuan2']);
        $('#satuan3').val(result[0]['satuan3']);
        $('#satuan4').val(result[0]['satuan4']);
        $('#kapasitas21').val(result[0]['kapasitas2']);
        $('#kapasitas31').val(result[0]['kapasitas3']);
        $('#kapasitas41').val(result[0]['kapasitas4']);
        $('#idKapasitas1').append('<option value="'+result[0]['satuan_turunan2']+'">'+result[0]['satuan_turunan2']+'</option>');
        $('#idKapasitas2').append('<option value="'+result[0]['satuan_turunan3']+'">'+result[0]['satuan_turunan3']+'</option>');
        $('#idKapasitas3').append('<option value="'+result[0]['satuan_turunan4']+'">'+result[0]['satuan_turunan4']+'</option>');
        $('#bbharga').val(result[0]['harga']);
        $('#bbhargajual').val(result[0]['harga_jual1']);
        $('#bbhargajual1').val(result[0]['harga_jual2']);
        $('#bbhargajual2').val(result[0]['harga_jual3']);
        $('#marginrp').val(result[0]['harga_jual1']-result[0]['harga']);
        $laba = (result[0]['harga_jual1']-result[0]['harga']);
        $persen = Math.round($laba/(result[0]['harga'])*100);
        $('#marginpersen').val($persen);
      }else{
        alert("Data Tidak Ditemukan");
      }
    });
  }
</script>