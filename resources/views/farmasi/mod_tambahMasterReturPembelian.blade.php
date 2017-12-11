 <div class="modal fade" id="tambahReturPembelian" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Pilih Pembelian</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pembelian Farmasi</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

       <div class="box-body">
             <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Master Retur Pembelian</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">


              <div class="form-group col-md-12">
                <label>No Entri Pembelian</label>
                <div class="input-group">
                  <input type="text" name="no_entri_pembelian" id="no_entri_pembelian" class="form-control" placeholder="Masukan No Entri">
                  <span class="input-group-btn">
                    <a class="btn btn-success" type="submit" onclick="setPembelian();"> <i class="glyphicon glyphicon-search"></i></a>
                  </span>
                </div>
              </div>
              

              <form method="post" action="{{url('FARMASI/returObat/tambah')}}">
                {{csrf_field()}}
                <div class="form-group col-md-6">
                  <label>No Retur</label>
                  <input type="number"  class="form-control" placeholder="" readonly="" name="" id=""  value="">
            </div>

            <div class="form-group col-md-6">
              <label>Tanggal Retur</label>
              <input type="text"  class="form-control" placeholder="" readonly name="tgl_retur" id="tgl_retur" 
              value="<?php 
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d H:i:s');
                    echo "$tanggal"; 
                  ?>">
            </div>


            <div class="form-group col-md-12">
              <label>Keterangan</label>
              <textarea name="keterangan" required="" class="form-control" rowspan ="3"></textarea>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pembelian</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <!-- <label>ID Supplier</label> -->
          <input type="hidden" style="width:120px;" type="hidden" readonly="" class="form-control" placeholder="" name="id_supplier" id="id_supplier">
        </div>

        <div class="input-group">
          <span class="input-group-addon" style="padding-right:38px">Nama Supplier</span>
          <input type="text"  class="form-control" placeholder="" readonly name="" id="nama_supplier">
        </div>
        <br>

        <div class="input-group">
          <span class="input-group-addon">Tanggal Pembelian</span>
          <input type="text"  class="form-control" placeholder="" readonly name="tgl_pembelian" id="tgl_pembelian">  
        </div>
        <br>

        <div class="input-group">
          <span class="input-group-addon" style="padding-right:48px">Nomer Entri</span>
          <input type="text"  class="form-control" placeholder="" readonly name="id_pembelian" id="id_pembelian">
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-md pull-right"> Tambah Retur</button>
      </div>
    </div>
  </div>
</form>

<div class="col-md-12">
  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Data Pembelian</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
       <table id="" class="" width="100%">
        <thead>
          <tr class="bg-danger" font-size: 13px;">
            <th>No</th>
            <th>ID</th>
            <th>Bahan Baku</th>
            <th>Satuan</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Diskon RP</th>
            <th>Diskon 1</th>
            <th>Diskon 2</th>
            <th>Subtotal</th>
        </thead>

        <tbody id="isiTablePembelian">

        </tbody>
        <tbody class="jumlahTagihan">
          <tr class="bg-success">
            <td colspan="8"></td>
            <td class="pull-right"><h3><strong>Total : </strong></h3></td>
            <td colspan="2"><input type="text" style="font-size:25px; font-weight:bold; margin-top:11px; width:200px; border-width:0px; background-color:transparent;" readonly="" class="form-control pull-left" name="" id="total"></td>
          </tr>
        </tbody>
      </tbody>
    </table>
  </div>
</div>
</div>
</div><!--end .card-body -->
      </div>
    </div><!-- /.box-body -->                      
  </form>
</div>
</div>
</div>