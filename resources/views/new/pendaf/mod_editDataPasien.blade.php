 <div class="modal fade" id="editPasien" role="dialog">
   <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4db6ac;">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" style="color:white;">Form Ubah Data Pasien</h3>
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
        <form action="{{url('PENDAF/Pasien/Update')}}" method="post">
        {{csrf_field()}}
        <div class="box-body">

          <div class="form-group">
            <label>No RM</label>
            <input type="text" id="no_rm" class="form-control" placeholder="" readonly name="no_rm">
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input type="text" id="nama" class="form-control" placeholder="test" name="nama" value="">
          </div>

          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
              <option>----</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div> 

          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" id="tgl_lahir" class="form-control" placeholder="" name="tanggal_lahir">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <div class="col md 3">
              <div class="input-group">
               <span class="input-group-addon">Alamat</span>
               <input type="text" id="alamat" class="form-control" placeholder="" name="alamat">
             </div>
             <br>
             <div class="input-group">
               <span class="input-group-addon">Kabupaten</span>
               <input type="text" id="kabupaten" class="form-control" placeholder="" name="kabupaten">
             </div>
             <br>

             <div class="input-group">
              <span class="input-group-addon">Kecamatan</span>
              <input type="text" id="kecamatan" class="form-control" placeholder="" name="kecamatan">
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon">Dusun</span>
              <input type="text" id="dusun" class="form-control" placeholder="" name="dusun">
            </div>
            <br>  

            <div class="input-group">
              <span class="input-group-addon">Desa</span>
              <input type="text" id="desa" class="form-control" placeholder="" name="desa">
            </div>
            <br>

            <h4 class="box-title">Data Detail</h4>

            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" id="tempat_lahir"  class="form-control" placeholder="" name="tempat_lahir">
            </div>

            <div class="form-group">
              <label>Berat lahir</label>
              <input type="text" id="berat_lahir" class="form-control" placeholder="" name="berat_lahir">
            </div>

            <div class="form-group">
              <label>Golongan Darah</label>
              <select class="form-control" id="gol_darah" name="gol_darah">
                <option>----</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="o">O</option>
              </select>
            </div> 

            <div class="form-group">
              <label>Agama</label>
              <select class="form-control" id="agama" name="agama">
                <option>----</option>
                <option value="ISLAM">Islam</option>
                <option value="KRISTEN">Kristen</option>
                <option value="HINDU">Hindu</option>
                <option value="BUDHA">Budha</option>
                <option value="KONGHUCU">Konghuchu</option>
              </select>
            </div>        

            <div class="form-group">
              <label>Status</label>
              <select class="form-control" id="status" name="status">
                <option>----</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Menikah">Menikah</option>
                <option value="Janda/Duda">Janda/Duda</option>
              </select>
            </div>   

            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="pekerjaan" id="pekerjaan"  class="form-control" placeholder="">
            </div>  

            <div class="form-group">
              <label>Identitas</label>
              <select class="form-control" id="jenis_identitas" name="jenis_identitas">
                <option>----</option>
                <option value="KTP">KTP</option>
                <option value="SIM">SIM</option>
              </select>
              <div class="input-group">
                <span class="input-group-addon">Nomer</span>
                <input type="text" id="nomor" class="form-control" placeholder="" name="no_identitas">
              </div>
            </div>  

            <div class="form-group">
              <label>Telepon</label>
              <input type="text" id="telepon" name="telepon"  class="form-control" placeholder="">
            </div>  

            <div class="form-group">
              <label>Nama Orang tua</label>
              <input type="text" id="nama_ortu"  class="form-control" placeholder="" name="nama_orang_tua">
            </div>  

            <div class="form-group">
              <label>Nama Suami/istri</label>
              <input type="text" id="nama_suami_istri" class="form-control" placeholder="" name="nama_suami_istri">
            </div>  
          </div>
        </div>
      </div><!-- /.box-body -->                      

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </div>
    </form>
</div>
</div>
</div>