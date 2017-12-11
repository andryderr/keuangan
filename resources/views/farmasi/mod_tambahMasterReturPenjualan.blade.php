 <div class="modal fade" id="tambahReturPenjualan" role="dialog">
   <div class="modal-dialog modal-lg" style="width: 1200px;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Pilih Penjualan</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Penjualan Farmasi</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
         <div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Master Retur Penjualan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">


              <div class="form-group col-md-12">
                <label>No Entri Penjualan</label>
                <div class="input-group">
                  <input type="text" name="no_entri_penjualan" id="no_entri_penjualan" class="form-control" placeholder="Masukan No Entri">
                  <span class="input-group-btn">
                    <a class="btn btn-success" type="submit" onclick="setPenjualan();"> <i class="glyphicon glyphicon-search"></i></a>
                  </span>
                </div>
              </div>
              

              <form method="post" action="{{url('FARMASI/returObat/tambahMP')}}">
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

          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Penjualan</h3>
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
                  <span class="input-group-addon" style="padding-right:27px">Kategori Pembeli</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="" id="nama_customer">
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon">Tanggal Penjualan</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="tgl_penjualan" id="tgl_penjualan">  
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:48px">Nomer Entri</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="id_penjualan" id="id_penjualan">
                </div>
                <br>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Resep</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <!-- <label>ID Supplier</label> -->
                  <input type="hidden" style="width:120px;" type="hidden" readonly="" class="form-control" placeholder="" name="id_dokter" id="id_dokter">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:42px">No Resep</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="" id="no_resep">
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon">Tanggal Resep</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="tgl_resep" id="tgl_resep">  
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:23px">Nama Dokter</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="nama_dokter" id="nama_dokter">
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon" style="padding-right:14px">Nama Pasien</span>
                  <input type="text"  class="form-control" placeholder="" readonly name="nama_pasien" id="nama_pasien">
                </div>
                <br>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Data Penjualan</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                 <table id="" class="" width="100%">
                  <thead>
                    <tr class="bg-danger" font-size: 14px;">
                      <th>No</th>
                      <th>ID</th>
                      <th>Bahan Baku</th>
                      <th>Satuan</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Biaya Racik</th>
                      <th>Biaya Resep</th>
                      <th>Diskon RP</th>
                      <th>Diskon 1</th>
                      <th>Diskon 2</th>
                      <th>Subtotal</th>
                    </thead>

                    <tbody id="isiTablePenjualan">

                    </tbody>
                    <tbody class="jumlahTagihan">
                      <tr class="bg-success">
                        <td colspan="10"></td>
                        <td class="pull-right"><h3><strong>Total : </strong></h3></td>
                        <td colspan="2"><input type="text" style="font-size:25px; font-weight:bold; margin-top:11px; width:200px; border-width:0px; background-color:transparent;" readonly="" class="form-control pull-left" name="" id="total"></td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <button type="button" class="btn btn-default btn-md pull-left"> Close</button>

                  <button type="submit" class="btn btn-primary btn-md pull-right"> Tambah Retur</button>
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