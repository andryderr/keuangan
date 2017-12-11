<!DOCTYPE html>
<html>
@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <form action="{{url(Auth::user()->poli->prefix.'/pasien')}}" method="get">
                <div class="row">
                  <div class="col-md-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                  </div>
                  <div class="col-md-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                  </div>
                  <br>
                  <div class="col-md-3">
                    <button style="margin-top: 5px;" type="submit" class="btn btn-primary" class="form-control"><i class="fa fa-search"></i> Cari Data</button>
                  </div>
                </div>
                <br>
              </form>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="yglain" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                <thead>
                  <tr style="background:#E0E0E0;">
                    <th>No RM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jenis Kepesertaan</th>
                    <th>Nama Orang Tua</th>
                    <th>Nama Suami/Istri</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th style="width: 100px;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr style="background:#E0E0E0;">
                    <th>No RM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jenis Kepesertaan</th>
                    <th>Nama Orang Tua</th>
                    <th>Nama Suami/Istri</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                    <td>{{$row->no_rm}}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->jenis_kelamin}}</td>
                    <td>{{$row->jenis_kepesertaan}}</td>
                    <td>{{$row->nama_orang_tua}}</td>
                    <td>{{$row->nama_suami_istri}}</td>
                    <td>{{$row->tanggal_lahir}}</td>
                    <td>{{$row->alamat}}</td>
                    <td>
                      <a href="{{url(Auth::user()->poli->prefix.'/pendaftaran/pasienlama/')}}/{{$row->no_rm}}" data-toggle="tooltip" title="Pendaftaran Kembali"><button type="button" class="btn btn-primary"><i class="fa fa-check"></i></button></a>
                      <a href="#" data-toggle="tooltip" title="Edit Pasien"><button type="button" data-toggle="modal" data-target="#editPasien" class="btn btn-warning" onclick="setData('{{$row->no_rm}}','{{$row->nama}}','{{$row->jenis_kelamin}}','{{$row->tanggal_lahir}}','{{$row->alamat}}','{{$row->kabupaten}}','{{$row->kecamatan}}','{{$row->dusun}}','{{$row->desa}}','{{$row->tempat_lahir}}','{{$row->berat_lahir}}','{{$row->gol_darah}}','{{$row->agama}}','{{$row->status}}','{{$row->pekerjaan}}','{{$row->jenis_identitas}}','{{$row->no_identitas}}','{{$row->telepon}}','{{$row->nama_orang_tua}}','{{$row->nama_suami_istri}}')"><i class="fa fa-edit"></i></button></a>
                    </td>
                  </tr>
                  @endForeach
                </tbody>
              </table>
              <div style="float: right;">
                @if(!isset($_GET['nama']))
                {{$data->links()}}
                @else 
                {{$data->appends(['nama' => $_GET['nama'], 'alamat' => $_GET['alamat']])->links()}}
                @endif

              </div>
              
            </div>
          </div>
<!--  -->
        </div><!--end .card-body -->
      </div>
    </div>
  </div>

  <script type="text/javascript">
    // $(document).ready(function(){
    //   if ({{$status}} == 0) {
    //     $("#yglain").DataTable({
    //       searching : false,
    //       lengthMenu : [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    //       processing : true,
    //       ajax : '{{ url(Auth::user()->poli->prefix."/dataPasien") }}',

    //       columns: [
    //       { data: 'no_rm'},
    //       { data: 'nama'},
    //       { data: 'jenis_kelamin'},
    //       { data: 'jenis_kepesertaan'}, 
    //       { data: 'nama_orang_tua'}, 
    //       { data: 'nama_suami_istri'}, 
    //       { data: 'tanggal_lahir'},
    //       { data: 'alamat'},
    //       { data: 'aksi'}
    //       ]
    //     });
    //   }
    // });
  </script>
  <script>
    function setData(no_rm,nama,jenis_kelamin,tanggal_lahir,alamat,kabupaten,kecamatan,dusun,desa,tempat_lahir,berat_lahir,gol_darah,agama,status,pekerjaan,identitas,nomor,telepon,nama_ortu,nama_suami_istri){
      $('#no_rm').val(no_rm);
      $('#nama').val(nama);
      $('#jenis_kelamin').val(jenis_kelamin);
      $('#tanggal_lahir').val(tanggal_lahir);
      $('#alamat').val(alamat);
      $('#kabupaten').val(kabupaten);
      $('#kecamatan').val(kecamatan);
      $('#dusun').val(dusun);
      $('#desa').val(desa);
      $('#tempat_lahir').val(tempat_lahir);
      $('#berat_lahir').val(berat_lahir);
      $('#gol_darah').val(gol_darah);
      $('#agama').val(agama);
      $('#status').val(status);
      $('#pekerjaan').val(pekerjaan);
      $('#identitas').val(identitas);
      $('#nomor').val(nomor);
      $('#telepon').val(telepon);
      $('#nama_ortu').val(nama_ortu);
      $('#nama_suami_istri').val(nama_suami_istri);
    }
  </script>
  @endsection

</body>
</html>
@extends('new.pendaf.mod_editDataPasien')

