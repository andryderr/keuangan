 <div class="modal fade" id="tambahGizi" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Rekomendasi Gizi</h3>
      </div>
      <div class="box box-primary">
        <form action="{{url('RWINAP/Pasien/Gizi/Tambah')}}" method="POST" accept-charset="utf-8">
        {{csrf_field()}}
        <input type="hidden" name="id_detail_pendaftaran" value="{{$data[0]->id_detail_pendaftaran}}" placeholder="">
          <div class="box-header with-border">
            <h3 class="box-title">Rekomendasi Gizi</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->

          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Makanan Rekomendasi</label>
                  <select name="id_jenis_barang" id="rekomendasi" class="form-control">
                    <option value="" disabled selected>---</option>
                    @foreach($jenis_sajian as $row)
                    <option value="{{$row->id_jenis_barang}}">{{$row->jenis_barang}}</option>
                    @endforeach
                  </select>
                </div> 
                <div class="form-group">
                  <label>Tanggal Rekomendasi</label>
                  <input type="date" name="tgl_rekomendasi" id="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="" >
                </div>
                <div class="form-group">
                  <label>Jenis Waktu</label>
                  <select name="shift" id="shift" class="form-control">
                    <option value="Pagi">Pagi</option>
                    <option value="Siang">Siang</option>
                    <option value="Malam">Malam</option>}
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Memo</label>
                  <textarea rows="9" class="form-control" name="memo" id="" placeholder=""></textarea>
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->                      

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>