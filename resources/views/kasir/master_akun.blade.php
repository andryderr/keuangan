<!DOCTYPE html>
<html>
@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Akun</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
          @endforeach
        </div> <!-- end .flash-message -->

        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Master Data Akun</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahMasterAkun"> <i class="glyphicon glyphicon-plus"></i> Tambah Akun</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                  <th>No Akun</th>
                  <th>Nama Akun</th>
                  <th>Saldo Normal</th>
                  <th>Keterangan</th>
                  <th>Level</th>
                  <th style="width:80px;">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="background:#E0E0E0;">
                  <th>No Akun</th>
                  <th>Nama Akun</th>
                  <th>Saldo Normal</th>
                  <th>Keterangan</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $akun)
                <tr>
                  <td>{{$akun->no_akun}}</td>
                  <td>{{$akun->nama_akun}}</td>
                  <td>{{$akun->so_normal}}</td>
                  <td>{{$akun->keterangan}}</td>
                  <td>{{$akun->level}}</td>
                  <td>         
                    <a href="#" data-toggle="tooltip" title="Edit Akun"><button type="button" onclick="setModal('{{$akun->no_akun}}','{{$akun->nama_akun}}','{{$akun->so_normal}}','{{$akun->keterangan}}','{{$akun->level}}','{{$akun->so_akun}}')" data-toggle="modal" data-target="#editMasterAkun" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                    <a href="/KASIR/hapusMasterAkun/{{$akun->no_akun}}" data-toggle="tooltip" title="Hapus Akun"><button type="button" onclick="return confirm('Hapus Data Ini ?');" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    <!--  -->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div><!--end .card-body -->
    </div>
  </div>
</div>
@extends('kasir.mod_tambahMasterAkun')
@extends('kasir.mod_editMasterAkun')

<script>
  function setTitikRupiah($rupiah){
    var bilangan = $rupiah;
    var reverse = bilangan.toString().split('').reverse().join('');
    ribuan  = reverse.match(/\d{1,3}/g);
    ribuan  = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }
  function setModal(no_akun,nama_akun,so_normal,keterangan,level,so_akun){
    $('#no_akun').val(no_akun);
    $("#nama_akun").val(nama_akun);
    $("#so_normal").val(so_normal);
    $("#keterangan").val(keterangan);
    $("#level").val(level);
    $("#so_akun").val(setTitikRupiah(so_akun));
  }
</script>


<script type="text/javascript">
  /* Tanpa Rupiah */
  var tanpa_rupiah = document.getElementById('saldoawal');
  tanpa_rupiah.addEventListener('keyup', function(e)
  {
    tanpa_rupiah.value = formatRupiah(this.value);
  });
  
  /* Fungsi */
  function formatRupiah(angka, prefix)
  {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa  = split[0].length % 3,
    rupiah  = split[0].substr(0, sisa),
    ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
    
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>
@endsection
</body>
</html>