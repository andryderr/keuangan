 <div class="modal fade" id="pilihPemeriksaan" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Pilih Pemeriksaan Pasien</h3>
        <label>Pilih Pemeriksaan Dibawah:</label>
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
          <form action="{{url(Auth::user()->poli->prefix.'/simpanCheckbox')}}" method="post">
          {{csrf_field()}}
           <table id="pilih" class="table table-striped table-bordered">
            <thead>
              <tr style="background:#E0E0E0;">
                <th>ID Pemeriksaan</th>
                <th>Nama Pemeriksaan</th>
                <th style="width=100px;">Action</th>
              </tr>
            </thead>
            <tbody id="pemeriksaan">
              @foreach($dataJenisPemeriksaan as $row)
              <tr>
                <td>{{$row->id_jenis_pemeriksaan}}</td>
                <td>{{$row->nama_jenis_pemeriksaan}}</td>
                <td><input type='checkbox' name='jenis_pemeriksaan[]' class='flat-red' value="{{$row->id_jenis_pemeriksaan}}"></td>
              </tr> 
              @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->                      
        <input type="hidden" name="id_pemeriksaan" value="{{$dataPemeriksaan[0]->id_pemeriksaan}}">
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>