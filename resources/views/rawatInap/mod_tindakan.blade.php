 <div class="modal fade" id="pilihTindakan" role="dialog">
 <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Pilih Diagnosa Medis</h3>
        <label>Pilih Diagnosa Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Diagnosa</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
         <table id="pilih" class="table table-striped table-bordered">
          <thead>
            <tr style="background:#E0E0E0;">
              <th>ID Diagnosa</th>
              <th>Nama Diagnosa Medis</th>
              <th style="width=100px;">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>td90128</td>
              <td>Radang Tenggorokan</td>
              <td>                          
                <a href=""><button type="button" class="btn btn-primary"><i class="fa fa-check-circle-o"></i></button></a>
              </td>
            </tr>
            <tr>
              <td>td90128</td>
              <td>Tifus</td>
              <td>   
                <a href=""><button type="button" class="btn btn-primary"><i class="fa fa-check-circle-o"></i></button></a>
              </td>
            </tr>
        </tbody>
      </table>
    </div><!-- /.box-body -->                      

    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
</div>
</div>
</div>

 <script type="text/javascript">
        $(document).ready(function() {
            $('#pilih').DataTable();
        } );
    </script>