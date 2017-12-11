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
              @foreach($diagnosa as $row)
              <tr>
                <td>{{$row->id_diagnosa}}
                </td>
                <td>{{$row->nama_diagnosa}}</td>
                <td>                          
                  <input type="checkbox" name="pilihan[]" value="{{$row->id_diagnosa}}" class="flat-red">
                </td>
              </tr>
              @endforeach
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