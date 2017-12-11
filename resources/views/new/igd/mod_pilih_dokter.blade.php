  <div class="modal fade" id="pilihDokter" role="dialog">
    <div class="modal-dialog modal-sm">
     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header" style="background-color: #4db6ac;">
         <button type="button" class="close" data-dismiss="modal">
           <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
         </button>
         <h3 class="modal-title" style="color:white;">Form Pilih Dokter Medis</h3>
         <label>Pilih Diagnosa Dibawah:</label>
       </div>
       <div class="box box-primary">
         <form action="{{url(Auth::user()->poli->prefix.'/Status/Dirawat/')}}" method="post">
           {{csrf_field()}}
           <div class="box-header with-border">
             <h3 class="box-title">Pilih Dokter Yang Menangani</h3>
             <div class="box-tools pull-right">
               <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
             </div>
           </div><!-- /.box-header -->
           <!-- form start -->
            <input type="hidden" name="id_detail_pendaftaran" id="id_detail_pendaftaran_pilih_dokter" value="">
           <div class="box-body">
            <div class="col-md-12">
              <select name="id_dokter" class="form-control">
                @foreach($dataDokter as $row)
                @if($row->id_dokter != 0)
                <option value="{{$row->id_dokter}}">{{$row->nama}}</option>
                @endif
                @endforeach
              </select>
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