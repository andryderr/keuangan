 <div class="modal fade" id="tambahTindakanMedis" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Jenis Tindakan Medis</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <form action="{{url(Auth::user()->poli->prefix.'/jenisTindakanMedis/tambah')}}" method="post" accept-charset="utf-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Jenis Tindakan Medis</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          {{csrf_field()}}
          <div class="form-group">
            <label>ID Tindakan Medis</label>
            <input type="text" name="id_tm_d_p"  class="form-control" placeholder="" readonly="" id="id">
          </div>  

          <div class="form-group">
            <label>Nama Tindakan Medis</label>
            <input type="text"  class="form-control" placeholder="" name="nama" id="nama">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
          </div>  
          <input type="hidden" class="hidden" name="jenis" id="jenis">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
      </form>
  </div>
</div>
</div>
