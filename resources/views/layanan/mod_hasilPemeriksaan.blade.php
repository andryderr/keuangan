 <div class="modal fade" id="isiHasil" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Isi Hasil Pemeriksaan</h3>
        <label>Isi Hasil Pemeriksaan:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Pemeriksaan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
        <form action="{{url(Auth::user()->poli->prefix.'/simpanHasilPemeriksaan')}}" method="post">
        {{csrf_field()}}
          <div class="form-group">
            <label>No Pendaftaran</label>
            <input type="text"  class="form-control" placeholder="" readonly="" name="id_pendaftaran" id="id_pendaftaran">
          </div>
          <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text"  class="form-control" placeholder="" readonly="" name="nama_pasien" id="nama_pasien">
          </div>
          <div class="form-group">
            <label>Pemeriksaan</label>
            <input type="text"  class="form-control" placeholder="" readonly="" name="" id="nama_pemeriksaan">
          </div>
          <table class="table table-striped table-bordered">
            <thead>
              <tr style="background:#E0E0E0;">
                <th>ID</th>
                <th>Detail Pemeriksaan</th>
                <th>Hasil</th>
                <th>Nilai Normal</th>
              </tr>
            </thead>
            <tbody id="detailPemeriksaan">
              
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