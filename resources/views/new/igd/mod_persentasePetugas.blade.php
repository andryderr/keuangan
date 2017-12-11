 <div class="modal fade" id="editPersenPetugas" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
    <form id="form_persen" method="post">
    {{csrf_field()}}
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Ubah Persentase</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Petugas Tindakan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
        <input type="hidden" name="id_tm" id="id_tm">
          <div class="form-group">
            <label>Jenis Petugas</label>
            <input type="text" name="jenisPetugas" id="jenisPetugas1" class="form-control" placeholder="" readonly="">
          </div>

          <div class="form-group">
            <label>Persentase Jasa</label>
            <input type="number"  class="form-control" id="persentasePetugas1" placeholder="" name="persentase">
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