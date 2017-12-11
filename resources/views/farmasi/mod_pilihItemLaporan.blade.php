 <div class="modal fade" id="PilihItemKartuStok" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Pilih Item Cari</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Obat</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="">

            <table id="" class="table datatable table-striped table-bordered">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th style="width:70px;">ID</th>
                  <th>Nama Bahan</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                   32434ho2
                 </td>
                 <td id="namaitem">Panadol</td>
                 <td>Tablet</td>
                 <td>5000</td>
                 <td>                          
                   <a href="#" onclick="setItem();"><button type="button" class="btn btn-primary" id="tombolpilih"><i class="glyphicon glyphicon-check"></i></button></a>
                 </td>
               </tr>

               <tr>
                <td>
                  ho42h34
                </td>
                <td id="namaitem">Bodrex</td>
                <td>Kapsul</td>
                <td>8000</td>
                <td>                          
                  <a href="#" onclick="setItem();"><button type="button" id="tombolpilih" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i></button></a>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
        <!-- /.form group -->
      </div>
    </div><!-- /.box-body -->                      
  </form>
</div>
</div>
</div>
</div>
