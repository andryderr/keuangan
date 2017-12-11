

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
         Halaman Setting Fee Tindakan Medis
         <small>Control panel</small>
       </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li>

        </li>

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
          <a href="{{url(Auth::user()->poli->prefix.'/Data/Kelas/')}}/{{$id}}"><button type="button" class="btn btn-success">Kembali</button></a>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input type="text" class="form-control input-lg" placeholder="{{$data[0]->harga_rs+$data[0]->harga_p}}" name="Harga" readonly="">
          </div>
        </div>
      </div>
    </div><!-- /.box-body -->

    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Jasa</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->


        <div class="box-body">

          <div class="form-group">
            <label>No/ID Tindakan Medis</label>
            <input type="text"  class="form-control" placeholder="" id="id_tm_d_p" readonly name="id_detail_medis_kamar" value="{{$data[0]->id_detail_medis_kamar}}">
          </div>

          <div class="form-group">
            <label>Nama Tindakan Medis</label>
            <input type="text" value="{{$data[0]->tindakanMedis->nama}}" class="form-control" id="nama" placeholder="" name="nama" readonly>
          </div>
          <br>
        </div><!-- /.box-body -->
      </div>
    </div>

    <!-- Detail harga -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Jasa Rumah Sakit dan Pelaksana</h3>
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
              <table class="table table-hover">
                <tr>
                  <th>Nama Jasa</th>
                  <th>Persentase</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
                <tr>
                  <td>Jasa Rumah Sakit</td>
                  <td id="prs">{{$data[0]->rumah_sakit}}%</td>
                  <td id="rs">{{$data[0]->harga_rs}}</td>
                  <td rowspan="2" >
                    @if(count($data[0]->detail) <=0)
                    <a href="#"><button type="button" style="margin-top: 25%;" data-toggle="modal" data-target="#editPersen" class="btn btn-warning" onclick="setModPJRS({{$data[0]->id_detail_medis_kelas}},{{$data[0]->rumah_sakit}});"><i class="fa fa-edit"></i></button></a>
                    @endif
                  </td>
                </tr>
                <tr>
                 <td>Jasa Pelaksana</td>
                 <td id="ppe">{{$data[0]->pelaksana}}%</td>
                 <td id="pe">{{$data[0]->harga_p}}</td>
               </tr>
             </table>
           </div><!-- /.box-body -->
         </div><!-- /.box -->
       </div>
     </div> 
     
   </div>
 </div>


 <!-- Detail Petugas -->
 @if($data[0]->rumah_sakit != 0 && $data[0]->pelaksana != 0)
 <div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Jasa Tindakan Petugas</h3>
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
          <form class="tombol" method="post" action="?" style="margin-bottom:10px;">
           <a class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahPetugas"> <i class="glyphicon glyphicon-plus"></i> Tambah Detail Tindakan</a>
         </form>
         <table class="table table-hover">
          <tr>
            <th>Jenis Sub Jasa</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
          @foreach($data[0]->detail as $row)
          <tr>
            <td>{{$row->jasa->nama}}</td>
            <td>{{$row->harga}}</td>
            <td>
             <a href="#"><button type="button" data-toggle="modal" data-target="#editDetail" class="btn btn-warning" onclick="setDetail('{{$row->id_detail_sub_medis_kelas}}','{{$row->id_sub_jasa}}','{{$row->harga}}')"><i class="fa fa-edit"></i></button></a>
             <a href="{{url(Auth::user()->poli->prefix.'/detailTindakanMedis/delete')}}/{{$row->id_detail_sub_medis_kelas}}" onclick="return confirm('Konfirmasi Penghapusan');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
           </td>
         </tr>
         @endforeach
       </tr>
     </tr>
   </table>
 </div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div> 
</div>
</div>
@endif
</section>
</div>
</div>

<script>
  $(document).ready(function(){
    $('#namaDokter').hide();
    $('#namaPetugas').hide();
    $('#acuan').hide();
    $('#persentase1').hide();
    $('#harga1').hide();
  });
  function setDetail(id,id_sub_jasa,harga){
      $('#id_detail_sub_medis_kelas').val(id);
      $('#id_sub_jasa1').val(id_sub_jasa);
      $('#harga12').val(harga);
  }
  function setIsiPetugas($a,$b,$c){
    // alert("test");
    document.getElementById('jenisPetugas1').value = $a;
    document.getElementById('persentasePetugas1').value = $b;
    document.getElementById('id_tm').value = $c;
    action="{{url(Auth::user()->poli->prefix.'/DetailTindakanMedis/Update')}}/"+$a+"/"+$c;
    // alert(action);
    $('#form_persen').attr('action',action);
  }

  function send(){
    data1 = {_token: $('meta[name=csrf-token]').attr('content'),data:"oke"};
    url = "{{url('G/DetailTindakanMedis/Petugas')}}";
    $.post(url, data1).done(function(data) {
      console.log(data);
    }).fail(function() {
      alert( "error" );
    });
  }
  function setIsi($a,$b,$c){
    document.getElementById('namaJasa').value = $a;
    document.getElementById('persentaseJasa').value = $b;
  }

</script>
@extends('new.igd.mod_tambahDetailTindakan1')
@extends('new.igd.mod_editDetailTindakan1')

@extends('new.igd.mod_persentaseJasaRS')
@extends('new.igd.mod_persentasePetugas')

@endsection
</body>