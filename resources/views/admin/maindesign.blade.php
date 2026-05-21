<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header-->
             <a href="{{route('index')}}" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary"></strong><strong>Admin</strong></div>
        
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            
          
           
            
            <!-- Log out -->
            <div class="list-inline-item logout">  
                <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>                
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"> <img src="{{ asset('frontend/images/CS.png') }}" alt="Logo" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">ADMIN</h1>
            <p>Cea is Boutique</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">HOME</span>
        <ul class="list-unstyled">
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Category </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{route('admin.addcategory')}}">Add Category</a></li>
                    <li><a href="{{route('admin.viewcategory')}}">View Category</a></li>
                    
                  </ul>
                </li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>PRODUCT </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{route('admin.addproduct')}}">ADD PRODUCT</a></li>
                    <li><a href="{{route('admin.viewproduct')}}">VIEW PRODUCT</a></li>
                    <li><a href="{{route('admin.vieworders')}}">VIEW ORDER</a></li>
                  </ul>
                </li>
               
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Admin Dashboard</h2>
          </div>
        </div>
        
        <section class="no-padding-top no-padding-bottom">
          @yield('dashboard')

          @yield('addcategory')
          @yield('view_category')
          @yield('update_category')
          @yield('addproduct')
          @yield('update_product')
          @yield('view_orders')
        </section>
        <!-- end of all sections -->
       
    <!-- JavaScript files-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/js/front.js') }}"></script>
  </body>
</html>