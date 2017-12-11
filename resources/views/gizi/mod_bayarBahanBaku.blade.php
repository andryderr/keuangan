 <div class="modal fade" id="bayar" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Bahan Baku</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Bahan Baku</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="">
           <div class="form-group">
            <label>Kategori Pembelian</label>
            <select class="form-control" name="" id="katPembelian" onclick="pembayaran();">
              <option>----</option>
              <option value="tunai">Tunai</option>
              <option value="kredit">Kredit</option>
            </select>
          </div>

          <div class="form-group" id="top1">
            <label>TOP</label>
            <input type="number" class="form-control" placeholder="" name="" id="top" onkeyUp="jatuhTempoo();">
          </div>

          <div class="form-group" id="jatuhTempo">
            <label>Tanggal Jatuh Tempo</label>
            <input type="text" readonly="" class="form-control" placeholder="" name="" id="jatuhTempo1">
          </div>

          <div class="form-group">
            <label>Kategori Pembelian</label>
            <select class="form-control" name="" id="">
              <option>----</option>
              <option value="Logistik">Logistik</option>
              <option value="Gizi">Gizi</option>
            </select>
          </div>

          <div class="form-group">
            <label>Gudang</label>
            <select class="form-control" name="" id="">
              <option>----</option>
              <option value="">Gudang 1</option>
              <option value="">Gudang 2</option>
            </select>
          </div>

          <div class="form-group">
            <label>Jumlah Bayar</label>
            <input type="number" class="form-control" placeholder="" name="" id="">
          </div>
        </form>
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

<script>
  function jatuhTempoo(){
    var top =  document.getElementById("top").value;
    var someDate = new Date();
    var numberOfDaysToAdd = top;
    var tgljatuh = someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
    document.getElementById('jatuhTempo1').value = tgljatuh;
  }
  function pembayaran()
  {
    if (document.getElementById("katPembelian").value == "kredit") {
      document.getElementById("jatuhTempo").style.display='block';
      document.getElementById("top").style.display='block';
    } else {
      document.getElementById("jatuhTempo").style.display='none';
      document.getElementById("top").style.display='none';
    }
  }


</script>