 <div class="modal fade" id="tambahResepObat" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Obat</h3>
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
          <form action="">

           <table id="pilih" class="table table-striped table-bordered">
            <thead>
              <tr style="background:#E0E0E0;">
                <th>ID</th>
                <th>Nama Obat</th>
                <th>Harga</th>
                <th>Stok</th>
                <th style="width=100px;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="text" name="" id="" class="form-control" placeholder="hi32" readonly="">
                </td>
                <td>Panadol</td>
                <td><input type="text" name="" style="width:120px;" class="form-control" value="5000" readonly=""></td>
                <td>12</td>
                <td>                          
                  <input type="radio" name="coba" id="harga" value="5000" class="flat-red">
                </td>
              </tr>
               <tr>
                <td>
                  <input type="text" name="" id="" class="form-control" placeholder="hi32" readonly="">
                </td>
                <td>Parasetamol</td>
                <td><input type="text" name="" style="width:120px;" class="form-control" value="8000" readonly=""></td>
                <td>12</td>
                <td>                          
                  <input type="radio" name="coba" id="harga" value="8000" class="flat-red">
                </td>
              </tr>
            </tbody>
          </table>

          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" placeholder="" name="" id="quantity" onkeyup="setSubtotal();">
          </div>

          <div class="form-group">
            <label>Diskon</label>
            <input type="number"  class="form-control" placeholder="" name="" id="diskon" onkeyup="setSubtotal();">
          </div>

          <div class="form-group">
            <label>Biaya Racik</label>
            <input type="number"  class="form-control" placeholder="" value="0" name="" id="biaya_racik" onkeyup="setSubtotal();">
          </div>

          <div class="form-group">
            <label>Biaya Resep</label>
            <input type="number"  class="form-control" placeholder="" value="0" name="" id="biaya_resep" onkeyup="setSubtotal();">
          </div>

          <div class="form-group">
            <label>Subtotal</label>
            <input type="number"  class="form-control" placeholder="" name="" readonly="" id="subtotal">
          </div>
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