<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RSU Bakti Mulia</title>
  <link rel="icon" type="image/png" href="{{url('assets/ico/logo.png')}}">`
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{url('../bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('../assets/font-awesome/css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{url('/assets/font-awesome/css/font-awesome.min.css')}}">
  <meta name="csrf-token" content="{{ Session::token() }}"> 
  <!-- SWEETALERT -->
  <link rel="stylesheet" href="{{url('../assets/sweetalert/sweetalert.css')}}">

  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="{{url('/dist/css/skins/_all-skins.min.css')}}">
      <!-- iCheck -->
      <link rel="stylesheet" href="{{url('/plugins/iCheck/all.css')}}">
      <!-- Morris chart -->
      <link rel="stylesheet" href="{{url('/plugins/morris/morris.css')}}">
      <!-- jvectormap -->
      <link rel="stylesheet" href="{{url('/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
      <!-- Date Picker -->
      <link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{url('/plugins/daterangepicker/daterangepicker-bs3.css')}}">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="{{url('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
      <!-- CKEDITOR -->
      <!-- Date Time Picker -->
      <link rel="stylesheet" href="{{url('/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}">
      <!-- DataTables -->
      <link rel="stylesheet" href="{{url('/plugins/datatables/dataTables.bootstrap.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('ok/css/animate.css')}}">
      <script src="{{url('/assets/js/jQuery-2.1.4.min.js')}}"></script>
    </head>
    <body class="hold-transition skin-green-light fixed sidebar-mini">
      @yield('content')

      @if(Auth::user()->poli->prefix != 'PENDAF'  && Auth::user()->poli->prefix != 'KASIR')
      <script>
        var audio = new Audio("{{url('assets/audio/notif_1.mp3')}}");
        function getData(){
          url1 = "{{url('G/Pendaftaran/Baru1/')}}/{{Auth::user()->id_poli}}/"+localStorage['jml'];
          url = "{{url('G/Pendaftaran/Baru/')}}/{{Auth::user()->id_poli}}";
        // alert(url1);
        $.getJSON(url1,function(result2){
          budg = Number($("#myBudge").html());
          // alert(budg);
          // alert(result2);
          if (result2 == 1) {
            audio.play();
            bdg = Number(budg)+1;
            $("#myBudge").html(bdg);
            apd = "<li class='user-body'><a href='{{url(Auth::user()->poli->prefix.'/dashboard')}}'>";
            apd += "<div class='pull-left'>";
            apd += "Pasien Baru";
            apd += "</div></a></li>";
            $("#notification").append(apd);
            localStorage['budg'] +=1;
          }
          localStorage['budg'] = budg;
        });
        $.getJSON(url,function(result){
          localStorage['jml'] = result;
        });
        // console.log(localStorage['jml']);
        setTimeout(getData,15000);
      }
      $(document).ready(function(){
        url = "{{url('G/Pendaftaran/Baru/')}}/{{Auth::user()->id_poli}}";
        $.getJSON(url,function(result){
          var stored = localStorage['jml'];
          // alert(result);
          if (!stored) {
            localStorage['jml'] = result;
          }
          // alert(localStorage['budg']);
          // alert(localStorage['budg']);
          if (localStorage['budg'] > 1) {
            $("#myBudge").html(localStorage['budg']);
            for(var i = 0; i<=localStorage['budg'];i++){
              apd = "<li class='user-body btn btn-default' style='width:300px;'><a href='{{url(Auth::user()->poli->prefix.'/dashboard')}}'>";
              apd += "";
              apd += "Pasien Baru";
              apd += "</a></li>";
              $("#notification").append(apd);
            }
          }
        });
        getData();
      });

    </script>
    @endif
    <script>
      function setBack(){
        localStorage['back'] = document.URL;
      }
      var month = new Array();
      month[0] = "Januari";
      month[1] = "Februari";
      month[2] = "Maret";
      month[3] = "April";
      month[4] = "Mei";
      month[5] = "Juni";
      month[6] = "Juli";
      month[7] = "Agustus";
      month[8] = "September";
      month[9] = "Oktober";
      month[10] = "November";
      month[11] = "Desember";
      function setWaktu(){
        date = new Date();
        d = date.getDate();
        // console.log(d);
        m = month[date.getMonth()];
        y = date.getFullYear();
        h = date.getHours();
        i = date.getMinutes();
        s = date.getSeconds();
        dat = d+" "+m+" "+y+"  "+h+":"+i+":"+s;
        $("#tanggalan").html(dat);
        setTimeout(setWaktu,1000);
      }
      setWaktu();
    </script>
    <script type="text/javascript">
      function hidupmati()
      {
        if (document.getElementById("pasienBaruLama").value == "BARU") {
          document.getElementById("norm").disabled='true';
        } else {
          document.getElementById("norm").disabled='';
        }

        if (document.getElementById("caramasuk").value == "datang sendiri") {
          document.getElementById("rujukan").disabled='true';
          document.getElementById("perujuk").disabled='true';
        } else {
          document.getElementById("rujukan").disabled='';
          document.getElementById("perujuk").disabled=''
        }

        if (document.getElementById("tujuanPoli").value == "ugd") {
          document.getElementById("namapoli").disabled='true';
        } else if (document.getElementById("tujuanPoli").value == "poli"){
          document.getElementById("namapoli").disabled='';
        }
      }
    </script>

    <!-- Bootstrap 3.3.5 -->
    <script src="{{url('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- moment js -->
    <script src="{{url('/plugins/moment-develop/min/moment.min.js')}}"></script>
    <!-- datepicker -->
    <script src="{{url('/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript">
      $(function () {
        $('#tanggalwaktu').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss',
        });
        $('#tanggalwaktu1').datetimepicker({
          format: 'DD-MM-YYYY HH:mm:ss',
        });
        $('#tanggalwaktu2').datetimepicker({
          format: 'DD-MM-YYYY HH:mm:ss',
        });
        $('#tanggal1').datetimepicker({
          format: 'YYYY-MM-DD',
        });
        $('#tanggal2').datetimepicker({
          format: 'YYYY-MM-DD',
        });
        $('#tanggalwaktukasmasuk').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss',
        });
        $('#tanggalwaktukaskeluar').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss',
        });
        $('#rangetanggal').daterangepicker();
        $('#rangetanggaltambah').daterangepicker();
      });
    </script>
    <!-- Date Time Picker -->
    <script type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/assets/js/app.min.js')}}"></script>
    <!-- SWEETALERT -->
    <script src="{{url('/assets/sweetalert/sweetalert.min.js')}}"></script>
    <!-- Searching -->
    <script type="text/javascript" async="" src="{{url('../assets/js/search.js')}}"></script>
    <!-- zebra date -->
    <script src="{{url('/plugins/Zebra_Datepicker-master/public/javascript/zebra_datepicker.js')}}" type="text/javascript"></script>
    <link href="{{url('/plugins/Zebra_Datepicker-master/public/css/metallic.css')}}" rel="stylesheet" type="text/css">
    <!-- datatables -->
    <!-- daterange -->
    <script src="{{url('/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- DataTables -->
    <script src="{{url('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{url('/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- <script src="{{url('/ok/js/wow.min.js')}}"> -->

    </script>
    <script>
      // new WOW().init();
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable( {
          "scrollX": true,
          responsive : true,
          "ordering" : false
        } );
      } );
    </script>

    <script type="text/javascript">
      function setSatu(id){
        localStorage['ssatu'] = localStorage['satu'];
        localStorage['satu'] = id;
      }
      function setDua(id){
        localStorage['sdua'] = localStorage['dua'];
        localStorage['dua'] = id;
      }
      $(document).ready(function() {
        $('#pilih').DataTable();
        $('#'+localStorage['satu']).addClass('active');
        $('#'+localStorage['dua']).addClass('active');
        $('#'+localStorage['ssatu']).removeClass('active');
        $('#'+localStorage['sdua']).removeClass('active');
        // alert(localStorage['satu']);
      } );

      $(document).ready(function() {
        $('#pilih1').DataTable();
      } );
    </script>
    <script>
     //iCheck for checkbox and radio inputs
     $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    // $('.sidebar ul li').hover(function() {
    //   $(this).children('ul').stop(true, false, true).slideToggle(300);
    // });
  </script>
</body>  
</html>