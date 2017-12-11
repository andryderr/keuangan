      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
              <form action="#" method="post" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="cari" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
           <li class="treeview">
             <a href="{{url(Auth::user()->poli->prefix.'/dashboard')}}">
               <i class="fa fa-home"></i> <span>Dashboard</span>
             </a>
           </li>
            <li class="treeview">
              <a href=>
                <i class="fa fa-heartbeat"></i> <span>Data Pasien</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url(Auth::user()->poli->prefix.'/dataPasien/pasienDirawat')}}"><i class="fa fa-circle-o"></i>Pasien Layanan Penunjang</a></li>
                <li><a href="{{url(Auth::user()->poli->prefix.'/dataPasien/pasienKeluar')}}"><i class="fa fa-circle-o"></i>Pasien Keluar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-md"></i> <span>Data Pegawai</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url(Auth::user()->poli->prefix.'/dataDokter')}}"><i class="fa fa-circle-o"></i> Data Dokter</a></li>
                <li><a href="{{url(Auth::user()->poli->prefix.'/dataPetugasMedis')}}"><i class="fa fa-circle-o"></i> Data Petugas Medis</a></li>
                <!-- <li><a href="/LAYANAN/operatorLayanan"><i class="fa fa-circle-o"></i> Data Operator Layanan</a></li> -->
              </ul>
            </li>
            <li class="treeview">
              <a href="{{url(Auth::user()->poli->prefix.'/jenisPemeriksaan')}}">
                <i class="fa fa-stethoscope"></i> <span>Jenis Pemeriksaan</span>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>