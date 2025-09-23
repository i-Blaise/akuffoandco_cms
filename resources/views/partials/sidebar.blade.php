<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="images/faces/default.jpg">
          </div>
          <div class="user-name">
              {{ auth()->user()->name }}
          </div>
          <div class="user-designation">
              {{-- Admin --}}
          </div>
        </div>
        <ul class="nav">
          {{-- <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#case-study" aria-expanded="false" aria-controls="case-study">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Case Study</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="case-study">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href={{ route('add-case-study') }}>Add Case Study</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('list-case-studies') }}">List of Case Studies</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Blog</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('add-blog-post') }}">Add Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('list-blog-posts') }}">List of Blogs</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
