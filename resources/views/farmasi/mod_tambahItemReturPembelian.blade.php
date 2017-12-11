 <div class="modal fade" id="tambahreturpembelian" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Retur Pembelian</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Retur Pembelian</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{url('FARMASI/returObat/tambahDetailRetur')}}" method="post">
           <div class="form-group">
             {{csrf_field()}}
             <input type="hidden" class="form-control" readonly="" placeholder="" name="id_bahan" id="idBahan">

             <input type="hidden" class="form-control" readonly="" placeholder="" name="id_retur" id="id_retur" value="{{$data[0]->id_retur}}">
           </div>

           <div class="form-group col-md-3">
            <label>Bahan Baku</label>
            <input type="text" class="form-control" readonly="" placeholder="" name="bahan_baku" id="bahanBaku">
          </div>

          <div class="form-group col-md-2">
            <label>Harga</label>
            <input type="number"  readonly="" class="form-control" placeholder="" value="0" name="harga" id="hargabahan">
          </div>

          <div class="form-group col-md-3">
            <label>Diskon (Rp)</label>
            <input type="number" class="form-control" placeholder="" name="diskon_rp" id="drp" readonly="">
          </div>

          <div class="form-group col-md-2">
            <label>Diskon 1 (%)</label>
            <input type="number" class="form-control" placeholder="" name="diskon1" id="d1" placeholder="%" readonly="">
          </div>

          <div class="form-group col-md-2">
            <label>Diskon 2 (%)</label>
            <input type="number"  class="form-control" placeholder="" name="diskon2" id="d2" placeholder="%" readonly="">
          </div>


          <div class="form-group col-md-3">
            <label>Quantity</label>
            <input type="number" class="form-control" readonly="" placeholder="" name="quantity" id="quantity">
          </div>

          <div class="form-group col-md-3">
            <label>Qty. retur</label>
            <input type="number" class="form-control" placeholder="" name="qty_retur" id="qtyretur" onkeyup="setSubtotal();">
          </div>

          <div class="form-group col-md-3">
            <label>Satuan Beli</label>
            <input type="text" class="form-control" readonly="" placeholder="" name="" id="satuanbeli">
          </div>

          <div class="form-group col-md-3">
            <label>Satuan</label>
            <select class="form-control" onchange="setSubtotal();" name="satuan" id="satuan_lain">
              <option id=""></option>
              <!--             <input readonly type="text" class="form-control" placeholder="" name="satuan" id="satuanItem"> -->
            </select>
          </div>

          <div class="form-group">
            <label>Subtotal</label>
            <input type="text"  class="form-control" placeholder="" name="subtotal" readonly="" id="subtotal">
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

          <input type="hidden" name="jumlah_kecil" id="stok">
          <input type="hidden" name="" id="stokbarang">
        </div>
      </div><!-- /.box-body -->                      

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="tombolsimpan">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
