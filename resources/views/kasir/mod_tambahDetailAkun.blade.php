 <div class="modal fade" id="tambahDetailAkun" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Akun</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Detail Akun</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{url('KASIR/tambahDetailAkun')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label>Tanggal Detail Akun</label>
              <input type="hidden" readonly="" name="id_akun" id="id_akun" value="{{$data[0]->id_akun}}"  class="form-control" placeholder="">

              <input type="text" readonly="" name="tgl_akun" id="tgl_akun" 
              value="<?php 
              date_default_timezone_set('Asia/Jakarta');
              $tanggal = date('Y-m-d');
              echo "$tanggal"; 
              ?>" 
              class="form-control" placeholder="">
            </div>  

            <div class="form-group">
            <label>Jumlah Saldo Akhir Bulan</label>
              <input type="text" readonly="" class="form-control" name="saldoakhir" value="{{number_format( $saldoakhir,"0",".",".")}}" id="saldoakhir">
            </div> 

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