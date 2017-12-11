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
                <i class="fa fa-home"></i><span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{url(Auth::user()->poli->prefix.'/posting')}}">
                <i class="fa fa-check"></i><span>Posting</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{url(Auth::user()->poli->prefix.'/jurnalUmum')}}">
                <i class="fa fa-list-alt"></i><span>Jurnal Umum</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>