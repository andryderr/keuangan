 <div class="modal fade" id="tambahBeli" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Pembelian Bahan Baku</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pembelian Bahan Baku</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="">
           <div class="table-responsive">
           <table id="" class="table datatable table-striped table-bordered">
            <thead>
              <tr style="background:#E0E0E0;">
                <th style="width:70px;">ID</th>
                <th>Nama Bahan</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="text" name="" id="idBh" style="width:70px;" class="form-control" placeholder="" value="id6875" readonly="">
                </td>
                <td><input type="text" name="" style="width:120px;" class="form-control" value="Beras"  readonly=""></td>
                <td>Kg</td>
                <td><input type="text" name="" id="harga" style="width:90px;" class="form-control" value="5000" readonly=""></td>
                <td>                          
                   <a href="#" onclick="setSubtotal();"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i></button></a>
                </td>
              </tr>
              
              <tr>
                <td>
                  <input type="text" name="" id="idBh" style="width:70px;" class="form-control" placeholder="hi32" readonly="">
                </td>
                <td><input type="text" id="isibahanbaku" name="" style="width:120px;" class="form-control" value="Terong" readonly=""></td>
                <td>Buah</td>
                <td><input type="text" name="" style="width:90px;" class="form-control" value="8000" readonly=""></td>
                <td>                          
                  <input type="radio" onchange="setSubtotal();" name="coba" id="radio" class="flat-red">
                </td>
              </tr>
            </tbody>
          </table>
          </div>

           <div class="form-group">
            <input type="hidden" class="form-control" readonly="" placeholder="" name="" id="idBahan">
          </div>
         
          <div class="form-group col-md-4">
            <label>Bahan Baku</label>
            <input type="text" class="form-control" readonly="" placeholder="" name="" id="bahanBaku">
          </div>

          <div class="form-group col-md-3">
            <label>Harga</label>
            <input type="number"  readonly="" class="form-control" placeholder="" value="0" name="" id="hargabahan" onkeyup="setSubtotal();">
          </div>

          <div class="form-group col-md-2">
            <label>Quantity</label>
            <input type="text" class="form-control" placeholder="" name="" id="quantity" onkeyup="setSubtotal();">
          </div>

          <div class="form-group col-md-3">
          <label>Satuan</label>
            <select style="width:90px" class="form-control" name="" id="">
                <option value="Logistik">Kg</option>
                <option value="Gizi">Sak</option>
              </select>
          </div>


          <div class="form-group col-md-4">
          <label>Diskon (Rp)</label>
            <input type="number" class="form-control" placeholder="" name="" id="drp" onkeyup="setSubtotal();">
          </div>

          <div class="form-group col-md-4">
          <label>Diskon 1 (%)</label>
            <input type="number" class="form-control" placeholder="" name="" id="d1" placeholder="%" onkeyup="setSubtotal();">
          </div>

          <div class="form-group col-md-4">
            <label>Diskon 2 (%)</label>
            <input type="number"  class="form-control" placeholder="" name="" id="d2" placeholder="%" onkeyup="setSubtotal();">
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
