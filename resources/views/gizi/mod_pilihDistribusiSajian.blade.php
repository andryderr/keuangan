 <div class="modal fade" id="pilihDistribusi" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Pilih Distribusi Sajian</h3>
        <label>Pilih Pemeriksaan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pasien</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
        <form action="{{url('GIZI/simpanDistribusi')}}" method="post">
         <table class="table table-striped datatable table-bordered">
          <thead>
            <tr style="background:#E0E0E0;">
              <th>ID Pendaf</th>
              <th>Makanan Rekom</th>
              <th>Tanggal Rekom</th>
              <th style="width:125px;">Makanan Distribusi</th>
              <th>Tanggal DIstribusi</th>
              <th style="width=80px;">Action</th>
            </tr>
          </thead>
          <tbody id="distribusi">
            
         </tbody>
       </table>
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