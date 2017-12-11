 <div class="modal fade" id="tambahDiagnosa" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <form action="{{url(Auth::user()->poli->nama_poli.'/jenisDiagnosa/tambah')}}" method="post">
        {{csrf_field()}}
        <div class="modal-header" style="background-color: #4db6ac;">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
          </button>
          <h3 class="modal-title" style="color:white;">Form Tambah Jenis Diagnosa</h3>
          <label>Isi Inputan Dibawah:</label>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Jenis Diagnosa</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->

          <div class="box-body">
           <div class="form-group">
             <label>Kode Diagnosa</label>
             <input type="text"  class="form-control" placeholder="" name="kode_diagnosa">
           </div>

           <div class="form-group">
            <label>Nama Diagnosa</label>
            <input type="text"  class="form-control" placeholder="" name="nama_diagnosa">
          </div>

          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan_tambah" class="form-control" rows="4"> </textarea>
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