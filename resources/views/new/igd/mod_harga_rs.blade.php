<div class="modal fade" id="editPersen" role="dialog">
  <div class="modal-dialog modal-sm">
   <!-- Modal content-->
   <div class="modal-content">
   <form action="{{url(Auth::user()->poli->nama_poli.'/Pasien/DetailTindakanMedis/Update/Rs')}}/{{$data[0]->id_detail_tindakan_medis}}" method="post">
    {{csrf_field()}}
     <div class="modal-header" style="background-color: #4db6ac;">
       <button type="button" class="close" data-dismiss="modal">
         <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
       </button>
       <h3 class="modal-title" style="color:white;">Form Ubah Harga Rumah Sakit</h3>
       <label>Isi Inputan Dibawah:</label>
     </div>
     <div class="box box-primary">
       <div class="box-header with-border">
         <h3 class="box-title">Petugas Tindakan</h3>
         <div class="box-tools pull-right">
           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         </div>
       </div><
       <div class="box-body">
         <div class="form-group">
           <label>Harga</label>
           <input type="text"  class="form-control" id="harga_rs" placeholder="" name="harga">
         </div>  
       </div>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-primary">Simpan</button>
     </div>
   </form>
 </div>
</div>
</div>
</div>