@extends('new.attr.sidebar');

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
         Halaman Tindakan Medis dan Diagnosa Pasien
         <small>Control panel</small>
       </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pasien</li>
        <li class="active">Diagnosa</li>
      </ol>
    </section>

    <div class="container-fluid">
      <section class="content">
        <div class="col-md-12">
          <div class="col-md-3">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Detail Pasien</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label>No/ID Transaksi</label>
                  <input type="text"  style="font-size:20px;" class="form-control" placeholder="" readonly name="idTransaksi" value="{{$data[0]->id_pendaftaran}}">
                </div>
                <div class="form-group">
                  <label>No/ID Rekam Medis</label>
                  <input type="text" style="font-size:20px;"  class="form-control" placeholder="" readonly name="idRekamMedis" value="{{$data[0]->no_rm}}">
                </div>
                <div class="form-group">
                  <label>Nama  Pasien</label>
                  <input type="text" style="font-size:20px;"  class="form-control" placeholder="" name="namaPasien" readonly value="{{$data[0]->pasien->nama}}">
                </div>
                <div class="form-group">
                  <label>Keluhan</label>
                  <textarea rows="3" style="font-size:20px;" class="form-control" placeholder="" name="namaPasien" readonly>{{$data[0]->diagnosa_masuk}}</textarea>
                </div>
                <br>
              </div>
            </div>
          </div>
          
          <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active bg-default"><a href="#tindakan" id="tindakans" data-toggle="tab" onclick="window.location.hash = '#tindakan';localStorage['tabs']='#tindakan';">Tindakan Medis</a></li>
                <li class="bg-warning"><a href="#pemeriksaan" id="pemeriksaans" data-toggle="tab" onclick="window.location.hash = '#pemeriksaan';localStorage['tabs']='#pemeriksaan';">Pemeriksaan</a></li>
                <li class="bg-success"><a href="#diagnosa" id="diagnosas" data-toggle="tab" onclick="window.location.hash = '#diagnosa';localStorage['tabs']='#diagnosa';">Diagnosa</a></li>
                <li class="bg-info"><a href="#resep" id="reseps" data-toggle="tab" onclick="window.location.hash = '#resep';localStorage['tabs']='#resep';">Resep Obat</a></li>
                <li class="bg-danger"><a href="#rujukan" id="rujukans" data-toggle="tab" onclick="window.location.hash = '#rujukan';localStorage['tabs']='#rujukan';">Rujukan</a></li>
              </ul>

              <div class="tab-content">
                <div class="active tab-pane" id="tindakan">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Tindakan Medis Pasien</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                      <a class="btn btn-success btn-md" data-toggle="modal" data-target="#pilihTindakan"> <i class="glyphicon glyphicon-plus"></i> Tambah Tindakan Medis</a>
                      <table class="table table-hover">
                       <tr>
                         <th>ID Tindakan Medis</th>
                         <th>Tanggal</th>
                         <th>Poli</th>
                         <th>Nama Tindakan</th>
                         <th>Harga</th>
                         <th style="width: 100px;">Aksi</th>
                       </tr>
                       @foreach($data[0]->detail as $row)
                       @foreach($row->tindakanMedis as $r)
                       <tr>
                         <td>{{$r->id_detail_tindakan_medis}}</td>
                         <td>{{$r->tanggal}}</td>
                         <td>{{$row->poli->nama_poli}}</td>
                         <td>{{$r->tm->tindakanMedis->nama}}</td>
                         <td>{{$r->harga_total}}</td>
                         <td>
                          <a href="{{url(Auth::user()->poli->prefix.'/Pasien/DetailTindakanMedis/Hapus/')}}/{{$r->id_detail_tindakan_medis}}" data-toggle="tooltip" title="Hapus Tindakan Medis" onclick="return confirm('Apakah Anda Yakin?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                          <a href="{{url(Auth::user()->poli->prefix.'/Pasien/DetailTindakanMedis/Edit')}}/{{$r->id_detail_tindakan_medis}}" data-toggle="tooltip" title="Setting Harga Tindakan"><button type="button" class="btn btn-warning"><i class="fa fa-gear"></i></button></a>
                        </td>
                      </tr>
                      @endforeach
                      @endforeach
                    </table>
                  </div><!-- /.box-body -->
                </div><!--end .card-body -->
              </div>

              <div class="tab-pane" id="pemeriksaan">
                <div class="box box-warning">
                  <div class="box-header with-border">
                    <h3 class="box-title">Pemeriksaan Pasien</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahPemeriksaan"> <i class="glyphicon glyphicon-plus"></i>Pemeriksaan</a>
                    <table class="table table-hover">
                     <thead>
                       <th>ID Pemeriksaan</th>
                       <th>Tanggal</th>
                       <th>Unit</th>
                       <th>Aksi</th>
                     </thead>
                     <tbody>
                      @foreach($data2 as $row)
                      <tr>
                        <td>{{$row->id_detail_pendaftaran}}</td>
                        <td>{{$row->tgl_masuk}}</td>
                        <td>{{$row->poli->nama_poli}}</td>
                        <td>
                          @if(isset($row->pemeriksaan[0]) && $row->status == 'Keluar')
                          <button class="btn btn-success"><i class="fa fa-check"> SELESAI </i></button>
                          <a href="{{url(Auth::user()->poli->prefix.'/dataPasien/hasilPemeriksaan/')}}/{{$row->pemeriksaan[0]->id_pemeriksaan}}" data-toggle="tooltip" title="Lihat Hasil Pemeriksaan" target="_blank" class="btn btn-info"><i class="glyphicon glyphicon-list-alt"></i></a>
                          @else
                          <a href="#" data-toggle="tooltip" title="Lihat Memo"><button type="button" onclick="$('#memo_view').val('{{$row->memo}}');" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!--end .card-body -->
            </div>

            <div class="tab-pane" id="diagnosa">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Diagnosa Pasien</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <a class="btn btn-success btn-md" data-toggle="modal" data-target="#pilihDiagnosa"> <i class="glyphicon glyphicon-plus"></i> Tambah Diagnosa</a>
                  <table class="table table-hover">
                   <tr>
                     <th>ID Diagnosa</th>
                     <th>Nama Diagnosa</th>
                     <th>Aksi</th>
                   </tr>
                   @foreach($data[0]->detail as $row)
                   @foreach($row->det_diagnosa as $r)
                   <tr>
                     <td>{{$r->id_diagnosa}}</td>
                     <td>{{$r->diagnosa->nama_diagnosa}}</td>
                     <td>
                      <a href="{{url(Auth::user()->poli->prefix.'/DetailDiagnosa/hapus/')}}/{{$r->id_detail_diagnosa}}" data-toggle="tooltip" title="Hapus Diagnosa"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
                  @endforeach
                  @endforeach
                </table>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="resep">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Resep Obat Pasien</h3>
              </div><!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahObat"> <i class="glyphicon glyphicon-plus"></i> Tambah Resep Obat</a>
                <table class="table table-hover">
                 <tr>
                   <th>ID Resep</th>
                   <th>Tanggal Resep</th>
                   <th>Dokter</th>
                   <th>Harga</th>
                   <th>Aksi</th>
                 </tr>
                 @foreach($data[0]->resep as $row)
                 <tr>
                   <td>{{$row->id_resep}}</td>
                   <td>{{$row->tanggal_resep}}</td>
                   <td>{{$row->dokter->nama}}</td>
                   <td>{{$row->total}}</td>
                   <td>
                     <a href="#" data-toggle="tooltip" title="Lihat Memo"><button type="button" data-toggle="modal" data-target="#lihatResep" onclick="$('#resep_view').val('{{$row->resep}}');" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                   </td>
                 </tr>
                 @endforeach
               </table>
             </div><!-- /.box-body -->
           </div>
         </div>

         <div class="tab-pane" id="rujukan">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Rujukan Pasien</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <a href="#"><button type="button" data-toggle="modal" data-target="#tambahRUjukan" class="btn btn-primary"><i class="fa fa-ambulance"></i> Tambah Rujukan</button></a>
              <table class="table table-hover">
                <tr>
                 <th>ID Rujukan</th>
                 <th>Nama Rujukan</th>
                 <th>Tanggal/Jam Rujukan</th>
                 <th>Aksi</th>
               </tr>
               @foreach($rujukan as $row)
               <tr>
                 <td>{{$row->id_detail_pendaftaran}}</td>
                 <td>{{$row->poli->nama_poli}}</td>
                 <th>{{$row->tgl_masuk}}</th>
                 <td>
                  <a href="#" data-toggle="tooltip" title="Lihat Memo"><button type="button" data-toggle="modal" data-target="#lihatMemo" onclick="$('#memo_view').val('{{$row->memo}}');" class="btn btn-primary"><i class="fa fa-file-text-o"></i></button></a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
      



    </div>
  </section>
