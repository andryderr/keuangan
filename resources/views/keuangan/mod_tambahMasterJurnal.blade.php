 <div class="modal fade" id="tambahMasterJurnal" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Master Jurnal</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Master Jurnal</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{url(Auth::user()->poli->nama_poli.'/createMasterJurnal')}}" method="post">
            {{csrf_field()}}

            <div class="form-group">
              <label>ID Jurnal</label>
              <input type="number"  class="form-control" placeholder="" readonly name="" id="" value="">
            </div>
            <br>

            <div class="form-group">
              <label>Jenis Jurnal</label>
              <select class="form-control" name="jenis_jurnal">
                <option disabled selected value> -- select an option -- </option>
                <option value="Jurnal Umum">Jurnal Umum</option>
              </select>
            </div>
            <br>

            <div class="form-group">
              <label>Tanggal Jurnal</label>
              <input type="text"  class="form-control" placeholder="" name="tgl_jurnal" id="tanggal2">
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