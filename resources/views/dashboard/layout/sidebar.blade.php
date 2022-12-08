<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard') ?  'active' : ''}}" aria-current="page" href="/">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/barang*') ?  'active' : ''}}" href="/dashboard/barang">
              Barang
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/transaksi*') ?  'active' : ''}}" href="/dashboard/transaksi">
              Transaksi
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/penjualan*') ?  'active' : ''}}" href="/dashboard/penjualan">
              Penjualan
            </a>
          </li>                      
          
          
        </ul> 
      </div>
    </nav>