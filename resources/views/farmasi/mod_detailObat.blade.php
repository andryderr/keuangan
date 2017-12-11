 <div class="modal fade" id="detailObat" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Tabel Detail Obat</h3>
        <label>Tabel Detail Obat:</label>
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
            <div class="form-group pull-right col-md-3">
          <input type="search" placeholder="Cari disini" data-table="table table-bordered" class="form-control no-print" placeholder="" name="" id="">
        </div>
          <table class="table table-bordered" cellspacing="0" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Obat</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Nama Obat</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody id="dataObat">
            </tbody>
          </table>

        </div><!-- /.box-body -->                      
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>