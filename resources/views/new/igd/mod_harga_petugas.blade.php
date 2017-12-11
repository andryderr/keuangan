<div class="modal fade" id="editHarga" role="dialog">
  <div class="modal-dialog modal-sm">
   <!-- Modal content-->
   <div class="modal-content">
     <form action="" method="post" id="eHarga">
      {{csrf_field()}}
      <div class="modal-header" style="background-color: #4db6ac;">
       <button type="button" class="close" data-dismiss="modal">
         <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
       </button>
       <h3 class="modal-title" style="color:white;">Form Ubah Harga Petugas</h3>
       <label>Isi Inputan Dibawah:</label>
     </div>
     <div class="box box-primary">
       <div class="box-header with-border">
         <h3 class="box-title">Edit Detail Petugas</h3>
         <div class="box-tools pull-right">
           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         </div>
       </div>
       <input class="hidden" type="hidden" id="jP" name="jP"></input>
       <div class="box-body">
         <div class="form-group" id="ganti_petugas">
           <label id="title_ganti"></label>
           <select class="form-control" id="ganti_petugas_detail">
           </select>
         </div>
         <div class="form-group">
           <label>Harga</label>
           <input type="text"  class="form-control" id="harga_pet" placeholder="" name="harga">
         </div>  
       </div>
       <input type="hidden" name="id_detail_poli" id="id_pol">
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