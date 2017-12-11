 <div class="modal fade" id="editPendaftaran" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Ubah Data Pendaftaran</h3>
        <label>Isi Inputan Dibawah:</label>
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
            <div class="box-body">
              <div class="form-group">
                <label >Pasien Baru/Lama</label>
                <select class="form-control" name="pasien_baru_lama" id="pasien_baru_lama" onChange="hidupmati();" readonly>
                  <option>----</option>
                  <option value="BARU">BARU</option>
                  <option value="LAMA">LAMA</option>
                </select>
              </div>

              <div class="form-group">
                <div class="input-group margin">
                  <input type="hidden" class="form-control" id="no_rm" name="no_rm" readonly>
                </div><!-- /input-group -->
              </div>

              <div class="form-group">
                <label>Tanggal Daftar</label>
                <input type="date" class="form-control" placeholder="" id="tanggal_daftar" name="tanggal_daftar" readonly>
              </div>

              <div class="form-group">
                <label>Kunjungan ke</label>
                <input type="text"  class="form-control" id="kunjungan_ke" name="kunjungan_ke" readonly>
              </div>


              <div class="form-group">
                <label>Umur</label>
                <input type="text"  class="form-control" placeholder="" id="umur" name="umur" readonly>
              </div>

              <div class="form-group">
                <label>Kategori Usia</label>
                <select class="form-control" id="kategori_usia" name="kategori_usia" readonly>
                  <option>----</option>
                  @foreach($kategori_usia as $row)
                  <option value="{{$row}}">{{$row}}</option>}
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>No Antri</label>
                <input type="text"  class="form-control" placeholder="" id="no_antri" name="no_antri" readonly>
              </div>

              <div class="form-group">
                <label>Cara Masuk</label>
                <select class="form-control" id="cara_masuk" onChange="hidupmati();" name="cara_masuk" readonly>
                  <option>----</option>
                  <option value="Datang Sendiri">DATANG SENDIRI</option>
                  <option value="Rujukan">RUJUKAN</option>
                </select>
              </div>

              <div class="form-group">
                <label>Rujukan</label>
                <input type="text" class="form-control" placeholder="" id="rujukan" name="rujukan" readonly>
              </div>

              <div class="form-group">
                <label>Nama Perujuk</label>
                <input type="text" id="nama_perujuk" class="form-control" placeholder="" name="nama_perujuk" readonly>
              </div>
            </div>
          </div>
        </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Simpan</button> -->
      </div>
    </form>
  </div>
</div>
</div>
</div>


<script>
  function setIsi($id){
    url = "{{url('G/Pendaftaran/show1')}}"+"/"+$id;
    $.getJSON(url, function(result){
      if (result.length > 0) {
        console.log(result);
        $('#alamat_lengkap_pj').val(result[0]['alamat_lengkap_pj']);
        $('#cara_keluar').val(result[0]['cara_keluar']);
        $('#cara_masuk').val(result[0]['cara_masuk']);
        $('#diagnosa_lain').val(result[0]['diagnosa_lain']);
        $('#diagnosa_masuk').val(result[0]['diagnosa_masuk']);
        $('#diagnosa_utama').val(result[0]['diagnosa_utama']);
        $('#id_dokter').val(result[0]['id_dokter']);
        $('#id_pendaftaran').val(result[0]['id_pendaftaran']);
        $('#jalur_masuk').val(result[0]['jalur_masuk']);
        $('#kategori_usia').val(result[0]['kategori_usia']);
        $('#keadaan_keluar').val(result[0]['keadaan_keluar']);
        $('#kunjungan_ke').val(result[0]['kunjungan_ke']);
        $('#no_antri').val(result[0]['no_antri']);
        $('#').val(result[0]['']);
        $('#').val(result[0]['']);
        $('#').val(result[0]['']);

        $('#komplikasi').val(result[0]['komplikasi']);
        $('#nama_perujuk').val(result[0]['nama_perujuk']);
        $('#nama_pj').val(result[0]['nama_pj']);
        $('#nama_poli').val(result[0]['nama_poli']);
        $('#no_rm').val(result[0]['no_rm']);
        $('#pasien_baru_lama').val(result[0]['pasien_baru_lama']);
        $('#rujukan').val(result[0]['rujukan']);
        $('#tanggal_daftar').val(result[0]['tanggal_daftar']);
        $('#tujuan_berobat').val(result[0]['tujuan_berobat']);
        $('#umur').val(result[0]['umur']);
            // $('#').val(result[0]['']);


          }else{
            alert("Data Tidak Ditemukan");
          }
        });
  }
</script>