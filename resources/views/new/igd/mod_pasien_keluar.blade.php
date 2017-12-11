 <div class="modal fade" id="pasien_keluar" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
    <form action="{{url(Auth::user()->poli->prefix.'/dataPasien/pasienDirawat/keluar')}}" method="post" accept-charset="utf-8">    	
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Pasien keluar</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pasien Keluar</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        {{csrf_field()}}
        <input class="form-control" type="hidden" name="id_detail_pendaftaran" id="id_detail_pendaftaran">
        <input class="form-control" type="hidden" name="tanggal_keluar" value="{{date('Y-m-d')}}">

        <div class="box-body">
          <div class="form-group">
            <label>Keadaan Keluar</label>
            <select name="keadaan_keluar" class="form-control">
            	<option value="Sembuh">Sembuh</option>
            	<option value="Membaik">Membaik</option>
            	<option value="Belum Sembuh">Belum Sembuh</option>
            	<option value="Mati < 48 jam">Mati < 48 jam</option>
            	<option value="Mati > 48 jam">Mati > 48 jam</option>
            </select>
          </div>
          <div class="form-group">
            <label>Cara Keluar</label>
            <select name="cara_keluar" class="form-control">
              <option value="Benar-Benar Pulang">Benar-Benar Pulang</option>
              <option value="Pulang Paksa">Pulang Paksa</option>
              <option value="Dirujuk">Dirujuk</option>
            </select>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan"  class="form-control" placeholder="">
          </div>
        </div>
      </div>                

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>