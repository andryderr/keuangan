 <div class="modal fade" id="tambahKelasMedis" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Tambah Ruang</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Ruang</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{ url(Auth::user()->poli->prefix.'/detail/tambahKelasMedis') }}/{{$id}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Nama Kelas</label>
              <select id="selectData" name="id_kelas" class="form-control">
              @foreach($dataKelas as $row)
                <option value="{{$row->id_kelas}}">{{$row->nama_kelas}}</option>
              @endforeach
              </select>
            </div> 
          </div>             

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>