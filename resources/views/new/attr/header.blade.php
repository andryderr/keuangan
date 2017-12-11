  <header class="main-header  fixed">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">&nbsp;&nbsp;&nbsp;SIRS<b>
      </b> Bakti Mulia</span>
      <span style="width: 35px;height:35px;top:8px;left: 10px;background: #FFF;border-radius: 50%; position: fixed;">
      <img src="{{url('assets/ico/logo.png')}}" width="30px" style="top: 10px;left: 12px;position: fixed;">
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="pull-left">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span id="tanggalan"></span>
            </a>
          </li>
          @if(Auth::user()->poli->prefix != 'PENDAF' && Auth::user()->poli->prefix != 'KASIR')
          <li class="dropdown user user-menu" onclick="localStorage['budg'] = 0;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-globe"></i>
              <span class="button__badge" id="myBudge"></span>
            </a>
            <ul class="dropdown-menu" id="notification">

            </ul>
          </li>
          @endif
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{('/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">Welcome {{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{('/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                <p>
                 {{Auth::user()->name}}
                 <small>Petugas {{Auth::user()->poli->nama_poli}}</small>
               </p>
             </li>
             <li class="user-footer">
              <div class="pull-right">
                <a href="{{url(Auth::user()->poli->prefix.'/gantiPassword')}}"><button type="button" class="btn btn-default btn-flat">Ganti Password</button></a>
                <a href="{{url('logout')}}"><button type="button" class="btn btn-default btn-flat" onclick="localStorage['jml'] = 0;">Sign out</button></a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-user"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

