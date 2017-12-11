      <aside class="main-sidebar wow fadeInLeft" style="box-shadow: 2px 2px rgba(150,150,150,0.75);">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <ul class="sidebar-menu" >
            <li class="header">MAIN NAVIGATION</li>
              <form action="#" method="post" class="sidebar-form">
          </form>
            <li class="treeview" id="PendaftaranPasien">
              <a href="#" onclick="setSatu('PendaftaranPasien');">
                <i class="fa  fa-wheelchair"></i> <span>Pendaftaran Pasien</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="Pendaftaran" onclick="setDua('Pendaftaran');"><a href="{{url(Auth::user()->poli->prefix.'/pendaftaran')}}"><i class="fa fa-circle-o"></i> Pendaftaran</a></li>
                <li id="DataPendaftaran" onclick="setDua('DataPendaftaran');"><a href="{{url(Auth::user()->poli->prefix.'/dashboard')}}"><i class="fa fa-circle-o"></i> Data Pendaftaran</a></li>
                <li id="sDataPasien" onclick="setDua('sDataPasien');"><a href="{{url(Auth::user()->poli->prefix.'/pasien')}}"><i class="fa fa-circle-o"></i> Data Pasien</a></li>
              </ul>
            </li>
            <li class="treeview" id="DataPasien">
              <a href='#' onclick="setSatu('DataPasien');">
                <i class="fa fa-heartbeat"></i> <span>Data Pasien</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="PasienDirawat" onclick="setDua('PasienDirawat');"><a href="{{url(Auth::user()->poli->prefix.'/dataPasien/pasienDirawat')}}"><i class="fa fa-circle-o"></i>Pasien Dirawat</a></li>
                <!-- <li><a href="{{url(Auth::user()->poli->prefix.'/dataPasien/pasienKeluar')}}"><i class="fa fa-circle-o"></i>Pasien Keluar</a></li> -->
              </ul>
            </li>
            <li class="treeview" id="jenisDiagnosa">
              <a href="{{url(Auth::user()->poli->prefix.'/jenisDiagnosa')}}" onclick="setSatu('jenisDiagnosa');setDua('jenisDiagnosa');">
                <i class="fa fa-stethoscope"></i> <span>Jenis Diagnosa</span>
              </a>
            </li>
            <li class="treeview" id="jenisTindakanMedis">
              <a href="{{url(Auth::user()->poli->prefix.'/jenisTindakanMedis')}}" onclick="setSatu('jenisTindakanMedis');setDua('jenisTindakanMedis');">
                <i class="fa fa-medkit"></i> <span>Jenis Tindakan Medis</span>
              </a>
            </li>
            <li class="treeview" id="RekapanPasien">
              <a href="#" onclick="setSatu('RekapanPasien');">
                <i class="fa fa-search"></i> <span>Rekapan Pasien</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="PasienKeluar" onclick="setDua('PasienKeluar');"><a href="{{url(Auth::user()->poli->prefix.'/pasien/data/keluar')}}"><i class="fa fa-circle-o"></i>Pasien Keluar</a></li>
                <li id="PasienSedangDirawat" onclick="setDua('PasienSedangDirawat');"><a href="{{url(Auth::user()->poli->prefix.'/pasien/data/dirawat')}}"><i class="fa fa-circle-o"></i> Pasien Sedang Dirawat</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>