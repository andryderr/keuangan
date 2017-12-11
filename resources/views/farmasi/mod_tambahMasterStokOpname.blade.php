 <div class="modal fade" id="tambahMasterOpname" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Stok Opname</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <form method="post" action="{{url(Auth::user()->poli->nama_poli.'/simpanMasterStokOpname')}}">
          {{csrf_field()}}
          <div class="box-header with-border">
            <h3 class="box-title">Data Stok Opname</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->

          <div class="box-body">
           <div class="form-group col-md-6">
            <label>No Stok Opname</label>
            <input type="text" class="form-control" readonly="" placeholder="" name="" id="">
          </div>

          <div class="form-group col-md-6">
            <label>Tanggal</label>
            <input type="text" class="form-control" placeholder="" name="tgl_stok_opname" id="tanggal2" required>
          </div>

          <div class="form-group col-md-6">
            <label>Gudang</label>
            <select class="form-control" name="id_gudang" id="id_gudang" required>
              <option disabled selected value> -- select an option -- </option>
              @foreach($gudang as $row)
              <option value="{{$row->id_gudang}}">{{$row->nama_gudang}}</option>
              @endForeach
            </select>
          </div>

          <div class="form-group col-md-6">
           <label>Keterangan</label>
           <textarea rows="3" class="form-control"  name="keterangan" id="" placeholder="isi keterangan"></textarea>
           <!-- /.form group -->
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