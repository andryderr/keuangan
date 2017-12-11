 <div class="modal fade" id="bayar" role="dialog">
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
                <form action="{{url('KASIR/tambahPembayaran')}}" method="post">
                  {{csrf_field()}}
                  <div class="form-group col-md-12">
                    <!-- <label>Nama User</label> -->
                    <input type="hidden" readonly="" class="form-control col-md-5" value="{{Auth::user()->id}}" name="user" id="">
                    <input type="hidden" readonly="" class="form-control col-md-5" value="{{Auth::user()->name}}">
                  </div>
                  <div class="form-group col-md-12">
                    <!-- <label>NO RM</label> -->
                    <input type="hidden" readonly="" class="form-control"  name="id_pendaf" id="id_pendaf">
                  </div>

                  <div class="form-group col-md-3">
                    <label>Discount %</label>
                    <input type="number" class="form-control" placeholder="%" name="" id="diskonpersen" onkeyup="hasilNetto();">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Discount (Rp)</label>
                    <input type="number" class="form-control" placeholder="Rp" name="diskonrptampil" id="diskonuang" readonly="">
                  </div>
                  <div class="form-group col-md-5">
                    <label>Discount Rp</label>
                    <input type="text" class="form-control" placeholder"Rp" name="" id="diskonrp" onkeyup="hasilNetto();" onkeyup="inputTitikRupiah();">
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
                    <label><h4><strong>Total Potongan</strong></h4></label>
                    <input type="text" style="font-size:30px; font-weight:bold; text-align:right;" readonly="" value="0" class="form-control col-md-7" name="potongan" id="potongan">
                  </div>

                  <div class="form-group col-md-12">
                    <label><h4><strong>Total Tagihan</strong></h4></label>
                    <input type="text" style="font-size:30px; font-weight:bold; text-align:right;" readonly="" value="0" class="form-control col-md-7" name="totaltagihan" id="totaltagihan">
                  </div>

                  <!-- <input type="text" readonly="" value="0" class="form-control col-md-7" name="totaltagihan" id="totaltagihan"> -->

                  <input type="hidden" readonly="" value="0" class="form-control col-md-7" name="netto" id="netto">

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
                    <input type="text" class="form-control" placeholder="" name="tanggalbayar" 
                    value="

                    " id="tanggalwaktu">
                  </div>
                  <div class="form-group">
                    <label>Kategori Pembayaran</label>
                    <select class="form-control" name="kat_bayar" id="katPembelian" onchange="pembayaran1();">
                      <option value="Tunai">Tunai</option>
                      <option value="Kredit">Kredit</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Akun</label>
                    <select class="form-control" name="akun" id="">
                      @foreach($akun as $akuns)
                      <option value="{{$akuns->id_akun}}">{{$akuns->nama_akun}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group" id="top1" style="display:none">
                    <label>TOP</label>
                    <input type="number" class="form-control" placeholder="" name="top" id="top"  onkeyup="jatuhTempoo();">
                  </div>

                  <div class="form-group" id="jatuhTempo" style="display:none">
                    <label>Tanggal Jatuh Tempo</label>
                    <input type="text" readonly="" class="form-control" placeholder="" name="jatuhtempo" id="jt">
                  </div>

                  <div class="form-group" id="">
                    <label>Nama Pasien</label>
                    <input type="text"  readonly="" class="form-control" name="" id="nama_pasien">
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
                    <label>Netto</label>
                    <input type="text" style="font-size:30px; font-weight:bold; text-align:right;" readonly="" class="form-control col-md-5"   name="nettotampil" id="nettotampil">
                  </div>

                  <div class="form-group col-md-12">
                    <label>Bayar/Uang Muka</label>
                    <input type="text" onkeyup="hitungKembali();" onkeyup="inputTitikRupiah();" style="font-size:30px; font-weight:bold; text-align:right;" class="form-control col-md-5" name="jumlahuang" id="bayar1" >
                  </div>
                  <div class="form-group col-md-12" id="viewkembali">
                    <label>Kembali</label>
                    <input type="text" style="font-size:30px; font-weight:bold; text-align:right;" readonly="" class="form-control col-md-5"  name="" id="kembali">
                  </div>
                  <div class="form-group col-md-12" id="viewsisatagihan" style="display:none;">
                    <label>Sisa Tagihan</label>
                    <input type="text" style="font-size:30px; font-weight:bold; text-align:right;" readonly="" class="form-control col-md-5"  name="sisatagihan" id="sisatagihan">
                  </div>

                  <button type="submit" class="btn btn-success col-md-12 pull-right" style="margin-top: 25px;"> <span class="fa fa-dollar"></span>
                    Bayar 
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