 <div class="modal fade" id="tambahBankMasuk" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Bank Masuk</h3>
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
          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <form action="{{url('KASIR/tambahBankMasuk')}}" method="post">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group col-md-12">
                  <label>Tgl. Bank Masuk</label>
                  <input type="text" class="form-control col-md-5" name="tgl_bank" id="tanggalwaktu" >
                </div>
                <div class="form-group col-md-12 ">
                  <label>Akun</label>
                  <select class="form-control" name="akun" id="">
                    @foreach($akun as $akuns)
                    <option value="{{$akuns->id_akun}}">{{$akuns->nama_akun}}</option>
                    @endforeach
                  </select>
                </div>

                <input type="hidden" readonly="" class="form-control col-md-5" value="{{Auth::user()->id}}" name="user" id="">
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="form-group col-md-12">
                <label>Keterangan</label>
                <textarea colspan="3" name="keterangan" class="form-control" ></textarea>
              </div>
              <div class="box-body">
                <div class="form-group col-md-12">
                  <label>Jumlah (Rp.)</label>
                  <input type="text" style="font-size:30px; font-weight:bold;" class="form-control col-md-5" name="jumlahuang" id="bayar1" >
                </div>
                <button type="submit" class="btn btn-success pull-right">
                  Selesai <span class="fa fa-save"></span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.box-body -->                      
  </div>
</div>
</div>