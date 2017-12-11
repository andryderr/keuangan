 <div class="modal fade" id="editRuang" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Edit Ruang</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Ruang</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{ url('RWINAP/ubahRuang') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>ID Kelas</label>
            <input type="number"  class="form-control" placeholder="" name="id_kelas" id="id_kelas" readonly="">
          </div>  
          
          <div class="form-group">
            <label>ID Ruang</label>
            <input type="text" name="id_ruang" id="id_ruang"  class="form-control" readonly="">
          </div>  

          <div class="form-group">
            <label>Nama Ruang</label>
            <input type="text"  class="form-control" placeholder="" name="nama_ruang" id="nama_ruang">
          </div> 

          <button type="submit" class="btn btn-primary">Simpan</button>
          <input type="hidden" id="edit_id" name="edit_id">
          </form>
        </div>
      </div><!-- /.box-body -->                      

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
