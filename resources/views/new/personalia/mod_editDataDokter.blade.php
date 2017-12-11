 <div class="modal fade" id="editDokter" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Ubah Data Dokter</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <form action="{{url('PERSONALIA/Dokter/Ubah')}}" method="post" accept-charset="utf-8">
      {{csrf_field()}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pasien</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">

          <div class="form-group">
            <label>ID Dokter Bertugas</label>
            <input type="text"  class="form-control" placeholder="" readonly name="id_dokter" id="id_dokter">
          </div>

          <div class="form-group">
            <label>Nama Dokter</label>
            <input type="text"  class="form-control" placeholder="" name="nama" id="nama">
          </div>


          <div class="form-group">
            <label>Alamat</label>
            <input type="text"  class="form-control" placeholder="" name="alamat" id="alamat">
          </div>

          <div class="form-group">
            <label>SIP</label>
            <input type="number"  class="form-control" placeholder="" name="sip" id="sip">
          </div>

          <div class="form-group">
            <label>Tanggal Berlaku:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="rangetanggal" name="tanggal">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="text" class="form-control" name="tanggal_masuk" id="tanggal_masuk">
          </div>

          <div class="form-group">
            <label>Bertugas sebagai</label>
            <select class="form-control" name="id_job_dokter" id="id_job_dokter">
              <option>----</option>
              @foreach($job as $r)
              <option value="{{$r->id_job_dokter}}">{{$r->nama_job}}</option>
              @endForeach
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