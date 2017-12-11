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

                  <div class="box-body">

                  <div class="form-group">
                    <label>No RM</label>
                    <input type="text"  class="form-control" placeholder="" readonly required name="" id="">
                  </div>

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text"  class="form-control" placeholder="" required name="" id="">
                  </div>

                  <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" required name="" id="">
                        <option>----</option>
                        <option value="laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                    </div> 

                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" id="tanggallahir" class="form-control" placeholder="" required name="" id="">
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <div class="col md 3">
                     <div class="input-group">
                     <span class="input-group-addon">Kabupaten</span>
                      <input type="text" class="form-control" placeholder="" required name="" id="">
                    </div>
                    <br>

                    <div class="input-group">
                      <span class="input-group-addon">Kecamatan</span>
                      <input type="text" class="form-control" placeholder="" required name="" id="">
                    </div>
                    <br>

                     <div class="input-group">
                      <span class="input-group-addon">Dusun</span>
                      <input type="text" class="form-control" placeholder="" required name="" id="">
                    </div>
                    <br>  

                     <div class="input-group">
                      <span class="input-group-addon">Desa</span>
                      <input type="text" class="form-control" placeholder="" required name="" id="">
                    </div>
                    <br>

                    <h4 class="box-title">Data Detail</h4>

                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text"  class="form-control" placeholder="" required name="" id="">
                    </div>

                    <div class="form-group">
                      <label>Berat lahir</label>
                      <input type="text"  class="form-control" placeholder="" required name="" id="">
                    </div>

                    <div class="form-group">
                      <label>Golongan Darah</label>
                      <select class="form-control" required name="" id="">
                        <option>----</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="o">O</option>
                      </select>
                    </div> 

                    <div class="form-group">
                      <label>Agama</label>
                      <select class="form-control" required name="" id="">
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
                      <select class="form-control" required name="" id="">
                        <option>----</option>
                        <option value="LAJANG">Lajang</option>
                        <option value="MENIKAH">Menikah</option>
                        <option value="JANDA/DUDA">Janda/Duda</option>
                      </select>
                    </div>   

                     <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" required name="" id=""  class="form-control" placeholder="">
                    </div>  

                    <div class="form-group">
                      <label>Identitas</label>
                      <select class="form-control" required name="" id="">
                        <option>----</option>
                        <option value="KTP">KTP</option>
                        <option value="SIM">SIM</option>
                      </select>
                    <div class="input-group">
                      <span class="input-group-addon">Nomer</span>
                      <input type="text" class="form-control" placeholder="" required name="" id="">
                    </div>
                    </div>  

                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" required name="" id=""  class="form-control" placeholder="">
                    </div>  

                    <div class="form-group">
                      <label>Nama Orang tua</label>
                      <input type="text"  class="form-control" placeholder="" required name="" id="">
                    </div>  

                    <div class="form-group">
                      <label>Nama Suami/istri</label>
                      <input type="text"  class="form-control" placeholder="" required name="" id="">
                    </div>  
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