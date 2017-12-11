 <div class="modal fade" id="editMasterAkun" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Akun</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Akun</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{url('KASIR/editMasterAkun')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label>Level</label>
              <select class="form-control" name="level">
                <option value="1">1</option> 
                <option value="2">2</option>
              </select>
            </div>  

            <div class="form-group">
              <label>No Akun</label>
              <input type="text" name="no_akun" id="no_akun"  class="form-control" placeholder="">
            </div>  

            <div class="form-group">
              <label>Nama Akun</label>
              <input type="text"  class="form-control" placeholder="" name="nama_akun" id="nama_akun">
            </div> 

            <div class="form-group">
              <label>Posisi saldo normal</label>
              <select class="form-control" name="so_normal" id="so_normal">
                <option value="Debet">Debet</option> 
                <option value="Kredit">Kredit</option>
              </select>
            </div>  

            <div class="form-group col-md-12">
              <label>Keterangan</label>
              <textarea colspan="3" class="form-control" name="keterangan" id="keterangan"></textarea>
            </div>

            <div class="form-group">
              <label>Saldo Awal</label>
              <input type="text"  class="form-control" placeholder="" name="so_akun" id="so_akun"">
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