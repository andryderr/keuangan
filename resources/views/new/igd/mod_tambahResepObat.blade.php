 <div class="modal fade" id="tambahObat" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
    <form action="{{url(Auth::user()->poli->prefix.'/dataPasien/Obat/')}}/{{$data[0]->id_pendaftaran}}" method="post">
    {{csrf_field()}}
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Resep Obat</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Resep Obat</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <div class="form-group">
            <label>Tanggal/Jam</label>
            <?php date_default_timezone_set("Asia/Jakarta"); ?>
            <input type="text" name="tanggal_resep" id="" id="tanggalwaktu" value="{{date('Y-m-d H:i:s')}}" readonly class="form-control" placeholder="">
          </div> 

          <div class="form-group">
            <label>Dokter</label>
            <select class="form-control" name="id_dokter" id="">
              <option>----</option>
              @foreach($dataDokter as $row)
              <option value="{{$row->id_dokter}}">{{$row->nama}}</option>
              @endforeach
            </select>
          </div> 

          <div class="form-group">
            <label>Resep</label>
            <textarea rows="3" name="rsp" id=""  class="form-control" placeholder=""></textarea>
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