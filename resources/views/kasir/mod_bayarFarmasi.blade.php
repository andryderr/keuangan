 <div class="modal fade" id="bayarFarmasi" role="dialog">
   <div class="modal-dialog modal-lg" style="width: 1100px;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Pembayaran</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Pembayaran</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- form start -->
        <div class="box-body">
          <div class="col-md-5" style="font-size:10px">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <form action="{{url('KASIR/simpanPembayaran')}}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="id_penjualan_barang" id="id_penjualan">

                  <div class="form-group col-md-12">
                    <label>nanti dihidden dikasih id user</label>
                    <input type="text" readonly="" class="form-control col-md-5" value="1" name="user" id="">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Nama Pasien</label>
                    <input type="text" readonly="" class="form-control"  value="" name="id_pendaf" id="nama_pasien">
                  </div>

                  <div class="form-group col-md-3">
                    <label>Discount %</label>
                    <input type="number" class="form-control" placeholder="%" name="" id="diskonpersen" onkeyup="hasilNetto();">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Discount (Rp)</label>
                    <input type="number" class="form-control" placeholder="Rp" name="diskonrptampil" id="diskonuang" readonly="">
                    <input type="hidden" name="diskon_master" id="baru">
                  </div>
                  <div class="form-group col-md-5">
                    <label>Discount Rp</label>
                    <input type="text" class="form-control" placeholder="Rp" name="" id="diskonrp" onkeyup="hasilNetto();" onkeyup="inputTitikRupiah();">
                  </div>

                  <div class="form-group col-md-6">
                    <label>PPN %</label>
                    <input placeholder="%" type="number" class="form-control"  name="ppnpersen" id="ppnpersen" onkeyup="hasilNetto();">
                  </div>

                  <div class="form-group col-md-6">
                    <label>PPN Rp</label>
                    <input type="number" readonly="" class="form-control"  name="ppnrupiah" id="ppnrp" onkeyup="hasilNetto();">
                  </div>

                  <div class="form-group col-md-12">
                    <label><h4><strong>Netto</strong></h4></label>
                    <input type="text" style="font-size:30px; font-weight:bold;" readonly="" value="0" class="form-control col-md-7" name="netto" id="nettotampil">
                  </div>

                  <input type="hidden" readonly="" value="0" class="form-control col-md-7" name="netto_master" id="netto">

                  <br>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                    <label>Tanggal Bayar</label>
                    <input type="text" class="form-control" placeholder="" name="tanggalbayar" id="tanggalwaktu">
                  </div>
                  <div class="form-group">
                    <label>Kategori Pembayaran</label>
                    <select class="form-control" name="kat_bayar" id="katPembelian" onchange="pembayaran1();">
                      <option disabled selected value> -- select an option -- </option>
                      <option value="Tunai">Tunai</option>
                      <option value="Kredit">Kredit</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Akun</label>
                    <select class="form-control" name="akun" id="">
                      <option disabled selected value> -- select an option -- </option>
                      @foreach($akun as $akuns)
                      <option value="{{$akuns->id_akun}}">{{$akuns->nama_akun}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group" id="top1" style="display:none">
                    <label>TOP</label>
                    <input type="number" class="form-control" placeholder="" name="top_master" id="top"  onkeyup="jatuhTempoo();">
                  </div>

                  <div class="form-group" id="jatuhTempo" style="display:none">
                    <label>Tanggal Jatuh Tempo</label>
                    <input type="text" readonly="" class="form-control" placeholder="" name="jatuhtempo" id="jt">
                  </div>

                  <div class="form-group" id="">
                    <label>Nama Pasien</label>
                    <input type="text"  readonly="" class="form-control" placeholder="nama pasien sesuai id" name="" id="">
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group col-md-12">
                    <label>Keterangan</label>
                    <textarea colspan="3" class="form-control" name="keterangan"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Bayar/Uang Muka</label>
                    <input type="text" onkeyup="hitungKembali();" onkeyup="inputTitikRupiah();" style="font-size:30px; font-weight:bold;" class="form-control col-md-5" name="jumlahuang" id="bayar1" >
                  </div>
                  <div class="form-group col-md-12" id="viewkembali">
                    <label>Kembali</label>
                    <input type="text" style="font-size:30px; font-weight:bold;" readonly="" class="form-control col-md-5"  name="" id="kembali">
                  </div>
                  <div class="form-group col-md-12" id="viewsisatagihan">
                    <label>Sisa Tagihan</label>
                    <input type="text" style="font-size:30px; font-weight:bold;" readonly="" class="form-control col-md-5"  name="sisatagihan" id="sisatagihan">
                  </div>

                  <button type="submit" class="btn btn-success pull-right">
                    Selesai <span class="fa fa-save"></span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.box-body -->                      
    </div>
  </div>
</div>