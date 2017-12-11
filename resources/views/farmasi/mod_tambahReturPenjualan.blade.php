 <div class="modal fade" id="tambahReturPenjualan" role="dialog">
   <div class="modal-dialog modal-md">
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
          <h3 class="box-title">Data Penjualan Obat</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="">

          <!-- KASIH AUTO COMPLETE, ketika no faktur ditulis dan ditemukan maka form dibawahnya terisi -->
          <div class="form-group">
            <label>No Faktur</label>
            <input type="text" class="form-control" placeholder="" name="" id="">
          </div>

          <div class="form-group">
            <label>Kategori Pembeli</label>
            <input type="text" readonly="" class="form-control" placeholder="" name="" id="">
          </div>

          <div class="form-group">
            <label>Tanggal Pembelian</label>
            <input type="text" readonly="" class="form-control" placeholder="" name="" id="">
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