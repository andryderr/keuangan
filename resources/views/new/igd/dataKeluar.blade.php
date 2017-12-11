<!DOCTYPE html>
<html>

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
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          @for($i = 0; $i <= count(Request::segments()); $i++)
          <li>
            <a href="{{url(''.Request::segment($i))}}">{{Request::segment($i)}}</a>
            @if($i < count(Request::segments()) & $i > 0)
            {!!'<i class="fa fa-angle-right"></i>'!!}
            @endif
          </li>
          @endfor
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pasien Keluar</h3>
            </div>
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active">
                  <a data-toggle="pill" style="border-radius: 5px; padding: 3px;" href="#home"><button type="button" class="btn btn-link" onclick="$('#jenis').val('0');">Benar-Benar Pulang</button></a>
                </li>
                <li>
                  <a data-toggle="pill" href="#menu1"  style="border-radius: 5px;"><button style="margin:0px;padding: 0px;" type="button" class="btn btn-link" onclick="$('#jenis').val('1');">Pulang Paksa</button></a>
                </li>
                <li>
                  <a data-toggle="pill" href="#menu2"  style="border-radius: 5px;"><button style="margin:0px;padding: 0px;" type="button" class="btn btn-link" onclick="$('#jenis').val('3');">Dirujuk</button></a>
                </li>
              </ul>
              <br>
              <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                     <tr>
                       <tr>
                         <th>ID</th>
                         <th>No RM</th>
                         <th>Nama</th>
                         <th>Tgl Lahir</th>
                         <th>Umur</th>
                         <th>Kategori Usia</th>
                       </tr>
                     </tr>
                   </thead>
                   <tfoot>
                     <tr>
                       <th>ID</th>
                       <th>No RM</th>
                       <th>Nama</th>
                       <th>Tgl Lahir</th>
                       <th>Umur</th>
                       <th>Kategori Usia</th>
                     </tr>
                   </tfoot>
                   <tbody>
                     @foreach($data1 as $row)
                     <tr>
                       <td>{{$row->id_pendaftaran}}</td>
                       <td>{{$row->pasien->no_rm}}</td>
                       <td>{{$row->pasien->nama}}</td>
                       <td>{{$row->pasien->tanggal_lahir}}</td>
                       <td>{{$row->umur}}</td>
                       <td>{{$row->kategori_usia}}</td>
                     </tr>
                     @endforeach                  
                   </div>
                 </tbody>
               </table>
             </div>
             <div id="menu1" class="tab-pane fade">
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                 <tr>
                   <tr>
                     <th>ID</th>
                     <th>No RM</th>
                     <th>Nama</th>
                     <th>Tgl Lahir</th>
                     <th>Umur</th>
                     <th>Kategori Usia</th>
                   </tr>
                 </tr>
               </thead>
               <tfoot>
                 <tr>
                   <th>ID</th>
                   <th>No RM</th>
                   <th>Nama</th>
                   <th>Tgl Lahir</th>
                   <th>Umur</th>
                   <th>Kategori Usia</th>
                 </tr>
               </tfoot>
               <tbody>
                 @foreach($data2 as $row)
                 <tr>
                   <td>{{$row->id_pendaftaran}}</td>
                   <td>{{$row->pasien->no_rm}}</td>
                   <td>{{$row->pasien->nama}}</td>
                   <td>{{$row->pasien->tanggal_lahir}}</td>
                   <td>{{$row->umur}}</td>
                   <td>{{$row->kategori_usia}}</td>
                 </tr>
                 @endforeach                  
               </div>
             </tbody>
           </table>
         </div>
             <div id="menu2" class="tab-pane fade">
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                 <tr>
                   <tr>
                     <th>ID</th>
                     <th>No RM</th>
                     <th>Nama</th>
                     <th>Tgl Lahir</th>
                     <th>Umur</th>
                     <th>Kategori Usia</th>
                   </tr>
                 </tr>
               </thead>
               <tfoot>
                 <tr>
                   <th>ID</th>
                   <th>No RM</th>
                   <th>Nama</th>
                   <th>Tgl Lahir</th>
                   <th>Umur</th>
                   <th>Kategori Usia</th>
                 </tr>
               </tfoot>
               <tbody>
                 @foreach($data3 as $row)
                 <tr>
                   <td>{{$row->id_pendaftaran}}</td>
                   <td>{{$row->pasien->no_rm}}</td>
                   <td>{{$row->pasien->nama}}</td>
                   <td>{{$row->pasien->tanggal_lahir}}</td>
                   <td>{{$row->umur}}</td>
                   <td>{{$row->kategori_usia}}</td>
                 </tr>
                 @endforeach                  
               </div>
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>

@endsection

</body>
</html>
