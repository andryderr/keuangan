  <div class="modal fade" id="detailhutang" role="dialog">
   <div class="modal-dialog modal-lg">
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
          <h3 class="box-title">Detail Pembayaran Hutang</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- form start -->
        <div class="box-body">
          <div class="col-md-12">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
               <table id="" class="table datatable table-striped table-bordered" cellspacing="0">
                <thead class="bg-info">
                  <tr>
                    <th>No</th>
                    <th>Tgl Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Sisa Tagihan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot class="bg-info">
                  <tr>
                    <th>No</th>
                    <th>Tgl Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Sisa Tagihan</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
                <?php 
                $no = 1;
                ?>
                <tbody id="detailHutang">
       
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div><!-- /.box-body -->                      
 </div>
</div>
</div>
</div>