 <div class="modal fade" id="tambahCustomer" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Customer</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Customer</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="{{url('tambahCustomer')}}" method="post">
          {{csrf_field()}}
          <div class="box-body">

            <div class="form-group">
              <label>ID Customer</label>
              <input type="number"  class="form-control" readonly name="" id="">
            </div>  

            <div class="form-group">
              <label>Nama Customer</label>
              <input type="text" name="nama_cust" id=""  class="form-control" placeholder="">
            </div>  

            <div class="form-group">
              <label>Alamat</label>
              <input type="text"  class="form-control" placeholder="" name="alamat_cust" id="">
            </div> 

            <div class="form-group">
              <label>Nomer Telp</label>
              <input type="number"  class="form-control" placeholder="" name="no_telp_cust" id="">
            </div> 
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