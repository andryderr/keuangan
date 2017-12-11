 <div class="modal fade" id="editJenisPemeriksaan" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Edit Jenis Pemeriksaan</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Jenis Pemeriksaan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="{{url(Auth::user()->poli->prefix.'/editJenisPemeriksaan')}}" method="post">
          <div class="box-body">
            {{csrf_field()}}
            <div class="form-group">
              <label>ID Pemeriksaaan</label>
              <input type="text"  class="form-control" readonly="" placeholder="" required name="id_pemeriksaan" id="id_pemeriksaan1">
            </div>

            <div class="form-group">
              <label>Nama Pemeriksaaan</label>
              <input type="text"  class="form-control" placeholder="" required name="nama_pemeriksaan" id="nama_pemeriksaan1">
            </div>


            <div class="form-group">
              <label>Keterangan</label>
              <input type="text"  class="form-control" placeholder="" required name="ket" id="ket1">
            </div>

            <div class="form-group">
              <label>Harga Pemeriksaan</label>
              <input type="number"  class="form-control" placeholder="" required name="harga" id="harga1">
            </div>

            <div class="form-group">
              <label>Jenis Layanan</label>
              <select class="form-control" required name="jenis_layanan" id="jenis_layanan1">
                <option>----</option>
                <option value="Laboratorium">Laboratorium</option>
                <option value="Radiologi">Radiologi</option>
              </select>
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