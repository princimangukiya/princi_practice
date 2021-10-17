@include('header_css')

<body class="app sidebar-mini">

    <!-- Start Switcher -->
    <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="demo-icon bg_dark"><i class="fa fa-cog fa-spin  text_primary"></i></div>
            <div class="form_holder switcher-sidebar">
                <div class="row">
                    <div class="predefined_styles">

                        <div class="swichermainleft">
                            <h4>Skin Modes</h4>
                            <div class="switch_section">
                                <div class="switch-toggle d-flex">
                                    <span class="mr-auto">Default Mode</span>
                                    <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                            id="myonoffswitch3" class="onoffswitch2-checkbox" checked>
                                        <label for="myonoffswitch3" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                                <div class="switch-toggle d-flex">
                                    <span class="mr-auto">Dark Mode</span>
                                    <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                            id="myonoffswitch14" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch14" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Color Skins</h4>
                            <div class="skin-body">
                                <a class="wscolorcode1 blackborder color1"
                                    data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color1.css"
                                    href="#"></a>
                                <a class="wscolorcode1 blackborder color2"
                                    data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color2.css"
                                    href="#"></a>
                                <a class="wscolorcode1 blackborder color3"
                                    data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color3.css"
                                    href="#"></a>
                                <a class="wscolorcode1 blackborder color4"
                                    data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color4.css"
                                    href="#"></a>
                                <a class="wscolorcode1 blackborder color5"
                                    data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color5.css"
                                    href="#"></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="swichermainleft">
                            <h4>Header Styles Mode</h4>
                            <div class="switch_section">
                                <div class="switch-toggle d-flex light-switcher">
                                    <span class="mr-auto">Light Menu</span>
                                    <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                            id="myonoffswitch10" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch10" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                                <div class="switch-toggle d-flex dark-switcher">
                                    <span class="mr-auto">Dark Menu</span>
                                    <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                            id="myonoffswitch13" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch13" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                                <div class="switch-toggle d-flex">
                                    <span class="mr-auto">Color Menu</span>
                                    <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                            id="myonoffswitch11" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch11" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                                <div class="switch-toggle d-flex">
                                    <span class="mr-auto">Graident Menu</span>
                                    <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                            id="myonoffswitch12" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch12" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="skin-theme-switcher">
                            <div class="swichermainleft">
                                <h4>Leftmenu Styles Mode</h4>
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex light-switcher">
                                        <span class="mr-auto">Light Menu</span>
                                        <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch1" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch1" class="onoffswitch2-label"></label>
                                        </div>
                                    </div>
                                    <div class="switch-toggle d-flex dark-switcher">
                                        <span class="mr-auto">Dark Menu</span>
                                        <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch2" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch2" class="onoffswitch2-label"></label>
                                        </div>
                                    </div>
                                    <div class="switch-toggle d-flex">
                                        <span class="mr-auto">Color Menu</span>
                                        <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch" class="onoffswitch2-label"></label>
                                        </div>
                                    </div>
                                    <div class="switch-toggle d-flex">
                                        <span class="mr-auto">Gradient-Color Menu</span>
                                        <div class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch5" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch5" class="onoffswitch2-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->

    <!---Global-loader-->

    <!--- End Global-loader-->
    <!-- Page -->
    <div class="page">
        <div class="page-main">
            @include('T3_layout.leftside')
            <!--aside closed-->
            <!-- App-Content -->
            <div class="app-content main-content">
                <div class="side-app">
                    <!--app header-->
                    @include('T3_layout.header')
                    <!--/app header-->
                    <!--Page header-->
                    @yield('content')
                </div>
            </div>
            <!-- End app-content-->
        </div>
        @include('T3_layout.footer')
        <!-- End Footer-->
    </div><!-- End Page -->
    <!-- Back to top -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                alert("{{ $error }}");
            </script>
        @endforeach
    @endif
    <a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- Jquery js-->
    @include('footer_js')
