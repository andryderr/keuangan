      <aside class="main-sidebar  wow fadeInLeft">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
              <form action="#" method="post" class="sidebar-form">
            
          </form>
            <li class="treeview" id="PendaftaranPasien">
              <a href="#" onclick="setSatu('PendaftaranPasien');">
                <i class="fa fa-users"></i> <span>Pendaftaran Pasien</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="Pendaftaran" onclick="setDua('Pendaftaran');"><a href="/PENDAF/pendaftaran"><i class="fa fa-circle-o"></i> Pendaftaran</a></li>
                <li id="DataPendaftaran" onclick="setDua('DataPendaftaran');"><a href="/PENDAF/dashboard"><i class="fa fa-circle-o"></i> Data Pendaftaran</a></li>
                <li id="DataPasien" onclick="setDua('DataPasien');"><a href="/PENDAF/pasien"><i class="fa fa-circle-o"></i> Data Pasien</a></li>
              </ul>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>