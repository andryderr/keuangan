 <div class="modal fade" id="tambahMaster" role="dialog">
   <div class="modal-dialog modal-sm">
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
          <form action="{{url('FARMASI/tambahMaster')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label>Nama Supplier</label>
              @if($status == 0)
              <select class="form-control" name="id_sup1">
                <option disabled selected value> -- select an option -- </option>
                @foreach($supplier as $sup)
                <option value="{{$sup->id_supplier}}">{{$sup->nama_supplier}}</option>
                @endforeach
              </select>
              @else
              <input type="text" readonly="" class="form-control" value="{{$data[0]->nama_supplier}}" name="" id="">
              <input type="hidden" name="id_sup1" value="{{$data[0]->id_supplier}}">
              @endif
            </div>

            <div class="input-group">
              <span class="input-group-addon">Tanggal Pembelian</span>
              <input type="text"  class="form-control" placeholder="" readonly name="tgl_pembelian" id="tgl_pembelian" 
              value="<?php 
              date_default_timezone_set('Asia/Jakarta');
              $tanggal = date('Y-m-d H:i:s');
              echo "$tanggal"; 
              ?>">  
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon" style="padding-right:48px">Nomer Entri</span>
              <input type="number"  class="form-control" placeholder="" readonly name="" id="" value="">
            </div>
            <br>
            <div class="form-group">
              <label>No Faktur</label>
              <input type="number" class="form-control" placeholder="" name="no_faktur1" id="">
            </div>
            <div class="form-group">
              <label>Tanggal Faktur</label>
              <input type="text"  class="form-control" placeholder="" name="tanggal_faktur" id="tanggal2">
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