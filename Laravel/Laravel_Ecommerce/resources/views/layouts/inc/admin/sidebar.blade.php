<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('admin/dashboard')}}">
          <i class="mdi mdi-speedometer menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/orders') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('admin/orders')}}">
          <i class="mdi mdi-sale menu-icon"></i>
          <span class="menu-title">Đơn hàng</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/category') ? 'active' : ''}}">
        <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-view-list menu-icon"></i>
          <span class="menu-title">Danh Mục</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse " id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category/create')}}"> Thêm Danh Mục </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category')}}"> Xem Danh Mục</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ Request::is('admin/products') ? 'active' : ''}}">
        <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-plus-circle menu-icon"></i>
          <span class="menu-title">Sản Phẩm</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse " id="products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products/create')}}"> Thêm Sản Phẩm </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products')}}"> Xem Sản Phẩm</a></li>
          </ul>
        </div>
      </li>
     
      <li class="nav-item {{ Request::is('admin/brands') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/brands')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Thương Hiệu</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/colors') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/colors')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Màu</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/settings') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/settings')}}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Setting</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/users')}}" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('admin/sliders')}}">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Home Slide</span>
        </a>
      </li>
    </ul>
  </nav>