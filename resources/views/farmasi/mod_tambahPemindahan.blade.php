 @if($status == 1)
 <div class="modal fade" id="tambahItemPindah" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Pemindahan Barang</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Stok Barang</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="{{url('FARMASI/tambahItemPemindahan')}}" method="post">
            {{csrf_field()}}
            <div class="table-responsive">
             <table id="" class="table datatable table-striped table-bordered">
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
              <tbody>
                <?php $id = 0; ?>
                @foreach($dataBahanBaku1 as $row)
                <tr>
                  <?php $id = $row->id_barang; ?>
                  <td id="idBarang{{$row->id_barang}}">{{$row->id_barang}}</td>
                  <td id="nama_brg{{$row->id_barang}}">{{$row->nama_barang}}</td>
                  <td>{{$row->satuan1}}</td>
                  <td id="hrg1{{$row->id_barang}}">{{$row->harga}}</td>
                  <td id="stok1{{$row->id_barang}}">{{$row->qty_akhir}}</td>
                  <td>                          
                   <a href="#" onclick="setSubtotal({{$row->id_barang}});"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i></button></a>
                 </td>
               </tr>
               @endForeach
             </tbody>
           </table>
         </div>
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

         <div class="form-group">
          <input type="hidden" class="form-control" readonly="" placeholder="" name="id_barang_pemindahan" id="idBahan">
        </div>

        <input type="text" name="jumlah_kecil" id="stok1">
        <input type="text" name="stokbarang" id="stokbarang">
        <input type="hidden"  class="form-control" placeholder="" readonly="" value="{{$data[0]->id_pemindahan}}" name="id_pemindahan" id="">

        <div class="form-group col-md-4">
          <label>Bahan Baku</label>
          <input type="text" class="form-control" readonly="" placeholder="" name="" id="bahanBaku">
        </div>

        <div class="form-group col-md-3">
          <label>Harga</label>
          <input type="number" class="form-control" readonly="" placeholder="" value="0" name="harga_pemindahan" id="hargabahan" onkeyup="setSubtotal($id);">
        </div>

        <div class="form-group col-md-2">
          <label>Quantity</label>
          <input type="text" class="form-control" placeholder="" name="jumlah_pemindahan" id="quantity" onkeyup="subTot();">
        </div>

        <div class="form-group col-md-3">
          <label>Satuan</label>
          <select style="width:90px" class="form-control" name="satuan_pemindahan" onchange="subTot();" id="satuan_lain">
          </select>
        </div>

        <div class="form-group">
          <label>Subtotal</label>
          <input type="text"  class="form-control" placeholder="" name="" readonly="" id="subtotal_tampil">
          <input type="hidden"  class="form-control" placeholder="" name="subtotal_pemindahan" readonly="" id="subtotal">
        </div>
        <!-- /.form group -->
      </div>
    </div><!-- /.box-body -->                      

    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <button type="submit" id="tombolsimpan" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
@else
@endif