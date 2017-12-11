 <div class="modal fade" id="tambahRevisiStok" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Stok Awal</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Stok Awal Obat</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{url('FARMASI/tambahDetailRevisi')}}" method="post">
            {{csrf_field()}}
            <table id="itemRevisi" class="table datatable table-striped table-bordered">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th style="width:70px;">ID</th>
                  <th>Nama Bahan</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
           </table>

           <input type="hidden" name="satuan_turunan2" id="satuan_turunan2">
           <input type="hidden" name="satuan_turunan3" id="satuan_turunan3">
           <input type="hidden" name="satuan_turunan4" id="satuan_turunan4">
           <input type="hidden" name="kapasitas2" id="kapasitas2">
           <input type="hidden" name="kapasitas3" id="kapasitas3">
           <input type="hidden" name="kapasitas4" id="kapasitas4">
           <input type="hidden" name="satuan11" id="satuan11">
           <input type="hidden" name="satuan22" id="satuan12">
           <input type="hidden" name="satuan33" id="satuan13">
           <input type="hidden" name="satuan44" id="satuan14">
           <input type="hidden" name="j_kecil" id="stok1">
           @if($status == 1)
           <input type="hidden" name="id_revisi" value="{{$dataRevisi[0]->id_revisi}}">
           @else
           @endif

           <div class="form-group">
            <input type="hidden" class="form-control" readonly="" placeholder="" name="id_barang" id="id_barang">
            <input type="hidden" name="stok" id="stok_barang">
          </div>

          <div class="form-group col-md-4">
            <label>Bahan Baku</label>
            <input type="text" class="form-control" readonly="" placeholder="" name="nama_barang" id="nama_barang">
          </div>

          <div class="form-group col-md-3">
            <label>Harga</label>
            <input type="number"  readonly="" class="form-control" placeholder="" value="0" name="harga_barang" id="harga_barang">
          </div>

          <div class="form-group col-md-2">
            <label>Qty Revisi (+/-)</label>
            <input type="number" class="form-control" placeholder="" name="qty_revisi" id="qty_revisi" onkeyup="subTot();">
          </div>

          <div class="form-group col-md-3">
            <label>Satuan</label>
            <select style="width:90px" class="form-control" name="" id="satuan_lain" onchange="subTot();">
              <option value="">--</option>
            </select>
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
