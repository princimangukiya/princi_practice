<!DOCTYPE html>
<html lang="en" dir="ltr">
	
<!-- Mirrored from laravel.spruko.com/admitro/Vertical-IconSidedar-Light/index by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Apr 2021 10:22:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Admitro - Laravel Bootstrap Admin Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="keywords" content="laravel admin dashboard, best laravel admin panel, laravel admin dashboard, php admin panel template, blade template in laravel, laravel dashboard template, laravel template bootstrap, laravel simple admin panel,laravel dashboard template,laravel bootstrap 4 template, best admin panel for laravel,laravel admin panel template, laravel admin dashboard template, laravel bootstrap admin template, laravel admin template bootstrap 4"/>

		<!-- Title -->
		<title>Diamond System</title>

		<!--Favicon -->
		<link rel="icon" href="{{asset('T3_Admin_Design/assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

		<!--Bootstrap css -->
		<link href="{{asset('T3_Admin_Design/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

		<!-- Style css -->
		<link href="{{asset('T3_Admin_Design/assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{asset('T3_Admin_Design/assets/css/dark.css')}}" rel="stylesheet" />
		<link href="{{asset('T3_Admin_Design/assets/css/skin-modes.css')}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{asset('T3_Admin_Design/assets/css/animated.css')}}" rel="stylesheet" />

		<!--Sidemenu css -->
       <link href="{{asset('T3_Admin_Design/assets/css/sidemenu.css')}}" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="{{asset('T3_Admin_Design/assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{asset('T3_Admin_Design/assets/css/icons.css')}}" rel="stylesheet" />
            
        <!-- Data Table Css -->
        <link href="{{asset('T3_Admin_Design/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('T3_Admin_Design/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
		<link href="{{asset('T3_Admin_Design/assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
		<!-- Slect2 css -->
		<link href="{{asset('T3_Admin_Design/assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

		<!-- Simplebar css -->
		<link rel="stylesheet" href="{{asset('T3_Admin_Design/assets/plugins/simplebar/css/simplebar.css')}}">

	    <!-- Color Skin css -->
		<link id="theme" href="{{asset('T3_Admin_Design/assets/colors/color1.css')}}" rel="stylesheet" type="text/css"/>
		
		<!-- Switcher css -->
		<link rel="stylesheet" href="{{asset('T3_Admin_Design/assets/switcher/css/switcher.css')}}">
		<link rel="stylesheet" href="{{asset('T3_Admin_Design/assets/switcher/demo.css')}}">

		<!--Package tag css-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/form-select2.min.css') }}"> 

		<!-- INTERNAL File Uploads css -->
		<link href="{{asset('T3_Admin_Design/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
		<!-- INTERNAL File Uploads css-->
		<link href="{{asset('T3_Admin_Design/assets/plugins/fileupload/css/fileupload.css')}}" rel="stylesheet" type="text/css" />

		<!-- INTERNAL Mutipleselect css-->
		<link rel="stylesheet" href="{{asset('T3_Admin_Design/assets/plugins/multipleselect/multiple-select.css')}}">
		<!-- INTERNAL Sumoselect css-->
        <link rel="stylesheet" href="{{asset('T3_Admin_Design/assets/plugins/sumoselect/sumoselect.css')}}">

		<!-- INTERNAL telephoneinput css-->
        <link rel="stylesheet" href="{{asset('T3_Admin_Design/assets/plugins/telephoneinput/telephoneinput.css')}}">

	    <!-- INTERNAL Jquerytransfer css-->
		<link rel="stylesheet" href="{{asset('T3_Admin_Design/assets/plugins/jQuerytransfer/jquery.transfer.css')}}">
		<link rel="stylesheet" href="{{asset('T3_Admin_Design/assets/plugins/jQuerytransfer/icon_font/icon_font.css')}}">

		
		<link rel="stylesheet" href="{{asset('T3_Admin_Design/media/css/jquery.dataTables.min.css')}}">
		</head>

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
										<span class="mr-auto">Default  Mode</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch3" class="onoffswitch2-checkbox" checked>
											<label for="myonoffswitch3" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Dark Mode</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch14" class="onoffswitch2-checkbox" >
											<label for="myonoffswitch14" class="onoffswitch2-label"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Color Skins</h4>
								<div class="skin-body">
									<a class="wscolorcode1 blackborder color1" data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color1.css" href="#"></a>
									<a class="wscolorcode1 blackborder color2" data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color2.css" href="#"></a>
									<a class="wscolorcode1 blackborder color3" data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color3.css" href="#"></a>
									<a class="wscolorcode1 blackborder color4" data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color4.css" href="#"></a>
									<a class="wscolorcode1 blackborder color5" data-theme="https://laravel.spruko.com/admitro/Vertical-IconSidedar-Light/assets/colors/color5.css" href="#"></a>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="swichermainleft">
								<h4>Header Styles Mode</h4>
								<div class="switch_section">
									<div class="switch-toggle d-flex light-switcher">
										<span class="mr-auto">Light Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch10" class="onoffswitch2-checkbox">
											<label for="myonoffswitch10" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex dark-switcher">
										<span class="mr-auto">Dark Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch13" class="onoffswitch2-checkbox">
											<label for="myonoffswitch13" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Color Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch11" class="onoffswitch2-checkbox">
											<label for="myonoffswitch11" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Graident Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch12" class="onoffswitch2-checkbox">
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
											<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch1" class="onoffswitch2-checkbox">
												<label for="myonoffswitch1" class="onoffswitch2-label"></label>
											</div>
										</div>
										<div class="switch-toggle d-flex dark-switcher">
											<span class="mr-auto">Dark Menu</span>
											<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch2" class="onoffswitch2-checkbox">
												<label for="myonoffswitch2" class="onoffswitch2-label"></label>
											</div>
										</div>
										<div class="switch-toggle d-flex">
											<span class="mr-auto">Color Menu</span>
											<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch" class="onoffswitch2-checkbox">
												<label for="myonoffswitch" class="onoffswitch2-label"></label>
											</div>
										</div>
										<div class="switch-toggle d-flex">
											<span class="mr-auto">Gradient-Color Menu</span>
											<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch5" class="onoffswitch2-checkbox">
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
				<!--aside closed-->				<!-- App-Content -->			
				<div class="app-content main-content">
					<div class="side-app">
						<!--app header-->
						@include('T3_layout.header')
						<!--/app header-->												<!--Page header-->
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

		<!-- Jquery js-->
		<script src="{{asset('T3_Admin_Design/assets/js/jquery-3.5.1.min.js')}}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{asset('T3_Admin_Design/assets/js/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Sidemenu js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/sidemenu/sidemenu.js')}}"></script>
		
		<!-- P-scroll js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/p-scrollbar/p-scroll.js')}}"></script>

        
        		<!-- INTERNAL Data tables -->
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/jszip.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/js/datatables.js')}}"></script>

		
		<!--INTERNAL Peitychart js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/peitychart/peitychart.init.js')}}"></script>

		<!-- INTERNAL Clipboard js -->
		<script src="assets/plugins/clipboard/clipboard.min.js"></script>
		<script src="assets/plugins/clipboard/clipboard.js"></script>

		<!-- INTERNAL Prism js -->
		<script src="assets/plugins/prism/prism.js"></script>


		<!--INTERNAL Apexchart js-->
		<script src="{{asset('T3_Admin_Design/assets/js/apexcharts.js')}}"></script>

		<!--INTERNAL ECharts js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/echarts/echarts.js')}}"></script>

