 <div class="modal fade" id="editDetailJenisPemeriksaan" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Edit Detail Jenis Pemeriksaan</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Jenis Pemeriksaan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="{{url(Auth::user()->poli->prefix.'/editDetailJenisPemeriksaan')}}" method="post">
          <div class="box-body">
            {{csrf_field()}}
            <div class="form-group">
              <label>ID Detail</label>
              <input type="text"  class="form-control" readonly="" placeholder="" required name="id_detail_jenis_pemeriksaan" id="id_detail_jenis_pemeriksaan">
            </div>

            <div class="form-group">
              <label>Nama Detail Pemeriksaaan</label>
              <input type="text"  class="form-control" placeholder="" required name="detail_pemeriksaan" id="detail_pemeriksaan">
            </div>


            <div class="form-group">
              <label>Nilai Normal</label>
              <input type="text"  class="form-control" placeholder="" required name="nilai_normal" id="nilai_normal">
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