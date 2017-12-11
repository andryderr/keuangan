 <div class="modal fade" id="bayarHutang" role="dialog">
   <div class="modal-dialog modal-lg" style="width: 1100px;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Pembayaran Hitung</h3>
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
         <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">

              <form action="{{url('KASIR/bayarHutang')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" class="form-control col-md-5" readonly="" value="Pembayaran Piutang" name="jnstransaksi" id="jnstransaksi" >

                <div class="form-group" id="">
                  <label>Nama Supplier</label>
                  <input type="text"  readonly="" class="form-control" name="" id="hutangkesupplier">
                </div>

                <div class="form-group" id="top1">
                  <label>TOP</label>
                  <input type="number" class="form-control" readonly="" placeholder="" name="top" id="top">
                </div>

                <div class="form-group" id="jatuhTempo">
                  <label>Tanggal Jatuh Tempo</label>
                  <input type="text" readonly="" class="form-control" placeholder="" name="jatuhtempo" id="jt">
                </div>

              </div>
            </div>
          </div>

          <div class="col-md-5">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <input type="hidden"  readonly="" class="form-control" name="id_hutang" id="idhutang">
      
                  <!-- <label>ini id user</label> -->
                  <input type="hidden" readonly="" class="form-control col-md-5" value="{{Auth::user()->id}}" name="user" id="">
                  <!-- <label>ini id supplier</label> -->
                  <input type="hidden" readonly="" class="form-control"  name="id_supplier" id="id_supp">
       

                <div class="form-group col-md-12">
                  <label><strong>Nilai Pembelian</strong></label>
                  <input type="text" style="font-size:30px; font-weight:bold;" readonly="" value="0" class="form-control col-md-7" name="tagihan" id="tagihan">
                </div>

                <div class="form-group col-md-12">
                  <label><strong>Harus Dibayar</strong></label>
                  <input type="text" style="font-size:30px; font-weight:bold;" readonly="" value="0" class="form-control col-md-7" name="dibayar" id="dibayar">
                </div>

                <input type="hidden" style="font-size:30px; font-weight:bold;" readonly="" value="0" class="form-control col-md-7" name="netto" id="netto">

                <div class="form-group col-md-12">
                  <label>Akun</label>
                  <select class="form-control" name="akun" id="namaakun">
                    <option disabled selected value> -- select an option -- </option>
                    @foreach($akun as $row)
                    <option value="{{$row->id_akun}}">{{$row->nama_akun}}</option>
                    @endforeach
                  </select>
                </div>


                <input type="hidden" readonly="" value="0" class="form-control col-md-7" name="netto" id="netto">

                <br>
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
                <label>Tanggal Bayar</label>
                <input type="text" readonly="" class="form-control" placeholder="" name="tanggalbayar" 
                value="<?php
                date_default_timezone_set('Asia/Jakarta');
                $tanggal = date('Y-m-d H:i:s');
                echo($tanggal);
                ?>">
              </div>

              <div class="form-group col-md-12">
                <label>Bayar/Uang Muka</label>
                <input type="text" onkeyup="hitungKembali();" onkeyup="inputTitikRupiah();" style="font-size:30px; font-weight:bold;" class="form-control col-md-5" name="jumlahuang" id="bayar1">
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