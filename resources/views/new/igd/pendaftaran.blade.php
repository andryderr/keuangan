

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

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->

        <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#dkp" class="active" data-toggle="tab">Data Kepesertaan</a></li>
              <li><a href="#pk" data-toggle="tab">Pendaftaran/Kunjungan</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="dkp">
               <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nama Kepesertaan</label>
                    <select class="form-control" name="namaKepesertaan">
                      <option>----</option>
                      <option value="BPJS">BPJS</option>
                      <option value="UMUM">UMUM</option>
                    </select>
                    </div>

                    <div class="form-group">
                      <label>No Kepesertaan</label>
                     <input type="number" class="form-control" placeholder="" name="noKepersetaan">
                    </div>

                    <div class="form-group">
                      <label>No SEP</label>
                     <input type="number" class="form-control" placeholder="" name="noSep">
                    </div>

                  <div class="form-group">
                      <label>Jenis Pasien</label>
                     <input type="number" class="form-control" placeholder="" name="jenisPasien">
                    </div>
                  </div><!-- /.box-body -->
              </div><!-- /.box-body -->

            <div class="tab-pane" id="pk">
              <!-- The timeline -->
               <div class="box-body">
                <div class="form-group">
                  <label >Pasien Baru/Lama</label>
                    <select class="form-control" name="pasienBL" id="pasienBaruLama" onChange="hidupmati();">
                      <option>----</option>
                      <option value="BARU">BARU</option>
                      <option value="LAMA">LAMA</option>
                    </select>
                </div>

                <div class="form-group">
                  <label>No RM</label>
                   <div class="input-group margin">
                    <input type="text" class="form-control" id="norm" name="noRM">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button">Go!</button>
                    </span>
                  </div><!-- /input-group -->
                  </div>

                <div class="form-group">
                  <label>No Pendaftaran</label>
                    <input type="text"  class="form-control" placeholder="" name="noPendaftaran">
                  </div>

                  <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="text" id="tanggalwaktu" class="form-control" placeholder="" name="tanggalDaftar">
                  </div>

                <div class="form-group">
                  <label>Kunjungan ke</label>
                    <input type="text"  class="form-control" placeholder="" name="kunjungan">
                  </div>


                <div class="form-group">
                  <label>Umur</label>
                    <input type="text"  class="form-control" placeholder="" name="umur">
                  </div>

                  <div class="form-group">
                  <label>Kategori Usia</label>
                    <select class="form-control" name="kategoriUsia">
                      <option>----</option>
                      <option value="datang sendiri">DATANG SENDIRI</option>
                      <option value="rujukan">RUJUKAN</option>
                    </select>
                  </div>

                <div class="form-group">
                  <label>No Antri</label>
                    <input type="text"  class="form-control" placeholder="" name="noAntri">
                  </div>

                <div class="form-group">
                  <label>Cara Masuk</label>
                    <select class="form-control" id="caramasuk" onChange="hidupmati();" name="caraMasuk">
                      <option>----</option>
                      <option value="datang sendiri">DATANG SENDIRI</option>
                      <option value="rujukan">RUJUKAN</option>
                    </select>
                  </div>

                <div class="form-group">
                  <label>Rujukan</label>
                    <input type="text" id="rujukan" class="form-control" placeholder="" name="rujukan">
                  </div>

                  <div class="form-group">
                  <label>Nama Perujuk</label>
                    <input type="text" id="perujuk" class="form-control" placeholder="" name="namaPerujuk">
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

                  <div class="form-group">
                    <label>No RM</label>
                    <input type="text"  class="form-control" placeholder="" readonly name="noRM">
                  </div>

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text"  class="form-control" placeholder="" name="namaPasien">
                  </div>

                  <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jenisKelamin">
                        <option>----</option>
                        <option value="laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                    </div> 

                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" class="form-control" placeholder="" id="tanggalwaktu2" name="tanggalLahir">
                     <input type="text" id="tanggalwaktu1" class="form-control" placeholder="" name="tanggalDaftar">
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <div class="col md 3">
                     <div class="input-group">
                     <span class="input-group-addon">Kabupaten</span>
                      <input type="text" class="form-control" placeholder="" name="kabupaten">
                    </div>
                    <br>

                    <div class="input-group">
                      <span class="input-group-addon">Kecamatan</span>
                      <input type="text" class="form-control" placeholder="" name="kecamatan">
                    </div>
                    <br>

                     <div class="input-group">
                      <span class="input-group-addon">Dusun</span>
                      <input type="text" class="form-control" placeholder="" name="dusun">
                    </div>
                    <br>   

                     <div class="input-group">
                      <span class="input-group-addon">Desa</span>
                      <input type="text" class="form-control" placeholder="" name="desa">
                    </div>
                    <br>

                    <h4 class="box-title">Data Detail</h4>

                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text"  class="form-control" placeholder="" name="tempatLahir">
                    </div>

                    <div class="form-group">
                      <label>Berat lahir</label>
                      <input type="text"  class="form-control" placeholder="" name="beratLahir">
                    </div>

                    <div class="form-group">
                      <label>Golongan Darah</label>
                      <select class="form-control" name="golonganDarah">
                        <option>----</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="o">O</option>
                      </select>
                    </div> 

                    <div class="form-group">
                      <label>Agama</label>
                      <select class="form-control" name="agama">
                        <option>----</option>
                        <option value="ISLAM">Islam</option>
                        <option value="KRISTEN">Kristen</option>
                        <option value="HINDU">Hindu</option>
                        <option value="BUDHA">Budha</option>
                        <option value="KONGHUCU">Konghuchu</option>
                      </select>
                    </div>        

                     <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option>----</option>
                        <option value="LAJANG">Lajang</option>
                        <option value="MENIKAH">Menikah</option>
                        <option value="JANDA/DUDA">Janda/Duda</option>
                      </select>
                    </div>   

                     <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" name="pekerjaan"  class="form-control" placeholder="">
                    </div>  

                    <div class="form-group">
                      <label>Identitas</label>
                      <select class="form-control" name="jenisIdentitas">
                        <option>----</option>
                        <option value="KTP">KTP</option>
                        <option value="SIM">SIM</option>
                      </select>
                    <div class="input-group">
                      <span class="input-group-addon">Nomer</span>
                      <input type="text" class="form-control" placeholder="" name="noIdentitas">
                    </div>
                    </div>  

                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" name="telepon"  class="form-control" placeholder="">
                    </div>  

                    <div class="form-group">
                      <label>Nama Orang tua</label>
                      <input type="text"  class="form-control" placeholder="" name="namaOrangTua">
                    </div>  

                    <div class="form-group">
                      <label>Nama Suami/istri</label>
                      <input type="text"  class="form-control" placeholder="" name="namaSuamiIstri">
                    </div>  
                  </div>
                </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection

</body>