


<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar');

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Form Pendaftaran 
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Pendaftaran</li>
        </ol>
      </section>
      <form action="{{url(Auth::user()->poli->prefix.'/pendaftaran/store')}}" method="post">
        {{csrf_field()}}
        <div class="container-fluid">
         <!-- Main content -->
         <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="col-md-6">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#pk" data-toggle="tab">Pendaftaran/Kunjungan</a></li>
              </ul>
              <div class="tab-content">

                <div class="active tab-pane" id="pk">
                  <!-- The timeline -->
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Pasien Baru/Lama</label>
                          <select class="form-control" name="jenis_pasien" id="jenis_pasien" onchange="pasien();">
                            @if(!isset($data[0]))
                            <option>----</option>
                            <option value="BARU">BARU</option>
                            @endif
                            <option value="LAMA">LAMA</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Jenis Kepesertaan</label>
                          <select id="jenis_kepesertaan" class="form-control" name="jenis_kepesertaan" onchange="jenis();">
                            <option value="UMUM">UMUM</option>
                            <option value="BPJS">BPJS</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group" id="n_rm">
                      <label>No RM</label>
                      <div class="input-group margin">
                        @if(!isset($data[0]))
                        <input type="text" class="form-control" id="norm" name="noRM">
                        @else
                        <input type="text" class="form-control" id="norm" name="noRM" value="{{$data[0]->no_rm}}">
                        @endif
                        <span class="input-group-btn">
                          <button class="btn btn-info btn-flat" type="button" onclick="setRm();">Go!</button>
                        </span>
                      </div><!-- /input-group -->
                    </div>

                    <div id="j_kepesertaan">
                      <div class="form-group">
                        <label for="no_kepesertaan">No Kepesertaan</label>
                        <input type="text" class="form-control" id="no_kepesertaan" name="no_kepesertaan">
                      </div>
                      <div class="form-group">
                        <label>No SEP</label>
                        <input type="text" class="form-control" id="no_sep" name="no_sep">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Daftar</label>
                      <input type="datetime" class="form-control" placeholder="" id="tanggalwaktu" name="tanggal_daftar">
                    </div>
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nama_pj">Nama Penanggung Jawab</label>
                          <input type="text" name="nama_pj" id="nama_pj" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nomor_telepon">No. HP</label>
                          <input type="text" name="no_hp_pj" id="nomor_telepon" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="form-group" id="kunjungan">
                      <label>Kunjungan ke</label>
                      @if(!isset($data[0]))
                      <input type="text"  class="form-control" placeholder="" id="kunjungan_ke" name="kunjungan_ke">
                      @else
                      <input type="text"  class="form-control" placeholder="" id="kunjungan_ke" name="kunjungan_ke" value="{{$data[0]->kunjungan_ke+1}}">
                      @endif
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Umur</label>
                          @if(!isset($data[0]))
                          <input type="text"  class="form-control" placeholder="" id="umur" name="umur" onkeyup="setKat();">
                          @else 
                          <input type="text"  class="form-control" placeholder="" value="{{$data[0]->umur}}" id="umur" name="umur" onkeyup="setKat();">
                          @endif
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Kategori Usia</label>
                          <select class="form-control" name="kategori_usia" id="kategori_usia">
                            <option>----</option>
                            <option value="Masa Balita">Masa Balita</option>
                            <option value="Masa Kanak-kanak">Masa Kanak-kanak</option>
                            <option value="Masa Remaja Awal">Masa Remaja Awal</option>
                            <option value="Masa Remaja Akhir">Masa Remaja Akhir</option>
                            <option value="Masa Dewasa Awal">Masa Dewasa Awal</option>
                            <option value="Masa Dewasa Akhir">Masa Dewasa Akhir</option>
                            <option value="Masa Lansia Awal">Masa Lansia Awal</option>
                            <option value="Masa Lansia Akhir">Masa Lansia Akhir</option>
                            <option value="Masa Manula">Masa Manula</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Cara Masuk</label>
                          <select class="form-control" id="cara_masuk" onChange="rujuk();" name="cara_masuk">
                            <option value="0">----</option>
                            <option value="Datang Sendiri">DATANG SENDIRI</option>
                            <option value="Rujukan">RUJUKAN</option>
                          </select>
                        </div>
                        
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tujuan Berobat</label>
                          <select class="form-control" name="jalur_masuk" id="tujuan_berobat" onchange="berobat();" required>
                            <option value="">----</option>
                            @if(Auth::user()->poli->prefix == "PENDAF")
                            <option value="IGD">IGD</option>
                            <option value="URJ">URJ</option>
                            @else 
                            @if(Auth::user()->poli->prefix == "IGD")
                            <option value="IGD">IGD</option>
                            @else 
                            <option value="URJ">URJ</option>
                            @endif
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group" id="g_rujukan">
                      <label>Rujukan</label>
                      <input type="text" id="rujukan" class="form-control" placeholder="" name="rujukan">
                    </div>

                    <div class="form-group" id="g_perujuk">
                      <label>Nama Perujuk</label>
                      <input type="text" id="perujuk" class="form-control" placeholder="" name="nama_perujuk">
                    </div>

                    <div class="form-group" id="g_poli">
                      <label>Nama Poli</label>
                      <select class="form-control" name="id_poli" id="namapoli">
                        <option>----</option>
                        @if(Auth::user()->poli->prefix == "PENDAF")
                        @foreach($poli as $row)
                        @if($row->id_poli != 6 && $row->id_poli != 1 && $row->id_poli != 3 && $row->id_poli != 11 &&$row->id_poli != 10 && $row->id_poli != 7 && $row->id_poli != 8)
                        <option value="{{$row->id_poli}}">{{$row->nama_poli}}</option>
                        @endif
                        @endforeach
                        @else 
                        <option value="{{Auth::user()->id_poli}}">{{Auth::user()->poli->nama_poli}}</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Pasien</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <!-- form start -->

              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>No RM</label>
                      @if(!isset($data[0]))
                      <input type="text" id="no_rm"  class="form-control" placeholder="" readonly name="noRM" value="">
                      @else 
                      <input type="text" id="no_rm"  class="form-control" placeholder="" readonly name="noRM" value="{{$data[0]->no_rm}}">
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama</label>
                      @if(!isset($data[0]))
                      <input type="text" id="nama"  class="form-control" placeholder="" name="nama">
                      @else
                      <input type="text" id="nama"  class="form-control" placeholder="" name="nama" value="{{$data[0]->nama}}">
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        @if(!isset($data[0]))
                        <option>----</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        @else
                        @if($data[0]->jenis_kelamin == 'Laki-laki')
                        <option value="Laki-laki">Laki-laki</option>
                        @else 
                        <option value="Perempuan">Perempuan</option>
                        @endif
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      @if(!isset($data[0]))
                      <input type="text" id="tanggal2" class="form-control" id="tgl_lahir" placeholder="" name="tanggal_lahir">
                      @else 
                      <input type="text" id="tanggal2" class="form-control" id="tgl_lahir" placeholder="" name="tanggal_lahir" value="{{$data[0]->tanggal_lahir}}">
                      @endif
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <div class="input-group">
                   <span class="input-group-addon">Alamat</span>
                   @if(!isset($data[0]))
                   <input type="text" class="form-control" placeholder="" name="alamat">
                   @else 
                   <input type="text" class="form-control" placeholder="" name="alamat" value="{{$data[0]->alamat}}">
                   @endif
                 </div>
                 <br>
                 <div class="row">
                   <div class="col-md-6">
                     <div class="input-group">
                       <span class="input-group-addon">Kabupaten</span>
                       @if(!isset($data[0]))
                       <input type="text" id="kabupaten" class="form-control" placeholder="" name="kabupaten">
                       @else 
                       <input type="text" id="kabupaten" class="form-control" placeholder="" name="kabupaten" value="{{$data[0]->kabupaten}}">
                       @endif
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="input-group">
                      <span class="input-group-addon">Kecamatan</span>
                      @if(!isset($data[0]))
                      <input type="text" id="kecamatan" class="form-control" placeholder="" name="kecamatan">
                      @else 
                      <input type="text" id="kecamatan" class="form-control" placeholder="" name="kecamatan" value="{{$data[0]->kecamatan}}">
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon">Desa</span>
                    @if(!isset($data[0]))
                    <input type="text" id="desa" class="form-control" placeholder="" name="desa">
                    @else 
                    <input type="text" id="desa" class="form-control" placeholder="" name="desa" value="{{$data[0]->desa}}">
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon">Dusun</span>
                    @if(!isset($data[0]))
                    <input type="text" id="dusun" class="form-control" placeholder="" name="dusun">
                    @else 
                    <input type="text" id="dusun" class="form-control" placeholder="" name="dusun" value="{{$data[0]->dusun}}">
                    @endif
                  </div>
                </div>
              </div>
              <br>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary col-md-12">Submit</button>
              </div>
            </div>
          </div><!-- /.box-body -->
        </div>

      </div><!-- /.box -->
    </div>
  </section>
