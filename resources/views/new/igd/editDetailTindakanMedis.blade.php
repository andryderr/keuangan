
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
      <div class="col xs-12">
       <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Tarif / Harga</h3> <a href="{{url()->previous()}}" class="btn btn-primary btn-sm">Kembali</a>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input type="text" class="form-control input-lg" placeholder="{{$data[0]->harga_total}}" name="Harga" readonly="">
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
            <input type="text"  class="form-control" placeholder="" id="id_tm_d_p" readonly name="id_tm_d_p" value="{{$data[0]->id_tm_d_p}}">
          </div>

          <div class="form-group">
            <label>Nama Tindakan Medis</label>
            <input type="text" value="{{$data[0]->tindakanKelas->tindakanMedis->nama}}" class="form-control" id="nama" placeholder="" name="nama" readonly>
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
                  <!-- <th>Persentase</th> -->
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
                <tr>
                  <td>Jasa Rumah Sakit</td>
                  <!-- <td id="prs">$data[0]->rumah_sakit%</td> -->
                  <td id="rs">{{$data[0]->harga_rs}}</td>
                  <td rowspan="2" >
                    <a href="#"><button type="button" style="margin-top: 25%;" data-toggle="modal" data-target="#editPersen" class="btn btn-warning" onclick="$('#harga_rs').val({{$data[0]->harga_rs}});"><i class="fa fa-edit"></i></button></a>
                  </td>
                </tr>
                <tr>
                 <td>Jasa Pelaksana</td>
                 <!-- <td id="ppe">$data[0]->pelaksana%</td> -->
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

         <table class="table table-hover">
          <tr>
            <th>Nama Petugas</th>
            <th>Jenis Petugas</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
          @foreach($data[0]->dokter as $row)
          <tr>
            <td>{{$row->dokter->nama}}</td>
            <td>Dokter</td>
            <td>{{$row->harga}}</td>
            <td>
             <a href="#"><button type="button" data-toggle="modal" data-target="#editHarga" class="btn btn-warning" onclick="setHarga('{{$row->id_tm_d}}','{{$row->harga}}','Dokter','{{$row->id_dokter}}');"><i class="fa fa-edit"></i></button></a>
             <a href="{{url(Auth::user()->poli->prefix.'/DetailTindakanMedis/Dokter/Delete')}}/{{$row->id_tm_d}}" onclick="return confirm('Konfirmasi Penghapusan');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
           </td>
         </tr>
         @endforeach
         @foreach($data[0]->petugas as $row)
         <tr>
          <td>{{$row->petugas->nama}}</td>
          <td>Petugas</td>
          <td>{{$row->harga}}</td>
          <td>
           <a href="#"><button type="button" data-toggle="modal" data-target="#editHarga" class="btn btn-warning" onclick="setHarga('{{$row->id_tm_p}}','{{$row->harga}}','Petugas','{{$row->id_petugas}}');"><i class="fa fa-edit"></i></button></a>
           <a href="{{url(Auth::user()->poli->prefix.'/DetailTindakanMedis/Petugas/Delete')}}/{{$row->id_tm_p}}" onclick="return confirm('Konfirmasi Penghapusan');"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
         </td>
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
  function setHarga(a,b,c,d){
    $('#harga_pet').val(b);
    $('#id_pol').val(a);
    $("#ganti_petugas_detail").empty();
    $("#title_ganti").empty();
    if (c == 'Dokter') {
      $("#jP").val("Dokter");
      $("#ganti_petugas_detail").attr("name","id_dokter");
      $("#title_ganti").append("Dokter");
      row1 = "<option value=''>----</option>";
      $.getJSON("{{url('G/Dokter')}}",function(result){
        $.each(result,function(index,value){
          if (value.id_dokter == d) {
            // statement
            row1 = row1+"<option value='"+value.id_dokter+"' selected>"+value.nama+"</option>";
            // 
          } else {
            // statement
            row1 = row1+"<option value='"+value.id_dokter+"'>"+value.nama+"</option>";
          }
        });
        $("#ganti_petugas_detail").append(row1);
      });
      $('#eHarga').attr('action',"{{url(Auth::user()->poli->prefix.'/Pasien/DetailTindakanMedis/Update/Dokter/')}}/"+a);
    }else{
      $("#jP").val("Petugas");
      $("#ganti_petugas_detail").attr("name","id_petugas");
      $("#title_ganti").append("Petugas");
      row1 = "<option value=''>----</option>";
      $.getJSON("{{url('G/Petugas')}}",function(result){
        $.each(result,function(index,value){
          // console.log(value.nama);
          if (value.id_petugas_medis == d) {
            row1 = row1+"<option value='"+value.id_petugas_medis+"' selected>"+value.nama+"</option>";

          }else{
            row1 = row1+"<option value='"+value.id_petugas_medis+"'>"+value.nama+"</option>";
            
          }
        });
        // console.log(row1);
        $("#ganti_petugas_detail").append(row1);
      });

      $('#eHarga').attr('action',"{{url(Auth::user()->poli->prefix.'/Pasien/DetailTindakanMedis/Update/Petugas/')}}/"+a);      
    }
    console.log(d);
    $('#ganti_petugas_detail').val(''+d);

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
@extends('new.igd.mod_harga_rs')
@extends('new.igd.mod_harga_petugas')

@endsection
</body>