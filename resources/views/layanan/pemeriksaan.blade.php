@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Halaman Pemeriksaan
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Data Pasien</li>
          <li class="active">Pemeriksaan</li>
        </ol>
      </section>

      <div class="container-fluid">

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="col xs-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Tarif / Harga</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Rp.</span>
                  <?php $hasil = 0; ?>
                  @foreach($dataPemeriksaan[0]->DetailPemeriksaan as $row)
                  <?php $hasil += $row->sub_total; ?>
                  @endForeach
                  <input type="text" class="form-control input-lg" placeholder="{{$hasil}}" name="Harga" readonly="">
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Data Pemeriksaan Pasien</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <!-- form start -->


              <div class="box-body">
                <form method="POST" action="{{url(Auth::user()->poli->prefix.'/updateMasterPemeriksaan/'.$data[0]->id_detail_pendaftaran)}}">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label>No/ID Pendaftaran</label>
                    <input type="text"  class="form-control" value="{{$data[0]->id_pendaftaran}}" readonly name="id_pendaftaran" id="id_pendaftaran">
                  </div>

                  <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text"  class="form-control" value="{{$data[0]->pendaftaran->pasien->nama}}" name="" id="" readonly>
                  </div>

                  <div class="form-group">
                    <label>Tanggal Pemeriksaan</label>
                    <input type="text"  class="form-control" placeholder="" readonly name="" id="" value="<?php
                    date_default_timezone_set("Asia/Jakarta");
                    $tanggal = date('Y-m-d H:i:s');
                    echo "$tanggal";

                    ?>">
                  </div>

                  <div class="form-group">
                    <label>Tanggal Hasil</label>
                    <input type="text"  class="form-control" placeholder="" name="" id="tanggalwaktu">
                  </div>

                  <div class="form-group">
                    <label>Nama Petugas</label>
                    <input type="text"  class="form-control" value="{{Auth::user()->name}}" name="" id="" readonly>
                    <input type="hidden" name="id_pemeriksaan" value="{{$dataPemeriksaan[0]->id_pemeriksaan}}">
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div><!-- /.box-body -->
            </div>
          </div>

          <!-- Detail harga -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Memo</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                        </div>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <div class="form-group">
                          <label>Memo</label>
                          <textarea rows="7" class="form-control" readonly="" name="memo" id="memo">{{$data[0]->memo}}</textarea>
                        </div>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>
                </div><!-- /.box-body -->
              </div>
            </div>
          </div>
        </div>

        <!-- Pemeriksaan -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pemeriksaan Pasien</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                    </div>
                  </div><!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <a class="btn btn-success btn-md" data-toggle="modal" data-target="#pilihPemeriksaan" onclick=""> <i class="glyphicon glyphicon-plus"></i> Tambah Pemeriksaan</a>
                    <a href="{{url(Auth::user()->poli->prefix.'/dataPasien/hasilPemeriksaan/')}}/{{$dataPemeriksaan[0]->id_pemeriksaan}}" target="_blank" class="btn btn-info"><i class="glyphicon glyphicon-list-alt"></i>Hasil</a>
                    <table class="table table-hover">
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                      @foreach($dataPemeriksaan[0]->DetailPemeriksaan as $row)
                      <tr>
                        <td>{{$row->id_detail_pemeriksaan}}</td>
                        <td>{{$row->JenisPemeriksaan->nama_jenis_pemeriksaan}}</td>
                        <td>{{$row->JenisPemeriksaan->harga_pemeriksaan}}</td>
                        <td>
                          <button type="button" data-toggle="modal" data-target="#isiHasil" class="btn btn-success" onclick="setModal('{{$data[0]->id_detail_pendaftaran}}', '{{$data[0]->pendaftaran->pasien->nama}}', '{{$row->JenisPemeriksaan->nama_jenis_pemeriksaan}}','{{$row->id_detail_pemeriksaan}}');"><i class="fa fa-check-square-o"></i></button>
                          <a href="{{url('LAYANAN/hapusDetailPemeriksaan/')}}/{{$row->id_detail_pemeriksaan}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                        </td>
                      </tr>
                      @endForeach
                    </table>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div>
            </div>
          </div>
        </div>
        <script>
          function setModal($id_pendaftaran, $nama, $nama_jp,id) {
            document.getElementById('id_pendaftaran').value = $id_pendaftaran;
            document.getElementById('nama_pasien').value = $nama;
            document.getElementById('nama_pemeriksaan').value = $nama_jp;
            dataPemeriksaan(id);
          }

          function dataPemeriksaan(id)
          {
      // alert('test');
      // var view_url = "{{url(Auth::user()->poli->prefix.'/detailJenisPemeriksaan1')}}";
      // $.ajax({
      //   url: view_url,
      //   type:"GET",
      //   data: {"id":id},
      //   success: function(result){
      //     alert(result);
      //     $("#detailPemeriksaan").empty();
      //     result.forEach(function(r){
      //       if (r.hasil == "") {
      //         $("#detailPemeriksaan").append("<tr><td style='width:120px;'><input type='text' name='id_detail_jenis_pemeriksaan[]' id='' value="+r['id_detail_jenis_pemeriksaan']+" readonly class='form-control'></td><td>"+r['detail_pemeriksaan']+"</td><td><input type='number' name='hasilPemeriksaan[]' id='hasilPemeriksaan' class='form-control' placeholder='isi hasil pemeriksaan'></td><td>"+r['nilai_normal']+"</td><input type='hidden' name='id_detail_pemeriksaan[]' value="+r['id_detail_pemeriksaan']+"></tr>");
      //       } else {
      //         $("#detailPemeriksaan").append("<tr><td style='width:120px;'><input type='text' name='id_detail_jenis_pemeriksaan[]' id='' value="+r['id_detail_jenis_pemeriksaan']+" readonly class='form-control'></td><td>"+r['detail_pemeriksaan']+"</td><td><input type='number' name='' id='' readonly class='form-control' placeholder="+r['hasil']+"></td><td>"+r['nilai_normal']+"</td></tr>");
      //       }

      //     });
      //   }
      // });
      var view_url = "{{url(Auth::user()->poli->prefix.'/detailJenisPemeriksaan1')}}?id="+id;
      $.getJSON(view_url,function(result){
        console.log(view_url+result);
        $("#detailPemeriksaan").empty();
        result.forEach(function(r){
          if (r.hasil == "") {
            $("#detailPemeriksaan").append("<tr><td style='width:120px;'><input type='text' name='id_detail_jenis_pemeriksaan[]' id='' value="+r['id_detail_jenis_pemeriksaan']+" readonly class='form-control'></td><td>"+r['detail_pemeriksaan']+"</td><td><input type='text' name='hasilPemeriksaan[]' id='hasilPemeriksaan' class='form-control' placeholder='isi hasil pemeriksaan'></td><td>"+r['nilai_normal']+"</td><input type='hidden' name='id_detail_pemeriksaan[]' value="+r['id_detail_pemeriksaan']+"></tr>");
          } else {
            $("#detailPemeriksaan").append("<tr><td style='width:120px;'><input type='text' name='id_detail_jenis_pemeriksaan[]' id='' value="+r['id_detail_jenis_pemeriksaan']+" readonly class='form-control'></td><td>"+r['detail_pemeriksaan']+"</td><td><input type='text' name='' id='' readonly class='form-control' placeholder="+r['hasil']+"></td><td>"+r['nilai_normal']+"</td></tr>");
          }

        });
      }
      // });
      );
    }
  </script>
</section>
</div>
</div>

@endsection
@extends('layanan.mod_hasilPemeriksaan')
@extends('layanan.mod_pilihPemeriksaanPasien')
</body>