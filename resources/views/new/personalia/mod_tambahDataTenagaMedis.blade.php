 <div class="modal fade" id="tambahPetugasMedis" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Data Petugas Medis</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
    <form action="{{url('PERSONALIA/Petugas/Tambah')}}" method="post" accept-charset="utf-8">
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
            <label>Nama Petugas Medis</label>
            <input type="text"  class="form-control" placeholder="" name="nama" id="">
          </div>


          <div class="form-group">
            <label>Alamat</label>
            <input type="text"  class="form-control" placeholder="" name="alamat" id="">
          </div>

           <div class="form-group">
            <label>SIP</label>
            <input type="number"  class="form-control" placeholder="" name="sip" id="">
          </div>

          <div class="form-group">
            <label>Tanggal Berlaku:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="rangetanggaltambah" name="tanggal" id="">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="text" id="tanggalwaktutambah" class="form-control" placeholder="" name="tanggal_masuk" id="">
          </div>


          <div class="form-group">
            <label>Bertugas sebagai</label>
            <select class="form-control" name="id_job_petugas" id="">
              <option>----</option>
              @foreach($job as $r)
              <option value="{{$r->id_job_petugas}}">{{$r->nama_job}}</option>
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
