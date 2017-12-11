@extends('cetak.head')
<link rel="stylesheet" href="{{url('../assets/cetak/cetak_antrian.css')}}">
@section('content')
<div class="batas">
  <div class="bgjudul">
    <div class="judul">
      <h4><label><strong>Nomer Antrian</strong></label></h4>
      <hr>
      <div class="rs">
        RUMAH SAKIT UMUM BAKTI MULIA - MMC
      </div>
      <div class="alamat">
        Jl. BRAWIJAYA NO. 46-48 MUNCAR Telp.(0333)-590001, HP:0852 597 025 24/ 0878 579 844 50
        <br>61451 BANYUWANGI
      </div>
      <div id="jenis_berobat">{{$data[0]->pendaftaran->jenis_kepesertaan}}</div>
      <div id="no_antrian">{{$data[0]->pendaftaran->no_antri}}</div>
      <div id="poli">{{$data[0]->poli->nama_poli}}</div>
    </div>
    <div id="tanggal">
      <?php 
      $tanggal = date('d-m-Y h:m:s');
      $day = date('D', strtotime($tanggal));
      $dayList = array(
      'Sun' => 'Minggu',
      'Mon' => 'Senin',
      'Tue' => 'Selasa',
      'Wed' => 'Rabu',
      'Thu' => 'Kamis',
      'Fri' => 'Jumat',
      'Sat' => 'Sabtu'
      );
      ?>
      <label>{{$dayList[$day].", "."{$tanggal}"}}</label>

      <div>Terima Kasih Anda Telah Tertib</div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    print();
  });
</script>
@endsection

