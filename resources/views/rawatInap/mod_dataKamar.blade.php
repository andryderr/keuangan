 <div class="modal fade" id="dataKamar" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Tabel Kelas, Ruang, Kamar</h3>
        <label></label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Kamar</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
        <div class="form-group pull-right col-md-3">
          <input type="search" placeholder="Cari disini" data-table="table table-striped" class="form-control no-print" name="" id="">
        </div>
        <table class="table table-striped" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Kelas</th>
                <th>Kamar</th>
                <th>No Kasur</th>
                <th>Harga</th>
                <th>Ketersediaan</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Kelas</th>
                <th>Kamar</th>
                <th>No Kasur</th>
                <th>Harga</th>
                <th>Ketersediaan</th>
              </tr>
            </tfoot>
            <tbody id="gantien">

            </tbody>
          </table>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.box-body -->
      </div>

    </form>
  </div>
</div>
</div>