</form>
</div><!-- /.box -->
</div>
</div>
</div>
</div>
<script>
  function cekKategoriUsia($u){
    nama = '';
    if ($u<5) {
      nama = "Balita";
    }else if ($u<11) {
      nama = "Kanak-kanak";
    }else if ($u<16) {
      nama = "Remaja Awal";
    }else if ($u<25) {
      nama = "Remaja Akhir";
    }else if ($u<35) {
      nama = "Dewasa Awal";
    }else if ($u<45) {
      nama = "Dewasa Akhir";
    }else if ($u<55) {
      nama = "Lansia Awal";
    }else if ($u<65) {
      nama = "Lansia Akhir";
    }else{
      nama = "Manula";
    }
    return "Masa "+nama;
  }
  function setKat(){
    var kategori = cekKategoriUsia($("#umur").val());
    $('#kategori_usia').val(kategori);
  };

  $(document).ready(function a(){
    var a = new Date();
    tgl = a.getFullYear()+"-"+(a.getMonth()+1)+"-"+a.getDate();
    $('#g_poli').hide();
    $('#g_poli').val(0);
    $('#namapoli').val(1);
    $('#cara_masuk').val(0);
    $('#g_rujukan').hide();
    $('#g_perujuk').hide();
    $('#j_kepesertaan').hide();
    @if(!isset($data[0]))
    $('#kunjungan').hide();
    $('#n_rm').hide();
    @endif
  });

  function berobat(){
    if ($('#tujuan_berobat').val() == "IGD"){
      $('#g_poli').hide();
      $('#namapoli').val(2);
    }else if($('#tujuan_berobat').val() == "URJ"){
      $('#g_poli').show();
      $('#namapoli').val(1);
    }else{
      $('#g_poli').hide();
      $('#namapoli').val(2);
    }
  }

  function rujuk(){
    if($('#cara_masuk').val() == "Rujukan"){
      $('#g_rujukan').show();
      $('#g_perujuk').show();
    }else{
      $('#g_rujukan').hide();
      $('#g_perujuk').hide();
    }
  }

  function jenis(){
    if($('#jenis_kepesertaan').val() == "BPJS"){
      $('#j_kepesertaan').show();
    }else{
      $('#j_kepesertaan').hide();
    }
  }
  function pasien(){
    if($('#jenis_pasien').val() == "LAMA"){
      $('#kunjungan').show();
      $('#n_rm').show();

    }else{
      $('#kunjungan').hide();
      $('#n_rm').hide();
    }
  }

  function setRm(){
    rm = document.getElementById('norm').value;
    url = "{{url('G/Pasien/show1')}}"+"/"+rm;
    $.getJSON(url, function(result){
      console.log(result);
      if (result.length > 0) {
        $('#nama').val(result[0]['nama']);
        $('#agama').val(result[0]['agama']);
        $('#berat_lahir').val(result[0]['berat_lahir']);
        $('#desa').val(result[0]['desa']);
        $('#dusun').val(result[0]['dusun']);
        $('#gol_darah').val(result[0]['gol_darah']);
        $('#jenis_identitas').val(result[0]['jenis_identitas']);
        $('#jenis_kelamin').val(result[0]['jenis_kelamin']);
        $('#jenis_kepesertaan').val(result[0]['jenis_kepesertaan']);
        $('#kabupaten').val(result[0]['kabupaten']);
        $('#kecamatan').val(result[0]['kecamatan']);
        $('#kunjungan_ke').val(result[0]['kunjungan_ke']);
        $('#nama_ortu').val(result[0]['nama_ortu']);
        $('#nama_suami_istri').val(result[0]['nama_suami_istri']);
        $('#no_identitas').val(result[0]['no_identitas']);
        $('#no_kepesertaan').val(result[0]['no_kepesertaan']);
        $('#no_sep').val(result[0]['no_sep']);
        $('#pekerjaan').val(result[0]['pekerjaan']);
        $('#status').val(result[0]['status']);
        $('#telepon').val(result[0]['telepon']);
        $('#tempat_lahir').val(result[0]['tempat_lahir']);
        $('#tgl_lahir').val(result[0]['tanggal_lahir']);
        var date1 = new Date(tgl);
        var date2 = new Date(result[0]['tanggal_lahir']);
        var umur = Math.abs(date2.getYear() - date1.getYear());
        $('#umur').val(umur);
        var kategori = cekKategoriUsia(umur);
        $('#kategori_usia').val(kategori);
      }else{
        alert("Data Tidak Ditemukan");
      }
    });
  };

  $('#norm').keyup(
    function setNo(){
      $data = document.getElementById('norm').value;
      document.getElementById('no_rm').value = $data;
    }
    );
  </script>

  @endsection
</body>