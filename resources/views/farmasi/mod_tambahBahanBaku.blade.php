 <div class="modal fade" id="tambahBahanBaku" role="dialog">
   <div class="modal-dialog modal-lg">
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
          <form action="{{url('FARMASI/tambahBahanBaku')}}" method="post">
            {{csrf_field()}}
            <div class="form-group col-md-6">
              <label>Nama Bahan Baku *</label>
              <input type="text" required="" class="form-control" placeholder="" name="nama_barang" id="nama_barang">
              <input type="hidden"  class="form-control" value="{{$data[0]->id_supplier}}" name="id_supplier_BB" id="">
            </div>
            <div class="form-group col-md-3">
              <label>Kategori Bahan Baku *</label>
              <select class="form-control" name="kat_barang" required="" id="kat_barang" onchange="setIdJenis();">
                <option value="Obat">Obat</option>
                <option value="Alat Medis">Alat Medis</option>
              </select>
            </div>
            <input type="hidden" name="id_jenis_barang" id="id_jenis_barang1" value="4">
            <div class="form-group col-md-3">
              <label>Stok Minimal *</label>
              <input type="number" required="" class="form-control" value="" placeholder="" name="stok_minimal" id="">
            </div>

            <br>
            <div class="col-md-12">
              <div class="form-group">
                <!--   <label>Satuan 1</label> -->
                <div class="input-group">
                  <input type="text"  class="form-control" placeholder="Satuan 1" name="satuan1" id="satuan1">
                </div>
              </div>

              <div class="form-group">
                <!-- <label>Satuan 2</label> -->
                <div class="input-group">
                  <input type="text"  class="form-control" placeholder="Satuan 2" name="satuan2" id="satuan2" onfocus="getData(1);">
                  <span class="input-group-addon"> <strong>=</strong></span>

                  <input type="text" style="width:150px"  class="form-control" placeholder="Kapasitas" name="kapasitas2" id="kapasitas2">
                  <select style="width:90px" class="form-control" name="satuan_turunan2" id="idKapasitas1">
                    <option value="null">--</option>

                  </select>

                </div>
              </div>

              <div class="form-group">
                <!-- <label>Satuan 3</label> -->
                <div class="input-group">
                  <input type="text"  class="form-control" placeholder="Satuan 3" name="satuan3" id="satuan3" onfocus="getData(2);">
                  <span class="input-group-addon"> <strong>=</strong></span>

                  <input type="text" style="width:150px"  class="form-control" placeholder="Kapasitas3" name="kapasitas3" id="kapasitas3">
                  <select style="width:90px" class="form-control" name="satuan_turunan3" id="idKapasitas2">
                    <option value="NULL">--</option>
                  </select>

                </div>
              </div>

              <div class="form-group">
                <!-- <label>Satuan</label> -->
                <div class="input-group">
                  <input type="text"  class="form-control" placeholder="Satuan 4" name="satuan4" id="satuan4" onfocus="getData(3);">
                  <span class="input-group-addon"> <strong>=</strong></span>

                  <input type="text" style="width:150px"  class="form-control" placeholder="Kapasitas" name="kapasitas4" id="kapasitas4">
                  <select style="width:90px" class="form-control" name="satuan_turunan4" id="idKapasitas3">
                    <option value="NULL">--</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label>Harga *</label>
              <input type="number"  class="form-control" placeholder="" name="hargaBahanBaru" id="bbharga">
            </div>
            
            <div class="form-group col-md-4">
              <label>Margin (%) *</label>
              <input type="number" class="form-control" required="" name="marginpersen" id="marginpersen" onkeyup="setSubtotalBB();">
            </div>

            <div class="form-group col-md-4">
              <label>Margin (Rp)</label>
              <input type="number" class="form-control" readonly="" name="marginrp" id="marginrp">
            </div>

            <div class="form-group col-md-3">
              <label>Grup Barang *</label>
              <select class="form-control" name="id_subgrup">
                @foreach($SubGrupObat as $row)
                <option value="{{$row->id_subgrup}}">{{$row->nama_subgrup}}</option>
                @endForeach
              </select>
            </div>

            <div class="form-group col-md-3">
              <label>Harga Jual 1</label>
              <input type="number"  class="form-control" placeholder="" name="harga_jual1" id="bbhargajual" onkeyup="setMargin();">
            </div>

            <div class="form-group col-md-3">
              <label>Harga Jual 2 *</label>
              <input type="number"  class="form-control" required="" placeholder="" name="harga_jual2" id="bbhargajual1" onkeyup="setSubtotalBB();">
            </div>

            <div class="form-group col-md-3">
              <label>Harga Jual 3 *</label>
              <input type="number"  class="form-control" required="" placeholder="" name="harga_jual3" id="bbhargajual2" onkeyup="setSubtotalBB();">
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

<script>
  function setIdJenis(){
    var e = document.getElementById("kat_barang");
    oke = e.options[e.selectedIndex].value;
    if (oke == 'Obat') {
      document.getElementById("id_jenis_barang1").value = '4';
    } else if (oke == 'Alat Medis') {
      document.getElementById("id_jenis_barang1").value = '5';
    } else if (oke == 'Psikotropika') {
      document.getElementById("id_jenis_barang1").value = '6';
    } else if (oke == 'Narkotika') {
      document.getElementById("id_jenis_barang1").value = '7';
    } else if (oke == 'Daftar G') {
      document.getElementById("id_jenis_barang1").value = '8';
    }
  }
</script>