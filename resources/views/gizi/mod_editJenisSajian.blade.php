 <div class="modal fade" id="editJenisSajian" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Ubah Jenis Sajian</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Jenis Sajian</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{url('GIZI/editJenisSajian')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label>ID Jenis Barang</label>
              <input type="text" readonly="" name="idJenisBarang" id="idJenisBarang"  class="form-control" placeholder="">
            </div>  

            <div class="form-group">
              <label>Nama Jenis Sajian</label>
              <input type="text"  class="form-control" placeholder="" name="namaJenisSajian" id="namaJenisSajian">
            </div> 
            
            <div class="form-group">
              <label>Kategori Barang</label>
              <select class="form-control" name="kategoriBarang" readonly id="kat_barang">
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
</div>