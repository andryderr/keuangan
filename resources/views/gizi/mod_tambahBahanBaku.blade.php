 <div class="modal fade" id="tambahBahanBaku" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Bahan Baku</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Bahan Baku</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="" method="post">
          {{csrf_field()}}
          <!--  <div class="form-group">
            <label>ID Bahan Baku</label>
            <input type="text" readonly="" class="form-control" placeholder="" name="id_barang" id="">
          </div> -->

          <div class="form-group col-md-6">
            <label>Nama Bahan Baku</label>
            <input type="text"  class="form-control" placeholder="" name="nama_barang" id="nama_barang">
          </div>
          <div class="form-group col-md-3">
          <label>Kategori Bahan Baku</label>
            <input type="text" readonly="" class="form-control" value="Bahan Baku" placeholder="" name="" id="">
          </div>
          <div class="form-group col-md-3">
          <label>Stok Minimal</label>
            <input type="number"  class="form-control" value="" placeholder="" name="" id="">
          </div>

          <br>
          <div class="col-md-12">
          <div class="form-group">
          <!--   <label>Satuan 1</label> -->
            <div class="input-group">
              <input type="text"  class="form-control" placeholder="Satuan 1" name="satuan1" id="satuan1">
            </div>
          </div>

          <div class="form-group">
            <!-- <label>Satuan 2</label> -->
            <div class="input-group">
              <input type="text"  class="form-control" placeholder="Satuan 2" name="satuan2" id="satuan2" onfocus="getData(1);">
              <span class="input-group-addon"> <strong>=</strong></span>

              <input type="text" style="width:150px"  class="form-control" placeholder="Kapasitas" name="kapasitas2" id="kapasitas2">
              <select style="width:90px" class="form-control" name="satuan_turunan2" id="idKapasitas1">
                <option value="">---</option>

              </select>

            </div>
          </div>

          <div class="form-group">
            <!-- <label>Satuan 3</label> -->
            <div class="input-group">
              <input type="text"  class="form-control" placeholder="Satuan 3" name="satuan3" id="satuan3" onfocus="getData(2);">
              <span class="input-group-addon"> <strong>=</strong></span>

              <input type="text" style="width:150px"  class="form-control" placeholder="Kapasitas3" name="kapasitas3" id="kapasitas3">
              <select style="width:90px" class="form-control" name="satuan_turunan3" id="idKapasitas2">
                <option value="Logistik">Kg</option>
                <option value="Gizi">Sak</option>
              </select>

            </div>
          </div>

          <div class="form-group">
            <!-- <label>Satuan</label> -->
            <div class="input-group">
              <input type="text"  class="form-control" placeholder="Satuan 4" name="" id="satuan4" onfocus="getData(3);">
              <span class="input-group-addon"> <strong>=</strong></span>

              <input type="text" style="width:150px"  class="form-control" placeholder="Kapasitas" name="kapasitas4" id="kapasitas4">
              <select style="width:90px" class="form-control" name="satuan_turunan4" id="idKapasitas3">
                <option value="Logistik">Kg</option>
                <option value="Gizi">Sak</option>
              </select>
            </div>
          </div>
          </div>

          <div class="form-group col-md-3">
            <label>Harga</label>
            <input type="number"  class="form-control" placeholder="" name="harga" id="bbharga" onkeyup="setSubtotalBB();">
          </div>

          <div class="form-group col-md-3">
            <label>Harga Jual</label>
            <input type="number"  class="form-control" placeholder="" name="harga" id="bbhargajual" onkeyup="setSubtotalBB();">
          </div>
          
           <div class="form-group col-md-3">
            <label>Margin (Rp)</label>
            <input class="form-control" readonly="" name="marginrp" id="marginrp" onkeyup="setSubtotalBB();">
          </div>

          <div class="form-group col-md-3">
            <label>Margin (%)</label>
            <input class="form-control" readonly="" name="marginpersen" id="marginpersen" onkeyup="setSubtotalBB();">
          </div>
<!-- 
          <div class="form-group col-md-2">
            <label>Stok</label>
            <input type="number"  class="form-control" placeholder="" name="hpp" id="bbquantity" onkeyup="setSubtotalBB();">
          </div> -->

       <!--    <div class="form-group col-md-6">
            <label>Diskon Rupiah (Rp.)</label>
            <input type="number"  class="form-control" placeholder="" name="" id="bbdrp" onkeyup="setSubtotalBB();">
          </div>

          <div class="form-group col-md-3">
            <label>Diskon 1 (%)</label>
            <input type="number"  class="form-control" placeholder="" name="" id="bbd1" onkeyup="setSubtotalBB();">
          </div>

          <div class="form-group col-md-3">
            <label>Diskon 2 (%)</label>
            <input type="number"  class="form-control" placeholder="" name="" id="bbd2" onkeyup="setSubtotalBB();">
          </div> -->
        </form>
        <!-- /.form group -->
      </div>
    </div><!-- /.box-body -->                      

    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
</div>
</div>
</div>