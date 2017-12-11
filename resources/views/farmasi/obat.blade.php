

<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar')

@section('content')

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
        <li class="active">Data Obat</li>
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

       <div class="col-md-12">
        <div class="nav-tabs-custom">

          <div class="tab-content">
            <div class="active tab-pane" id="obat">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Data Seluruh Obat</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="obatBebas" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr style="background:#E0E0E0;">
                        <th>Kode</th>
                        <th>Obat</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr style="background:#E0E0E0;">
                       <th>Kode</th>
                       <th>Obat</th>
                       <th>Harga Beli</th>
                       <th>Harga Jual</th>
                       <th>Stok</th>
                       <th>Aksi</th>
                     </tr>
                   </tfoot>
                 </table>
               </div>
             </div>
           </div>
         </div><!--end .card-body -->
       </div><!--end .card-body -->

     </div>
   </div>
 </div>
</section>
</div>
</div>
</div>

@extends('farmasi.mod_editBarang')
<script type="text/javascript">

  function viewDataObat(id)
  {
    var view_url = "{{url('G/viewDataObat')}}";
    $.ajax({
      url: view_url,
      type: "GET",
      data: {"id":id},
      success: function(result){
        $("#dataObat").empty();
        result.forEach(function(r){
          $("#dataObat").append("<tr><td>"+r['id_barang']+"</td><td>"+r['nama_barang']+"</td><td>"+r['stok']+"</td><td><a href='#' data-toggle='tooltip' title='Hapus Obat/Alkes'><button type='button' onclick='return confirm('Hapus Data Ini ?');' class='btn btn-danger'><i class='fa fa-trash'></i></button></a></td></tr>");
        });
      }
    });
  }

  function setBarang(id){
    url = "{{url('G/setBarang')}}"+"/"+id;
    $.getJSON(url, function(result){
      console.log(result);
      if (result.length > 0) {
        $('#id_barang').val(result[0]['id_barang']);
        $('#nama_barang').val(result[0]['nama_barang']);
        $('#kat_barang').val(result[0]['kat_barang']);
        $('#id_jenis_barang1').val(result[0]['id_jenis_barang']);
        $('#stok_minimal').val(result[0]['stok_minimal']);
        $('#satuan1').val(result[0]['satuan1']);
        $('#satuan2').val(result[0]['satuan2']);
        $('#satuan3').val(result[0]['satuan3']);
        $('#satuan4').val(result[0]['satuan4']);
        $('#kapasitas21').val(result[0]['kapasitas2']);
        $('#kapasitas31').val(result[0]['kapasitas3']);
        $('#kapasitas41').val(result[0]['kapasitas4']);
        $('#idKapasitas1').append('<option value="'+result[0]['satuan_turunan2']+'">'+result[0]['satuan_turunan2']+'</option>');
        $('#idKapasitas2').append('<option value="'+result[0]['satuan_turunan3']+'">'+result[0]['satuan_turunan3']+'</option>');
        $('#idKapasitas3').append('<option value="'+result[0]['satuan_turunan4']+'">'+result[0]['satuan_turunan4']+'</option>');
        $('#bbharga').val(result[0]['harga']);
        $('#bbhargajual').val(result[0]['harga_jual1']);
        $('#bbhargajual1').val(result[0]['harga_jual2']);
        $('#bbhargajual2').val(result[0]['harga_jual3']);
        $('#marginrp').val(result[0]['harga_jual1']-result[0]['harga']);
        $laba = (result[0]['harga_jual1']-result[0]['harga']);
        $persen = Math.round($laba/(result[0]['harga'])*100);
        $('#marginpersen').val($persen);
      }else{
        alert("Data Tidak Ditemukan");
      }
    });
  };

  $(document).ready(function(){
    $("#obatBebas").DataTable({
      processing : true,
      ajax : '{{ url("G/obatBebas")}}',

      columns : [
      { data : 'id_barang' , name : 'id_barang' },
      { data : 'nama_barang' , name : 'nama_barang' },
      { data : 'harga' , name : 'harga' },
      { data : 'harga_jual1' , name : 'hargajual1' },
      { data : 'stok' , name : 'stok' },
      { data : 'aksi' }
      ]

    });
  });
</script>
@endsection
