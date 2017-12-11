 <div class="modal fade" id="pilihDiagnosa" role="dialog">
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
        <form action="{{url(Auth::user()->poli->prefix.'/DetailDiagnosa/tambah')}}/{{$id_detail}}" method="post">
        {{csrf_field()}}
          <div class="box-header with-border">
            <h3 class="box-title">Data Diagnosa</h3>
            <div class="box-tools pull-right">
              <input type="text" placeholder="search..." name="" id="searchDiagnosa" onkeyup="searchDiagnos();">
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->

          <div class="box-body">

           <table id="" class="table table-striped table-bordered">
            <thead>
              <tr style="background:#E0E0E0;">
                <th>ID Diagnosa</th>
                <th>Kode</th>
                <th>Nama Diagnosa Medis</th>
                <th style="width=100px;">Action</th>
              </tr>
            </thead>
            <tbody id="tableDiagnosa">
              
            </tbody>
          </table>
          <div id="btn_pagination1" style="float:right;">
              <button type="button" id="kiri1" class="btn btn-success">Sebelumnya</button>
              <span id="number_pagination1"></span>
              <button type="button" id="kanan1" class="btn btn-success">Selanjutnya</button>
            </div>
        </div><!-- /.box-body -->                      

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" id="smd" disabled="true" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
