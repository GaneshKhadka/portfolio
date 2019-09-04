<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{route('admin.dashboard')}}" class="simple-text logo-normal">
            Admin Dashboard
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{Request::is('admin/dashboard*') ? 'active' : ''}}  ">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/slider*') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('slider.index')}}">
                    <i class="material-icons">slideshow</i>
                    <p>Slider</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('admin/category*') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Category</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('admin/project*') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('project.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Projects</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('admin/requestproject*') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('requestproject.index')}}">
                    <i class="material-icons">double_arrow</i>
                    <p>Requested project</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('admin/contact*') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('contact.index')}}">
                    <i class="material-icons">message</i>
                    <p>Contact message</p>
                </a>
            </li>

        </ul>
    </div>
</div>