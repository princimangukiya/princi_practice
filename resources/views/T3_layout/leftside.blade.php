
<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <!-- <a class="header-brand" href="index.html">
            <img src="{{ asset(session("c_img_url")) }}" class="header-brand-img desktop-logo" alt="{{session('c_name')}}">
            <img src="{{ asset(session("c_img_url")) }}" class="header-brand-img dark-logo" alt="{{session('c_name')}}">
            <img src="{{ asset(session("c_img_url")) }}" class="header-brand-img mobile-logo" alt="{{session('c_name')}}">
            <img src="{{ asset(session("c_img_url")) }}" class="header-brand-img darkmobile-logo" alt="{{session('c_name')}}">
        </a> -->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{ asset(session("c_img_url")) }}" alt="user-img" class="avatar-xl rounded-circle mb-1">
            </div>
            <div class="user-info">
                <h5 class=" mb-1"> <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
                <span class="text-muted app-sidebar__user-name text-sm">{{session('c_name')}}</span>
            </div>
        </div>
        <div class="sidebar-navs">
            <ul class="nav nav-pills-circle">
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Support">
                    <a class="icon" href="index-2.html#" >
                        <i class="las la-life-ring header-icons"></i>
                    </a>
                </li>
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Documentation">
                    <a class="icon" href="index-2.html#">
                        <i class="las  la-file-alt header-icons"></i>
                    </a>
                </li>
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Projects">
                    <a href="index-2.html#" class="icon">
                        <i class="las la-project-diagram header-icons"></i>
                    </a>
                </li>
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Settins">
                    <a class="icon" href="index-2.html#">
                        <i class="las la-cog header-icons"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <ul class="side-menu app-sidebar3">
        <li class="side-item side-item-category mt-4">Main</li>
        <li class="slide">
            <a class="side-menu__item" href="#" >
                
            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
            <span class="side-menu__label">Dashboard</span><span class="badge badge-danger side-badge">Admin</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="/supplier" >
            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
            <span class="side-menu__label">Supplier</span></a>
            <!--<ul class="slide-menu">
                <li><a href="widgets-2.html" class="slide-item">Chart Widgets</a></li>
                <li><a href="widgets-1.html" class="slide-item">Widgets</a></li>
            </ul>-->
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="/manager">
            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
            <span class="side-menu__label">Manager</span></a>
           <!-- <ul class="slide-menu">
                <li><a href="maps2.html" class="slide-item">Leaflet Maps</a></li>
                <li><a href="maps3.html" class="slide-item">Mapel Maps</a></li>
                <li><a href="maps.html" class="slide-item">Vector Maps</a></li>
            </ul>-->
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="/diamond">
            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
            <span class="side-menu__label">Diamond Purchase</span></a>
            <!--<ul class="slide-menu">
                <li><a href="widgets-2.html" class="slide-item">Chart Widgets</a></li>
                <li><a href="widgets-1.html" class="slide-item">Widgets</a></li>
            </ul>-->
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="/working_stock" >
            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/></svg>
            <span class="side-menu__label">Working Stock</span></a>
                <!--<ul class="slide-menu">
                <li><a href="widgets-2.html" class="slide-item">Chart Widgets</a></li>
                <li><a href="widgets-1.html" class="slide-item">Widgets</a></li>
            </ul>-->
        </li>
        <!--<ul class="slide-menu">
                <li><a href="widgets-2.html" class="slide-item">Chart Widgets</a></li>
                <li><a href="widgets-1.html" class="slide-item">Widgets</a></li>
            </ul>-->

        <li class="slide">
             <a class="side-menu__item" href="/ready_stock">
            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 15v4H5v-4h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zM7 18.5c-.82 0-1.5-.67-1.5-1.5s.68-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM19 5v4H5V5h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zM7 8.5c-.82 0-1.5-.67-1.5-1.5S6.18 5.5 7 5.5s1.5.68 1.5 1.5S7.83 8.5 7 8.5z"/></svg>
            <span class="side-menu__label">Ready Stock</span></a>
                        <!--<ul class="slide-menu">
                        <li><a href="widgets-2.html" class="slide-item">Chart Widgets</a></li>
                        <li><a href="widgets-1.html" class="slide-item">Widgets</a></li>
                </ul>-->
        </li>
        
        

        
        <!--<li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M17.73 12.02l3.98-3.98c.39-.39.39-1.02 0-1.41l-4.34-4.34c-.39-.39-1.02-.39-1.41 0l-3.98 3.98L8 2.29C7.8 2.1 7.55 2 7.29 2c-.25 0-.51.1-.7.29L2.25 6.63c-.39.39-.39 1.02 0 1.41l3.98 3.98L2.25 16c-.39.39-.39 1.02 0 1.41l4.34 4.34c.39.39 1.02.39 1.41 0l3.98-3.98 3.98 3.98c.2.2.45.29.71.29.26 0 .51-.1.71-.29l4.34-4.34c.39-.39.39-1.02 0-1.41l-3.99-3.98zM12 9c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-4.71 1.96L3.66 7.34l3.63-3.63 3.62 3.62-3.62 3.63zM10 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2 2c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2-4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2.66 9.34l-3.63-3.62 3.63-3.63 3.62 3.62-3.62 3.63z"/></svg>
            <span class="side-menu__label">Utilities</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="elements-border.html" class="slide-item"> Border</a></li>
                <li><a href="element-colors.html" class="slide-item"> Colors</a></li>
                <li><a href="elements-display.html" class="slide-item"> Display</a></li>
                <li><a href="element-flex.html" class="slide-item"> Flex Items</a></li>
                <li><a href="element-height.html" class="slide-item"> Height</a></li>
                <li><a href="elements-margin.html" class="slide-item"> Margin</a></li>
                <li><a href="elements-paddning.html" class="slide-item"> Padding</a></li>
                <li><a href="element-typography.html" class="slide-item"> Typhography</a></li>
                <li><a href="element-width.html" class="slide-item"> Width</a></li>
            </ul>
        </li>-->
        
    </ul>
</aside>