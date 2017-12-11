 <div class="modal fade" id="editSajian" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Sajian</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Sajian</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <form action="{{url('GIZI/editBarang')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <!-- <label>ID Jenis Sajian</label> -->
              <input type="hidden" value="{{$id_jb}}" class="form-control" placeholder="" name="id_barang" id="id_barang">
            </div> 

            <div class="form-group">
              <label>Nama Sajian</label>
              <input type="text"  class="form-control" placeholder="" name="namaSajian" id="namaSajian">
            </div>

            <div class="form-group">
              <label>Harga Pokok Penjualan (HPP)</label>
              <input type="text"  class="form-control" placeholder="" name="hpp" id="hpp">
            </div>

            <div class="form-group">
              <label>Kategori Barang</label>
              <select class="form-control" readonly name="kategoriBarang" id="kat_barang">
                <option value="Sajian">Sajian</option>
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
</div>