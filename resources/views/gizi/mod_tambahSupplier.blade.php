 <div class="modal fade" id="tambahSupplier" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Supplier</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Supplier</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
        <form action="{{url('GIZI/tambahSupplier')}}" method="post">
        {{csrf_field()}}
          <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text"  class="form-control" placeholder="" name="nama_supplier" id="">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input type="text"  class="form-control" placeholder="" name="alamat" id="">
          </div>

          <div class="form-group">
            <label>No Telepon</label>
            <input type="number"  class="form-control" placeholder="" name="no_telp" id="">
          </div>

          <div class="form-group">
            <label>No HP</label>
            <input type="number"  class="form-control" placeholder="" name="no_hp" id="">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email"  class="form-control" placeholder="" name="email" id="">
          </div>

          <div class="form-group">
            <label>Contact Person</label>
            <input type="number"  class="form-control" placeholder="" name="cp" id="">
          </div>          
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