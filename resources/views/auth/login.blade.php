<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RSU Bakti Mulia</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link rel="icon" type="image/png" href="assets/ico/logo.png">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="ok/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="ok/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="ok/css/style.css">
  <link rel="stylesheet" type="text/css" href="ok/css/animate.css">
  <style>
    #myBtn {
      display: none; /* Hidden by default */
      position: fixed; /* Fixed/sticky position */
      bottom: 20px; /* Place the button at the bottom of the page */
      right: 30px; /* Place the button 30px from the right */
      z-index: 99; /* Make sure it does not overlap */
      border: none; /* Remove borders */
      outline: none; /* Remove outline */
      background-color: rgba(12, 184, 182, 0.91); /* Set a background color */
      color: white; /* Text color */
      cursor: pointer; /* Add a mouse pointer on hover */
      padding: 15px; /* Some padding */
      border-radius: 10px; /* Rounded corners */
    }

    #myBtn:hover {
      background-color: #555; /* Add a dark-grey background on hover */
    }
  </style>
</head>
<body id="myPage" style="overflow: hidden;" data-spy="scroll" data-target=".navbar" data-offset="60">
 <section id="banner" class="banner">
  <div class="bg-color">

  </nav>
  <div class="container">
    <div class="row">
     <div class="banner-info">
      <div class="row text-center">
        <div class="banner-logo text-center">
          <div style="width: 15%;height: auto;padding-top: 15%;background: #FFF;border-radius: 50%; position: absolute; left: 42.5%;top: 23%;box-shadow: 3px 0px rgba(255,255,255,0.75);" class="wow bounceInUp"></div>
          <img src="assets/ico/logo.png" class="img-responsive col-md-2 col-xs-2 col-xs-push-5 col-md-push-5 wow bounceInDown">
        </div>
      </div>
      <div class="banner-text text-center">
       <h1 class="white  wow fadeInLeft">Rumah Sakit Bakti Mulia MMC</h1>
       <p class=" wow fadeInRight">Menjadikan Rumah Sakit Umum Bakti Mulia Sebagai Unit Pelayanan Kesehatan Profesional, Terjangkau dan Menjadi Pusat Rujukan Rumah Sakit Dikabupaten Banyuwangi</p>
       <a href="#" onclick="scrollDown();" class="btn btn-appoint col-md-4 col-md-push-4 wow bounceInUp" style="border-radius: 2%"> TO LOGIN</a>
     </div>
   </div>
 </div>
</div>
</div>
</section>
<section id="login" class="section-padding">
  <div class="container">
   <div class="row">
    <div class="col-md-12 text-center">
     <h2 class="ser-title wow bounceInDown">Form Login</h2>
     <hr class="botm-line wow slideInLeft">
   </div>
   <div class="col-md-8 col-md-offset-2">
     <div class="panel" style="background-color:;">
       <div class="panel-heading"></div>
       <div class="panel-body  wow slideInRight">
         <form class="form" role="form" method="POST" action="{{ url('/login') }}">
           {{ csrf_field() }}

           <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
             <label for="username" class="col-md-4 control-label">Username</label>

             <div class="col-md-6">
               <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}">

               @if ($errors->has('username'))
               <span class="help-block">
                 <strong>{{ $errors->first('username') }}</strong>
               </span>
               @endif
             </div>
           </div>
           <br>
           <br>
           <br>
           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
             <label for="password" class="col-md-4 control-label">Password</label>

             <div class="col-md-6">
               <input id="password" type="password" class="form-control" name="password">

               @if ($errors->has('password'))
               <span class="help-block">
                 <strong>{{ $errors->first('password') }}</strong>
               </span>
               @endif
             </div>
           </div>

           <!-- <div class="form-group">
             <div class="col-md-6 col-md-offset-4">
               <div class="checkbox">
                 <label>
                   <input type="checkbox" name="remember"> Ingat Saya
                 </label>
               </div>
             </div>
           </div> -->

           <div class="form-group">
             <div class="col-md-6 col-md-offset-4">
               <button type="submit" class="btn btn-appoint col-md-12">
                 <i class="fa fa-btn fa-sign-in">Login</i>
               </button>

               <!-- <a class="btn btn-link" href="{{ url('/password/reset') }}">Lupa Password?</a> -->
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>
   <hr class="botm-line  wow slideInLeft">
 </div>
