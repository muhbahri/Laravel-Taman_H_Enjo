<header class="header_section">
  <div class="container">
     <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo2.png" alt="#" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav">
              <li class="nav-item active">
                 <a class="nav-link" href="{{url('/')}}">Beranda <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="{{url('produk')}}" >Produk</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="{{url('show_cart')}}"> Keranjang</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="{{url('show_order')}}"> Order</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                </button>
             </form>
             @if (Route::has('login'))
             @auth
             <ul class="navbar-nav ml-auto ml-md-0">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                  </div>
              </li>
          </ul>
              @else
              <li>
               <a class="btn btn-danger" href="{{ route('login') }}">Login/Register</a>
            </li>
              @endauth
              @endif
           </ul>
        </div>
     </nav>
  </div>
</header>