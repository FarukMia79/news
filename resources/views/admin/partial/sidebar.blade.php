<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{Route('dashboard')}}" class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <!-- Categories -->
        <li class="nav-item">
          <a href="#" class="nav-link {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'subcategory.index' ? 'active' : '' }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Categories
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{Route('category.index')}}" class="nav-link {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Category</p>
                <span class="badge badge-info right">{{DB::table('categories')->get()->count()}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('subcategory.index')}}" class="nav-link {{ Route::currentRouteName() == 'subcategory.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sub Categories</p>
                <span class="badge badge-info right">{{DB::table('subcategories')->get()->count()}}</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- Division -->
        <li class="nav-item">
          <a href="#" class="nav-link {{ Route::currentRouteName() == 'division.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'distric.index' ? 'active' : '' }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Division
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{Route('division.index')}}" class="nav-link {{ Route::currentRouteName() == 'division.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Division</p>
                <span class="badge badge-info right">{{DB::table('divisions')->get()->count()}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('distric.index')}}" class="nav-link {{Route::currentRouteName() == 'distric.index' ? 'active' : '' }} ">
                <i class="far fa-circle nav-icon"></i>
                <p>Distric</p>
                <span class="badge badge-info right">{{DB::table('districs')->get()->count()}}</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- Post -->
        <li class="nav-item">
          <a href="#" class="nav-link {{ Route::currentRouteName() == 'post.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'post.create' ? 'active' : '' }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Post
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{Route('post.create')}}" class="nav-link {{ Route::currentRouteName() == 'post.create' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Post</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('post.index')}}" class="nav-link {{Route::currentRouteName() == 'post.index' ? 'active' : '' }} ">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Post</p>
                <span class="badge badge-info right">{{DB::table('posts')->get()->count()}}</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- Distric -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Setting
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{Route('social.setting')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Social Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('seo.setting')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>SEO Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('namaz.setting')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Prayer Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('livetv.setting')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>LIVE TV Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('notice.setting')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Notice Setting</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ Route::currentRouteName() == 'video.gallery' ? 'active' : '' }} {{ Route::currentRouteName() == 'photo.gallery' ? 'active' : '' }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Gallery
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{Route('photo.gallery')}}" class="nav-link {{ Route::currentRouteName() == 'photo.gallery' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Photo Gallery</p>
                <span class="badge badge-info right">{{DB::table('photos')->get()->count()}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('video.gallery')}}" class="nav-link {{Route::currentRouteName() == 'video.gallery' ? 'active' : '' }} ">
                <i class="far fa-circle nav-icon"></i>
                <p>Video Gallery</p>
                <span class="badge badge-info right">{{DB::table('videos')->get()->count()}}</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Important</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Password Change</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{Route('logout')}}" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