</div>
</div>
</div>
</section>
<footer id="footer">
  <div class="top-footer">
   <div class="container">
    <div class="row">
     <div class="col-md-5 col-sm-5 marb20">
       <div class="ftr-tle">
        <h4 class="white no-padding wow fadeInLeft">Tentang Kami</h4>
      </div>
      <div class="info-sec wow fadeInLeft">
        <p style="font-size: 12px;">Rumah Sakit Umum Bakti Mulia merupakan rumah sakit swasta yang murni dikelola oleh PT SARI HUSADA SANTOSO yang berdomisili di Jalan Brawijaya No 46 Muncar Kabupaten Banyuwangi, Rumah Sakit Umum Bakti Mulia dipimpin oleh seorang direktur yang bernama dr Caesar Ardianto, M. Kes yang bertanggung jawab...</p>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 col-md-push-2 marb20">
      <div class="ftr-tle">
       <h4 class="white no-padding wow fadeInRight">Hubungi Kami</h4>
     </div>
     <div class="info-sec">
       <ul class="quick-info wow fadeInRight">
        <li style="font-size: 12px;"><a href="http://www.rsubaktimuliammc.co.id"><i class="fa fa-globe"></i>www.baktimuliammc.co.id </a></li>
        <li style="font-size: 12px;"><a href="index.html"><i class="fa fa-envelope-o"></i>humasrsubaktimuliammc@yahoo.com </a></li>
        <li style="font-size: 12px;"><a href="#service"><i class="fa fa-map-marker"></i>Jalan Bawijaya No 46 Muncar Kabupaten Banyuwangi</a></li>
        <li style="font-size: 12px;"><a href="#contact"><i class="fa fa-phone"></i>+62 878 0219 5135</a></li>
      </ul>
    </div>
  </div>
  <button onclick="topFunction()" id="myBtn" title="Go to top">^</button>
</div>
</div>
</div>
<div class="footer-line">
 <div class="container">
  <div class="row" style="margin-top: -20px;">
   <div class="col-md-12 text-center wow bounceInDown">
    © Copyright Rumah Sakit Bakti Mulia MMC
    <div class="credits">

      <!-- Designed by <a href="https://linkedin.me/">BootstrapMade</a> -->
    </div>
  </div>
</div>
</div>
</div>
</footer>

<script src="ok/js/jquery.min.js"></script>
<script src="ok/js/jquery.easing.min.js"></script>
<script src="ok/js/bootstrap.min.js"></script>
<script src="ok/js/custom.js"></script>
<script src="ok/js/wow.min.js"></script>
<script>
  new WOW().init();
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      $('#myBtn').fadeIn(2000);
        // $('#myBtn').addClass('wow fadeInRight');
        // document.getElementById("myBtn").style.display = "block";
      } else {
        $('#myBtn').fadeOut(1000);
        // document.getElementById("myBtn").style.display = "none";
      }
    }

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    // document.body.scrollTop = 0; // For Chrome, Safari and Opera 
    // document.documentElement.scrollTop = 0; // For IE and Firefox
    $('html,body').animate({scrollTop:0},800);
    $('#myBtn').animate({bottom:'50px'},'slow');
  }
  function scrollDown(){
    $('html,body').animate({scrollTop:810},800);
    $('#myBtn').animate({bottom:'20px'},'slow');
  }
</script>
<!-- <script src="ok/contactform/contactform.js"></script> -->

</body>
</html>