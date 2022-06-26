<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('product.index') }}">PC Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse pull-right" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('product.shoppingCart') }}"><i class="fa fa-shopping-cart"></i> Shopping Cart
          <span class="badge badge-secondary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-users"></i> User Management
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(Auth::check())
            <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user"></i>{{ Auth::user()->name }} - Profile</a>
            <a class="dropdown-item" href="{{ route('user.logout') }}"><i class="fa fa-sign-out"></i>Logout</a>
          @else
            <a class="dropdown-item" href="{{ route('user.signup') }}"><i class="fa fa-pencil-square-o"></i>SignUp</a>
            <a class="dropdown-item" href="{{ route('user.signin') }}"><i class="fa fa-sign-in"></i>SignIn</a>
          @endif
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </div>
</nav>
