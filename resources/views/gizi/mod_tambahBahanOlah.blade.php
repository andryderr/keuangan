 <div class="modal fade" id="tambahOlah" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Bahan Olahan</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Olahan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{('/GIZI/jenisSajian/dataSajian/pengolahanSajian/tambahDataPengolahan')}}" method="post">
            <div class="form-group">
              {{csrf_field()}}
              <label>Nama Bahan Gizi</label>
              <select class="form-control" name="namaBahan" id="namaBahan" onchange="setHarga();">
                <option value="">-----</option>
                @foreach ($data1 as $rows)
                <option value="{{$rows->id_barang}}">{{$rows->nama_barang}}</option>
                @endforeach
              </select>
            </div>  

            <div class="form-group">
              <input type="hidden"  class="form-control" value="{{$data2[0]->id_pengolahan}}" placeholder="" name="id_peng">
            </div> 

            <div class="form-group">
              <label>Jumlah</label>
              <input type="number"  class="form-control" placeholder="" min="1" name="jumlah" id="quantity" onkeyup="setSubtotal();">
            </div> 

            <div class="form-group">
              <label>Harga</label>
              <input type="text"  class="form-control" readonly="" placeholder="" name="harga" id="harga">
            </div> 

            <div class="form-group">
              <label>Sub total</label>
              <input type="text"  class="form-control" readonly="" placeholder="" name="subtotal" id="subtotal">
            </div> 

          </div><!-- /.box-body -->       
          <input type="hidden" name="stok" id="stok">

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  var st = 0;
  function setHarga(){
    var e = document.getElementById("namaBahan").value;
    url = "{{url('G/tambahOlah/')}}/"+e;
    $.getJSON(url, function(result){
      result.forEach(function(r){
        text = r.harga;
        st = r.stok;
        document.getElementById("harga").value = text;
        $("#quantity").attr("max", r.stok);
      });
    });
  }

  function setSubtotal(){
    var quantity = document.getElementById("quantity").value;
    var harga = document.getElementById("harga").value;
    var subtotal = quantity*harga;
    document.getElementById("stok").value = st - quantity;
    document.getElementById("subtotal").value = subtotal;
  // $('#subtotal').val(subtotal);
}
</script>