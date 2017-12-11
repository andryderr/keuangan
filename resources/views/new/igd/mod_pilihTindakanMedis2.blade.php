 <div class="modal fade" id="pilihTindakan" role="dialog">
   <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Pilih Tindakan Medis</h3>
        <label>Pilih Tindakan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Tindakan Medis</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="{{url(Auth::user()->poli->prefix.'/Pasien/DetailTindakanMedis/Tambah')}}" method="post">
          <input type="hidden" name="tanggal" value="{{date('Y-m-d')}}">
          <input type="hidden" name="id_detail_pendaftaran" value="{{$id_detail}}">
          {{csrf_field()}}
          <div class="box-body">
           <table id="pilih1" class="table table-striped table-bordered">
            <thead>
              <tr style="background:#E0E0E0;">
                <th>ID Tindakan</th>
                <th>Nama Tindakan Medis</th>
                <th>Harga</th>
                <th style="width=100px;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tindakan as $row)
              <tr>
                <td>
                  {{$row->id_detail_medis_kelas}}
                </td>
                <td>{{$row->tindakanMedis->nama}}</td>
                <td>{{$row->harga_total}}</td>
                <td>                          
                  <button type="button" class="btn btn-default" id="bt{{$row->id_detail_medis_kelas}}" onclick="tindak('{{$row->id_detail_medis_kelas}}')">
                    <span class="fa fa-check"></span></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="modal-footer">
            <input type="hidden" class="hidden" name="id_detail_medis_kelas" id="pilihTindak">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="{{url('/assets/js/jQuery-2.1.4.min.js')}}"></script>
<script>
  $(document).ready(function(){
    simpan = 0;
  });
  function tindak(id){
    // alert(simpan);
    $("#bt"+simpan).removeClass("btn-info");
    $("#bt"+simpan).addClass("btn-default");
    $("#bt"+id).addClass("btn-default");
    $("#bt"+id).addClass("btn-info");
    simpan = id;
    $("#pilihTindak").val(id);
  }
</script>