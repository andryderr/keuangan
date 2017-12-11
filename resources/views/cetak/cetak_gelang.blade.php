
<link rel="stylesheet" href="{{url('../assets/cetak/cetak_antrian.css')}}">
<script src="{{url('/assets/js/jQuery-2.1.4.min.js')}}"></script>
<script src="{{url('/assets/js/JsBarcode.all.min.js')}}"></script>    

<div class="batasgelang">
  <div class="gelang">
   <table style="font-size: 16pt; font-family: monospace;">
     <tr>
       <td><label><strong>{{$data[0]->pendaftaran->pasien->nama}} 
        
        </strong></label></td>
       <td></td>
     </tr>
     <tr>
       <td><strong>RM: {{$data[0]->pendaftaran->no_rm}}
        <?php 
        if ($data[0]->pendaftaran->pasien->jenis_kelamin == 'Perempuan') {
          echo '/ P';
        }else{
          echo '/ L';
        }
        ?>
       </strong></td>
       <td></td>
     </tr>
     <?php
     $tgllahir = $data[0]->pendaftaran->pasien->tanggal_lahir;
     $tgllhr = new DateTime($tgllahir);
     $today = new DateTime('today');
                            //tahun
     $y = $today->diff($tgllhr)->y;
                             //bulan
     $m = $today->diff($tgllhr)->m;
     ?>
     <tr>
       <b><td><strong style="font-size: 13pt;">{{$data[0]->pendaftaran->pasien->tanggal_lahir}} / ({{$y . " tahun " . $m . " bulan"}})</strong></td></b>
       <td></td>
     </tr>
   </table>
 </div>
</div>
<style type="text/css">
@page {
  <!--
  size: 2cm 8cm;
  margin-left: 0cm;
  margin-top: 0.5cm;
  margin-right: 0cm;
  -->
}
</style>
<script>
  $(document).ready(function(){
    print();
  });
</script>
