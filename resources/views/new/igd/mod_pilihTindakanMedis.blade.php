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
            <input type="text" placeholder="search..." name="" id="searchTindakanMedis" onkeyup="searchTindakanMedis();">
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="{{url(Auth::user()->poli->prefix.'/Pasien/DetailTindakanMedis/Tambah')}}" method="post">
          <input type="hidden" name="tanggal" value="{{date('Y-m-d')}}">
          <input type="hidden" name="id_detail_pendaftaran" value="{{$id_detail}}">
          {{csrf_field()}}
          <div class="box-body">

           <table id="" class="table table-striped table-bordered">
            <thead>
              <tr style="background:#E0E0E0;">
                <th>ID Tindakan</th>
                <th>Nama Tindakan Medis</th>
                <th>Harga</th>
                <th style="width=100px;">Action</th>
              </tr>
            </thead>
            <tbody id="tableTindakanMedis">

            </tbody>
          </table>
          <div id="btn_pagination" style="float:right;">
            <button type="button" id="kiri" class="btn btn-success">Sebelumnya</button>
            <span id="number_pagination"></span>
            <button type="button" id="kanan" class="btn btn-success">Selanjutnya</button>
          </div>
        </div>

        <div class="modal-footer">
          <input type="text" class="hidden" name="id_detail_medis_kelas" id="pilihTindak">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <span class="pull-right">
          <button type="submit" id="sm" class="btn btn-primary pull-right">Simpan</button>
          </span>
          <span class="col-md-3 pull-right">
            <span class="col-md-4 pull-left">
              Jumlah:
            </span>
            <span class="col-md-8">
              <input type="number" name="jumlah" value="1" class="pull-right form-control">
            </span>
          </span>
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
    $("#sm").prop('disabled', true);
  });
  function tindak(id){
    // alert(simpan);
    $("#bt"+simpan).removeClass("btn-info");
    $("#bt"+simpan).addClass("btn-default");
    $("#bt"+id).addClass("btn-default");
    $("#bt"+id).addClass("btn-info");
    simpan = id;
    $("#pilihTindak").val(id);
    $("#sm").prop('disabled', false);
  }
  $("#pilihDiagnosa").on('click', function(){
    $("#smd").prop('disabled', false);
  });
</script>