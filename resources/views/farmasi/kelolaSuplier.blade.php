<!DOCTYPE html>
<html>
<!-- Left side column. contains the logo and sidebar -->
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
          <li class="active">Dashboard</li>
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
        <br>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Supplier</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
               <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahSupplier"> <i class="glyphicon glyphicon-plus"></i>Tambah Supplier</a>
             </form>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr style="background:#E0E0E0;">
                 <th>No</th>
                 <th>Nama Supplier</th>
                 <th style="width: 200px;">Alamat</th>
                 <th>Contact Person</th>
                 <th>Email</th>
                 <th style="width:100px;">Aksi</th>
               </tr>
             </thead>
             <tfoot>
              <tr style="background:#E0E0E0;">
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th style="width:100px;">Aksi</th>
              </tr>
            </tfoot>
            <tbody>
             <?php $no = 1; ?>
             @foreach($data as $row)
             <tr>
              <td>{{$no++}}</td>
              <td>{{$row->nama_supplier}}</td>
              <td>{{$row->alamat}}</td>
              <td>{{$row->contact_person}}</td>
              <td>{{$row->email}}</td>
              <td>
               <a href="#" data-toggle="tooltip" title="Edit Supplier"><button type="button" data-toggle="modal" data-target="#editSupplier" onclick="setModal('{{$row->id_supplier}}', '{{$row->nama_supplier}}', '{{$row->alamat}}', '{{$row->contact_person}}', '{{$row->email}}', '{{$row->no_telp}}', '{{$row->no_hp}}')" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
               <a data-toggle="tooltip" title="Hapus Supplier" href="{{url(Auth::user()->poli->prefix.'/hapusSupplier')}}/{{$row->id_supplier}}" onclick="return confirm('Hapus Data Ini ?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a></button></a>
             </td>
             @endForeach
           </tr>
         </div>
       </tbody>
     </table>
   </div>
 </div>

</div><!--end .card-body -->
</div>
</div>
</div>

@endsection
@extends('farmasi.mod_tambahSupplier')
@extends('farmasi.mod_editSupplier')

<script>
  function setModal($id_supplier, $nama_supplier, $alamat, $cp, $email, $no_telp, $no_hp) {
    document.getElementById('id_supplier').value = $id_supplier;
    document.getElementById('nama_supplier1').value = $nama_supplier;
    document.getElementById('alamat1').value = $alamat;
    document.getElementById('cp1').value = $cp;
    document.getElementById('email1').value = $email;
    document.getElementById('no_telp1').value = $no_telp;
    document.getElementById('no_hp1').value = $no_hp;
  }  
</script>

</body>
</html>
