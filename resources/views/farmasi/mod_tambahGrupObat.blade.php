 <div class="modal fade" id="tambahJenisSajian" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Grup Obat</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Grup Obat</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <form action="{{url('FARMASI/tambahGrup')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label>Nama Grup</label>
              <input type="text"  class="form-control" placeholder="" name="nama_grup" id="">
            </div>  

             <div class="form-group">
            <label>Kategori Grup</label>
              <select class="form-control" name="kat_grup" id="">
                <option value="obat">Obat</option>
                <option value="alat medis">Alat Medis</option>
              </select>
            </div>  
            
            <div class="form-group">
              <label>Keterangan</label>
              <textarea rows="3" name="keterangan" id="" class="form-control"></textarea>
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