<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{url('../bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('../assets/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{url('/assets/font-awesome/css/font-awesome.min.css')}}">
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
    <script src="{{url('/assets/js/jQuery-2.1.4.min.js')}}"></script>
  
  </head>
  <body class="hold-transition skin-green-light fixed sidebar-mini">
        @yield('content')
  
      


   <!-- jQuery 2.1.4 -->
    <!-- Hidup Mati No RM -->
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
            $('#jam_kunjung').daterangepicker({
                format: 'YY-MM-DD',
            });
            $('#jam_kerja').daterangepicker({
                format: 'H:i',
            });
        });
    </script>
    <!-- Date Time Picker -->
    <script type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/assets/js/app.min.js')}}"></script>
      <!-- zebra date -->
    <script src="{{url('/plugins/Zebra_Datepicker-master/public/javascript/zebra_datepicker.js')}}" type="text/javascript"></script>
    <link href="{{url('/plugins/Zebra_Datepicker-master/public/css/metallic.css')}}" rel="stylesheet" type="text/css">
    <!-- datatables -->
     <!-- DataTables -->
    <script src="{{url('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/plugins/daterangepicker/daterangepicker.js')}}"></script>
     <script src="{{url('/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{url('/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
     <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                "scrollX": true,
                responsive : true
            } );
        } );
    </script>


</body>  
</html>