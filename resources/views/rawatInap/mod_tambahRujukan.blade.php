<div class="modal fade" id="tambahRUjukan" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah RUjukan</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Rujukan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <form action="{{url('RWINAP/tambahRujukan')}}" method="post">
          <div class="box-body">
            {{csrf_field()}}
            <div class="form-group">
              <label>Tanggal/Jam</label>
              <input type="text" class="form-control" placeholder="" id="tanggalan" name="tgl_masuk">
            </div> 

            <div class="form-group">
              <label>Di Rujuk ke</label>
              <select class="form-control" name="id_poli" id="id_poli">
                <option>----</option>
                <!-- <option value="FARMASI">Farmasi</option> -->
                <option value="3">Laboratorium</option>
                <option value="4">Radiologi</option>
                <!-- <option value="RAWAT INAP">Rawat Inap</option> -->
              </select>
            </div> 

            <div class="form-group">
              <label>Memo</label>
              <textarea rows="3" name="memo" id="memo"  class="form-control" placeholder=""></textarea>
            </div>  
          </div><!-- /.box-body -->                      

          <input type="hidden" name="id_pendaftaran" value="{{$data[0]->id_pendaftaran}}">
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>