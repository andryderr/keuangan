 <div class="modal fade" id="editPetugasMedis" role="dialog">
       <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header" style="background-color: #4db6ac;">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" style="color:white;">Form Tambah Data Petugas Medis</h3>
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
                    <label>ID Petugas Medis Bertugas</label>
                    <input type="text"  class="form-control" placeholder="" readonly name="" id="">
                  </div>

                  <div class="form-group">
                    <label>Nama Petugas Medis</label>
                    <input type="text"  class="form-control" placeholder="" readonly name="" id="">
                  </div>


                  <div class="form-group">
                    <label>Alamat</label>
                    <div class="col md 3">
                     <div class="input-group">
                     <span class="input-group-addon">Kabupaten</span>
                      <input type="text" class="form-control" placeholder="" name="" id="">
                    </div>
                    <br>

                    <div class="input-group">
                      <span class="input-group-addon">Kecamatan</span>
                      <input type="text" class="form-control" placeholder="" name="" id="">
                    </div>
                    <br>

                     <div class="input-group">
                      <span class="input-group-addon">Kelurahan</span>
                      <input type="text" class="form-control" placeholder="" name="" id="">
                    </div>
                    <br>

                    <div class="form-group">
                      <label>SIP</label>
                      <input type="file"  class="form-control" placeholder="" name="" id="">
                    </div>

                    <div class="form-group">
                      <label>Tanggal Masuk</label>
                      <input type="date"  class="form-control" placeholder="" name="" id="">
                    </div>

                    <div class="form-group">
                      <label>Bertugas sebagai</label>
                      <select class="form-control" name="" id="">
                        <option>----</option>
                        <option value="">Petugas medis A</option>
                        <option value="">Petugas Medis B</option>
                        <option value="">Dokter Spesialis Kandungan</option>
                        <option value="">Dokter Spesialis Anak</option>
                      </select>
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