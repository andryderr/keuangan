 <div class="modal fade" id="pilihKamar" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <form action="{{url(Auth::user()->poli->prefix.'/Pasien/Kamar')}}" method="POST" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #4db6ac;">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
          </button>
          <h3 class="modal-title" style="color:white;">Form Pilih Kamar Pasien</h3>
          <label>Pilih Kamar:</label>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Kamar</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->

          <div class="box-body">
            <div class="form-group">
              <label>ID Pendaftaran</label>
              <input type="text"  class="form-control" placeholder="" readonly name="id_pendaftaran" id="id_pendaftaran">
            </div>

            <div class="form-group">
              <label>Nama Pasien</label>
              <input type="text"  class="form-control" placeholder="" readonly name="nama_pasien" id="nama_pasien">
            </div>

            <div class="form-group">
              <form action="{{url('RWINAP/pasienDirawat')}}" method="post">
                {{csrf_field()}}
                <label>Kelas Kamar</label>
                <select class="form-control" required name="id_kelas" id="id_kelas2" onchange="setRuang();">
                  <option value="">----</option>
                  @foreach($dataKelas as $row)
                  <option value="{{$row->id_kelas}}">{{$row->nama_kelas}}</option>
                  @endforeach
                </select>
              </div> 
              <div class="form-group">
                <label>Ruang</label>
                <select class="form-control" required name="id_ruang" id="id_ruang1" onchange="setKamar();">
                  <option>-----</option>
                </select>
              </div> 
              <div class="form-group">
                <label>Kamar Kosong</label>
                <select class="form-control" required name="id_kamar" id="id_kamar1">
                  <option>----</option>
                </select>
              </div>
              <div class="form-group">
                <label>Dokter PJ</label>
                <select class="form-control" required name="id_dokter" id="id_dokter">
                  <option>----</option>
                  @foreach($dataDokter as $row)
                  <option value="{{$row->id_dokter}}">{{$row->nama}}</option>
                  @endForeach
                </select>
              </div> 
              <input type="hidden" id="id_detail" name="id_detail">
            </div><!-- /.box-body -->                      

            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary pull-right">Simpan</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function setRuang(){
      var e = document.getElementById("id_kelas2");
      oke = e.options[e.selectedIndex].value;
      url = "{{url('G/Ruang/')}}/"+oke;
      $.getJSON(url, function(result){
        $('#id_ruang1').empty();
        $('#id_ruang1').append('<option value="">----</option>');
        result.forEach(function(r){
          text = "<option value="+r.id_ruang+">"+r.nama_ruang+"</option>";
          $('#id_ruang1').append(text);
        }
        )});
    }

    function setKamar(){
      var e = document.getElementById("id_ruang1");
      oke = e.options[e.selectedIndex].value;
      url = "{{url('G/Kamar/')}}/"+oke;
      $.getJSON(url, function(result){
        $('#id_ruang1').append('<option value="">----</option>');
        $('#id_kamar1').empty();
        result.forEach(function(r){
          text = "<option value="+r.id_kamar+">"+r.nama+"</option>";
          $('#id_kamar1').append(text);
        }
        )});
    }
  </script>