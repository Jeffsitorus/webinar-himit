<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand" href="#">
        <img src="/assets/favicon/laravel-32x32.png" class="navbar-brand-img" alt="..."> Laravel 7
      </a>
      <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link{{ request()->is('posts') ? ' active' : '' }}" href="{{ route('posts.index') }}">
              <i class="ni ni-archive-2 text-default"></i>
              <span class="nav-link-text">Posts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('categories') ? ' active' : '' }}" href="{{ route('categories.index') }}">
              <i class="ni ni-align-left-2 text-default"></i>
              <span class="nav-link-text">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('tags') ? ' active' : '' }}" href="{{ route('tags.index') }}">
              <i class="ni ni-tag text-default"></i>
              <span class="nav-link-text">Tags</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="ni ni-button-power text-default"></i>
              <span class="nav-link-text">Logout</span>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>