</div>
</div>
<script>
  function setData(url){
    $.getJSON(url,function(result){
      $('#kanan').attr('onclick',"setData('"+result['next_page_url']+"');");
      $('#kiri').attr('onclick',"setData('"+result['previous_page_url']+"');");
      $('#number_pagination').empty();
      $('#tableTindakanMedis').empty();
      for (var i = 1; i <= result['last_page']; i++) {
        if (i ==1 ||(i < result['current_page']+4 && i > result['current_page']-4) || i == result['last_page']) {
          if (i == result['current_page']) {
            $('#number_pagination').append("<button type='button' class='btn btn-success' onclick=\"setData('{{url('G/tindakanMedis/'.$id2)}}?page="+i+"');\">"+i+"</button>");
          }else{
            $('#number_pagination').append("<button type='button' class='btn btn-default' onclick=\"setData('{{url('G/tindakanMedis/'.$id2)}}?page="+i+"');\">"+i+"</button>");
          }
        }
      }
      var data = "";
      result['out'].forEach( function(element, index) {
       data += element;
     });
      $('#tableTindakanMedis').append(data);
    });
  }
  function searchTindakanMedis(){
    var val = $('#searchTindakanMedis').val();
    // alert(val);
    search("{{url('G/tindakanMedis/'.$id2)}}",val);
  }
  function search(url,val){
    $.getJSON(url+"?search="+val,function(result){
      $('#kanan').attr('onclick',"search1('"+result['next_page_url']+"');");
      $('#kiri').attr('onclick',"search1('"+result['previous_page_url']+"');");
      $('#number_pagination').empty();
      $('#tableTindakanMedis').empty();
      for (var i = 1; i <= result['last_page']; i++) {
        if (i ==1 ||(i < result['current_page']+4 && i > result['current_page']-4) || i == result['last_page']) {
          if (i == result['current_page']) {
            $('#number_pagination').append("<button type='button' class='btn btn-success' onclick=\"search1('{{url('G/tindakanMedis/'.$id2)}}?page="+i+"&search="+val+"');\">"+i+"</button>");
          }else{
            $('#number_pagination').append("<button type='button' class='btn btn-default' onclick=\"search1('{{url('G/tindakanMedis/'.$id2)}}?page="+i+"&search="+val+"');\">"+i+"</button>");
          }
        }
      }
      var data = "";
      result['out'].forEach( function(element, index) {
       data += element;
     });
      $('#tableTindakanMedis').append(data);
    });
  }
  function search1(url){
    $.getJSON(url,function(result){
      $('#kanan').attr('onclick',"search1('"+result['next_page_url']+"');");
      $('#kiri').attr('onclick',"search1('"+result['previous_page_url']+"');");
      $('#number_pagination').empty();
      $('#tableTindakanMedis').empty();
      for (var i = 1; i <= result['last_page']; i++) {
        if (i ==1 ||(i < result['current_page']+4 && i > result['current_page']-4) || i == result['last_page']) {
          if (i == result['current_page']) {
            $('#number_pagination').append("<button type='button' class='btn btn-success' onclick=\"search1('{{url('G/tindakanMedis/'.$id2)}}?page="+i+"&search="+result['search']+"');\">"+i+"</button>");
          }else{
            $('#number_pagination').append("<button type='button' class='btn btn-default' onclick=\"search1('{{url('G/tindakanMedis/'.$id2)}}?page="+i+"&search="+result['search']+"');\">"+i+"</button>");
          }
        }
      }
      var data = "";
      result['out'].forEach( function(element, index) {
       data += element;
     });
      $('#tableTindakanMedis').append(data);
    });
  }

  function setDiagnosa(url){
    $.getJSON(url,function(result){
      $('#kanan1').attr('onclick',"setDiagnosa('"+result['next_page_url']+"');");
      $('#kiri1').attr('onclick',"setDiagnosa('"+result['previous_page_url']+"');");
      $('#number_pagination1').empty();
      $('#tableDiagnosa').empty();
      for (var i = 1; i <= result['last_page']; i++) {
        if (i ==1 ||(i < result['current_page']+4 && i > result['current_page']-4) || i == result['last_page']) {
          if (i == result['current_page']) {
            $('#number_pagination1').append("<button type='button' class='btn btn-success' onclick=\"setDiagnosa('{{url('G/diagnosa')}}?page="+i+"');\">"+i+"</button>");
          }else{
            $('#number_pagination1').append("<button type='button' class='btn btn-default' onclick=\"setDiagnosa('{{url('G/diagnosa')}}?page="+i+"');\">"+i+"</button>");
          }
        }
      }
      var data = "";
      result['out'].forEach( function(element, index) {
       data += element;
     });
      $('#tableDiagnosa').append(data);
    });
  }

  function searchD(url,val){
    $.getJSON(url+"?search="+val,function(result){
      $('#kanan1').attr('onclick',"searchD1('"+result['next_page_url']+"');");
      $('#kiri1').attr('onclick',"searchD1('"+result['previous_page_url']+"');");
      $('#number_pagination1').empty();
      $('#tableDiagnosa').empty();
      for (var i = 1; i <= result['last_page']; i++) {
        if (i ==1 ||(i < result['current_page']+4 && i > result['current_page']-4) || i == result['last_page']) {
          if (i == result['current_page']) {
            $('#number_pagination1').append("<button type='button' class='btn btn-success' onclick=\"searchD1('{{url('G/diagnosa')}}?page="+i+"&search="+val+"');\">"+i+"</button>");
          }else{
            $('#number_pagination1').append("<button type='button' class='btn btn-default' onclick=\"searchD1('{{url('G/diagnosa')}}?page="+i+"&search="+val+"');\">"+i+"</button>");
          }
        }
      }
      var data = "";
      result['out'].forEach( function(element, index) {
       data += element;
     });
      $('#tableDiagnosa').append(data);
    });
  }

  function searchD1(url){
    $.getJSON(url,function(result){
      $('#kanan1').attr('onclick',"searchD1('"+result['next_page_url']+"');");
      $('#kiri1').attr('onclick',"searchD1('"+result['previous_page_url']+"');");
      $('#number_pagination1').empty();
      $('#tableDiagnosa').empty();
      for (var i = 1; i <= result['last_page']; i++) {
        if (i ==1 ||(i < result['current_page']+4 && i > result['current_page']-4) || i == result['last_page']) {
          if (i == result['current_page']) {
            $('#number_pagination1').append("<button type='button' class='btn btn-success' onclick=\"searchD1('{{url('G/diagnosa')}}?page="+i+"&search="+result['search']+"');\">"+i+"</button>");
          }else{
            $('#number_pagination1').append("<button type='button' class='btn btn-default' onclick=\"searchD1('{{url('G/diagnosa')}}?page="+i+"&search="+result['search']+"');\">"+i+"</button>");
          }
        }
      }
      var data = "";
      result['out'].forEach( function(element, index) {
       data += element;
     });
      $('#tableDiagnosa').append(data);
    });
  }

  function searchDiagnos(){
    var val = $('#searchDiagnosa').val();
    // alert(val);
    searchD("{{url('G/diagnosa')}}",val);
  }
  function klikTab(oke){
    localStorage['tabs'] = oke;
  }

  $(document).ready(function(){
    // alert('test');
    setData("{{url('G/tindakanMedis')}}/{{$id2}}");
    setDiagnosa("{{url('G/diagnosa')}}");
    // alert(window.location.hash);
    if (localStorage['tabs']) {
      $(localStorage['tabs']+"s").click();
    }
    $(window.location.hash+"s").click();
  });
</script>
</body>
@extends('new.igd.mod_pilihTindakanMedis')
@extends('new.igd.mod_pilihDiagnosa')
@extends('new.igd.mod_lihatMemo')
@extends('new.igd.mod_lihatResep')
@extends('new.igd.mod_tambahRujukan')
@extends('new.igd.mod_pemeriksaan')
@extends('new.igd.mod_tambahResepObat')

@endsection