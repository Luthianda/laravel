  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('service.index')}}">
              <i class="bi bi-circle"></i><span>Servis</span>
            </a>
          </li>
          <li>
            <a href="{{route('level.index')}}">
              <i class="bi bi-circle"></i><span>Tingkatan</span>
            </a>
          </li>
        <li>
            <a href="{{route('customer.index')}}">
              <i class="bi bi-circle"></i><span>Pelanggan</span>
            </a>
          </li>
        <li>
            <a href="{{route('user.index')}}">
              <i class="bi bi-circle"></i><span>Pengguna</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('report.index') }}">
          <i class="bi bi-book"></i>
          <span>Report</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('trans.index') }}">
          <i class="bi bi-cash"></i>
          <span>Transaksi</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->
