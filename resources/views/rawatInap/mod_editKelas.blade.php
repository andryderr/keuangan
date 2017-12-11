 <div class="modal fade" id="editKelas" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Edit Kelas</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Kelas Kamar</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{ url('RWINAP/ubahKelas') }}" method="post">
          {{ csrf_field() }}
            <div class="form-group">
              <label>ID Kelas</label>
              <input type="text" name="id_kelas" id="id_kelas"  disabled="true" class="form-control">
            </div>  

            <div class="form-group">
              <label>Nama Kelas</label>
              <input type="text"  class="form-control" name="nama_kelas" id="nama_kelas">
            </div> 

            <button type="submit" class="btn btn-primary">Simpan</button>
            <input type="hidden" id="edit_id" name="edit_id">
          </form>
        </div><!-- /.box-body -->                      

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>