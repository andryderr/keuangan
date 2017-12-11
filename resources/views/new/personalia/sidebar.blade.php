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
             <a href="{{url('PERSONALIA/dashboard')}}">
               <i class="fa fa-home"></i> <span>Dashboard</span></i>
             </a>
           </li>
           <li class="treeview">
             <a href="{{url('PERSONALIA/Poli')}}">
               <i class="fa fa-forward"></i> <span>Poli</span></i>
             </a>
           </li>
           <li class="treeview">
              <a href="{{url(Auth::user()->poli->prefix.'/jenisDiagnosa')}}">
                <i class="fa fa-stethoscope"></i> <span>Jenis Diagnosa</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{url(Auth::user()->poli->prefix.'/jenisTindakanMedis')}}">
                <i class="fa fa-medkit"></i> <span>Jenis Tindakan Medis</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-md"></i> <span>Data Pegawai</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="/PERSONALIA/Data/Dokter"><i class="fa fa-circle-o"></i> Data Dokter</a></li>
                <li><a href="/PERSONALIA/Data/Petugas"><i class="fa fa-circle-o"></i> Data Petugas Medis</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>