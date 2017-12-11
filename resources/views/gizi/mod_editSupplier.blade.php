 <div class="modal fade" id="editSupplier" role="dialog">
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

        <form action="{{url('GIZI/ubahSupplier')}}" method="post">
          <div class="box-body">
            {{csrf_field()}}
            <div class="form-group">
              <label>ID Supplier</label>
              <input type="text" readonly="" class="form-control" name="id_supplier" id="id_supplier">
            </div>

            <div class="form-group">
              <label>Nama Supplier</label>
              <input type="text"  class="form-control" name="nama_supplier1" id="nama_supplier1">
            </div>


            <div class="form-group">
              <label>Alamat</label>
              <input type="text"  class="form-control" name="alamat1" id="alamat1">
            </div>

            <div class="form-group">
              <label>No Telepon</label>
              <input type="number"  class="form-control" name="no_telp1" id="no_telp1">
            </div>

            <div class="form-group">
              <label>No HP</label>
              <input type="number"  class="form-control" name="no_hp1" id="no_hp1">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email"  class="form-control" name="email1" id="email1">
            </div>

            <div class="form-group">
              <label>Contact Person</label>
              <input type="number"  class="form-control" name="cp1" id="cp1">
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