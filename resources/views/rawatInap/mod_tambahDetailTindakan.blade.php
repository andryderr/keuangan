 <div class="modal fade" id="tambahPetugas" role="dialog">
       <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
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
                    <select class="form-control" name="" id=""  id="petugas" onChange="formJenisPetugas();">
                      <option value="null">----</option>
                      <option value="dokter">Dokter</option>
                      <option value="petugasMedis">Petugas Medis</option>
                    </select>
                  </div>

                   <div class="form-group" id="namaDokter">
                  <label>Nama Dokter</label>
                    <select class="form-control" name="" id="">
                      <option>----</option>
                      <option value="">Supri</option>
                      <option value="">Martono</option>
                    </select>
                  </div>

                   <div class="form-group" id="namaPetugas">
                  <label>Nama Petugas Medis</label>
                    <select class="form-control" name="" id="">
                      <option>----</option>
                      <option value="">Andi</option>
                      <option value="">Budi</option>
                    </select>
                  </div>



                    <div class="form-group">
                  <label>Jenis Acuan</label>
                    <select class="form-control" name="" id=""  id="jenisAcuan" onChange="hidupmatiAcuan();">
                      <option>----</option>
                      <option value="acuan">Acuan</option>
                      <option value="bukanacuan">Bukan Acuan</option>
                    </select>
                  </div>

                    <div class="form-group">
                      <label>Persentase</label>
                      <input type="text"  class="form-control" id="persenAcuan" name="" id="">
                    </div>  
                </div>
                  </div><!-- /.box-body -->                      

             <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
      function hidupmatiAcuan()
      {
       if (document.getElementById("jenisAcuan").value == "acuan") {
        document.getElementById("persenAcuan").disabled='true';
        document.getElementById("persenAcuan").value='100';
      } else if (document.getElementById("jenisAcuan").value == "bukanacuan") {
        document.getElementById("persenAcuan").disabled='';
        document.getElementById("persenAcuan").value='';
      }

    }
      function formJenisPetugas()
      {
       if (document.getElementById("petugas").value == "dokter") {
        document.getElementById("namaDokter").style.display="block";
        document.getElementById("namaPetugas").style.display="none";
      } else if (document.getElementById("petugas").value == "petugasMedis") {
        document.getElementById("namaPetugas").style.display="block";
        document.getElementById("namaDokter").style.display="none";
      }else{
         document.getElementById("petugas").style.display="block";
         document.getElementById("namaDokter").style.display="block";
      }

    }
</script>