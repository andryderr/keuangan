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
                    <select class="form-control" name="" id="" id="jenispasien" onChange="hidupmati();">
                      <option>----</option>
                      <option value="BARU">BARU</option>
                      <option value="LAMA">LAMA</option>
                    </select>
                </div>

                <div class="form-group">
                  <label>No RM</label>
                   <div class="input-group margin">
                    <input type="text" class="form-control" id="norm" name="" id="">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button">Go!</button>
                    </span>
                  </div><!-- /input-group -->
                  </div>

                  <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="text" class="form-control" placeholder="" id="tanggalwaktu" name="" id="">
                  </div>

                <div class="form-group">
                  <label>Kunjungan ke</label>
                    <input type="text"  class="form-control" placeholder="" name="" id="">
                  </div>


                <div class="form-group">
                  <label>Umur</label>
                    <input type="text"  class="form-control" placeholder="" name="" id="">
                  </div>

                  <div class="form-group">
                  <label>Kategori Usia</label>
                    <select class="form-control" name="" id="">
                      <option>----</option>
                      <option value="datang sendiri">DATANG SENDIRI</option>
                      <option value="rujukan">RUJUKAN</option>
                    </select>
                  </div>

                <div class="form-group">
                  <label>No Antri</label>
                    <input type="text"  class="form-control" placeholder="" name="" id="">
                  </div>

                <div class="form-group">
                  <label>Cara Masuk</label>
                    <select class="form-control" id="caramasuk" onChange="hidupmati();" name="" id="">
                      <option>----</option>
                      <option value="datang sendiri">DATANG SENDIRI</option>
                      <option value="rujukan">RUJUKAN</option>
                    </select>
                  </div>

                <div class="form-group">
                  <label>Rujukan</label>
                    <input type="text" id="rujukan" class="form-control" placeholder="" name="" id="">
                  </div>

                  <div class="form-group">
                  <label>Nama Perujuk</label>
                    <input type="text" id="perujuk" class="form-control" placeholder="" name="" id="">
                  </div>

                <div class="form-group">
                  <label>Tujuan Berobat</label>
                    <select class="form-control" name="" id="" id="tujuanPoli" onChange="hidupmati();">
                      <option>----</option>
                      <option value="ugd">UGD</option>
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