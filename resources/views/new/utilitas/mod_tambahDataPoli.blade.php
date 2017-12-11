 <div class="modal fade" id="tambahPoli" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Departemen</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <form id="myForm" method="post" accept-charset="utf-8">
      {{csrf_field()}}
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Poli</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          <input type="hidden" class="hidden" name="id_poli" id="id_poli">
          <div class="box-body">

            <div class="form-group">
              <label for="nama_poli">Nama Poli</label>
              <input type="text"  class="form-control" placeholder="" name="nama_poli" id="nama_poli">
            </div>

            <div class="form-group">
              <label>Jam Kerja:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="jam_kerja1" name="jam_kerja1">
              <span class="input-group-addon"> <strong>-</strong></span>
                <input type="text" class="form-control pull-right" id="jam_kerja2" name="jam_kerja2">
              </div>
            </div>
            <div class="form-group">
              <label for="jam_kunjung">Jam kunjung:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-left col-md-4" id="jam_kunjung1" name="jam_kunjung1">
              <span class="input-group-addon"> <strong>-</strong></span>
                <input type="text" class="form-control pull-right col-md-4" id="jam_kunjung2" name="jam_kunjung2">
              </div>
            </div>
            <div class="form-group">
              <label for="prefix">Prefix</label>
              <input type="text" class="form-control" id="prefix" name="prefix">
            </div>
            <div class="form-group">
              <label for="prefix">Kategori Departemen</label>
              <select name="kat_poli" id="kat_poli" class="form-control">
                @foreach($kat_poli as $row)
                  <option value="{{$row}}">{{$row}}</option>}
                @endforeach
              </select>
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