 <div class="modal fade" id="tambahStokAwal" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Stok Awal</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Stok Barang</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="{{url('FARMASI/tambahItemStokAwal')}}" method="post">
            {{csrf_field()}}
            <div class="table-responsive">
             <table id="dataObat" class="table datatable table-striped table-bordered">
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
          <input type="hidden" class="form-control" readonly="" placeholder="" name="id_barang_stokawal" id="idBahan">
        </div>

        <input type="hidden" name="jumlah_kecil" id="stok1">
        <input type="hidden" name="stokbarang" id="stokbarang">
          <input type="hidden"  class="form-control" placeholder="" readonly="" value="{{$master[0]->id_stokawal}}" name="id_stokawal" id="">

        <div class="form-group col-md-4">
          <label>Bahan Baku</label>
          <input type="text" class="form-control" readonly="" placeholder="" name="" id="bahanBaku">
        </div>

        <div class="form-group col-md-3">
          <label>Harga</label>
          <input type="number" class="form-control" readonly="" placeholder="" value="0" name="harga_stokawal" id="hargabahan" onkeyup="setSubtotal($id);">
        </div>

        <div class="form-group col-md-2">
          <label>Quantity</label>
          <input type="text" class="form-control" placeholder="" name="jumlah_stokawal" id="quantity" onkeyup="subTot();">
        </div>

        <div class="form-group col-md-3">
          <label>Satuan</label>
          <select style="width:90px" class="form-control" name="satuan_stokawal" onchange="subTot();" id="satuan_lain">
          </select>
        </div>
<!-- 
        <div class="form-group col-md-4">
          <label>Diskon (Rp)</label>
          <input type="number" class="form-control" placeholder="" name="diskonrp_pembelian" id="drp" onkeyup="subTot();">
        </div>

        <div class="form-group col-md-4">
          <label>Diskon 1 (%)</label>
          <input type="number" class="form-control" placeholder="" name="diskon1_pembelian" id="d1" placeholder="%" onkeyup="subTot();">
        </div>

        <div class="form-group col-md-4">
          <label>Diskon 2 (%)</label>
          <input type="number"  class="form-control" placeholder="" name="diskon2_pembelian" id="d2" placeholder="%" onkeyup="subTot();">
        </div> -->

        <div class="form-group">
          <label>Subtotal</label>
          <input type="text"  class="form-control" placeholder="" name="" readonly="" id="subtotal_tampil">
          <input type="hidden"  class="form-control" placeholder="" name="subtotal_stokawal" readonly="" id="subtotal">
        </div>
        <!-- /.form group -->
      </div>
    </div><!-- /.box-body -->                      

    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <button type="submit" id="tombolsimpan" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
</div>
</div>
</div>