 <div class="modal fade" id="modpasienRWinap" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Tabel Pasien Rawat Inap</h3>
        <label>Tabel Detail :</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pasien Rawat Inap</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <table id="" class="table datatables table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <tr>
                  <th>ID</th>
                  <th>No RM</th>
                  <th>Nama</th>
                    <th>Umur</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th>Kamar</th>
                  </tr>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>No RM</th>
                  <th>Nama</th>
                  <th>Umur</th>
                  <th>Kelas</th>
                  <th>Ruang</th>
                  <th>Kamar</th>
                </tr>
              </tfoot>
              <tbody id="pasienRWinap">

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
