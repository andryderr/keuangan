 <div class="modal fade" id="editDetail" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <form action="{{url(Auth::user()->poli->prefix.'/detailTindakanMedis/edit1')}}" method="post" accept-charset="utf-8">
        {{csrf_field()}}
        <div class="modal-header" style="background-color: #4db6ac;">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
          </button>
          <h3 class="modal-title" style="color:white;">Form Ubah Persentase</h3>
          <label>Isi Inputan Dibawah:</label>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Petugas Tindakan</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>

          <div class="box-body">
            <input type="hidden" name="id_detail_sub_medis_kelas" id="id_detail_sub_medis_kelas">
            <div class="form-group">
              <label>Jenis Petugas</label>
              <select class="form-control" name="id_sub_jasa"  id="id_sub_jasa1">
                @foreach($dataJasa as $row)
                <option value="{{$row->id_sub_jasa}}">{{$row->nama}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" class="form-control" name="harga" id="harga12">
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
