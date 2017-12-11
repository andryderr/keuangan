 <div class="modal fade" id="tambahPetugas" role="dialog">
   <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
    <form action="{{url(Auth::user()->poli->prefix.'/detailTindakanMedis/tambah')}}/{{$data[0]->id_detail_medis_kelas}}" method="post" accept-charset="utf-8">
      {{csrf_field()}}
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Ubah Persentase</h3>
        <label>Isi Inputan Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Petugas Tindakan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">

        <div class="form-group">
          <label>Jenis Petugas</label>
          <select class="form-control" name="jenisPetugas"  id="jenis_petugas" onclick="formJenisPetugas();">
            <option value="">----</option>
            @if(count($data[0]->dokter) == 0)
            <option value="0">Dokter</option>
            @else
            <option value="0">Dokter</option>
            <option value="1">Petugas Medis</option>
            @endif
          </select>
        </div>

        <div class="form-group" id="namaDokter">
          <label>Nama Dokter</label>
          <select class="form-control" name="id_dokter" id="id_dokter1">
            <option>----</option>
            @foreach($dataDokter as $row)
            @if($row->id_dokter != 0)
            <option value="{{$row->id_dokter}}">{{$row->nama}}</option>
            @endif
            @endforeach
          </select>
        </div>
        @if(count($data[0]->dokter) > 0)
        <div class="form-group" id="namaPetugas">
          <label>Nama Petugas Medis</label>
          <select class="form-control" name="id_petugas" id="id_petugas1">
            <option>----</option>
            @foreach($dataPetugas as $row)
            <option value="{{$row->id_petugas_medis}}">{{$row->nama}}</option>
            @endforeach
          </select>
        </div>
        @endif

        <div class="form-group" id="acuan">
          <label>Jenis Acuan</label>
          <select class="form-control" name="jenisAcuan"  id="jenisAcuan" onclick="hidupmatiAcuan();">
            <option>----</option>
            @if(count($data[0]->dokter) > 0)
            <option value="0">Acuan</option>
            <option value="1">Bukan Acuan</option>
            @else
            <option value="0">Acuan</option>
            @endif
          </select>
        </div>
        @if(count($data[0]->dokter) > 0)
        <div class="form-group" id="persentase1">
          <label>Persentase</label>
          <input type="text"  class="form-control" id="persen1" name="persentase">
        </div>
        @endif
        <div class="form-group" id="harga1">
          <label>Harga</label>
          <input type="text" class="form-control" name="harga">
        </div>
      </div>
    </div><!-- /.box-body -->                      

    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  function hidupmatiAcuan()
  {
   if (document.getElementById("jenisAcuan").value == "0") {
    $('#persentase1').hide();
    $('#harga1').show();
    document.getElementById('persen1').value = 100;
  } else if (document.getElementById("jenisAcuan").value == "1") {
    $('#persentase1').show();
    $('#harga1').hide();
    document.getElementById('persen1').value = 0;
  }

}
function formJenisPetugas()
{
 if (document.getElementById("jenis_petugas").value == "0") {
  document.getElementById("namaDokter").style.display="block";
  document.getElementById("acuan").style.display = "block";
  document.getElementById("namaPetugas").style.display="none";
  document.getElementById("persentase1").style.display = "none";
} else if (document.getElementById("jenis_petugas").value == "1") {
  document.getElementById("namaPetugas").style.display="block";
  document.getElementById("namaDokter").style.display="none";
  document.getElementById("acuan").style.display = "none";
  document.getElementById("persentase1").style.display = "block";
  document.getElementById("harga1").style.display = "none";
}else{
 document.getElementById("petugas").style.display="block";
 document.getElementById("namaDokter").style.display="block";
}
}
</script>