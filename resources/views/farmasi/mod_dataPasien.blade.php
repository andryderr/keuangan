 <div class="modal fade" id="dataPasien" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Pilih Pasien</h3>
        <label>Pilih Pasien Dibawah:</label>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pasien</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
         <table id="" class="table table-bordered datatable">
          <thead>
            <tr style="background:#E0E0E0;">
              <th>No RM</th>
              <th>Nama Pasien</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($dataPasien as $row)
            <tr>
              <td id="no_rm{{$row->no_rm}}">{{$row->no_rm}}</td>
              <td id="nama_pasien{{$row->no_rm}}">{{$row->nama}}</td>
              <td><button class="btn btn-primary" onclick="pilih({{$row->no_rm}});"><span class="fa fa-check"></span></button></td>
            </tr>
            @endForeach
          </tbody>
        </table>
      </div><!-- /.box-body -->                      
    </div>
  </div>
</div>
</div>
<script>
  function pilih(id) {
    document.getElementById("cari_pasien").value = document.getElementById("nama_pasien"+id).innerHTML;
    document.getElementById("id_pas").value = document.getElementById("no_rm"+id).innerHTML;
    $('#dataPasien').modal('hide');
  }
</script>