<!--INTERNAL Chart js -->
<script src="{{asset('T3_Admin_Design/assets/plugins/chart/chart.bundle.js')}}"></script>
<script src="{{asset('T3_Admin_Design/assets/plugins/chart/utils.js')}}"></script>

<!-- INTERNAL Select2 js -->
<script src="{{asset('T3_Admin_Design/assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('T3_Admin_Design/assets/js/select2.js')}}"></script>

<!--INTERNAL Moment js-->
<script src="{{asset('T3_Admin_Design/assets/plugins/moment/moment.js')}}"></script>

<!--INTERNAL Index js-->
<script src="{{asset('T3_Admin_Design/assets/js/index1.js')}}"></script>

		<!-- INTERNAL File-Uploads Js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
        <script src="{{asset('T3_Admin_Design/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
        <script src="{{asset('T3_Admin_Design/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
        <script src="{{asset('T3_Admin_Design/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{asset('T3_Admin_Design/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

		<!-- INTERNAL File uploads js -->
        <script src="{{asset('T3_Admin_Design/assets/plugins/fileupload/js/dropify.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/js/filupload.js')}}"></script>

		<!-- INTERNAL Multipleselect js -->
		<script src="{{asset('T3_Admin_Design/assets/plugins/multipleselect/multiple-select.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/multipleselect/multi-select.js')}}"></script>

		<!--INTERNAL telephoneinput js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

		<!--INTERNAL jquery transfer js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/jQuerytransfer/jquery.transfer.js')}}"></script>

		<!--INTERNAL multi js-->
		<script src="{{asset('T3_Admin_Design/assets/plugins/multi/multi.min.js')}}"></script>

		<!--INTERNAL Form Advanced Element -->
		<script src="{{asset('T3_Admin_Design/assets/js/formelementadvnced.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/js/form-elements.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/js/file-upload.js')}}"></script>

		<!-- Simplebar JS -->
		<script src="{{asset('T3_Admin_Design/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
		<!-- Custom js-->
		<script src="{{asset('T3_Admin_Design/assets/js/custom.js')}}"></script>

		<!-- Switcher js-->
		<script src="{{asset('T3_Admin_Design/assets/switcher/js/switcher.js')}}"></script>			</body>

		<!-- scanner js -->
		<script src="{{asset('T3_Admin_Design/assets/js/quagga.min.js')}}"></script>
		<script src="{{asset('T3_Admin_Design/assets/js/jquery.js')}}"></script>
		
		<script src="{{asset('T3_Admin_Design/media/js/jquery.dataTables.min.js')}}"></script>

    

<!-- Mirrored from laravel.spruko.com/admitro/Vertical-IconSidedar-Light/index by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Apr 2021 10:24:36 GMT -->
</html>
		