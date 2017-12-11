 <div class="modal fade" id="tambahMasterStokAwal" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Supplier</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Supplier</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{url('FARMASI/tambahStokAwal')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label>Nama Gudang</label>
              @if($id == 0)
              <select class="form-control" name="id_gudang" id="cari_gudang">
                @foreach($data as $dg)
                <option value="{{$dg->id_gudang}}" selected>{{$dg->nama_gudang}}</option>
                @endForeach
              </select>
              @else
              <input type="text"  readonly="" class="form-control" placeholder="" value="{{$gudang[0]->nama_gudang}}" name="nama_gudang" id="">
              @endif
            </div>


            <div class="form-group">
              <label>Tanggal Stok Awal</label>
              <input type="text"  class="form-control" placeholder="" name="tanggal_stokawal" id="tanggal">
            </div>    
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